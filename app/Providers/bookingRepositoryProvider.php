<?php

namespace App\Providers;

use App\repository\BookingRepository;
use Illuminate\Support\ServiceProvider;
use App\interfaces\IRepository\IBookingRepository;

class bookingRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBookingRepository::class,BookingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}