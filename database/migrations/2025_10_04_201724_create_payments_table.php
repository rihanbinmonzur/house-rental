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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('payment_request_id')->nullable();
            $table->integer('landlord_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->decimal('rent_amount',10,2)->nullable();
            $table->enum('payment_method',['bank_transfer', 'credit_card', 'mobile_money', 'cash'])->nullable();
             $table->string('transaction_id')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('memo')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
