<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "parent_id",
    ];

    public function variantGroups()
    {
        return $this->belongsToMany(VariantGroup::class, 'variant_group_variant');
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
