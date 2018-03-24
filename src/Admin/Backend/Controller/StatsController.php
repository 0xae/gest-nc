<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Category;
use Admin\Backend\Entity\Stage;
use Admin\Backend\Form\CategoryType;

use Symfony\Component\HttpFoundation\JsonResponse;
use Admin\Backend\Entity\Model;

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
				(int) $counters[Model::RECLAMATION_INTERNAL][0]["count"];
		
		if ($total==0) {
			$total=1;
		}

		$pie = [
			Model::DENOUNCE => (int) $counters[Model::DENOUNCE][0]["count"] / $total,
			Model::COMPLAINT => (int) $counters[Model::COMPLAINT][0]["count"] / $total,
			Model::RECLAMATION_EXTERN => (int) $counters[Model::RECLAMATION_EXTERN][0]["count"] / $total,
			Model::SUGESTION => (int) $counters[Model::SUGESTION][0]["count"] / $total,
			Model::RECLAMATION_INTERNAL => (int) $counters[Model::RECLAMATION_INTERNAL][0]["count"] / $total			
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
				(int) $this->count(Model::DENOUNCE, 'complaint', ['state'=>Stage::NO_COMP])[0]['count'],
			Model::COMPLAINT => 
				(int) $this->count(Model::COMPLAINT, 'complaint', ['state'=>Stage::NO_COMP])[0]['count'],
			Model::RECLAMATION_EXTERN => 
				(int) $this->count(Model::RECLAMATION_EXTERN, 'sugestion', ['state'=>Stage::NO_COMP])[0]['count'],
			Model::SUGESTION => 
				(int) $this->count(Model::SUGESTION, 'sugestion', ['state'=>Stage::NO_COMP])[0]['count'],
		];

		return $ary;
	}

    public function getCounters() {
		$ary = [
			Model::DENOUNCE => $this->count(Model::DENOUNCE, 'complaint'),
			Model::COMPLAINT => $this->count(Model::COMPLAINT, 'complaint'),
			Model::RECLAMATION_EXTERN => $this->count(Model::RECLAMATION_EXTERN, 'sugestion'),
			Model::SUGESTION => $this->count(Model::SUGESTION, 'sugestion'),
			Model::RECLAMATION_INTERNAL => $this->countIRECL(),
		];
		return $ary;
	}

    private function count($type, $model, $opts=[]) {
		$q = '
			select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from ' . $model . '
			where year(created_at) = year(current_date)
				  and month(created_at) = month(current_date) 
			and type = :type ';
		$params = [
			'type' => $type
		];

		if (@$opts['state']) {
			$q .= ' and state=:state ';
			$params['state']=$opts['state'];
		}

		return $this->fetchAll($q, $params);
	}

	private function countIRECL($opts=[]) {
		$q = '
			select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from reclamation_internal
			where year(created_at) = year(current_date)
				and month(created_at) = month(current_date) '
			;

		$params = [];

		if (@$opts['state']) {
			$q .= ' and state=:state ';
			$params['state']=$opts['state'];
		}

		return $this->fetchAll($q, $params);
	}

	private function fetchAll($sql, $params) {
        $em = $this->getDoctrine()->getManager();
		$stmt = $em->getConnection()->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}
}
