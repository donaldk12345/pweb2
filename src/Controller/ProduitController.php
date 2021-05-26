<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'produit')]
    public function index(): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $produit = new Produit();
        $produit->setNom('lait');
        $produit->setPrix(1500);
        $entityManager->persist($produit);
        $entityManager->flush();
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findAll();
        return $this->render('produit/produit.html.twig', [
            'produits' => '$produits',
        ]);
    }
}
