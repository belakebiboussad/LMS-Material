<?php

use App\Enums\RFReaderType;
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
        Schema::create('readers', function (Blueprint $table) {
            $table->id();
            $table->string('brand',100);
            $table->string('model',100);
            $table->string('serial',100);
            $table->string('type',40)->default(RFReaderType::FIXE);
            $table->string('location', 100)->nullable();
            $table->boolean('is_broken')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readers');
    }
};
