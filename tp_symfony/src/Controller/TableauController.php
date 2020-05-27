<?php

namespace App\Controller;

use App\Entity\Tableau;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableauController extends AbstractController
{
    /**
     * @Route("/tableau", name="tableau")
     */
    Public function createTableau(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tableau=new Tableau();
        $tableau->setName('The Scream');
        $tableau->setPrice(2000);
        #$tableau->setDescription('description');
        $entityManager->persist($tableau);

        $entityManager->flush();

        return new Response('Tableau ajouter avec id = '.$tableau->getId());
    }
    public function index()
    {
        return $this->render('tableau/index.html.twig', [
            'controller_name' => 'TableauController',
        ]);
    }
}
