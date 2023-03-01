<?php

namespace Database\Factories;

use App\Models\MotorBike;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MotorBikeFactory extends Factory
{
    protected $model=MotorBike::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => fake()->name(),
            'color' => fake()->name(),
           'price'=>5436,
           'weight'=>867,
           "image"=>fake()->image()
            
        ];
    }
}
