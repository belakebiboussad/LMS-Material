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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sfarm_id');
            $table->unsignedBigInteger('dfarm_id')->nullable();
            $table->dateTime('depDate')->default(\Carbon\Carbon::now());
            $table->dateTime('arrivDate');
            $table->foreign('sfarm_id')->references('id')->on('farms')->contrained()->onupdate('cascade')->ondelete('cascade');
            $table->foreign('dfarm_id')->references('id')->on('farms')->contrained()->onupdate('cascade')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
