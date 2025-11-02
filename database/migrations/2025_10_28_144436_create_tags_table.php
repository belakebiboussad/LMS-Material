<?php

use App\Enums\TagStatus;
use App\Enums\TagType;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('mac_address')->nullable();
            $table->integer('antenna_port')->nullable();
            $table->string('eid',64)->unique()->nullable(false);
            $table->string('tagVis_id')->nullable();
            $table->string('type')->default(TagType::BIRTH) ;//naissance remplacement
            $table->unsignedTinyInteger('animalType_id');
            $table->bigInteger('owner_id')->nullable();
            $table->string('status',50)->default(TagStatus::INACTIVE);
            $table->nullableTimestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
