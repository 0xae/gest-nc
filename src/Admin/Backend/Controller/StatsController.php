<?php
namespace Admin\Backend\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Admin\Backend\Entity\Category;
use Admin\Backend\Entity\Stage;
use Admin\Backend\Entity\Model;
use Admin\Backend\Form\CategoryType;

/**
 * Statistics controller.
 */
class StatsController extends Controller {
    public function indexAction() {
		$counters = $this->getCounters();
		$total = (int) $counters[Model::DENOUNCE][0]["count"] +
			(int) $counters[Model::COMPLAINT][0]["count"] +
			(int) $counters[Model::RECLAMATION_EXTERN][0]["count"] +
			(int) $counters[Model::SUGESTION][0]["count"] +
			(int) $counters[Model::RECLAMATION_INTERNAL][0]["count"] + 
			(int) $counters[Model::COMP_BOOK][0]["count"]	
		;

		if ($total==0) {
			$total=1;
		}

		$pie = [
			Model::DENOUNCE => (int) $counters[Model::DENOUNCE][0]["count"] / $total,
			Model::COMPLAINT => (int) $counters[Model::COMPLAINT][0]["count"] / $total,
			Model::RECLAMATION_EXTERN => (int) $counters[Model::RECLAMATION_EXTERN][0]["count"] / $total,
			Model::RECLAMATION_INTERNAL => (int) $counters[Model::RECLAMATION_INTERNAL][0]["count"] / $total,			
			Model::SUGESTION => (int) $counters[Model::SUGESTION][0]["count"] / $total,
			Model::COMP_BOOK => (int) $counters[Model::COMP_BOOK][0]["count"] / $total,
		];

        return $this->render('BackendBundle:Stats:index.html.twig', array(
			'counters' => $counters,
			'thirdy_party' => $this->getThirdPartyCounts(),
			'pie' => $pie
        ));
	}

	public function ajaxAction($type) {
		$year = date('Y');
		$month = date('m');
		$data = [];

		if (@$_GET['year']) {
			$year = $_GET['year'];
		}

		if (@$_GET['month']) {
			$month = $_GET['month'];
		}

		if ($type == 'avgResponseTime') {
			$data = $this->getAvgResponseTime();
		}

		return new JsonResponse($data);
	}

	public function getAvgResponseTime() {
		$em = $this->getDoctrine()->getManager();		
		$service = $this->container->get('sga.admin.stats');

		$ary1 = $service->responseAvg($em, 'complaint', ['type' => Model::DENOUNCE, 'days'=>15]);
		$ary2 = $service->responseAvg($em, 'complaint', ['type' => Model::COMPLAINT, 'days'=>15]);
		$ary3 = $service->responseAvg($em, 'reclamation_internal', ['type'=>Model::RECLAMATION_INTERNAL, 'days'=>15]);
		$ary4 = $service->responseAvg($em, 'sugestion', ['type' => Model::RECLAMATION_EXTERN, 'days'=>15]);
		$ary5 = $service->responseAvg($em, 'sugestion', ['type' => Model::SUGESTION, 'days'=>15]);
		$ary6 = $service->responseAvg($em, 'comp_book', ['type' => 'comp_book', 'days'=>10]);

		$ary = array_merge($ary1, $ary2, $ary3, $ary4, $ary5, $ary6);
		
		$table = [];
		foreach($ary as $val) {
			$entry = [
				'count' => $val['count'],
				'type' => $val['type']	
			];
			$key = $val['code'];
			if (array_key_exists($key, $table)) {
				$table[$key][] = $entry;
			} else {
				$table[$key] = [$entry];
			}
		}

		return ["rows" => $table];
	}

	public function getThirdPartyCounts() {
		$ary = [
			Model::DENOUNCE => 
				(int) $this->count('complaint', ['state'=>Stage::NO_COMP, 'type'=>Model::DENOUNCE])
				[0]['count'],
			Model::COMPLAINT => 
				(int) $this->count('complaint', ['state'=>Stage::NO_COMP, 'type'=>Model::COMPLAINT])
				[0]['count'],
			Model::RECLAMATION_EXTERN => 
				(int) $this->count('sugestion', ['state'=>Stage::NO_COMP, 'type'=>Model::RECLAMATION_EXTERN])
				[0]['count'],
			Model::SUGESTION => 
				(int) $this->count('sugestion', ['state'=>Stage::NO_COMP, 'type'=>Model::SUGESTION])
				[0]['count'],
			// Model::RECLAMATION_INTERNAL => 
			// 	(int) $this->count('reclamation_internal', ['state'=>Stage::NO_COMP])
			// 	[0]['count'],
			// Model::COMP_BOOK => 
			// 	 $this->count('comp_book', ['state' => Stage::NO_COMP])
			// 	 [0]['count'],
		];

		return $ary;
	}

    public function getCounters() {
		$ary = [
			Model::DENOUNCE => $this->count('complaint', ['type' => Model::DENOUNCE]),
			Model::COMPLAINT => $this->count('complaint', ['type' => Model::COMPLAINT]),
			Model::RECLAMATION_INTERNAL => $this->count('reclamation_internal'),
			Model::RECLAMATION_EXTERN => $this->count('sugestion', ['type' => Model::RECLAMATION_EXTERN]),
			Model::SUGESTION => $this->count('sugestion', ['type' => Model::SUGESTION]),
			Model::COMP_BOOK => $this->count('comp_book'),	
		];
		return $ary;
	}

    private function count($model, $opts=[]) {
		$em = $this->getDoctrine()->getManager();
		return $this->container
			->get('sga.admin.stats')
			->count($em, $model, $opts);
	}
}
