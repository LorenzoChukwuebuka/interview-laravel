<?php

namespace App\DTO;

class CreateBookingDTO
{
    public function __construct(public string $departure_city, public string $destination_city, public string $date_of_departure)
    {}
}