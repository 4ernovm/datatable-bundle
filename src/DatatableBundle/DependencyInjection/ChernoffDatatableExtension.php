<?php

namespace Chernoff\DatatableBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class ChernoffDatatableExtension
 * @package Chernoff\DatatableBundle\DependencyInjection
 */
class ChernoffDatatableExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $container->setParameter('chernoff_datatable', $config);
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'chernoff_datatable';
    }
}
