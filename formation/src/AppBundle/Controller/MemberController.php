<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MemberController extends Controller
{
    private $member = [
                '1' => ['nom'=>'Marivint','prenom'=>'Yvann','email'=>'marivint.yvann@gmail.com','photo'=>'member.png'],
                '2' => ['nom'=>'Jojo','prenom'=>'Jaja','email'=>'jojo.jaja@gmail.com','photo'=>'member.png'],
                '3' => ['nom'=>'Dreezi','prenom'=>'Kevin','email'=>'dreezi.kevin@gmail.com','photo'=>'member.png'],
                '4' => ['nom'=>'Mesica','prenom'=>'Lucas','email'=>'mesica.lucas@gmail.com','photo'=>'member.png'],
                '5' => ['nom'=>'Berger','prenom'=>'Bastien','email'=>'berger.bastien@gmail.com','photo'=>'member.png'],
                '6' => ['nom'=>'Marivint','prenom'=>'Eliott','email'=>'marivint.eliott@gmail.com','photo'=>'member.png'],
                '7' => ['nom'=>'Lepape','prenom'=>'Dieu','email'=>'lepape.dieu@gmail.com','photo'=>'member.png']
            ];
    /**
    * @Route("/members", name="members")
    *
    */
    public function membersAction ()
    {
        return $this->render('member/liste.html.twig',[
            'members' => $this->member
        ]);
    }

    /**
    * @Route("/member/{id}", name="member_id", defaults={"id" = "1"})
    *
    */
    public function memberIDAction (String $id)
    {
        return $this->render('member/member_id.html.twig',[
            'members' => $this->member,
            'member_id' => $id
        ]);
    }
}