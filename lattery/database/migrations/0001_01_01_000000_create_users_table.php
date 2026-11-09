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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->foreignId('agent_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('affiliate_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('reffer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('phone_number')->unique();
            $table->string('user_name')->unique();
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->string('email')->unique()->nullable();
            $table->string('role')->defalut('user');
            $table->integer('vip_level')->default(1);
            $table->integer('reffer_code')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('ip')->nullable();
            $table->string('fingerprint')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->decimal('max_win',20,2)->default(0);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
