<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'brand_id',
        'capacity',
        'number_doors',
        'engine_type',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
