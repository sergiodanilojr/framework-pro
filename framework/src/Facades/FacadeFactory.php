<?php

namespace Framework\Facades;

use Psr\Container\ContainerInterface;

class FacadeFactory {


    /**
     * @var ContainerInterface
     */
    protected static $container = null;

    /**
     * @return ContainerInterface
     */
    public static function getContainer()
    {
        return self::$container;
    }

    /**
     * @param ContainerInterface $container
     */
    public static function setContainer(ContainerInterface $container)
    {
        self::$container = $container;
    }

    /**
     * Get provided accessor from container and call method
     * @param $accessor
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function create($accessor, $name, array $arguments = [])
    {
        $container = static::getContainer();
        $object = $container->get($accessor);

        return call_user_func_array([$object, $name], $arguments);
    }

}