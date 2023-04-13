<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Cryptos;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class DashboardController extends AbstractDashboardController // Définition de la classe DashboardController qui étend la classe AbstractDashboardController
{
    #[Route('/admin', name: 'admin')] // Définition de la route /admin et du nom 'admin'
    public function index(): Response // Définition de la méthode index qui retourne un objet Response
    {
        return $this->render('admin/index.html.twig'); // Renvoi de la vue Twig 'admin/index.html.twig'
    }

    public function configureDashboard(): Dashboard // Définition de la méthode configureDashboard qui retourne un objet Dashboard
    {
        return Dashboard::new() // Création d'un objet Dashboard avec le titre 'Competence 7'
            ->setTitle('Competence 7');
    }

    public function configureMenuItems(): iterable // Définition de la méthode configureMenuItems qui retourne un iterable de MenuItem
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home'); // Ajout d'un lien vers le dashboard avec une icône de maison
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class); // Ajout d'un lien vers la liste des utilisateurs avec une icône de personne
        yield MenuItem::linkToCrud('Categories', 'fas fa-file-text', Categorie::class); // Ajout d'un lien vers la liste des catégories avec une icône de texte
        yield MenuItem::linkToCrud('Produits', 'fas fa-file-text', Product::class); // Ajout d'un lien vers la liste des produits avec une icône de texte
        yield MenuItem::linkToCrud('Cryptos', 'fas fa-image', Cryptos::class); // Ajout d'un lien vers la liste des cryptos avec une icône d'image
    }
}
