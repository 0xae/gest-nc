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
		} else if ($type == 'by_department'){
			$data = $this->groupByDepartment($year);
		} else if ($type == 'by_incump') {
			$data = $this->getIncumprimentoByDepartment($year);
		} else if ($type == 'by_month') {
			$data = $this->groupByMonth($year);
		}

		return new JsonResponse($data);
	}

	private function getIncumprimentoByDepartment($year) {
		$complaints = '
			select COUNT(c.type) as count,
				c.type,
				a.codigo as code
			from complaint c
			join app_entity a ON a.id = (select entity from user where id=c.created_by)
			where year(c.created_at) = :year
				  and state=:state
			group by c.type,a.codigo
		';

		$sugestions = '
			select COUNT(c.type) as count,
				c.type,
				a.codigo as code
			from sugestion c
			join app_entity a ON a.id = (select entity from user where id=c.created_by)
			where year(c.created_at) = :year
				and state=:state
			group by c.type,a.codigo
		';

		$internalRecl = '
			select COUNT(1) as count,
				"reclamacao_interna" as type,
				a.codigo as code
			from reclamation_internal c
			join app_entity a ON a.id = (select entity from user where id=c.created_by)
			where year(c.created_at) = :year
				and state=:state
			group by type,a.codigo
		';

		$params = [
			'year' => $year,
			'state' => Stage::NO_CONFOR
		];

		$ary1 = $this->fetchAll($complaints, $params);
		$ary2 = $this->fetchAll($sugestions, $params);
		$ary3 = $this->fetchAll($internalRecl, $params);

		$ary = array_merge($ary1, $ary2, $ary3);

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

		return ['rows' => $table];
	}

	private function groupByMonth($year) {
        $em = $this->getDoctrine()->getManager();
		$service = $this->container->get('sga.admin.stats');
		$ary1 = $service->groupByMonth($em, 'complaint');
		$ary2 = $service->groupByMonth($em, 'sugestion');
		$ary3 = $service->groupByMonth($em, 'comp_book', ['type'=>'comp_book']);
		$ary4 = $service->groupByMonth($em, 'reclamation_internal', ['type'=>'reclamacao_interna']);
		$ary = array_merge($ary1, $ary2, $ary3, $ary4);

		$table = [];
		foreach($ary as $val) {
			$entry = [
				'count' => $val['count'],
				'type' => $val['type']	
			];
			$key = $val['period'];
			if (array_key_exists($key, $table)) {
				$table[$key][] = $entry;
			} else {
				$table[$key] = [$entry];
			}
		}

		for ($i=1; $i<13; $i++) {
			$key = "$year-" . str_pad($i, 2, '0', STR_PAD_LEFT);
			if (!array_key_exists($key, $table)) {
				$table[$key] = [];
			}
		}

		$db = ["rows" => $table];	
		return $db;
	}

	private function groupByDepartment($year) {
        $em = $this->getDoctrine()->getManager();
		$service = $this->container->get('sga.admin.stats');

		$ary1 = $service->groupByDepartment($em, 'complaint');
		$ary2 = $service->groupByDepartment($em, 'sugestion');
		$ary3 = $service->groupByDepartment($em, 'reclamation_internal', ['type'=>'reclamacao_interna']);
		$ary4 = $service->groupByDepartment($em, 'comp_book', ['type'=>'comp_book']);
		$ary = array_merge($ary1, $ary2, $ary3, $ary4);

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

	private function fetchAll($sql, $params) {
        $em = $this->getDoctrine()->getManager();
		$stmt = $em->getConnection()->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}
}
