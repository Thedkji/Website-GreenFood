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
        Schema::create('variant_group_variant', function (Blueprint $table) {
            $table->foreignIdFor(VariantGroup::class,)->constrained('variant_group')->cascadeOnDelete();
            
            $table->foreignIdFor(Variant::class)->constrained()->cascadeOnDelete();

            $table->primary([
                'variant_group_id',
                'variant_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_group_variant');
    }
};
