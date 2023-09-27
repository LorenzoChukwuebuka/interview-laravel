<?php

namespace App\DTO;

class CreateUserDTO
{
    public function __construct(public readonly string $full_name, public readonly string $email, public readonly string $password)
    {

    }
}