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
    Schema::create('bookings', function (Blueprint $table) {
        $table->uuid('id')->primary();
        $table->uuid('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
        $table->uuid('driver_id')->nullable();
        $table->foreign('driver_id')->references('id')->on('users')->onDelete('set null');
        $table->date('start_datetime');
        $table->date('end_datetime');
        $table->string('purpose', 255)->nullable();
        $table->enum('status', ['pending', 'approved', 'approved_pending_1', 'rejected', 'completed']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
