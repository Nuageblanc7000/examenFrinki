<?php

namespace App\Controller;

use App\Data\DataFilter;
use App\Entity\Annonces;
use App\Form\FilterAnnonceType;
use App\Repository\AnnoncesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    #[Route('/annonces', name: 'annonces')]
    /**
     * Permet d'afficher et une paginiation et de créer un formulaire de filtrage
     *
     * @param AnnoncesRepository $repo
     * @param Request $req
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(AnnoncesRepository $repo, Request $req,PaginatorInterface $paginator): Response
    {   /**
        * @var Datafilter 
        * cette objet va permettre de stocker les données du filtre pour les envoyer par la suite dans mon querryBuilder pour mon filtre
        */
        $data = new DataFilter();
        $form = $this->createForm(FilterAnnonceType::class, $data);
        $form->handleRequest($req);
        $dat = $repo->findByFilter($data);
        $page = $req->query->getInt('page',1);
        $pagination = $paginator->paginate($dat,$page,8);
        return $this->render('annonce/annonces.html.twig', [
            'form' => $form->createView(),
            'annonces'  => $pagination
        ])
        ;
    }
    #[Route('/annonces/{id}', name:'annonce',priority:1)]
    public function Annonce(Annonces $ad): Response
    {
        return $this->render('annonce/annonce.html.twig',
        [
            'ad' => $ad
        ]) 
        ;
    }

    #[Route('/annonces/{id}/edit', name:'annonce_edit')]
    public function annonceEdit(Annonces $ad,Request $req,EntityManagerInterface $em): Response
    {   
        $form= $this->createForm(AnnonceEditType::class,$ad);
        $form->handleRequest($req);

        if($form->isSubmitted() &&  $form->isValid())
        {
            $em->flush();
        }
        return $this->render('annonce/edit.html.twig',
        [
            'ad' => $ad
        ]) 
        ;
    }
}
