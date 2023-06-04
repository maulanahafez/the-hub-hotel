<?php

namespace App\Http\Controllers;

use App\Models\RoomTypeImage;
use Illuminate\Http\Request;

class RoomTypeImageController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'image'=>['required'],
        ]);
        
        $path = $request->image->store('room-type');
        
        $newImage = RoomTypeImage::create([
            'room_type_id' => $request->id,
            'path' => $path
        ]);

        return redirect()->route('room-type.show', ['roomType' => $request->slug])->with('success', 'Image has been added!');
    }
}
