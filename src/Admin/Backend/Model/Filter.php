<?php
namespace Admin\Backend\Model;

class Filter {
    /**
     * Common filter used in pagination
     *
     */
    public static function from($em, $klass, $limit, $offset) {        
        $builder = $em->createQueryBuilder();
        return $builder->select('x')
            ->from($klass, 'x')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery();
    }
}