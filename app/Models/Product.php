<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'supplier_id',
        "sku",
        "name",
        "slug",
        "img",
        "price_regular",
        "price_sale",
        "description",
        "description_short",
        "quantity",
        "view",
        'manufacture_date',
        'expiry_date',
        "status",
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function variantGroups()
    {
        return $this->hasMany(VariantGroup::class);
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
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_sku', 'sku');
    }



// Trong mô hình Product

public function getTotalSoldAttribute()
{
    return $this->orderDetails->sum('product_quantity'); // Tổng số lượng đã bán
}

public function getStockLeftAttribute()
{
    $totalSold = $this->getTotalSoldAttribute();
    $quantity = $this->variantGroups->sum('quantity'); // Tổng số lượng sản phẩm trong kho

    // Đảm bảo số lượng tồn kho không bị âm
    return max(0, $quantity - $totalSold); // Trả về giá trị lớn nhất giữa 0 và (số lượng trong kho - số lượng đã bán)
}


public function getTotalRevenueAttribute()
{
    return $this->orderDetails->sum(function($orderDetail) {
        return $orderDetail->product_price * $orderDetail->product_quantity; // Doanh thu từ chi tiết đơn hàng
    });
}

}
