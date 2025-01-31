<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lego;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        // Create a new Lego object
        $lego = new Lego(10252, "La coccinelle Volkwagen", "Creator Expert");
        $lego->setPieces("1167");
        $lego->setPrice("94.99");
        $lego->setDescription("Construis une réplique LEGO® Creator Expert de l'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes");
        $lego->setBoxImage("LEGO_10252_Box.png");
        $lego->setLegoImage("LEGO_10252_Main.jpg");

        // the template path is the relative file path from `templates/`
        return $this->render('lego.html.twig', [
            'lego' => $lego,
        ]);
    }
}
