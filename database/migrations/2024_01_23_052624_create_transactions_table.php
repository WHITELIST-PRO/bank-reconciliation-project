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
            $table->string('identifier');
            $table->string('type');
            $table->dateTime('date');
            $table->string('customer_code');
            $table->string('business_name');
            $table->string('fiscal_code');
            $table->string('vat_number');
            $table->string('registration_number');
            $table->string('payment_method_type');
            $table->string('fb_platform_id');
            $table->string('amount');
            $table->string('amount_usd');
            $table->string('transfer_reason');
            $table->string('lender_business_name');
            $table->timestamps();
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
