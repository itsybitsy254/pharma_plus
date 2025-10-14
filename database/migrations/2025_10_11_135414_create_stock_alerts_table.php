<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('stock_alerts', function (Blueprint $table) {
        $table->id('alert_id');
        $table->foreignId('medicine_id')->constrained('medicines', 'medicine_id')->onDelete('cascade');
        $table->enum('alert_type', ['low_stock', 'expiry_warning']);
        $table->text('alert_message');
        $table->enum('status', ['active', 'resolved'])->default('active');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_alerts');
    }
};