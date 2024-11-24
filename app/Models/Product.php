<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasOne};

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'brand_id',
        'created_by',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'phone_id', 'id');
    }

    public function info(): HasOne
    {
        return $this->hasOne(PhoneInfo::class, 'product_id', 'id');
    }

    public function colors(): HasMany
    {
        return $this->HasMany(ProductColors::class, 'product_id', 'id')
            ->select('product_colors.*', 'colors.name as color_name')
            ->join('colors', 'colors.id', '=', 'product_colors.color_id');
    }

    public function memories(): HasMany
    {
        return $this->HasMany(ProductMemories::class, 'product_id', 'id');
    }
    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

}
