<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;

    protected $fillable = ['size', 'type'];
    protected $appends = ['full_memory'];

    public function getFullMemoryAttribute(): string
    {
        return $this->size . " " . $this->type;
    }
}
