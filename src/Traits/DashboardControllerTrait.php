<?php

namespace Selene\InventoryBundle\Traits;

use Selene\InventoryBundle\Entity\Location;
use Selene\InventoryBundle\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Selene\CMSBundle\Controller\Admin\DashboardController;

trait DashboardControllerTrait
{
    public function InventoryMenuItems(): iterable
    {
        foreach (parent::configureMenuItems() as $item) {
            yield $item;
        }
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Locations', 'fas fa-list', Location::class);
    }
}
