<?php

namespace App\Models;

use App\Enums\TagStatus;
use App\Enums\TagType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
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
         'status' => TagStatus::class   
    ];
    #[Scope]
    protected function inactive(Builder $q): Builder
    {
        return $q->where('status',TagStatus::INACTIVE);
    }
    public function animalType(){
        return $this->belongsTo(AnimalType::class,'animalType_id');
    }
    public function owner(){
         return $this->belongsTo(User::class,'owner_id');
    } 

}
