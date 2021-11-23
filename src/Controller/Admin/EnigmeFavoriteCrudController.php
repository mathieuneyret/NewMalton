<?php

namespace App\Controller\Admin;

use App\Entity\EnigmeFavorite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class EnigmeFavoriteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EnigmeFavorite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('enigme'),
            AssociationField::new('user')
        ];
    }
}
