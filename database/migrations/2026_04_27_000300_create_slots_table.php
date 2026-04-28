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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained('fields')->cascadeOnDelete();
            $table->date('date');
            // Oracle has no standalone TIME type; store HH:MM:SS as string.
            $table->string('start_time', 8);
            $table->string('end_time', 8);
            $table->unsignedInteger('capacity');
            $table->unsignedInteger('booked_count')->default(0);
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->unique(['field_id', 'date', 'start_time']);
            $table->index(['field_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
