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
        Schema::create('service', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Service name
            $table->string('depart'); // Department or category
            $table->text('description')->nullable(); // Optional description
            $table->integer('duration')->nullable(); // Optional duration in days/hours
            $table->boolean('status')->nullable()->default(1); // Status: 1 = active, 0 = inactive
            $table->timestamps(); // Created at and Updated at timestamps
            $table->unsignedBigInteger('created_by')->nullable(); // Optional creator user ID
            $table->unsignedBigInteger('updated_by')->nullable(); // Optional updater user ID
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
