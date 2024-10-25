<?php

use App\Models\Product;
use App\Models\Supplier;
use App\Models\VariantDetail;
use App\Models\VariantGroup;
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
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Supplier::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(VariantGroup::class, 'variant_group_id')->constrained('variant_group')->cascadeOnDelete();

            $table->integer('stock')->comment('Số lượng tồn kho của sản phẩm');
            $table->dateTime('expiration_date')->comment('Ngày hết hạn');
            $table->integer('status')
                ->default(1)
                ->comment('0: Đang hoạt động , 1: Chưa hoạt động');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depots');
    }
};
