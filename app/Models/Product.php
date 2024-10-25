<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "sku",
        "name",
        "slug",
        "img",
        "price_regular",
        "price_sale",
        "description",
        "description_short",
        "quantity",
        "status",
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function depots()
    {
        return $this->hasMany(Depot::class);
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class)
            ->withPivot('variant_group_id');
    }

    public function variantGroups()
    {
        return $this->belongsToMany(VariantGroup::class)
            ->withPivot('variant_group_id')
        ;
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
}
