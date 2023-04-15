<?php

namespace Selene\InventoryBundle\Controller\Admin;

use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field;
use Selene\InventoryBundle\Entity\Location;
use Selene\InventoryBundle\Entity\Product;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield Field\TextField::new('name');
        yield Field\TextField::new('sku');
        yield Field\TextEditorField::new('description');
        yield Field\AssociationField::new('location'); // ->setQueryBuilder(
        //         fn (QueryBuilder $queryBuilder) => $queryBuilder->getEntityManager()->getRepository(Location::class)->findBySomeCriteria();
        // );
        yield Field\AssociationField::new('vendor');
        yield Field\IntegerField::new('qty');
        yield Field\MoneyField::new('cost')->setNumDecimals(0)->setCurrency('USD');
        yield Field\BooleanField::new('public');
    }
}
