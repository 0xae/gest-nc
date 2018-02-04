<?php

namespace Admin\Backend\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {
	public function indexAction() {
		return $this->render('BackendBundle:Home:dashboard.html.twig', array());
	}

	public function statsAction() {
        $em = $this->getDoctrine()->getManager();
		// $entities = $em->getRepository('BackendBundle:Complaint');
		$qb = $em->createQueryBuilder();
		$sql = "
			select type,count(1) from complaint
		";

		$ary = [];
		return new JsonResponse($ary);
	}
}
