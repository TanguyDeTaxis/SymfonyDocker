<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BitcoinController extends AbstractController
{
    #[Route('/bitcoin', name: 'app_bitcoin')]
    public function index(): Response
    {
        return $this->render('bitcoin/index.html.twig', [
            'controller_name' => 'BitcoinController',
        ]);
    }

    #[Route('/bitcoin-a', name: 'app_bitcoin_a')]
    public function indexA(): Response
    {
        return $this->render('bitcoin/index.html.twig', [
            'controller_name' => 'bite',
        ]);
    }
}
