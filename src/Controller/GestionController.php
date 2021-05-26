<?php

namespace App\Controller;

use App\Entity\Achat;
use App\Form\EnregistrementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GestionController extends AbstractController
{
    #[Route('/gestion', name: 'gestion')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $achat= new Achat();
        $form=$this->createForm(EnregistrementType::class , $achat);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $achat->setCreateAt(new \DateTime());
            $manager->persist($achat);
            $manager->flush();
        }
        return $this->render('gestion/gestion.html.twig', [
            'form' =>$form->createView()
        ]);

    }

   
}
