<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\Supplier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    protected $model = Medicine::class;

    public function definition(): array
    {
        $statuses = ['Available', 'Low Stock', 'Expired'];
        $expiry = $this->faker->dateTimeBetween('now', '+2 years');

        return [
            'name' => $this->faker->word(),
            'category_id' => Category::inRandomOrder()->first()?->category_id ?? Category::factory(),
            'batch_number' => strtoupper($this->faker->bothify('BN###??')),
            'supplier_id' => Supplier::inRandomOrder()->first()?->supplier_id ?? Supplier::factory(),
            'quantity' => $this->faker->numberBetween(0, 200),
            'unit_price' => $this->faker->randomFloat(2, 10, 500),
            'expiry_date' => $expiry,
            'date_added' => now(),
            'status' => $this->faker->randomElement($statuses),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
