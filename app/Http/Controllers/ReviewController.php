<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function home(){
        $data=[
            'reviews'=>Review::where('visibility', 'Show')->latest()->get(),
        ];
        return view('review.index', $data);
    }
    
    public function store(Request $request){
        $request->validate([
            'rating' => ['required'],
            'rating' => ['required'],
        ]);

        $review=Review::create([
            'user_id'=>Auth::user()->id,
            'rating'=>$request->rating,
            'review'=>$request->review,
        ]);
        // dd($review);
        return redirect()->route('home.review');
        
    }

    // dashboard
    public function index(){
        $data=[
            'reviews'=>Review::latest()->get(),
        ];
        // dd($data['reviews']);
        return view('dashboard.review.index', $data);
    }

    public function show(Review $review){
        $review->update([
            'visibility' => 'Show'
        ]);
        return redirect()->route('review.index')->with('showSuccess', 'Show Successfully');
        dd($review);
    }

    public function hide(Review $review){
        $review->update([
            'visibility' => 'Hidden'
        ]);
        return redirect()->route('review.index')->with('hideSuccess', 'Hidden Successfully');
        dd($review);
    }
}


