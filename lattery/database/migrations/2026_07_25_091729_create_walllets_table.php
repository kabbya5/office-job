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
        Schema::create('walllets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('slot_amount',16,4)->default(0);
            $table->decimal('live_amount',16,4)->default(0);
            $table->decimal('custom_amount',16,4)->default(0);
            $table->decimal('bonus_amount',16,4)->default(0);
            $table->decimal('total_amount',16,4)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walllets');
    }
};
