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
        Schema::create('weather_searches', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->foreignId('user_id') // Foreign key to the users table
                  ->constrained()
                  ->onDelete('cascade'); // Delete search records if the user is deleted
            $table->string('city'); // The city name being searched
            $table->string('temperature')->nullable(); // The current temperature in the city
            $table->string('weather_condition')->nullable(); // The weather condition description
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather_searches');
    }
};
