<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductColors extends Model
{
    use HasFactory;

    protected $table = 'product_colors';
    /**
     * @var string[]
     */
    protected $fillable = ['product_id', 'color_id'];

    public function color_name(): HasOne
    {
        return $this->hasOne(Color::class, 'id', 'color_id');
    }
}
