<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produit', name: 'product_')]
class ProductController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'categories' => $categorieRepository->findBy([], 
            ['categoryOrder' => 'asc'])
        ]);
    }
     #[Route('/{slug}', name: 'detail')]
    public function details(Product $product): Response
    {
        
        return $this->render('product/detail.html.twig', compact('product'));  
    }
}
