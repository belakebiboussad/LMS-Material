<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tagScan extends Model
{
    protected $fillable = [
        'reader_id',
        'tag_id',
        'location'
    ];
}