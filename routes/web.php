<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::redirect('/', '/login');

Route::get('/welcome/{name}', [BookingController::class, 'welcome'])
    ->name('welcome');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Booking (User)
    |--------------------------------------------------------------------------
    */

    Route::get('/booking', [BookingController::class, 'create'])
        ->name('booking.create');

    Route::post('/booking', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/my-bookings', [BookingController::class, 'myBookings'])
        ->name('my.bookings');

    /*
    |--------------------------------------------------------------------------
    | Booking (Admin)
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/bookings', [BookingController::class, 'index'])
        ->name('admin.bookings');

    Route::patch('/admin/bookings/{booking}/approve', [BookingController::class, 'approve'])
        ->name('admin.bookings.approve');

    Route::patch('/admin/bookings/{booking}/cancel', [BookingController::class, 'cancel'])
        ->name('admin.bookings.cancel');

    Route::delete('/admin/bookings/{booking}', [BookingController::class, 'destroy'])
        ->name('admin.bookings.destroy');

    /*
    |--------------------------------------------------------------------------
    | Room Types
    |--------------------------------------------------------------------------
    */

    Route::resource('room-types', RoomTypeController::class)
        ->parameters(['room-types' => 'roomType'])
        ->names('room_types');

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/users', [UserController::class, 'index'])
        ->name('admin.users');

    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
        ->name('admin.users.destroy');

    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/reports', [ReportController::class, 'index'])
        ->name('admin.reports');


    Route::get('/calendar/events', [BookingController::class, 'calendarEvents'])
        ->name('calendar.events');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';