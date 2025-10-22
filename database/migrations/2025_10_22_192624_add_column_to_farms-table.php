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
        Schema::table('farms', function (Blueprint $table) {
            $table->char('recordNbr',10);
            $table->date('creationDt');
            $table->string('address',100);
            $table->string('phone',10);
            $table->decimal('area', 10, 2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('farms', function (Blueprint $table) {
          $table->dropColumn('recordNbr');
          $table->dropColumn('creationDt');
          $table->dropColumn('address');
          $table->dropColumn('phone');
          $table->dropColumn('area');
        });
    }
};
