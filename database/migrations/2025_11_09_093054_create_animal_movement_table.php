<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Transaction;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->string('seller_id', 20);
            $table->unsignedBigInteger('sfarm_id')->nullable();
            $table->string('buyer_id', 20);
            $table->unsignedBigInteger('dfarm_id')->nullable();
            $table->string('type',10)->default(Transaction::INTERNAL->value);
            $table->dateTime('depDate')->default(\Carbon\Carbon::now());
            $table->dateTime('arrivDate');
            $table->foreign('seller_id')->references('NIN')->on('users')->contrained()->onupdate('cascade')->ondelete('cascade');
            $table->foreign('sfarm_id')->references('id')->on('farms')->contrained()->onupdate('cascade')->ondelete('cascade');
             $table->foreign('buyer_id')->references('NIN')->on('users')->contrained()->onupdate('cascade')->ondelete('cascade');
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
