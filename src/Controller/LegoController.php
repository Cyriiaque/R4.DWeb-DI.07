<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\LegoService;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(LegoService $legoService): Response
    {
        $legos = $legoService->getLegos();
        $tmp = "";
        foreach ($legos as $lego) {
            $tmp .= $this->renderView('lego.html.twig', [
                'lego' => $lego
            ]);
        }
        return new Response($tmp);
    }

    #[Route('/creator', name: 'creator')]
    public function creator(LegoService $legoService): Response
    {
        $legos = $legoService->getLegosByCollection('Creator');
        $tmp = "";
        foreach ($legos as $lego) {
            $tmp .= $this->renderView('lego.html.twig', [
                'lego' => $lego
            ]);
        }
        return new Response($tmp);
    }

    #[Route('/star_wars', name: 'star_wars')]
    public function starWars(LegoService $legoService): Response
    {
        $legos = $legoService->getLegosByCollection('Star Wars');
        $tmp = "";
        foreach ($legos as $lego) {
            $tmp .= $this->renderView('lego.html.twig', [
                'lego' => $lego
            ]);
        }
        return new Response($tmp);
    }

    #[Route('/creator_expert', name: 'creator_expert')]
    public function creatorExpert(LegoService $legoService): Response
    {
        $legos = $legoService->getLegosByCollection('Creator Expert');
        $tmp = "";
        foreach ($legos as $lego) {
            $tmp .= $this->renderView('lego.html.twig', [
                'lego' => $lego
            ]);
        }
        return new Response($tmp);
    }
}
