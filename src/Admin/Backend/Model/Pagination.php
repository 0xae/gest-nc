<?php
namespace Admin\Backend\Model;

use Pagerfanta\Pagerfanta,
    Pagerfanta\Adapter\DoctrineORMAdapter,
    Pagerfanta\Exception\NotValidCurrentPageException;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Pagination {
    /**
     * $q is an instance of Query
     *
     */
    public static function fromQuery($q, $perPage=5, $page=1) {
        $fanta = new PagerFanta(new DoctrineORMAdapter($q));

        try {
            $fanta->setMaxPerPage($perPage);        
            $fanta->setCurrentPage($page);
        } catch(NotValidCurrentPageException $e) {
            throw new NotFoundHttpException();
        }

        return $fanta;        
    }
}