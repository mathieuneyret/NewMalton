<?php

namespace App\Controller\Admin;

use App\Entity\Enigme;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EnigmeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enigme::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('statement'),
            AssociationField::new('category'),
            AssociationField::new('type_enigme'),
            AssociationField::new('difficulty'),
            TextEditorField::new('indice1'),
            TextEditorField::new('indice2'),
            TextEditorField::new('indice3'),
            TextField::new('image_url'),
            TextField::new('number_picarats'),
            TextField::new('message_response_is_correct'),
            TextField::new('image_response_is_correct'),
            TextEditorField::new('message_response_is_incorrect')
        ];
    }
    
}
