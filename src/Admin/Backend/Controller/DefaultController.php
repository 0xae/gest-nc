<?php

namespace Admin\Backend\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Admin\Backend\Entity\Model;

class DefaultController extends Controller {
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$userId = $this->getUser()->getId();

		$fotos = $em->getRepository('BackendBundle:Upload')
					->findBy([
						'reference' => 'user_'.$userId
					]);

		$photo = false;
		foreach ($fotos as $f) {
			$photo = $f->getFilename();
		}

		if ($photo) {
			$user = $em->getRepository('BackendBundle:User')
					   ->find($userId);
					   
			$user->setPhotoDir($photo);
			$em->persist($user);       
			$em->flush();
		}

		return $this->render('BackendBundle:Home:dashboard.html.twig', array());
	}

	public function statsAction($type) {
		$year = $_GET['year'];
		if ($type == 'by_department'){
			$db = $this->groupByDepartment($year);
		}
		else if ($type == 'by_month') {
			$db = $this->groupByMonth($year);
		}
		else if ($type == 'by_day') {
			$month = $_GET['month'];
			$db = $this->groupByDay($year, $month);
		}

		return new JsonResponse($db);
	}

	public function countersAction() {
		$ary = [
			Model::DENOUNCE => $this->count(Model::DENOUNCE, 'complaint'),
			Model::COMPLAINT => $this->count(Model::COMPLAINT, 'complaint'),
			Model::RECLAMATION_EXTERN => $this->count(Model::RECLAMATION_EXTERN, 'sugestion'),
			Model::SUGESTION => $this->count(Model::SUGESTION, 'sugestion'),
			Model::RECLAMATION_INTERNAL => $this->countIRECL()
		];

		return new JsonResponse($ary);
	}

	private function groupByDepartment($year) {
		$complaints = '
			select COUNT(c.type) as count,
				c.type,
				a.codigo as code
			from complaint c
			join app_entity a ON a.id = (select entity from user where id=c.created_by)
			where year(c.created_at) = :year
			group by c.type,a.codigo
		';

		$sugestions = '
			select COUNT(c.type) as count,
				c.type,
				a.codigo as code
			from sugestion c
			join app_entity a ON a.id = (select entity from user where id=c.created_by)
			where year(c.created_at) = :year
			group by c.type,a.codigo
		';

		$ary = $this->fetchAll($complaints, ['year' => $year]);
		$ary = array_merge($ary, $this->fetchAll($sugestions, ['year' => $year]));

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

	private function groupByDay($year, $month) {
		$complaints = '
			select COUNT(type) as count,
				DATE_FORMAT(created_at, "%Y-%m-%d") as period,
				type 
			from complaint 
			where year(created_at) = :year
			and month(created_at) = :month
			group by DATE_FORMAT(created_at, "%Y-%m-%d"),type ;
		';

		$sugestions = '
			select COUNT(type) as count,
				DATE_FORMAT(created_at, "%Y-%m-%d") as period,
				type 
			from sugestion
			where year(created_at) = :year
			and month(created_at) = :month
			group by DATE_FORMAT(created_at, "%Y-%m-%d"),type 
		';

		$params = ['year'=>$year, 'month'=>$month];
		$ary = $this->fetchAll($complaints, $params);
		$ary = array_merge($ary, $this->fetchAll($sugestions, $params));

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

		$db = ["rows" => $table];	
		return $db;
	}

	private function groupByMonth($year) {
        $em = $this->getDoctrine()->getManager();
		$year = 2018;		
		$complaints = '
			select COUNT(type) as count,
				   DATE_FORMAT(created_at, "%Y-%m") as period,
				   type 
			from complaint 
			where year(created_at) = :year
			group by DATE_FORMAT(created_at, "%Y-%m"),type ;
		';

		$sugestions = '
			select COUNT(type) as count,
				DATE_FORMAT(created_at, "%Y-%m") as period,
				type 
			from sugestion 
			where year(created_at) = :year
			group by DATE_FORMAT(created_at, "%Y-%m"),type ;
		';	

		$ary = $this->fetchAll($complaints, ['year' => $year]);
		$ary = array_merge($ary, $this->fetchAll($sugestions, ['year' => $year]));

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

		$obj = [
			['type'=>'queixa', 'count'=>0],
			['type'=>'denuncia', 'count'=>0],
			['type'=>'sugestao', 'count'=>0],
			['type'=>'reclamacao', 'count'=>0]
		];

		for ($i=1; $i<13; $i++) {
			$key = "$year-" . str_pad($i, 2, '0', STR_PAD_LEFT);
			if (!array_key_exists($key, $table)) {
				$table[$key] = &$obj;
			}
		}

		$db = ["rows" => $table];	
		return $db;
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
