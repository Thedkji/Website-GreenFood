<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "parent_id",
    ];

    public function variantGroups()
    {
        return $this->belongsToMany(VariantGroup::class, 'variant_variant_group');
    }

    // Lấy ra tên của parent_id
    public function parent()
    {
        return $this->belongsTo(Variant::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Variant::class, 'parent_id');
    }
}
