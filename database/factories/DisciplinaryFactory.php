<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disciplinary>
 */
class DisciplinaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'verbal_warning_description' => $this->faker->sentence,
            'verbal_warning_date' => $this->faker->dateTimeThisYear(),
            'written_warning_description' => $this->faker->sentence,
            'written_warning_date' => $this->faker->dateTimeThisYear(),
            'provisionary_description' => $this->faker->sentence,
            'provisionary_date' => $this->faker->dateTimeThisYear(),
            'student_id' => Student::factory()->create()->id,
        ];
    }
}
