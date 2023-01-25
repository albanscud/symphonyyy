<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/categories', name: 'categorie_')]
class CategoriesController extends AbstractController
{
    
    #[Route('/{slug}', name: 'list')]
    public function index(Categorie $category): Response
    {
        return $this->render('categorie/list.html.twig', compact ('category'));
    }
     
}
