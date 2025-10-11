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
            $table->string('property_id')->nullable();
            $table->integer('unit_number')->nullable();
            $table->string('floor')->nullable();
            $table->integer('size')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('rent_amount')->nullable();
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
            
             $table->string('image_url')->nullable();
                                                                    
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
