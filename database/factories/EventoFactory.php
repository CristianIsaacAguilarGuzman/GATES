<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Evento;

class EventoFactory extends Factory
{
    protected $model = Evento::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            // Fecha aleatoria: 50% pasado, 50% futuro
            'fecha' => $this->faker->dateTimeBetween('-10 days', '+10 days'),
        ];
    }
}