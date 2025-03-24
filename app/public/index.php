<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\Home;
use App\Interfaces\UserRepositoryInterface;
use App\Library\Auth;
use Core\Application\Application;
use Core\Container\Container;
use Core\Router\Router;

$routes = require __DIR__ . '/../src/routes/web.php';

$container = new Container();
Application::installContainer($container);

$container->bind(UserRepositoryInterface::class, fn() => new App\Repositories\UserRepository());

$container->get(Home::class);

$router = new Router($container);
$router->run($routes);
