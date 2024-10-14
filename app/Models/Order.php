<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "address",
        "province",
        "district",
        "ward",
        "email",
        "phone",
        "total",
        "note",
        "cancel_reson",
        "status",
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
