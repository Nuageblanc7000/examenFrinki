<?php

namespace App\Controller;

use App\Data\DataFilter;
use App\Form\FilterAnnonceType;
use App\Repository\AnnoncesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    #[Route('/annonces', name: 'annonces')]
    /**
     * Permet d'afficher et une pagniation et de créer un formulaire de filtrage
     *
     * @param AnnoncesRepository $repo
     * @param Request $req
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(AnnoncesRepository $repo, Request $req,PaginatorInterface $paginator): Response
    {
        $data = new DataFilter();
        $form = $this->createForm(FilterAnnonceType::class, $data);
        $form->handleRequest($req);
        $dat = $repo->findByFilter($data);
        $page = $req->query->getInt('page',1);
        $pagination = $paginator->paginate($dat,$page,8);
        return $this->render('annonce/annonces.html.twig', [
            'form' => $form->createView(),
            'annonces'  => $pagination
        ]);
    }

   
}
