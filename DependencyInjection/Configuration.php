<?php

namespace Tleroch\AdminBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tlr_admin');

        $rootNode
                ->children()
                ->scalarNode('security_seed')
                ->isRequired()
                ->end()
                ->scalarNode('customer_email')
                ->isRequired()
                ->end()
                ->scalarNode('redirect_route')
                ->isRequired()
                ->end()
                ->end()
        ;

        return $treeBuilder;
    }

}
