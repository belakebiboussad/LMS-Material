<?php

namespace App\Models;

use App\Enums\TagType;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable = [
    'brand',
    'mac_address',
    'antenna_port',
    'eid',
    'vis_id',
    'type',
    'animalType_id',
    'owner_id',
    'status',
   ];
   protected $casts = [
        'type' => TagType::class, // Direct enum casting
        //'animalType_id' => animalType::class,
    ];
    public function animalType(){
        return $this->belongsTo(AnimalType::class,'animalType_id');
    }
    public function owner(){
         return $this->belongsTo(User::class,'owner_id');
    } 

}
