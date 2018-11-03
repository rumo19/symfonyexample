<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/home", name="home")
 */

class HomeController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/helloUser/{name}", name="hello_user",  methods={"GET"})
     */
    public function  helloUser(Request $request, $name)
    {
       // $name= $request->get('name');
        $form = $this -> createFormBuilder()
            ->add('fullname')
            ->getForm()
            ;

       $person= [
         'name' =>   'Kamrul',
           'lastName' => 'Hasan',
           'age' => 23

       ];
        return $this->render('home/greet.html.twig', [
            'info' => $person,
            'formbuilder' => $form -> createView()

        ]);
    }
}
