<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Disc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        include 'disrist.php';
        $artistRepo = $manager->getRepository(Artist::class);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
