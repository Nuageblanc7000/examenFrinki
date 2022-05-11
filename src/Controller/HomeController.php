<?php

namespace App\Controller;

use App\Repository\AnnoncesRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(AnnoncesRepository $repo): Response
    {
        // $date = new \DateTimeImmutable();
        return $this->render('home/home.html.twig', [
            'annonces' => $repo->findBy([],['createdAt' => 'DESC'],3)
            // 'annonces' =>  $repo->findAll()
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
