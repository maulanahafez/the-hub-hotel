<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index(){
        $data = [
            'roomTypes'=>RoomType::latest()->get(),
        ];

        return view('dashboard.roomtype.index', $data);
    }

    public function home(){
        $data = [
            'roomTypes'=>RoomType::latest()->get(),
        ];

        // dd($data['roomTypes']);

        return view('roomtype.index', $data);
    }

    public function details(RoomType $roomType){
        $data = [
            'roomType'=>$roomType,
        ];

        return view('roomtype.details', $data);
    }

    public function show(RoomType $roomType){
        $data = [
            'roomType'=>$roomType,
        ];

        return view('dashboard.roomtype.detail', $data);
    }

    public function create(){
        return view('dashboard.roomtype.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'type' => ['required', 'unique:room_types,type'],
            'desc' => ['required'],
            'size' => ['required'],
            'capacity' => ['required'],
            'bed_type' => ['required'],
            'bed_qty' => ['required'],
            'facility' => ['required'],
            'price_per_day' => ['required'],
        ]);

        $slug = str_replace(' ', '-', strtolower($request->type));
        // dd($slug);

        $newRoomType = RoomType::create([
            'type' => $request->type,
            'slug' => $slug,
            'desc' => $request->desc,
            'size' => $request->size,
            'capacity' => $request->capacity,
            'bed_type' => $request->bed_type,
            'bed_qty' => $request->bed_qty,
            'facility' => $request->facility,
            'price_per_day' => $request->price_per_day,
        ]);

        return redirect()->route('room-type.index');
    }

    public function update(Request $request, RoomType $roomType){
        $validated = $request->validate([
            'desc' => ['required'],
            'size' => ['required'],
            'capacity' => ['required'],
            'bed_type' => ['required'],
            'bed_qty' => ['required'],
            'facility' => ['required'],
            'price_per_day' => ['required'],
        ]);
        $newRoomType = $roomType->update($request->all());

        return redirect()->route('room-type.show', ['roomType' => $roomType->slug]);
    }
}
