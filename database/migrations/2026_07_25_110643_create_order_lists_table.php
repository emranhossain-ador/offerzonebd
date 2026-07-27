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
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();

            // Order Information
            $table->string('order_id')->unique();

            // User who placed the order
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Related Package
            $table->foreignId('sim_package_id')->nullable()->constrained('sim_packages')->nullOnDelete();
            $table->foreignId('gaming_package_id')->nullable()->constrained('gaming_packages')->nullOnDelete();

            // Order Type
            $table->enum('order_type', ['sim_package','gaming_package',]);

            // Package Information Snapshot
            $table->string('title');
            $table->decimal('price', 10, 2);

            // SIM Package Information
            $table->string('offer_number')->nullable();
            $table->string('operator')->nullable();
            $table->string('validity')->nullable();

            $table->enum('package_type', ['regular','drive',])->nullable();
            $table->enum('package_category', ['internet','minute','bundle',])->nullable();

            // Gaming Package Information
            $table->string('game_name')->nullable();
            $table->string('player_id')->nullable();

            // Customer Information
            $table->string('customer_name')->nullable();
            $table->string('customer_username')->nullable();
            $table->string('customer_email')->nullable();

            // Order Status
            $table->enum('status', ['pending','accepted','delivered','rejected',])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_lists');
    }
};
