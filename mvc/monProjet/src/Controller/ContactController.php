<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\DemoFormType;
use App\Form\ContactFromType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    
    {
        $form = $this->createForm(ContactFromType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //on crée une instance de Contact
            $message = new Contact();
            // Traitement des données du formulaire
            $data = $form->getData();
            //on stocke les données récupérées dans la variable $message
            $message = $data;

            $entityManager->persist($message);
            $entityManager->flush();


            // Redirection vers accueil
            return $this->redirectToRoute('app_accueil');
        }

        // ...
        // A partir de la version 6.2 de Symfony, on n'est plus obligé d'écrire 
        // $form->createView(), il suffit de passer l'instance de FormInterface 
        // à la méthode render

        return $this->render('contact/index.html.twig', [
                // 'form' => $form->createView(),
                'form' => $form
        ]);
    }
}