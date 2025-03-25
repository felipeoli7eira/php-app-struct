<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Interfaces\UserRepositoryInterface;

class Home
{
    public function __construct() {}

    public function index(UserRepositoryInterface $userRepository): void
    {

        var_dump($userRepository->findById(1));
    }
}
