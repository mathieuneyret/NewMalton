<?php

namespace App\Controller\Admin;

use App\Entity\SolutionMultiple;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SolutionMultipleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SolutionMultiple::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('enigme'),
            TextField::new('value'),
            TextField::new('position'),
            TextField::new('image')
        ];
    }
    
}
