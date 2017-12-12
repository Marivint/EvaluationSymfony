<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
    * @Route("/contact", name="contact")
    *
    */
    public function contactAction (Request $request)
    {
        $doctrine = $this->getDoctrine();
        $repository = $doctrine->getRepository(Contact::class);
        $results = $repository->findAll();
        return $this->render('contact/contact.html.twig',[
            'results' => $results
        ]);
    }

    /**
    * @Route("/contact/form", name="contact_form", defaults={"id" = "null"})
    * @Route("/contact/form/update/{id}", name="contact_update")
    */
    public function formAction (Request $request, $id)
    {  
        $doctrine = $this ->getDoctrine();

        $entity = $id ? $doctrine->getRepository(Contact::class)->find($id) : new Contact();
        $type = ContactType::class;

        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $manager = $doctrine->getManager();
            $manager->persist($data);
            $manager->flush();
            $message = $id ?"Le contact a été modifié":"Le contact a été ajouté";
            $this->addFlash('notice', $message);
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/form.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route ("/contact/delete/{id}", name="contact_delete")
    *
    */
    public function deleteAction($id){
        $doctrine = $this->getDoctrine();
        $contact = $doctrine->getRepository(Contact::class)->find($id);
        $manager = $doctrine->getManager();
        $manager->remove($contact);
        $manager->flush();
        $this->addFlash('notice', "Le contact - {$contact->getFirstname()} {$contact->getLastname()} - a été supprimer");
        return $this->redirectToRoute('contact');}

}