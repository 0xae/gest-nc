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
        $all = $em->getRepository('BackendBundle:' . $model)->findAll();
        $today = new \DateTime;
        $batchSize = 20;
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

            if ($i>0 && ($i % $batchSize) === 0) {
                $em->flush();
                $em->clear();
            }
        }

        $pageIdx = !array_key_exists('page', $_GET) ? 1 : $_GET['page'];
        $perPage = Settings::PER_PAGE;

        $q = $this->container
            ->get('sga.admin.filter')
            ->from($em, 'BackendBundle:'.$model, $perPage, ($pageIdx-1)*$perPage);

        $fanta = $this->container
            ->get('sga.admin.table.pagination')
            ->fromQuery($q, $perPage, $pageIdx);

        $entities = $q->getResult();

        // $em->flush();
        // $em->clear();
        return [$entities, $fanta];
    }
}
