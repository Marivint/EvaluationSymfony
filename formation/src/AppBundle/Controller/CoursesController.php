<?php

namespace AppBundle\Controller;

use AppBundle\Entity\formations;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoursesController extends Controller
{
    /**
    * @Route("/courses", name="courses")
    *
    */
    public function indexAction (Request $request)
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(formations::class);
        $results = $repository->findAll();
        return $this->render('courses/courses.html.twig',[
            'results' => $results
        ]);
    }

    /**
    * @Route("/course/query", name="courses_query")
    *
    */
    public function queryAction (Request $request)
    {
        //doctrine
        $doctrine = $this->getDoctrine();

        //appel d'une methode de la classe de depot (repository)
        $results = $doctrine->getRepository(formations::class)->testQuery();
        exit(dump($results));
    }

    /**
     * @Route("/courses/{formation}",
     *   name="formation_modules",
     *   requirements={"name" = "[a-z]+"},
     *   defaults={"name" = "Anonyme"}
     *   )
     * @Method ({"GET", "POST"})
     */
    public function formationAction(Request $request, String $formation)
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(formations::class);
        $results = $repository->findBy(array('name' => $formation));
        return $this->render('courses/modules.html.twig', [
            'results' => $results,
            'formation' => $formation
        ]);
    }
}