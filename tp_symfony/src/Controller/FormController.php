<?php

namespace App\Controller;

use App\Entity\Tableau;
use App\Form\PostType;
use App\Form\TableauType;
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
        $tableau = new Tableau();
        $form = $this->createForm(TableauType::class,$tableau, [
            'action' => $this->generateUrl('form')
        ]);
        
        $form->handleRequest($request);

        if($form->isSubmitted())
        {

            $em = $this->getDoctrine()->getManager();
            $em->persist($tableau);

            $em->flush();
        }
        return $this->render('form/index.html.twig', [
            'ajoutertableau_form' => $form->createView()
        ]);
    }
}
