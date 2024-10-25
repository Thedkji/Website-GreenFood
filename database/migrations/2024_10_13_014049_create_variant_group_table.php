<?php

use App\Models\Variant;
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
        Schema::create('variant_group', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 30)->comment('Mã đơn hàng')->unique();
            $table->string('img')->nullable()->comment('Ảnh biến thể');
            $table->integer('price_regular')->default(0);
            $table->integer('price_sale')->default(0);
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_group');
    }
};
