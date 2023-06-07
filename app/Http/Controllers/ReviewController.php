<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function home(){
        $data=[
            'reviews'=>Review::latest()->get(),
        ];
        return view('review.index', $data);
    }
    
    public function store(Request $request){
        // dd($request->all());

        $review=Review::create([
            'user_id'=>Auth::user()->id,
            'rating'=>$request->rating,
            'review'=>$request->review,
        ]);
        // dd($review);
        return redirect()->route('home.review');
        
    }
}


