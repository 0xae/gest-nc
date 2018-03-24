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

	private function fetchAll($em, $sql, $params) {
        // $em = $this->container->getDoctrine()->getManager();
		$stmt = $em->getConnection()->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll();
	}
}
