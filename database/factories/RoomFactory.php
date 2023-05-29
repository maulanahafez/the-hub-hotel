<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_code' => fake()->bothify("?###"),
            'status' => $this->status(),
        ];
    }

    private function status(){
        $status = ['Available', 'Occupied'];
        return $status[rand(0,1)];
    }
}
