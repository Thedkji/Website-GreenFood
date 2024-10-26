<?php

use App\Models\Product;
use App\Models\Variant;
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
        Schema::create('product_variant', function (Blueprint $table) {
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Variant::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(VariantGroup::class, 'variant_group_id')->constrained('variant_group')->cascadeOnDelete();

            $table->primary([
                'product_id',
                'variant_id',
                'variant_group_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant');
    }
};
