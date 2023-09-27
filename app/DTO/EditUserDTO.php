<?php

namespace App\DTO;

class EditUserDTO
{
    public function __construct(public readonly int $id,public readonly string $full_name, public readonly string $email, public readonly string $password)
    {

    }
}