<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/bootstrap.php';

use Core\Router\Router;

$router = new Router($container);
$router->run(require __DIR__ . '/../src/routes/web.php');
