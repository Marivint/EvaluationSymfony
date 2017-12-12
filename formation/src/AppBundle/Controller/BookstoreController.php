<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\formations;
use AppBundle\Entity\Livre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BookstoreController extends Controller
{
    /**
    * @Route("/bookstore", name="bookstore")
    *
    */
    public function indexAction (Request $request)
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Categorie::class);
        //$countt = $repositoryLivre = $doctrine->getRepository(Livre::class)->countCategoryQuery();
        //exit(dump($countt));
        $results = $repository->findAll();
        return $this->render('bookstore/categories.html.twig',[
            'results' => $results
        ]);
    }

    /**
     * @Route("/bookstore/{categorie}",
     *   name="bookstore_livres",
     *   requirements={"name" = "[a-z]+"},
     *   defaults={"name" = "Anonyme"}
     *   )
     * @Method ({"GET", "POST"})
     */
    public function livresAction(Request $request, String $categorie)
    {
        $doctrine = $this->getDoctrine();
        $repositoryCategorie = $doctrine->getRepository(Categorie::class);
        $results = $repositoryCategorie->findOneBy(array('name' => $categorie));
        return $this->render('bookstore/livres.html.twig', [
            'results' => $results,
            'categorie' => $categorie
        ]);
    }

    /**
     * @Route("/bookstore/{categorie}/{livre}",
     *   name="bookstore_livre_detail",
     *   requirements={"name" = "[a-z]+"},
     *   defaults={"name" = "Anonyme"}
     *   )
     * @Method ({"GET", "POST"})
     */
    public function detailAction(Request $request, String $categorie, String $livre)
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Livre::class);
        $results = $repository->findOneBy(array('name' => $livre));
        return $this->render('bookstore/livre_detail.html.twig', [
            'results' => $results
        ]);
    }

}