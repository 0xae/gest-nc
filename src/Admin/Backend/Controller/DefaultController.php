<?php
namespace Admin\Backend\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Admin\Backend\Entity\Model;
use Admin\Backend\Entity\Stage;
use Admin\Backend\Model\ExportDataExcel;

class DefaultController extends Controller {
	public function indexAction() {
		$em = $this->getDoctrine()->getManager();
		$userId = $this->getUser()->getId();
		$month = $this->getCurrentMonth();
		
		$fotos = $em->getRepository('BackendBundle:Upload')
					->findBy(['reference' => 'user_'.$userId]);
		$photo = false;
		foreach ($fotos as $f) {
			$photo = $f->getFilename();
		}
		if ($photo) {
			$user = $em->getRepository('BackendBundle:User')->find($userId);
			$user->setPhotoDir($photo);
			$em->persist($user);       
			$em->flush();
		}

		return $this->render('BackendBundle:Home:dashboard.html.twig', array(
			"month" => $month,
			"globalCounters" => $this->getGlobalCounts() 
		));
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
		else if ($type == 'by_incump') {
			$db = $this->getIncumprimentoByDepartment($year);
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

	public function getGlobalCounts() {
		$all = [
			(int) $this->count(Model::DENOUNCE, 'complaint')[0]['count'],
			(int) $this->count(Model::COMPLAINT, 'complaint')[0]['count'],
			(int) $this->count(Model::RECLAMATION_EXTERN, 'sugestion')[0]['count'],
			(int) $this->count(Model::SUGESTION, 'sugestion')[0]['count'],
			(int) $this->countIRECL(),
		];

		$params=['state'=>Stage::RESPONDIDO];
		$answered = [
			(int) $this->count(Model::DENOUNCE, 'complaint', $params)[0]['count'],
			(int) $this->count(Model::COMPLAINT, 'complaint', $params)[0]['count'],
			(int) $this->count(Model::RECLAMATION_EXTERN, 'sugestion', $params)[0]['count'],
			(int) $this->count(Model::SUGESTION, 'sugestion', $params)[0]['count'],
			(int) $this->countIRECL($params),				
		];

		$params=['state'=>Stage::SEM_RESPOSTA];
		$noAnswered = [
			(int) $this->count(Model::DENOUNCE, 'complaint', $params)[0]['count'],
			(int) $this->count(Model::COMPLAINT, 'complaint', $params)[0]['count'],
			(int) $this->count(Model::RECLAMATION_EXTERN, 'sugestion', $params)[0]['count'],
			(int) $this->count(Model::SUGESTION, 'sugestion', $params)[0]['count'],
			(int) $this->countIRECL($params),				
		];
		
		$params=['state'=>Stage::ACOMPANHAMENTO];
		$acomp = [
			(int) $this->count(Model::DENOUNCE, 'complaint', $params)[0]['count'],
			(int) $this->count(Model::COMPLAINT, 'complaint', $params)[0]['count'],
			(int) $this->count(Model::RECLAMATION_EXTERN, 'sugestion', $params)[0]['count'],
			(int) $this->count(Model::SUGESTION, 'sugestion', $params)[0]['count'],
			(int) $this->countIRECL($params),				
		];

		return [
			"total" => array_sum($all),
			"answered" => array_sum($answered),
			"noAnswered" => array_sum($noAnswered),
			"acomp" => array_sum($acomp)
		];
	}	

	private function count($type, $model, $opts=[]) {
		$q = '
			select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from ' . $model . '
			where year(created_at) = year(current_date)
				  and month(created_at) = month(current_date) 
			and type = :type';

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

	private function countExternalRecl($state) {
		$date = new \DateTime;
		$registadas = '
			select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from sugestion
			where year(created_at) = year(current_date)
				and month(created_at) = month(current_date) 
			and type = \'reclamacao\'
				and state = :state
			';

		return $this->fetchAll($q, [
			'state' => $state
		]);
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

	private function getCurrentMonth() {
		$currMonth = date('m');
		if ($currMonth == '1') {
			return 'Janeiro';
		} else if ($currMonth == '2') {
			return 'Fevereiro';
		} else if ($currMonth == '3') {
			return 'Março';
		} else if ($currMonth == '4') {
			return 'Abril';
		} else if ($currMonth == '5') {
			return 'Maio';
		} else if ($currMonth == '6') {
			return 'Junho';
		} else if ($currMonth == '7') {
			return 'Julho';
		} else if ($currMonth == '8') {
			return 'Agosto';
		} else if ($currMonth == '9') {
			return 'Setembro';
		} else if ($currMonth == '10') {
			return 'Outubro';
		} else if ($currMonth == '11') {
			return 'Novembro';
		} else if ($currMonth == '12') {
			return 'Dezembro';
		}
	}
}
