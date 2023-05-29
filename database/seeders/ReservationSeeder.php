<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = Room::where('status', 'occupied')->get();
        foreach ($rooms as $room) {
            Reservation::factory()->create([
                'user_id' => rand(1,10),
                'room_id' => $room->id,
            ]);
        }
    }
}
