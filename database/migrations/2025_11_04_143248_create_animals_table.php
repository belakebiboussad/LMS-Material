<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Sexe;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {  
            $table->id();
            $table->unsignedBigInteger('tag_id')->unique()->nullable();//rfid id
            $table->unsignedTinyInteger('animalType_id');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->double('weight',8,2)->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('sexe',10)->default(Sexe::MALE->value);
            $table->unsignedBigInteger('breed_id');
            $table->dateTime('endDate')->nullable();
            $table->boolean('is_seek')->nullable();
            $table->boolean('is_castred')->nullable();
            //$table->unsignedBigInteger('farm_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('restrict')->onDelete('set null');
               $table->foreign('animalType_id')->references('id')->on('animal_types')->onUpdate('restrict')->onDelete('restrict'); 
            $table->foreign('color_id')->references('id')->on('colors')->nullable()->onUpdate('restrict')->onDelete('set null');  
            $table->foreign('farm_id')->references('id')->on('farms')->constrained()->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('breed_id')->references('id')->on('breeds')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->string('status')->nullable();
            $table->timestamps();
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
