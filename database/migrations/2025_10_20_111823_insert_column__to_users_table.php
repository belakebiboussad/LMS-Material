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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('id')->length(18)->change();
            $table->string('lastName', 100);
            $table->date('birthDate')->nullable();
            $table->string('address', 255)->nullable();
            $table->integer('commune_id')->length(11)->nullable();
            $table->string('phone', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
