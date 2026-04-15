<?php

namespace Database\Factories;

use App\Features\Departments\Admin\Models\Department;
use App\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()->id,
            'owner_id' => \App\Features\Auth\Models\User::inRandomOrder()->first()->id,
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['active', 'on_hold', 'archived']),
            'deadline' => fake()->date(),
        ];
    }
}
