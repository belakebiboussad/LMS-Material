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
            $table->char('recordNbr',10);
            $table->string('name', 255)->nulable();
            $table->decimal('area', 10, 2)->unsigned()->nullable();
            $table->integer('owner_id')->length(18)->nullable();
            $table->decimal('y_lat', 13, 11)->nullable();
            $table->decimal('x_lon', 14, 11)->nullable();
            $table->string('address',100)->nulable();
             $table->unsignedTinyInteger('wilaya_id')->nullable();
            $table->string('phone',10)->nulable();
            //$table->integer("guardien_id")->nullable();
             $table->foreignId('guardien_id')->nullable()->constrained('users','id')->onUpdate('cascade')->onDelete('cascade');
            $table->date('creationDt');            
            //$table->foreign('guardien_id')->references('id')->on('users')->contrained()->onupdate('cascade')->ondelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm');
    }
};
