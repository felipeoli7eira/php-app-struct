<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function findById(int $id);
}
