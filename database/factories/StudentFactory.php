<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'lastname' => fake()->lastname,
            'student_id' => fake()->randomNumber,
            'personal_id' => fake()->randomNumber,
            'date_of_birth' => fake()->date,
            'gender' => fake()->randomLetter(['F', 'M']),
            'country' => fake()->country,
            'parent_phone_number' => fake()->randomNumber,
            'school' => fake()->text,
            'main_teacher' => fake()->text,
            'study_year' => fake()->randomNumber,
            'class_identifier' => fake()->randomNumber,
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'photo' => fake()->imageUrl('60','60'),
            'status' => fake()->randomElement(['active','inactive']),
            'remember_token' => Str::random(10),
        ];
    }
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
