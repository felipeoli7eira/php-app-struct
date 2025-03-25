<?php

declare(strict_types=1);

namespace App\Library;

class Auth
{
    public function __construct(
        private readonly NewsLetter $newsLetter,
    ) {}

    public function auth()
    {
        return $this->newsLetter->subscribe();
    }
}
