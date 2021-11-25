<?php

namespace App\Controller\Admin;

use App\Entity\SolutionUnique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SolutionUniqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SolutionUnique::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('enigme'),
            TextField::new('value')
        ];
    }
    
}
