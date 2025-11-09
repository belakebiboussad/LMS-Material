<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'sferm_id',
        'dfarm_id',
        'depDate',
        'arrivDate'
    ];
    protected $casts = [
        'depDate' => 'datetime',
        'arrivDate' => 'datetime'
    ];
}
