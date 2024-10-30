<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "parent_id",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class,'coupon_category');
    }

    // Lấy ra danh mục cha
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}


