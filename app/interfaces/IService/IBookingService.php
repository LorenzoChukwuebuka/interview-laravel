<?php

namespace App\interfaces\IService;

use App\DTO\LoginUserDTO;
use App\DTO\CreateUserDTO;
use Illuminate\Http\Request;
use App\DTO\CreateBookingDTO;

interface IBookingService
{
    public function create_user(CreateUserDTO $data);
    public function login_user(LoginUserDTO $data);
    public function create_flight_booking(CreateBookingDTO $data);
    public function get_all_flight_booking();
    public function get_specific_flight_booking(Request $data);
    public function pay_for_flight_booking(object $data);
}