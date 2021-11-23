<?php

namespace App\Controller\Admin;

use App\Entity\EnigmeResolue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class EnigmeResolueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EnigmeResolue::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('enigme'),
            AssociationField::new('user')
        ];
    }
    
}
