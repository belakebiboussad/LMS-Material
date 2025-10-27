<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
       protected $fillable = [
        'rfid_id',
        'animalType_id',
        'color_id',
        'birthDate',
        'dethDate',
        'is_seek',
        'farm_id',
    ];
}
