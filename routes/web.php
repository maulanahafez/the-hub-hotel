<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomTypeImageController;

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
Route::post('/profile/{user:id}/update', [UserController::class, 'updateUserProfile'])->name('home.userProfile.edit')->middleware('auth');

// Rooms
Route::get('/rooms', [RoomTypeController::class, 'home'])->name('home.room-type');
Route::get('/rooms/{roomType:slug}', [RoomTypeController::class, 'details'])->name('home.room-type.details');

// Reviews
Route::get('/reviews', [ReviewController::class, 'home'])->name('home.review');
Route::post('/reviews/store',[ReviewController::class, 'store'])->name('home.review.store');

// Dashboard
Route::prefix('/dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');

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
        Route::post('/store-image', [RoomTypeImageController::class, 'store'])->name('room-type.store-image');
        Route::get('/{roomType:slug}', [RoomTypeController::class, 'show'])->name('room-type.show');
        Route::post('/{roomType:slug}/update', [RoomTypeController::class, 'update'])->name('room-type.update');
    });

    // Review
    Route::prefix('/review')->group(function(){
        Route::get('/',[ReviewController::class,'index'])->name('review.index');
        
    });

    // Room
    Route::prefix('/room')->group(function(){
        Route::get('/',[RoomController::class,'index'])->name('room.index');
        Route::get('/create', [RoomController::class,'create'])->name('room.create');
        Route::post('/store', [RoomController::class,'store'])->name('room.store');
        Route::get('/{room:id}', [RoomController::class, 'edit'])->name('room.edit');
        Route::post('/{room:id}/update',[RoomController::class, 'update'])->name('room.update');
    });
    
});
