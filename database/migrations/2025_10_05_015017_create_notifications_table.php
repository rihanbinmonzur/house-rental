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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->text('message')->nullable();
            $table->enum('type',['general','maintenance','payment','announcement'])->default('general');
            $table->enum('visibility', ['public', 'tenants_only'])->default('public');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
