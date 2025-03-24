<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findById(int $id): int
    {
        return $id;
    }
}
