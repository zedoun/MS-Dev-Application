<?php

namespace App\Controller;


use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatsController extends AbstractController
{
    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->platRepository= $platRepository;
    }

    #[Route('/plats', name: 'app_plats')]
    public function afficherPlat(PlatRepository $platRepository): Response
    {
        $plats= $platRepository ->findAll();

        return $this->render('plats/plats.html.twig', [
           "plats"=>$plats
        ]);
    }

    
    #[Route('/plats/{categorie_id}', name: 'app_plats_categorie')]
    public function platsCategorie(int $categorie_id, CategorieRepository $categorieRepository): Response
    {
        
        $categorie = $this->categorieRepository->find($categorie_id);
       

        $plats = $categorie->getPlats();
       
        return $this->render('plats/platsCategorie.html.twig', [
           
            'categories' => $categorie,
            'plats' => $plats,
        ]);
    }
}
