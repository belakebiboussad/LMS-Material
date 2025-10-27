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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_id', 64)->nulable();
            $table->tinyInteger('animalType_id');
            $table->unsignedInteger('color_id')->nullable();
            $table->dateTime('birthDate');
            $table->dateTime('dethDate');
            $table->timestamps();
            $table->boolean('is_seek')->nullable();
            $table->unsignedInteger('far_id');
            $table->foreign('color_id')->references('id')->on('colors')->constrained()     ->onUpdate('restrict')->onDelete('restrict');  
            $table->foreign('animalType_id')->references('id')->on('animal_types')->constrained()->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('far_id')->references('id')->on('farms')->constrained()->onUpdate('restrict')->onDelete('cascade');; 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
