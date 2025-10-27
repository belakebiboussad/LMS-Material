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
        Schema::table('farms', function (Blueprint $table) {
            $table->decimal('y_lat', 13, 11)->change();
            $table->decimal('x_lon', 14, 11)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('farms', function (Blueprint $table) {
            $table->decimal('y_lat', 10, 8)->change();
            $table->decimal('x_lon', 11, 8)->change();
        });
    }
};
