<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalTypeFarm extends Model
{
    protected $table = 'animal_type_farm';
    protected $fillable = [
        'animal_type_id',
        'farm_id',
    ];
}
