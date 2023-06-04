<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = [
        //     'number' => 1,
        //     'reservations' => Reservation::with('reservation:name', 'room.roomType:type')->latest()->get(),
        // ];
        $number = 1;
        $reservations = Reservation::all();

        foreach ($reservations as $reservation) {
            $user = User::find($reservation->user_id);
            $reservation->user_name = $user->name;
            $room = Room::find($reservation->room_id);
            $reservation->room = $room->room_type_id;
            $roomType = RoomType::find($reservation->room);
            $reservation->room_name = $roomType->type;
        }

        return view('dashboard.reservation.index', compact('reservations', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reservation()
    {
        return view('reservation.index');
    }
}
