<?php

declare(strict_types=1);

use App\Interfaces\UserRepositoryInterface;
use Core\Application\Application;
use Core\Container\Container;

session_start();

$container = new Container();
Application::installContainer($container);

define('ROOT_PATH', dirname(__FILE__, 2));
define('APP_PATH', ROOT_PATH . '/src');

$container->mapDependenciesFrom('mapDependency/map.php');
// $container->mapDependenciesFrom([
//     UserRepositoryInterface::class => fn() => new \App\Repositories\UserRepository(),
// ]);
// $container->bind(UserRepositoryInterface::class, fn() => new \App\Repositories\UserRepository());
