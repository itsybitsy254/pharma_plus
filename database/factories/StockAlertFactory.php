<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StockAlert;
use App\Models\Medicine;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockAlert>
 */
class StockAlertFactory extends Factory
{
    protected $model = StockAlert::class;

    public function definition(): array
    {
        $alertType = $this->faker->randomElement(['low_stock', 'expiry_warning']);
        $status = $this->faker->randomElement(['active', 'resolved']);
        $medicine = Medicine::inRandomOrder()->first() ?? Medicine::factory()->create();

        // Create alert messages depending on the type
        $message = $alertType === 'low_stock'
            ? "Low stock alert: {$medicine->name} has limited quantity remaining!"
            : "Expiry warning: {$medicine->name} will expire soon on {$medicine->expiry_date}!";

        return [
            'medicine_id' => $medicine->medicine_id,
            'alert_type' => $alertType,
            'alert_message' => $message,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
