<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_in' => fake()->date(),
            'date_out' => fake()->date(),
            'status' => $this->status(),
            'range' => fake()->numberBetween(1,7),
            'total_price' => fake()->numberBetween(300, 1000),
            'payment_mtd' => $this->paymentMtd(),
        ];
    }

    private function status(){
        $status = ['Checked In', 'Checked Out', 'Pending'];
        return $status[rand(0,2)];
    }

    private function paymentMtd(){
        $paymentMtd = ['Bank Transfer', 'e-Wallet'];
        return $paymentMtd[rand(0,1)];
    }
}
