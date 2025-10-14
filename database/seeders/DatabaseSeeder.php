<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Sale;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --- Create Admin User ---
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // --- Create Pharmacist User ---
        User::factory()->create([
            'name' => 'Pharmacist User',
            'email' => 'pharmacist@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'pharmacist',
        ]);

        // --- Create Cashier User ---
        User::factory()->create([
            'name' => 'Cashier User',
            'email' => 'cashier@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'cashier',
        ]);

        // --- Seed other data ---
        Supplier::factory(10)->create();
        Category::factory(5)->create();
        Medicine::factory(20)->create();
        Sale::factory(30)->create();
    }
}
