<?php

namespace App\services;

use App\DTO\CreateBookingDTO;
use App\DTO\CreateUserDTO;
use App\DTO\LoginUserDTO;
use App\Exceptions\CustomValidationException;
use App\interfaces\IRepository\IBookingRepository;
use App\interfaces\IService\IBookingService;
use Illuminate\Http\Request;
use Validator;

class BookingService implements IBookingService
{

    public function __construct(IBookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }
    public function create_user(CreateUserDTO $data)
    {
        $validator = Validator::make((array) $data, [
            "full_name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            throw new CustomValidationException($validator);
        }

        return $this->bookingRepository->create_user($data);
    }
    public function login_user(LoginUserDTO $data)
    {
        $validator = Validator::make((array) $data, [
            "email" => "required|email|exists:users",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            throw new CustomValidationException($validator);
        }

        return $this->bookingRepository->login_user($data);
    }
    public function create_flight_booking(CreateBookingDTO $data)
    {
        $validator = Validator::make((array) $data, [
            "departure_city" => 'required',
            "destination_city" => "required",
            "date_of_departure" => "required",
        ]);

        if ($validator->fails()) {
            throw new CustomValidationException($validator);
        }

        return $this->bookingRepository->create_flight_booking($data);
    }
    public function get_all_flight_booking()
    {
        $book = $this->bookingRepository->get_all_flight_booking();

        if ($book->count() == 0) {
            throw new \Exception("No records found");
        }

        return $book;
    }
    public function get_specific_flight_booking(Request $data)
    {
        $book = $this->bookingRepository->get_specific_flight_booking($data);

        if ($book->count() == 0) {
            throw new \Exception("No records found");
        }
        return $book;
    }
     
    public function pay_for_flight_booking(Request $data)
    {
        
        $validator = Validator::make((array) $data, [
            "user_id" => "required",
            "booking_id" => "required",
            "amount" => "required"
        ]);

        if ($validator->fails()) {
            throw new CustomValidationException($validator);
        }

        return $this->bookingRepository->pay_for_flight_booking($data);

    }
}