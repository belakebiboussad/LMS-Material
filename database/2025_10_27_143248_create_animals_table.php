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
            $table->string('eid', 64)->unique();//rfid id
            $table->unsignedTinyInteger('animalType_id');
            $table->unsignedInteger('color_id')->nullable();
            $table->double('weight',8,2)->nullable();
            $table->dateTime('birthDate')->nullable();
            $table->string('sexe')->default(App\Enums\Sexe::Male);
            $table->unsignedBigInteger('breed_id');
            $table->dateTime('dethDate');
            $table->boolean('is_seek')->nullable();
            $table->boolean('is_castred')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->timestamps();
            $table->foreign('color_id')->references('id')->on('colors')->constrained()->onUpdate('restrict')->onDelete('restrict');  
            $table->foreign('animalType_id')->references('id')->on('animal_types')->constrained()->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('farm_id')->references('id')->on('farms')->constrained()->onUpdate('restrict')->onDelete('cascade');; 
            
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
