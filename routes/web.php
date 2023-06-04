<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
})->name('landing-page');

// Authenticate
Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup')->middleware('guest');
    Route::post('/signup', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'authentication']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// User Profile
Route::get('/profile/{user:id}', [UserController::class, 'userProfile'])->name('home.userProfile')->middleware('auth');
Route::post('/profile/{user:id}/update', [UserController::class, 'userProfile'])->name('home.userProfile.edit')->middleware('auth');

// Reservations
Route::get('/reservation', [ReservationController::class, 'reservation'])->name('home.reservation');

// Rooms
Route::get('/rooms', [RoomTypeController::class, 'home'])->name('home.room-type');
Route::get('/rooms/{roomType:slug}', [RoomTypeController::class, 'details'])->name('home.room-type.details');

// Dashboard
Route::prefix('/dashboard')->middleware(['auth', 'admin'])->group(function () {
    // User
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user:id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/{user:id}/update', [UserController::class, 'update'])->name('user.update');
    });

    // Room Type
    Route::prefix('/room-type')->group(function () {
        Route::get('/', [RoomTypeController::class, 'index'])->name('room-type.index');
        Route::get('/create', [RoomTypeController::class, 'create'])->name('room-type.create');
        Route::post('/store', [RoomTypeController::class, 'store'])->name('room-type.store');
        Route::get('/{roomType:slug}', [RoomTypeController::class, 'show'])->name('room-type.show');
        Route::post('/{roomType:slug}/update', [RoomTypeController::class, 'update'])->name('room-type.update');
    });

    // Reservation
    Route::prefix('/reservation')->group(function () {
        Route::get('/', [ReservationController::class, 'index'])->name('reservation.index');
        Route::get('/create', [ReservationController::class, 'create'])->name('reservation.create');
        Route::post('/store', [ReservationController::class, 'store'])->name('reservation.store');
        Route::get('/{reservation:slug}', [ReservationController::class, 'show'])->name('reservation.show');
        Route::post('/{reservation:slug}/update', [ReservationController::class, 'update'])->name('reservation.update');
    });
});
