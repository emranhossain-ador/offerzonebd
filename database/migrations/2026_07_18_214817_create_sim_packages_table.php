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
        Schema::create('sim_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('operator', ['gp', 'robi', 'airtel', 'bl', 'teletalk']);
            $table->string('price');
            $table->enum('type', ['internet', 'minute', 'bundle']);
            $table->string('validity');
            $table->enum('package_type', ['regular', 'drive']);
            $table->enum('status', ['active', 'deactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sim_packages');
    }
};
