<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Logging>
 */
class LoggingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unit_price = fake()->randomElement([10, 20, 25, 15]);
        $total_weight = fake()->randomElement([2, 3, 5, 7, 11, 13, 17, 23]);
        
        return [
            'user_id' => User::factory(),
            'category' => fake()->randomElement(['brown', 'white', 'plastic', 'quencher']),
            'unit_price' => $unit_price,
            'total_weight' => $total_weight,
            'total_price' => $unit_price * $total_weight
        ];
    }
}
