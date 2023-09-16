<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Livro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'autor'=> fake()->name(),
            'publicacao'=>fake()->name(),
            'nome'=>fake()->name(),
            'genero'=>fake()->name(),
            'categoria'=>fake()->name()
        ];
    }
}
