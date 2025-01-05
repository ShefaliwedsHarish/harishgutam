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
        Schema::create('service_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id'); // Use unsignedBigInteger for foreign keys
            $table->decimal('price', 10, 2); // Decimal is suitable for storing prices
            $table->decimal('total_price', 10, 2); // Decimal for total price
            $table->decimal('grand_price', 10, 2); // Decimal for grand price
            $table->timestamps();

            $table->foreign('service_id')
            ->references('id') // The column in the 'services' table that 'service_id' will reference
            ->on('service')    // The 'services' table
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_prices');
    }
};
