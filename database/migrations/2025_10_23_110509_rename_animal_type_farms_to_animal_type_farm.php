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
        Schema::table('animal_type_farms', function (Blueprint $table) {
            Schema::rename('animal_type_farms', 'animal_type_farm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animal_type_farms', function (Blueprint $table) {
            Schema::rename('animal_type_farm', 'animal_type_farms');
        });
    }
};
