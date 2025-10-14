<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AuditLog;
use App\Models\User;

class AuditLogFactory extends Factory
{
    protected $model = AuditLog::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'action' => $this->faker->randomElement(['create', 'update', 'delete', 'view']),
            'description' => $this->faker->sentence(),
            'timestamp' => now(), // ✅ matches your table
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
