<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(), // Matches 'name' column
            'description' => $this->faker->sentence(), // Matches 'description' column
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
