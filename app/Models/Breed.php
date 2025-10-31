<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = [
        
        'name',
        'animal_type_id',
        'notes'
    ];  
}
