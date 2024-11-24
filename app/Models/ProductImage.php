<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['show_home', 'phone_id', 'name'];
}
