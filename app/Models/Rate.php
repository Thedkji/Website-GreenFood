<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "comment_id",
        "star",
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
