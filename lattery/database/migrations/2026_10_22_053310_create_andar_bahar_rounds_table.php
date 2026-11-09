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
        Schema::create('andar_bahar_rounds', function (Blueprint $table) {
            $table->id();
            $table->string('round_id')->unique();
            $table->string('status')->default('betting');
            $table->integer('cart_suit_id');
            $table->integer('joker_card_id')->nullable();
            $table->string('card_image');
            $table->string('winning_side')->nullable();
            $table->integer('winning_position')->nullable();
            $table->decimal('total_bet_amount', 10, 2)->default(0); 
            $table->decimal('total_win_amount', 10, 2)->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('andar_bahar_rounds');
    }
};
