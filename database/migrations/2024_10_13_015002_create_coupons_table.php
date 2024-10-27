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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coupon_amount')->comment('Giá trị muốn giảm giá VD: 5%');
            $table->integer('minimum_spend')->comment('Giá trị thấp nhất có thể giảm giá');
            $table->integer('maximum_spend')->comment('Giá trị cao nhất có thể giảm giá');
            $table->text('description')->nullable();
            $table->integer('quantity')->comment('Số lượng mã giảm giá');
            $table->dateTime('start_date')->comment('Ngày bắt đầu giảm giá');
            $table->dateTime('expiration_date')->comment('Ngày hết hạn mã giảm giá');
            $table->integer('type')
                ->default(0)
                ->comment(
                    '
                                0: Công khai ,
                                1: Riêng tư , 
                                [Kiểu mã giảm giá muốn áp dụng cho tất cả khách hàng hoặc 1 số khách hàng nhất định]
                            '
                );
            $table->integer('status')
                ->default(0)
                ->comment(
                    '
                                0: Phát hành , 
                                1: Chưa phát hành ,
                                2: Chờ phát hành ,
                                3: Hết hạn
                            '
                );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
