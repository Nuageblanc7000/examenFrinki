<?php

namespace App\Controller;

use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class HomeController extends AbstractController
{
    /**
     * Affichage avec limit des dernières annonces sur la page d'accueil
     *
     * @param AnnoncesRepository $repo
     * @return Response
     */
    #[Route('/', name: 'home')]
    public function index(AnnoncesRepository $repo): Response
    {
        $price=90;
        return $this->render('home/home.html.twig', [
            'annonces' => $repo->findBy([],['createdAt' => 'DESC'],3)
        ]);
    }
    #[Route('/', name: 'more')]
    public function info(): Response
    {
        return $this->render('home/info.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
