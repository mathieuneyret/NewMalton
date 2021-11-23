<?php

namespace App\Controller\Admin;

use App\Entity\TypeEnigme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeEnigmeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeEnigme::class;
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
