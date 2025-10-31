<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nulable();
            $table->integer('owner_id')->length(18)->nullable();
            $table->decimal('y_lat', 10, 8);
            $table->decimal('x_lon', 11, 8);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE farms ADD COLUMN farmPosition POINT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm');
    }
};
