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
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph(5),
            'date' => $this->faker->dateTimeBetween('-1month', '+1month'),
            'lecturers' => [
                [
                    'name' => $this->faker->name,
                    'position' => $this->faker->words(4, true),
                ],
                [
                    'name' => $this->faker->name,
                    'position' => $this->faker->words(4, true),
                ],
                [
                    'name' => $this->faker->name,
                    'position' => $this->faker->words(4, true),
                ],
                [
                    'name' => $this->faker->name,
                    'position' => $this->faker->words(4, true),
                ],

            ],
            'programme' => [
                [
                    'time' => $this->faker->time('H:i', '24:00:00'),
                    'event' => $this->faker->sentence()
                ],
                [
                    'time' => $this->faker->time('H:i', '24:00:00'),
                    'event' => $this->faker->sentence()
                ],
                [
                    'time' => $this->faker->time('H:i', '24:00:00'),
                    'event' => $this->faker->sentence()
                ],
                [
                    'time' => $this->faker->time('H:i', '24:00:00'),
                    'event' => $this->faker->sentence()
                ],
            ],
            'location' => $this->faker->city(),
            'contact_person' => $this->faker->name(),
            'contact_email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
