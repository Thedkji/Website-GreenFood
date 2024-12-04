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
            $table->unsignedBigInteger('id')->primary(); 
            $table->string('name', 150);
            $table->string('avatar')->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('phone', 10);
            $table->string('province', 50)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('ward', 50)->nullable();
            $table->string('address')->nullable();
            $table->integer('role')->default(1)->comment('0: admin , 1:user');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
