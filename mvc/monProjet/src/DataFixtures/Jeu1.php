<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Disc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        
        // $artist1 = new Artist();

        // $artist1->setTitle("Queens Of The Stone Age");
        // $artist1->setUrl("https://qotsa.com/");
        
        // $manager->persist($artist1);

        // $artist2 = new Artist();

        // $artist2->setTitle("jack de back");
        // $artist2->setUrl("https://qotsa.com/");
        
        // $manager->persist($artist2);

        // $artist3 = new Artist();

        // $artist3->setTitle("le roi");
        // $artist3->setUrl("https://qotsa.com/");
        
        // $manager->persist($artist3);

        // $artist4 = new Artist();

        // $artist4->setTitle("la paix");
        // $artist4->setUrl("https://qotsa.com/");
        
        // $manager->persist($artist4);

        // $artist5 = new Artist();

        // $artist5->setTitle("john la bonne");
        // $artist5->setUrl("https://qotsa.com/");
        
        // $manager->persist($artist5);

        // $disc1 = new Disc();
        // $disc1->setTitle("Songs for the Deaf");
        // $disc1->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
        // $disc1->setLabel("Interscope Records");

        // $manager->persist($disc1);

        // $disc3 = new Disc();
        // $disc3->setTitle(" for the Deaf");
        // $disc3->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
        // $disc3->setLabel("Interscope Records");

        // $manager->persist($disc3);


        // $disc5 = new Disc();
        // $disc5->setTitle("sick the Deaf");
        // $disc5->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
        // $disc5->setLabel("Interscope Records");

        // $manager->persist($disc5);


        // // Pour associer vos entités
        // $disc1->setArtist($artist1);
        // // ou 
        // $artist1->addDisc($disc1);
        // $artist3->addDisc($disc3);
        // $artist5->addDisc($disc5);
        $manager->flush();
    
    }
}
