<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

 

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        
        $email = (new Email())
     
     // vous pouvez, si vous le souhaitez, demander aux clients mail d'afficher un certain nom pour le fichier 
     
     
 ;
        $email = (new TemplatedEmail())
            ->from('hello@example.com')
            ->to(new Address('ryan@example.com'))
            ->subject('Time for Symfony Mailer!')
            ->addPart(new DataPart(new File('img/fichier.pdf')))
            ->addPart((new DataPart(fopen('img/logo.png', 'r'), 'logo', 'image/png'))->asInline())

            // le chemin de la vue Twig à utiliser dans le mail
        ->htmlTemplate('emails/signup.html.twig')

            // un tableau de variable à passer à la vue; 
           //  on choisit le nom d'une variable pour la vue et on lui attribue une valeur (comme dans la fonction `render`) :
            ->context([
                    'expiration_date' => new \DateTime('+7 days'),
                    'username' => 'foo',
                ]);
               
        $mailer->send($email);

        return $this->redirectToRoute('app_contact');
        
         
        //return new Response('Email bien reçus !');

        // ...

        
    }
    
}

