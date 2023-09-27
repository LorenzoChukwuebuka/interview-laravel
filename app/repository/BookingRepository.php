<?php

namespace App\repository;

use App\DTO\CreateBookingDTO;
use App\DTO\CreateUserDTO;
use App\DTO\LoginUserDTO;
use App\interfaces\IRepository\IBookingRepository;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookingRepository implements IBookingRepository
{
    public function __construct(User $userModel, Booking $bookingModel)
    {
        $this->userModel = $userModel;
        $this->bookingModel = $bookingModel;
    }
    public function create_user(CreateUserDTO $data)
    {
        $user = $this->userModel::create([
            "full_name" => $data->full_name,
            "email" => $data->email,
            "password" => Hash::make($data->password),
        ]);

        return $user;
    }
    public function login_user(LoginUserDTO $data)
    {
        $user = $this->userModel::where('email', $data->email)->first();

        if (!$user) {
            throw new \Exception("User not found", 1);
        }

        $comparePasswords = \password_verify($data->password, $user->password);

        if (!$comparePasswords) {
            throw new \Exception("Password does not match", 1);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        return [
            'type' => 'user',
            'token' => $token,
            'data' => $user,
        ];
    }
    public function create_flight_booking(CreateBookingDTO $data)
    {
        return $this->bookingModel::create([
            "departure_city" => $data->departure_city,
            "destination_city" => $data->destination_city,
            "date_of_departure" => $data->date_of_departure,
        ]);
    }
    public function get_all_flight_booking()
    {
        return $this->bookingModel::latest()->get();
    }
    public function get_specific_flight_booking(Request $data)
    {
        $booking = $this->bookingModel::when($data->destination_city, function ($query) use ($data) {
            $query->where('destination_city', $data->destination_city);
        })
            ->when($data->date_of_departure, function ($query) use ($data) {
                $query->where('date_of_departure', $data->date_of_departure);
            })
            ->when($data->departure_city, function ($query) use ($data) {
                $query->where('departure_city', $data->departure_city);
            })
            ->latest()->get();

        return $booking;
    }
   
    public function pay_for_flight_booking(PaymentDTO $data)
    {
        
    }
}