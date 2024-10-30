<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variant_group';

    protected $fillable = [
        "product_id",
        "sku",
        "img",
        "price_regular",
        "price_sale",
        "quantity",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function depots()
    {
        return $this->hasMany(Depot::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'variant_variant_group');
    }
}
