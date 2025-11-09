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
        Schema::create('animal_movement', function (Blueprint $table) {
            $table->string('animal_id',64);
            $table->unsignedBigInteger('movement_id');
            // Define the composite primary key
            $table->primary(['animal_id', 'movement_id']);
            $table->foreign('animal_id')->references('eid')->on('animals')->contrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('movement_id')->references('id')->on('movements')->contrained()->onUpdate('cascade')->onDelete('cascade');
              $table->unique(['animal_id', 'movement_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_movement');
    }
};
