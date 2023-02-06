<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategorieFixtures extends Fixture 
{
    private $counter = 1;

    public function __construct(private SluggerInterface $slugger){}
    
    public function load(ObjectManager $manager): void
    {
        $parent = $this->createCategory('Cryptomonnaies', null, $manager);
        

        $this-> createCategory('Bitcoin', $parent, $manager);
        $this-> createCategory('Ethereum', $parent, $manager);
        $this-> createCategory('Solana', $parent, $manager);

       // $parent = $this->createCategory('Mode', null, $manager);

        $this-> createCategory('Cardano', $parent, $manager);
        $this-> createCategory('Xrp', $parent, $manager);
        $this-> createCategory('Dodge', $parent, $manager);


        $manager->flush();
    }

    public function createCategory(string $name, Categorie $parent = null, ObjectManager $manager)
    {
        $category = new Categorie();
        $category->setName($name);
        $category->setSlug($this->slugger->slug($category->getName())->lower());
        $category->setParent($parent);
        $manager->persist($category);

        $this->addReference('cat-'.$this->counter, $category);
        $this->counter++;
        return $category;
    }
}
