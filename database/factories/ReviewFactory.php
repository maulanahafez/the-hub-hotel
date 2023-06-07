<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(1,5),
            'review' => fake()->paragraph(),
            'visibility' => $this->visibility(),
        ];
    }

    public function visibility(){
        $visibility = ['Hidden', 'Show'];
        return $visibility[rand(0,1)];
    }
}
