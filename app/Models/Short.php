<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Short extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 
        'description', 
        'creator_identify', 
        'url'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class, 'short_identify', 'uuid');
    }
}
