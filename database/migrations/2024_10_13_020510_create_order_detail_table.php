<?php

use App\Models\Order;
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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete();
            $table->string('product_sku');
            $table->string('product_name');
            $table->string('product_img');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->string('coupon_name');
            $table->integer('coupon_quantity');
            $table->integer('coupon_price')
                ->comment('Số tiền của mã giảm giá');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
