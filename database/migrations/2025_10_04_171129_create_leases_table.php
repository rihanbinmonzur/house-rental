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
        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('tenant_id')->nullable();
            $table->bigInteger('landlord_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('security_deposite',10, 2 )->nullable();
            $table->integer('rent_amount')->nullable();
            $table->integer('rent_due_day')->nullable();
            $table->decimal('late_fee',10,2)->nullable();
            $table->enum('status',['active','ended','cancelled','pending']);
            $table->text('terms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leases');
    }
};
