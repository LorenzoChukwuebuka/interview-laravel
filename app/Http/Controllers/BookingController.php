<?php

namespace App\Http\Controllers;

use App\DTO\CreateBookingDTO;
use App\DTO\CreateUserDTO;
use App\DTO\LoginUserDTO;
use App\Http\Controllers\Controller;
use App\interfaces\IService\IBookingService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(IBookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    use ApiResponse;
    public function create_user(Request $request)
    {
        try {
            $data = new CreateUserDTO(...$request->all());
            $result = $this->bookingService->create_user($data);
            return $this->success('user created successfully', $result);

        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function login_user(Request $request)
    {
        try {
            $data = new LoginUserDTO(...$request->all());
            $result = $this->bookingService->login_user($data);
            return $this->success('user logged in successfully', $result);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function create_booking(Request $request)
    {
        try {
            $data = new CreateBookingDTO(...$request->all());
            $result = $this->bookingService->create_flight_booking($data);
            return $this->success('booking Created successfully', $result);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function get_specific_booking(Request $request)
    {
        try {
            $result = $this->bookingService->get_specific_flight_booking($request);
            return $this->success('listed successfully', $result);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function make_payment(Request $request)
    {
        try {
            $result = $this->bookingService->pay_for_flight_booking($request);
            return $this->success('payment made successfully', $result);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }

}