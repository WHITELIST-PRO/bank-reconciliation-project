<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('color_combinations', function (Blueprint $table) {
            $table->id();
            $table->string('complete_matching_percentage');
            $table->string('partial_matching_percentage');
            $table->string('complete_matching');
            $table->string('complete_matching_select');
            $table->string('partial_matching');
            $table->string('partial_matching_select');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'ColorSeeder',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_combinations');
    }
};
