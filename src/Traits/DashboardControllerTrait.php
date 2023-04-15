<?php

namespace Selene\InventoryBundle\Traits;

use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Selene\InventoryBundle\Entity\Location;
use Selene\InventoryBundle\Entity\Product;
use Selene\InventoryBundle\Entity\Vendor;

trait DashboardControllerTrait
{
    public function InventoryMenuItems(): iterable
    {
        foreach (parent::configureMenuItems() as $item) {
            yield $item;
        }
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Locations', 'fas fa-list', Location::class);
        yield MenuItem::linkToCrud('Vendors', 'fas fa-list', Vendor::class);
    }
}
