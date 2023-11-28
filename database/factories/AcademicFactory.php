<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academic>
 */
class AcademicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory()->create()->id,
            'course_code' => $this->faker->randomElement(['COMPSCI', 'MATH', 'PHYS', 'CHEM']),
            'first_sem_1st_year' => $this->faker->numberBetween(60, 100),
            'second_sem_1st_year' => $this->faker->numberBetween(60, 100),
            'first_sem_2nd_year' => $this->faker->numberBetween(60, 100),
            'second_sem_2nd_year' => $this->faker->numberBetween(60, 100),
            'gpa' => $this->faker->numberBetween(60, 100),
        ];
    }
}
