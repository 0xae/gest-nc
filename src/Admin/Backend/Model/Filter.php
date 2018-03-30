<?php
namespace Admin\Backend\Model;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Admin\Backend\Entity\Stage;

class Filter {
    public function __construct(Container $container) {    
        $this->container = $container;
    } 

    /**
     * Common filter used in pagination
     */
    public function from($em, $klass, $limit, $offset) {
        $builder = $em->createQueryBuilder();
        return $builder->select('x')
            ->from($klass, 'x')
            ->orderBy('x.id', 'asc')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery();
    }

    public function ByState($em, $model, $state) {
        $all = $em->getRepository('BackendBundle:' . $model)
                  ->findAll();
        $today = new \DateTime;
        $batchSize = 20;
        $ary = [];
        $i = 0;

        foreach ($all as $obj) {
            $responseDate = $obj->getRespDate();

            if ($today > $responseDate && (
                $obj->getState() == Stage::ACOMPANHAMENTO ||
                $obj->getState() == Stage::TRATAMENTO)) 
            {
                $obj->setState(Stage::NO_CONFOR);
                $i++;
            }

            if (($i % $batchSize) === 0) {
                $em->flush();
                $em->clear();
            }

            if ($obj->getState() == $state) {
                $ary[] = $obj;
            }
        }

        $em->flush();
        $em->clear();

        return $ary;
    }
}
