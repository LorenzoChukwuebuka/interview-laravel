<?php

namespace App\Providers;

use App\services\BookingService;
use Illuminate\Support\ServiceProvider;
use App\interfaces\IService\IBookingService;

class bookingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBookingService::class,BookingService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}