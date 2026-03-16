<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = [
        'brand',
        'model',
        'serial',
        'type',
        'location',
        'is_broken'
    ];
}
