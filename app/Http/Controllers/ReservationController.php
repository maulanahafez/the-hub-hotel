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
        // return view('dashboard.reservation.create');
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
    public function show(Reservation $reservation)
    {

        $user = $reservation->load('user');

        return view('dashboard.reservation.detail', [
            'reservation' => $reservation,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservation.show', ['reservation' => $reservation->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reservation(RoomType $roomType, User $user)
    {
        // $user = $reservation->load('user')->get();
        // $roomType = $reservation->load('roomType')->get();
        $data = [
            'roomType' => $roomType,
            // 'users' => $user
        ];
        // dd($roomType);
        return view('reservation.index', $data);
    }

    public function reservationStore(Request $request)
    {
    }
}
