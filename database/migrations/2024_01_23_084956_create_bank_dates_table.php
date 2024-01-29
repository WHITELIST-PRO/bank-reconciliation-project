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
        Schema::create('bank_data', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('sender_name');
            $table->string('sender_account');
            $table->text('payment_reference');
            $table->string('amount_value');
            $table->string('amount_currency');
            $table->string('fee_value');
            $table->string('fee_currency');
            $table->string('reference_number');
            $table->string('business_name');
            $table->string('detail_type');
            $table->string('transaction_id');
            $table->string('type');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_data');
    }
};
