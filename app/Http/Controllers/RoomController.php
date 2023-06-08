<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $data=[
            'rooms'=> Room::latest()->get(),

        ];
        return view('dashboard.room.index',$data);
    }

    public function create(){
        $data=[
            'roomTypes'=> RoomType::all(),
        ];
        
        return view('dashboard.room.create', $data);
        // return redirect()->route('dashboard.room.create',$data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'type' => ['required'],
            'room_code' => ['required']
        ]);
        $roomType=RoomType::where('type', $request->type)->first();
        // dd($roomType->id);
        $room=Room::create([
            'room_type_id' => $roomType->id,
            'room_code' => $request->room_code,
        ]);
        dd($room);
        // dd($roomType);

    }

    public function edit(Room $room){
        $data=[
            'room'=>$room,
            'roomTypes'=> RoomType::all(),
        ];
        return view('dashboard.room.detail',$data);
    }

    public function update(Request $request, Room $room){
        $validated = $request->validate([
            'room_type' => ['required'],
            'room_code' => ['required']
        ]);
        $roomType=RoomType::where('type', $request->room_type)->first();
        $room->update([
            'room_type_id' => $roomType->id,
            'room_code' => $request->room_code, 
        ]);
        return redirect()->route('room.edit', ['room' => $room->id])->with('successUpdate', 'Room has been updated successfully!');
        dd($request->all(), $room, $roomType);
    }

    public function destroy(Room $room){
        $room->delete();
        return redirect()->route('room.index')->with('successDelete', 'Room has been deleted successfully');
        dd($room);
    }
        
}
