<?php

declare(strict_types=1);

use App\Controllers\Home;
use App\Controllers\User;

return [
    '/'      => [Home::class, 'index'],
    '/users' => [User::class, 'index'],
];
