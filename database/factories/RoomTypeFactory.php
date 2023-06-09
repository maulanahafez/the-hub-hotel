<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomType>
 */
class RoomTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>$this->type(),
            'slug'=>fake()->bothify('????-????'), 
            'desc'=>fake()->paragraph(rand(6,10)),
            'size'=>fake()->numberBetween(100, 300),
            'capacity'=>fake()->numberBetween(2,8),
            'bed_type'=>$this->bedType(),
            'bed_qty'=>fake()->numberBetween(1,4),
            'facility'=>$this->facility(),
            'price_per_day'=>fake()->numberBetween(100,300),
        ];
    }

    private function type(){
        $type = ['deluxe room', 'executive room', 'family room', 'penthouse suite', 'standard room', 'junior suite', 'presidential suite', 'duplex suite', 'view room', 'connecting room', 'superior room', 'bungalow'];
        return $type[rand(0,11)];
    }

    private function bedType(){
        $bedType = ['single', 'double', 'queen', 'king'];
        return $bedType[rand(0,3)];
    }

    private function facility(){
        $facility = ['Air Conditioner', 'TV','Refrigerator','Bathtub','Shower','Work Desk','Microwave','Fireplace','Kitchenette','Balcony','Living Room','Office Room','Minibar'];
        $facilities = '';
        $randomAmount = rand(1, count($facility));
        shuffle($facility);
        $facilities = implode(',', array_slice($facility, 0, $randomAmount));
        return $facilities;
    }
}
