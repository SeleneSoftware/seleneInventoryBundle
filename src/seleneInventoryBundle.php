<?php

namespace Selene\InventoryBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class seleneInventoryBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void
    {
        // load an XML, PHP or Yaml file
        $containerConfigurator->import('../config/services.yml');
        $containerConfigurator->import('../config/routing.yml');

        // you can also add or replace parameters and services
        // $containerConfigurator->parameters()
        //     ->set('acme_hello.phrase', $config['phrase'])
        // ;

        // if ($config['scream']) {
        //     $containerConfigurator->services()
        //         ->get('acme_hello.printer')
        //         ->class(ScreamingPrinter::class)
        //     ;
        // }
    }
}
