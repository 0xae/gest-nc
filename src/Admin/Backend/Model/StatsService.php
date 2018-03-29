<?php
namespace Admin\Backend\Model;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Admin\Backend\Entity\Stage;

class StatsService {
    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function count($em, $model, $opts=[]) {
		$q = 'select 
				count(1) as count,
				date_format(created_at, "%Y-%m") as period
			from ' . $model . '
			where year(created_at) = year(current_date)
				  and month(created_at) = month(current_date) 
        ';

		$params = [];

		if (@$opts['state']) {
			$q .= ' and state=:state ';
			$params['state']=$opts['state'];
		}

		if (@$opts['type']) {
			$q .= ' and type=:type ';
			$params['type']=$opts['type'];
		}

		return $this->fetchAll($em, $q, $params);
	}

	public function responseAvg($em, $model, $opts=[]) {
		$days = 15;
		$type = 'type';
		$params = [];		

		if (@$opts['days']) {
			$days = (int)$opts['days'];
		}

		if (@$opts['type']) {
			$type="'".@$opts['type']."'";
		}

		$column = 'date_add(c.created_at, INTERVAL '.$days.' DAY)';
		$avg = 'avg(datediff('.$column.', c.created_at))';

		$q = 'select
				'. $avg .' as count,
				'. $type .' as type,
				a.codigo as code

			from ' . $model . ' c

			join app_entity a ON a.id = (
				select entity from user where id=c.created_by
			)

			where year(c.created_at) = year(current_date)
				and month(c.created_at) = month(current_date) 
				and response_date is not null

			group by '.$type.', a.codigo
		';

		if (@$opts['state']) {
			$q .= ' and state=:state ';
			$params['state']=$opts['state'];
		}

		if (@$opts['type']) {
			$q .= ' and type=:type ';
			$params['type']=$opts['type'];
		}

		return $this->fetchAll($em, $q, $params);
	}

	public function groupByMonth($em, $model, $opts=[]) {
		$year = date("Y");
		$type = 'type';

		if (@$opts['type']) {
			$type= "'".$opts['type']."'";
		}

		if (@$opts['year']) {
			$year=(int)@$opts['year'];
		}

		$sql = '
			select COUNT(1) as count
				,DATE_FORMAT(created_at, "%Y-%m") as period
				,'.$type.' as type
			from '. $model .' 
			where year(created_at) = :year
			group by DATE_FORMAT(created_at, "%Y-%m"), type
		';

		$params = ["year" => $year];
		return $this->fetchAll($em, $sql, $params);
	}

	public function groupByDepartment($em, $model, $opts=[]) {
		$year = date("Y");
		$type = 'type';

		if (@$opts['year']) {
			$year=(int)@$opts['year'];
		}
		if (@$opts['type']) {
			$type="'".@$opts['type']."'";
		}

		$sql = '
			select COUNT(1) as count,
				'. $type .' as type, 
				a.codigo as code
			from ' . $model . ' c
			join app_entity a ON a.id = (
				select entity from user where id=c.created_by
			) where year(c.created_at) = :year
			group by '.$type.', a.codigo
		';

		$params=["year" => $year];
		return $this->fetchAll($em, $sql, $params);
	}

	private function fetchAll($em, $sql, $params) {
		// TODO: research a way to get $em inside services
        // $em = $this->container->getDoctrine()->getManager();
		$stmt = $em->getConnection()->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}
}
