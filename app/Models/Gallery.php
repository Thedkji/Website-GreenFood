<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;

    protected $fillable = [
        "path",
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
