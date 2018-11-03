<?php

namespace App\Controller;

use App\Entity\POst;
use App\Form\PostType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(Request $request)
    {
        $post= new POst();
        #$post->setTitle('WELCOME');
        #$post-> setDescription('Hi Rumo');
        $form= $this ->createForm(PostType::class, $post, [
            'action' => $this->generateUrl('form'),
            #'method' => 'GET'
        ]);
//handle form submission
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
//store in the database
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();


        }
        //clear form
        unset($form);
        $form= $this ->createForm(PostType::class);

        return $this->render('form/index.html.twig', [
           'form_new' => $form ->createView()
        ]);
    }
}
