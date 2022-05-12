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
    public function index(AnnoncesRepository $repo, Request $req,PaginatorInterface $paginator): Response
    {
        $data = new DataFilter();
        $form = $this->createForm(FilterAnnonceType::class, $data);
        $form->handleRequest($req);
        $page = $data->setPage($req->query->getInt('page',1));
        $dat = $repo->findByFilter($data);
        $pagination = $paginator->paginate($dat,$page->getPage(),8);

        return $this->render('annonce/annonces.html.twig', [
            'form' => $form->createView(),
            'annonces'  => $pagination
        ]);
    }
}
