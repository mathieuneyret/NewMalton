<?php

namespace App\Controller\Admin;

use App\Entity\SolutionAChoix;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class SolutionAChoixCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SolutionAChoix::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('enigme'),
            TextField::new('value'),
            TextField::new('position'),
            BooleanField::new('is_valid'),
            TextField::new('image')
        ];
    }
    
}
