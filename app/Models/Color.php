<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hex_code'];

}
