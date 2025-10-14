<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;
use App\Models\User;
use App\Models\Medicine;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition(): array
    {
        // Get a random medicine or create one
        $medicine = Medicine::inRandomOrder()->first() ?? Medicine::factory()->create();

        // Get a random user or create one
        $user = User::inRandomOrder()->first() ?? User::factory()->create();

        $quantity = $this->faker->numberBetween(1, 5);
        $total = $medicine->unit_price * $quantity;

        return [
            'user_id' => $user->id,  // ✅ correct field name
            'medicine_id' => $medicine->medicine_id,
            'quantity_sold' => $quantity,
            'total_price' => $total,
            'sale_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'receipt_number' => strtoupper($this->faker->bothify('RCPT-###??')),
        ];
    }
}
