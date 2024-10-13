<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depot extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    protected $fillable = [
        "supplier_id",
        "product_id",
        "variant_detail_id",
        "stock",
        "expiration_date",
        "status",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function variantDetail()
    {
        return $this->belongsTo(VariantDetail::class);
    }
}
