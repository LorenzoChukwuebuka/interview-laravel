<?php

namespace App\interfaces\IRepository;

use App\DTO\CreateBookingDTO;
use App\DTO\CreateUserDTO;
use App\DTO\LoginUserDTO;
use Illuminate\Http\Request;

interface IBookingRepository
{
    public function create_user(CreateUserDTO $data);
    public function login_user(LoginUserDTO $data);
    public function create_flight_booking(CreateBookingDTO $data);
    public function get_all_flight_booking();
    public function get_specific_flight_booking(Request $data);
    public function pay_for_flight_booking(object $data);
}