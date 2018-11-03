<?php

namespace App\Controller;

use App\Entity\POst;
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
       // store in database
         $post= new POst();
         $post ->setTitle("Hilo");
         $post->setDescription("Tumar poroner jaha cay");
         $em= $this->getDoctrine()->getManager();
         $retrievepost = $em ->getRepository(POst::class) ->findOneBy([
             'id' =>6
         ]);
         $em-> persist($post); //create the sql command
        //delete data
        $em-> remove($retrievepost);
        //call it at the end
        $em-> flush();
        return $this->render('home/greet.html.twig', [
            'info' => $person,
            'formbuilder' => $form -> createView(),
             'post' => $retrievepost
        ]);
    }
}
