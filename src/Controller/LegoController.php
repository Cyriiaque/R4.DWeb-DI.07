<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LegoRepository;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(LegoRepository $legoRepository): Response
    {
        $lego = $legoRepository->findall();
        $tmp = "";
        foreach ($lego as $l) {
            $tmp .= $this->renderView('lego.html.twig', [
                'lego' => $l
            ]);
        }
        return new Response($tmp);
    }

    #[Route('/{collection}', name: 'filter_by_collection')]
    public function filter(string $collection, LegoRepository $legoRepository): Response
    {
        if ($collection === 'star_wars') {
            $collection = 'Star Wars';
        }
        if ($collection === 'creator_expert') {
            $collection = 'Creator Expert';
        }
        $legos = $legoRepository->findByCat($collection);
        $tmp = "";
        foreach ($legos as $lego) {
            $tmp .= $this->renderView('lego.html.twig', [
                'lego' => $lego
            ]);
        }
        return new Response($tmp);
    }
}
