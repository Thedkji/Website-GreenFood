<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;
    protected $table = "order_detail";
    protected $fillable = [
        "order_id",
        "product_sku",
        "product_name",
        "product_img",
        "product_price",
        "product_quantity",
        "coupon_name",
        "coupon_quantity",
        "coupon_price",
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
/******  26a680e3-2ccc-4e35-ac88-e5fc30deec9b  *******/
}
