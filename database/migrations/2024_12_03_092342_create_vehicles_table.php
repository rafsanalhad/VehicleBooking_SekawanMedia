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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['passenger', 'cargo']);
            $table->string('plate_number', 20)->unique();
            $table->string('model', 100);
            $table->integer('year');
            $table->enum('ownership_type', ['company', 'rental']);
            $table->enum('status', ['available', 'in_use', 'maintenance'])->default('available');
            $table->decimal('fuel_consumption', 5, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
