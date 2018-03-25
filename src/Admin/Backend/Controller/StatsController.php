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
			Model::RECLAMATION_INTERNAL => 
				(int) $this->count('reclamation_internal', ['state'=>Stage::NO_COMP])
				[0]['count'],
			Model::SUGESTION => 
				(int) $this->count('sugestion', ['state'=>Stage::NO_COMP, 'type'=>Model::SUGESTION])
				[0]['count'],
			Model::COMP_BOOK => 
				 $this->count('comp_book', ['state' => Stage::NO_COMP])
				 [0]['count'],
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

