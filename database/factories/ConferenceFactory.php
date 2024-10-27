<?php

namespace Database\Factories;

use App\Models\Conference;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph(5),
            'date' => $this->faker->date('Y-m-d', '2025-09-09'),
            'lecturers' => json_encode([
                [
                    'name' => $this->faker->name,
                    'position' => $this->faker->words(4, true),
                ],
                [
                    'name' => $this->faker->name,
                    'position' => $this->faker->words(4, true),
                ],

            ]),
            'programme' => json_encode([
                [
                    'time' => $this->faker->time(),
                    'event' => $this->faker->sentence()
                ],
                [
                    'time' => $this->faker->time(),
                    'event' => $this->faker->sentence()
                ],
            ]),
            'location' => $this->faker->address(),
        ];
    }
}
