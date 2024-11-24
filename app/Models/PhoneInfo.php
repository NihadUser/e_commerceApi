<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneInfo extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'phone_infos';

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'screen_size',
        'name',
        'core_nums',
        'main_camera',
        'front_camera',
        'battery',
        'screen_height',
        'screen_width',
        'display',
        'discount_percent'
    ];
}
