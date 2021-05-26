<?php

namespace App\Controller;

use App\Entity\Achat;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AffichageController extends AbstractController
{
    #[Route('/affichage', name: 'affichage')]
    public function index(): Response
    {
        $achats=$this->getDoctrine()->getRepository(Achat::class)->findAll();
        return $this->render('affichage/affichage.html.twig', [
            'achats' => $achats
        ]);
    }
    
}
