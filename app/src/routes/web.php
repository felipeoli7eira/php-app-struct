<?php

use App\Controllers\Home;
use App\Controllers\User;

return [
    '/'      => [Home::class, 'index'],
    '/users' => [User::class, 'index'],
];
