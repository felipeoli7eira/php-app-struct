<?php

namespace Core\Application;

use Core\Container\Container;

class Application
{
    private static Container $container;

    public static function installContainer(Container $container): void
    {
        self::$container = $container;
    }

    public static function getDependency(string $key)
    {
        return self::$container->get($key);
    }
}
