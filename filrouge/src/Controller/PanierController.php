<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panier', name:'panier_')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, PlatRepository $platRepository)
    {
        $panier = $session->get('panier', []);

        // des variables 
        $data = [];
        $total = 0;

        foreach ($panier as $id => $quantity) {
            $plat = $platRepository->find($id);
        
            if ($plat !== null) {
                $data[] = [
                    'plat' => $plat,
                    'quantity' => $quantity
                ];
                $total += $plat->getPrix() * $quantity;
            } else {
             
            }
        }
        
        return $this->render('panier/index.html.twig', compact('data', 'total'));
    }

    #[Route('/panier/ajout/{id}', name: 'add_panier')]
    public function add(Plat $plat, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $plat->getId();

        //On récupère le panier existant
        $panier = $session->get('panier', []);

       
        if(empty($panier[$id])){
            $panier[$id] = 1;
        } else{
            $panier[$id]++;
        }

        $session->set('panier', $panier);

        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/panier/remove/{id}', name: 'remove_panier')]
    public function remove(Plat $plat, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $plat->getId();

        //On récupère le panier existant
        $panier = $session->get('panier', []);

        //On retire le produit du panier s'il n'y a qu'un plat
        //Sinon on décrémente sa quantité
        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            } else{
                unset($panier[$id]);
            }
        }

        $session->set('panier', $panier);

        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/panier/delete/{id}', name: 'delete_panier')]    public function delete(Plat $plat, SessionInterface $session)
    {
        //On récupère l'id du produit
        $id = $plat->getId();

        //On récupère le panier existant
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
                unset($panier[$id]);
        }

        $session->set('panier', $panier);

        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }

    #[Route('/panier/empty', name: 'empty_panier')]
    public function empty(SessionInterface $session)
    {
        $session->remove('panier');

        //On redirige vers la page du panier
        return $this->redirectToRoute('panier_index');
    }
}
