<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/test/{name}",
            name="test",
            requirements={"name" = "[a-z]+"},
            defaults={"name" = "Anonyme"}
        )
     * @Method ({"GET", "POST"})
     */
    public function testAction(Request $request, String $name)
    {
        return $this->render('default/test.html.twig', [
            'key' => 'value',
            'liste' => ['value1','value2'],
            'name' => $name
        ]);
    }
}