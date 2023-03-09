<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
    
    #[Route('/{slug}', name: 'list')]
    public function index(Categorie $category): Response
    {
        $products = $category->getProducts();

        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://api.coinlayer.com/live', [
            'query' => [
                'access_key' => '3ed072653ff48800fb64b03c3753dea9',
            ],
        ]);

        $data = json_decode($response->getContent(), true);
        
    $btcRate = isset($data['rates']) ? $data['rates']['BTC'] : null;
    $ethRate = isset($data['rates']) ? $data['rates']['ETH'] : null;



        return $this->render('categorie/list.html.twig', [
            'data' => [
                'btcRate' => $btcRate,
                'ethRate' => $ethRate,

                
            ],
            'category' => $category,
            'products' => $products,
        ]);
    }
     
}
