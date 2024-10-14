<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariantDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "variant_id",
        "price",
        "value",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function depots()
    {
        return $this->hasMany(Depot::class);
    }
}
