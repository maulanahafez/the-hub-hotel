<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'roomTypes' => RoomType::latest()->orderByDesc('price_per_day')->take(3)->get(),
            'reviews' => Review::latest()->where('visibility', 'Show')->take(5)->get(),
        ];

        return view('landing-page', $data);
    }
}
