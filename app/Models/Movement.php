<?php

namespace App\Models;

use App\Enums\Transaction;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'sfarm_id',
        'buyer_id',
        'dfarm_id',
        'type',
        'depDate',
        'arrivDate'
    ];
    protected $casts = [
        'type' => Transaction::class,
        'depDate' => 'datetime',
        'arrivDate' => 'datetime'
    ];
}
