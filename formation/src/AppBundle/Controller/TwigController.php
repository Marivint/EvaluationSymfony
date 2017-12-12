<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TwigController extends Controller
{
    /**
    * @Route("/twig", name="twig")
    *
    */
    public function indexAction (Request $request)
    {
        return $this->render('twig/index.html.twig',[
        	'now' => new \DateTime(),
        	'liste' => [
        		'element1',
        		'element2',
        		'element3',
        	]
     	]);
    }

    /**
    * @Route("/layout", name="layout")
    *
    */
    public function layoutAction (Request $request)
    {
        return $this->render('twig/layout.html.twig');
    }
}