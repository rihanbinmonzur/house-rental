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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->integer('unit_number');
            $table->string('floor');
            $table->integer('size');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('rent_amount');
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
             $table->json('features')->nullable();
             $table->index(['property_id', 'unit_number']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
