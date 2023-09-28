<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-user', [BookingController::class, 'create_user']);
Route::post('/user-login', [BookingController::class, 'login_user']);
Route::post('/create-flight-schedule',[BookingController::class,'create_booking']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/filter-available-flight',[BookingController::class,'get_specific_booking']);
    Route::post('/make-payment',[BookingController::class,'make_payment']);
    
});

Route::fallback(function () {
    return response()->json([
        'code' => 404,
        'message' => 'Route Not Found',
    ], 404);
});