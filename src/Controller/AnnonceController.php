<?php

namespace App\Controller;

use App\Data\DataFilter;
use App\Entity\Annonces;
use App\Form\FilterAnnonceType;
use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    #[Route('/annonces', name: 'annonces')]
    public function index(AnnoncesRepository $repo, Request $req): Response
    {
        $data = new DataFilter();

        $form = $this->createForm(FilterAnnonceType::class, $data);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){

        }
        return $this->render('annonce/annonces.html.twig', [
            'form' => $form->createView(),
            'annonces'  => $repo->findByFilter($data)
        ]);
    }
}
