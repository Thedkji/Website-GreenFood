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
        Schema::create('variant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Variant::class)->constrained()->cascadeOnDelete();
            $table->integer('price')->nullable();
            $table->string('value', 150)
                ->comment('Giá trị của biến thể VD: 5kg , đỏ ,...')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_detail');
    }
};
