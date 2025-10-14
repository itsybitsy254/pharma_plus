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
    Schema::create('medicines', function (Blueprint $table) {
        $table->id('medicine_id');
        $table->string('name');
        $table->foreignId('category_id')->constrained('categories', 'category_id')->onDelete('cascade');
        $table->string('batch_number')->nullable();
        $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'supplier_id')->onDelete('set null');
        $table->integer('quantity')->default(0);
        $table->decimal('unit_price', 8, 2);
        $table->date('expiry_date');
        $table->date('date_added')->useCurrent();
        $table->enum('status', ['Available', 'Low Stock', 'Expired'])->default('Available');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};