<?php

namespace App\Controller\Admin;

use App\Entity\SolutionUnique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SolutionUniqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SolutionUnique::class;
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
