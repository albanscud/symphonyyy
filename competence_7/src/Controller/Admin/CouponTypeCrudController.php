<?php

namespace App\Controller\Admin;

use App\Entity\CouponType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CouponTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CouponType::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
