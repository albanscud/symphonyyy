<?php

namespace App\Controller\Admin;

use App\Entity\Cryptos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CryptosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cryptos::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('imageName'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('file')->setBasePath('/uploads/cryptos/')->onlyOnIndex(),
        ];
    }
    
}
