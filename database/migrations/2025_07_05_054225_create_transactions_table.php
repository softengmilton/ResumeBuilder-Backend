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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('type'); // payment, refund, charge, etc.
            $table->integer('amount');
            $table->string('currency', 3);
            $table->string('subscription_id')->nullable();
            $table->string('status');
            $table->string('payment_method')->nullable();
            $table->string('description')->nullable();
            $table->string('receipt_url')->nullable();
            $table->string('invoice_id')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
