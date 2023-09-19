<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Computadore;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=computadores>
 */
class ComputadoresFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'identificacao_comp'=>fake()->number(),
        ];
    }
}
