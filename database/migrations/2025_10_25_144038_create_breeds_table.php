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
        Schema::create('breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);
            $table->unsignedTinyInteger('animal_type_id');
            $table->unsignedTinyInteger('production_id');
            $table->string('notes',255)->nullable();
            $table->foreign('animal_type_id')->references('id')->on('animal_types')->constrained()->cascadeOnDelete();
            $table->foreign('production_id')->references('id')->on('productions')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breeds');
    }
};
