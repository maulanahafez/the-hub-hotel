<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function home(){
        if(Auth::user()->role == 'receptionist' || Auth::user()->role == 'admin'){
            $data = [
                'reservations' => Reservation::latest()->get(),
            ];
        }else{
            $data = [
                'reservations' => Reservation::where('user_id', Auth::user()->id)->latest()->get(),
            ];
        }

        return view('reservation.history-reservation', $data);
    }

    public function reservation(RoomType $roomType){
        $data = [
            'roomType' => $roomType,
            'room' => Room::where('room_type_id', $roomType->id)->where('status', 'available')->first(),
        ];

        return view('reservation.make-reservation', $data);
        // dd($roomType->roomTypeImages[0]);
        // dd($roomType);
    }

    public function store(Request $request, RoomType $roomType){
        $room = Room::where('room_code', $request->room_code)->first();

        $newReservation = Reservation::create([
            'room_id' => $room->id,
            'user_id' => Auth::user()->id,
            'date_in' => $request->date_in,
            'date_out' => $request->date_out,
            'range' => $request->range,
            'total_price' => $request->total_price,
            'payment_mtd' => $request->payment_mtd,
        ]);

        return redirect()->route('home.my-reservation');
    }

    public function checkIn(Request $request, Reservation $reservation){
        $reservation->update([
            'status' => 'Checked In'
        ]);

        return redirect()->route('home.my-reservation')->with('checkedIn', 'Reservation status changed to Checked In successfully');
    }

    public function checkout(Request $request, Reservation $reservation){
        $reservation->update([
            'status' => 'Checked Out'
        ]);

        return redirect()->route('home.my-reservation')->with('checkedOut', 'Reservation status changed to Checked Out successfully');
    }
}
