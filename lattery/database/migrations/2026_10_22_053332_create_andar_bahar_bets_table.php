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
        Schema::create('andar_bahar_bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('round_id')->constrained('andar_bahar_rounds')->cascadeOnDelete();
            $table->string('user_id');
            $table->string('side',10);
            $table->decimal('amount', 10, 2);
            $table->decimal('win_amount', 10, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('andar_bahar_bets');
    }
};
