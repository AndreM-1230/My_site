<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'status' => $this->faker->numberBetween(1, 3),
            'admin_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 30),
            'rating' => $this->faker->numberBetween(1, 5),
            'answer' => $this->faker->text(rand(50, 100)),
        ];
    }
}
