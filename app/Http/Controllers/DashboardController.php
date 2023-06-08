<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $thisMonth = Carbon::now()->month;
        $rating = Review::pluck('rating')->average();

        $data = [
            // Total Earning
            'totalEarnings' => Reservation::pluck('total_price')->sum(),
    
            // Total Transaction
            'totalTransactions' => Reservation::whereMonth('created_at', $thisMonth)->get()->count(),
            
            // User Registered
            'userRegistered' => User::all()->count(),
    
            // Room Available
            'roomsAvailable' => Room::where('status', 'Available')->get()->count(),
    
            // Rating 
            'rating' => round($rating, 2),
    
            // Newest Transactions
            'reservations' => Reservation::latest()->take(5)->get(),
    
            // New User
            'users' => User::latest()->where('role', 'user')->take(5)->get(),
        ];
        
        return view('dashboard.index', $data);
        // dd($data);
    }
}
