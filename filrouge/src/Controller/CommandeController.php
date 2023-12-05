<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Commande;
use App\Form\DeliveryFormType;
use App\Form\FinaliserFormType;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function Commande(Request $request, PlatRepository $platsRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DeliveryFormType::class);

        $form2 = $this->createForm(FinaliserFormType::class);

       
        $panier = []; 

        $dateCommande = new \DateTime();

       
        $montantTotalPanier = 0;

        // Parcourt chaque élément du panier
        foreach ($panier as $element) {
           
            $plat = $platsRepository->find($element['plat_id']);

         
            $montantTotalPanier += $plat->getPrix() * $element['quantity'];
        }

        
        $Commande = new Commande();

       
        $Commande->setDateCommande($dateCommande);
        $Commande->setTotal($montantTotalPanier);
        $Commande->setEtat('0');

        $utilisateur = $this->getUser();
        dd($utilisateur);
        if ($utilisateur) {
           
            $Commande->setUtilisateur($utilisateur);
        }

        
        $entityManager->persist($Commande);
        $entityManager->flush();

        // Redirige vers la page de succès
        return $this->render('commande/index.html.twig', [
            'deliveryForm'=> $form,
            'FinaliserForm'=> $form2
        ]);

        
        
    }
    
    
}
