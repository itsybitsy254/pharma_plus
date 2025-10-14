<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id');
            
            // ✅ users.id (not user_id)
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users', 'id')
                  ->onDelete('set null');

            // ✅ medicines.medicine_id
            $table->foreignId('medicine_id')
                  ->constrained('medicines', 'medicine_id')
                  ->onDelete('cascade');

            $table->integer('quantity_sold');
            $table->decimal('total_price', 10, 2);
            $table->dateTime('sale_date')->useCurrent();
            $table->string('receipt_number')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
