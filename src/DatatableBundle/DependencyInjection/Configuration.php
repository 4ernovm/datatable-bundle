<?php

namespace Chernoff\DatatableBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Chernoff\DatatableBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('chernoff_datatables');

        $rootNode
            ->children()
                ->arrayNode('templates')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('html')
                            ->defaultValue('ChernoffDatatablesBundle:Datatable:html.html.twig')
                        ->end()
                        ->scalarNode('js')
                            ->defaultValue('ChernoffDatatablesBundle:Datatable:js.html.twig')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
