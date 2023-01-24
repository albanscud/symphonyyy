<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class ProductFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        // use faker pour generer aleatoirement
        $faker = Faker\Factory::create('fr_FR');

        for($prod =1; $prod <= 10; $prod++){
            $product = new Product();
            $product->setName($faker->text(15));
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice($faker->numberBetween(900, 150000));
            $product->setStock($faker->numberBetween(0, 10));

            // on va chercher une reference de categories
           // $category =$this->getReference('cat-'. rand(1, 8));
           // $product->setCategorie($category);
           
            $manager->persist($product);

        }
        $manager->flush();
    }
} 
