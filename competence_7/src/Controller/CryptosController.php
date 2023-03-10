<?php

namespace App\Controller;

use App\Entity\Cryptos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CryptosController extends AbstractController
{
    #[Route('/cryptos', name: 'app_cryptos')]
    public function index(): Response
    {
       
        return $this->render('cryptos/index.html.twig');
    }
}
