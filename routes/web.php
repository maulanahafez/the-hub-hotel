<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authentication']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/rooms', [RoomTypeController::class, 'home'])->name('home.room-type');
Route::get('/rooms/{roomType:slug}', [RoomTypeController::class, 'details'])->name('home.room-type.details');

// Dashboard
Route::prefix('dashboard')->group(function () {

    // Room Type
    Route::prefix('/room-type')->group(function () {
        Route::get('/', [RoomTypeController::class, 'index'])->name('room-type.index');
        Route::get('/create', [RoomTypeController::class, 'create'])->name('room-type.create');
        Route::post('/store', [RoomTypeController::class, 'store'])->name('room-type.store');
        Route::get('/{roomType:slug}', [RoomTypeController::class, 'show'])->name('room-type.show');
        Route::post('/{roomType:slug}/update', [RoomTypeController::class, 'update'])->name('room-type.update');
    });
});
