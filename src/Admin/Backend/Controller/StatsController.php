<?php

namespace Admin\Backend\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Admin\Backend\Entity\Category;
use Admin\Backend\Form\CategoryType;

use Symfony\Component\HttpFoundation\JsonResponse;
use Admin\Backend\Entity\Model;

/**
 * Statistics controller.
 */
class StatsController extends Controller {
    /**
     * Lists all Category entities.
     */
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
			'pie' => $pie
        ));
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

    private function count($type, $model) {
		$q = '
			select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from ' . $model . '
			where year(created_at) = year(current_date)
				  and month(created_at) = month(current_date) 
			and type = :type';

		return $this->fetchAll($q, [
			'type' => $type
		]);
	}

	private function countIRECL() {
		$q = '
			select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from reclamation_internal
			where year(created_at) = year(current_date)
				and month(created_at) = month(current_date) '
			;
		return $this->fetchAll($q, []);
	}

	private function fetchAll($sql, $params) {
        $em = $this->getDoctrine()->getManager();
		$stmt = $em->getConnection()->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}

}
