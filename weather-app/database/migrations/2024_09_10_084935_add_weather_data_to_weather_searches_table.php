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
        Schema::table('weather_searches', function (Blueprint $table) {
            $table->text('weather_data')->nullable(); // Add the weather_data column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weather_searches', function (Blueprint $table) {
            $table->dropColumn('weather_data'); // Remove the weather_data column
        });
    }
};
