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
             $table->string('address')->nullable()->change();
             $table->string('phone')->nullable()->change();
             $table->string('area')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('farms', function (Blueprint $table) {
            $table->string('address')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
             $table->string('area')->nullable(false)->change();
        });
    }
};
