<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductMemories extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['product_id', 'memory_id'];

    public function memory(): HasOne
    {
        return $this->hasOne(Memory::class, 'id', 'memory_id');
    }

}
