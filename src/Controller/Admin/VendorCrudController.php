<?php

namespace Selene\InventoryBundle\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field;
use Selene\InventoryBundle\Entity\Vendor;

class VendorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vendor::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field\TextField::new('name');
        yield Field\TextEditorField::new('Address');
        yield Field\TextField::new('url');
        yield Field\TextField::new('phone');
    }
}
