<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement(['$100.000 USD', '$120.000 USD', '$150.000 USD', '$900.000 USD']),
            'location' => fake()->city(),
            'schedule' => fake()->randomElement(['Full Time', 'Part Time', 'Internship', 'Freelance']),
            'url' => fake()->url(),
            'featured' => false
        ];
    }
}
