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

        for($prod =1; $prod <= 6; $prod++){
            $product = new Product();{
            $product->setName('Bitcoin');
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice('23500');
            $product->setStock($faker->numberBetween(0, 10));
        };
            $product = new Product();{
            $product->setName('Ethereum');
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice('1650');
            $product->setStock($faker->numberBetween(0, 10));
        };
            $product = new Product();{
            $product->setName('Solana');
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice('2350');
            $product->setStock($faker->numberBetween(0, 10));
        };
            $product = new Product();{
            $product->setName('Dodge');
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice('9');
            $product->setStock($faker->numberBetween(0, 10));
        };
            $product = new Product();{
            $product->setName('Cardano');
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice('43');
            $product->setStock($faker->numberBetween(0, 10));
        };
            $product = new Product();{
            $product->setName('Xrp');
            $product->setDescription($faker->text());
            $product->setSlug($this->slugger->slug($product->getName())->lower());
            $product->setPrice('41');
            $product->setStock($faker->numberBetween(0, 10));
        }
            // on va chercher une reference de categories
           $category =$this->getReference('cat-'. rand(1, 6));
           $product->setCategorie($category);

           $this->setReference('prod-'.$prod, $product);
            $manager->persist($product);

        }
        $manager->flush();
    }
} 
