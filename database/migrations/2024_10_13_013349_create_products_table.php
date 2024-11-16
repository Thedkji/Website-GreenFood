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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 30)->comment('Mã đơn hàng')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('img')->nullable();
            $table->integer('price_regular')->nullable();
            $table->integer('price_sale')->nullable();
            $table->text('description')->nullable();
            $table->text('description_short')->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->integer('view')->default(0)->nullable();
            $table->integer('status')
                ->default(0)
                ->comment('[0 : Không có biến thể , 1 : Có biến thể]');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
