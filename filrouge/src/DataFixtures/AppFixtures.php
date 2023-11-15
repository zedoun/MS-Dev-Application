<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        include 'the_disrist.php';
        // $product = new Product();
        // $manager->persist($product);
        $categorieRepo = $manager->getRepository(Categorie::class);

        foreach ($categorie as $categorie){
            $categorieDB = new Categorie();
            $categorieDB
            ->setId($categorie['id'])
            ->setLibelle($categorie['libelle'])
            ->setImage($categorie['image'])
            ->setActive($categorie['active']);

            $manager->persist($categorieDB);

             // empêcher l'auto incrément
            $metadata = $manager->getClassMetaData(Categorie::class);
            $metadata->setIdGeneratorType(\Doctrine\ORM\Mapping\ClassMetadata::GENERATOR_TYPE_NONE);
        }
        $manager->flush();

        foreach ($plat as $p) {
            $platDB = new Plat();
            $platDB
            ->setId($p['id'])
            ->setLibelle($p['libelle'])
            ->setDescription($p['description'])
            ->setPrix($p['prix'])
            ->setImage($p['image'])
            ->setActive($p['active']);


            
            $categorie = $categorieRepo->find($p['id_categorie']);
            $platDB->setCategorie($categorie);
            $manager->persist($platDB);
        }


        $manager->flush();
    }
}
