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
        Schema::create('inv_product_measurement_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inv_product_id')->constrained();
            $table->foreignId('inv_unit_measurement_id')->constrained();
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inv_product_measurement');
    }
};
