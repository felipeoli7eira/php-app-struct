<?php

declare(strict_types=1);

return [
    \App\Interfaces\UserRepositoryInterface::class => fn() => new \App\Repositories\UserRepository(),
    'key' => 'value',
];
