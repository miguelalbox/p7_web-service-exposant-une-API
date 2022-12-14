<?php

namespace ContainerXNKlmIJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LSf8DH0Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.lSf8DH0' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.lSf8DH0'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'product' => ['privates', '.errored..service_locator.lSf8DH0.App\\Entity\\Product', NULL, 'Cannot autowire service ".service_locator.lSf8DH0": it references class "App\\Entity\\Product" but no such service exists.'],
            'serializer' => ['privates', 'serializer', 'getSerializerService', true],
        ], [
            'product' => 'App\\Entity\\Product',
            'serializer' => '?',
        ]);
    }
}
