<?php
namespace Admin\Backend\Model;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class Filter {
    public function __construct(Container $container) {    
        $this->container = $container;
    } 

    /**
     * Common filter used in pagination
     *
     */
    public function from($em, $klass, $limit, $offset) {        
        $builder = $em->createQueryBuilder();
        return $builder->select('x')
            ->from($klass, 'x')
            ->orderBy('x.createdAt', 'desc')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery();
    }
}