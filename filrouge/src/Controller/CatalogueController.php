<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Plat;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController
{

    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->platRepository= $platRepository;
    }


    #[Route('/', name: 'app_accueil')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        
        $categories = $categorieRepository->findAll();

        return $this->render('catalogue/index.html.twig', [
            'categories' => $categories
        ]);
    }


     #[Route('/categorie', name: 'categorie')]
     public function AfficherCategorie(CategorieRepository $categorieRepository): Response
     {
         $categories=$categorieRepository->findBy(['id'=> range(1, 14) ]);
         

         return $this->render('catalogue/categorie.html.twig', [
         'categories'=>$categories
         ]);
     }

     
 
}
