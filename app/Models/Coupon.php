<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "discount_type",
        "coupon_amount",
        "minimum_spend",
        "maximum_spend",
        "description",
        "quantity",
        "start_date",
        "expiration_date",
        "type",
        "status",
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'coupon_category');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'coupon_product');
    }

}
