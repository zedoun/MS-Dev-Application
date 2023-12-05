<?php

namespace App\Service;

class Panier
{
    private $cont= [];

    public function ajouterPlat($platId)
    {
        // Ajoutez le plat au panier, 
    }

    public function retirerPlat($platId)
    {
        // Retirez le plat du panier
    }

    public function getCont()
    {
        return $this->cont;
    }

    public function getTotal()
    {
        // Calculez le montant total en fonction du cont du panier
    }
}