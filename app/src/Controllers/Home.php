<?php

namespace App\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\Library\Auth;

class Home
{
    public function __construct(private readonly Auth $auth) {}

    public function index(UserRepositoryInterface $userRepository): void
    {
        dd($userRepository->findById(1), $this->auth->auth());
    }
}
