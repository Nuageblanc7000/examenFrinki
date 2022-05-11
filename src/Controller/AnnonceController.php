<?php

namespace App\Controller;

use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    #[Route('/annonces', name: 'annonces')]
    public function index(AnnoncesRepository $repo): Response
    {
        $price = 10;
        return $this->render('annonce/annonces.html.twig', [
            'annonces'  => $repo->findByFilter($price)
        ]);
    }
}
