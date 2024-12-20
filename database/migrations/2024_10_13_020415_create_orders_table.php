<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('order_code');
            $table->string('name');
            $table->string('province', 50);
            $table->string('district', 50);
            $table->string('ward', 50);
            $table->string('address');
            $table->string('email');
            $table->string('deliveryFee')->comment('Phí ship');
            $table->string('phone', 10);
            $table->string('total')->comment('Tổng toàn bộ hóa đơn');
            $table->string('note')->comment('Ghi chú đơn hàng')->nullable();
            $table->string('cancel_reson')
                ->nullable()
                ->comment('Lý do hủy đơn , lý do giao hàng không thành công');
            $table->integer('status')
                ->comment(
                    '
                                0: Chờ xác nhận ,
                                1: Đã xác nhận và đang xử lý đơn hàng,
                                2: Đang giao hàng ,
                                3: Giao hàng thành công ,
                                4: Giao hàng không thành công ,
                                5: Hủy đơn ,
                                6: Đánh giá,
                                7: Hoàn thành
                            '
                )
                ->default(0);
            $table->integer('payment_method')
                ->comment(
                    '
                                0: Tiền mặt ,
                                1: Thanh toán VNPay,
                            '
                )
                ->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
