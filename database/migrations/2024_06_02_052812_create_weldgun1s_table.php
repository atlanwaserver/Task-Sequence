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
        Schema::create('weldgun1s', function (Blueprint $table) {
            $table->id();
            $table->string('pulse');
            $table->string('cycle');
            $table->string('current_value');
            $table->string('angle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weldgun1s');
    }
};
