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
        "sku",
        "img",
        "price_regular",
        "price_sale",
        "quantity",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('variant_group_id');
    }

    public function depots()
    {
        return $this->hasMany(Depot::class);
    }
}
