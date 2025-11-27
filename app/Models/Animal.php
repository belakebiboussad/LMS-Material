<?php

namespace App\Models;

use App\Enums\AnimalStatus;
use App\Enums\Sexe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Animal extends Model
{
       protected $fillable = [
        'eid',
        'animalType_id',
        'color_id',
        'farm_id',
        'weight',
        'dob',
        'sexe',
        'breed_id',
        'endDate',
        'is_castred',
        'is_seek',
        'status',//silled,daed,consume

        
    ];
     protected $casts = [
        'dob' => 'datetime',
        'dethDate' => 'datetime',
        'sexe' => Sexe::class,
        'is_castred' => 'boolean',
        'is_seek' => 'boolean', 
        'status' => AnimalStatus::class,
    ];
    protected $appends = ['age'];
    public function getAgeAttribute()
    {
        if (!$this->dob) {
            return null;
        }
        return \Carbon\Carbon::parse($this->dob)->diff(\Carbon\Carbon::now())->format('%y ans, %m mois');
    }       
    public function rfidTag()
    {
        return $this->belongsTo(Tag::class, 'eid', 'id');
    }
    public function animalType()
    {
        return $this->belongsTo(AnimalType::class, 'animalType_id');        
    }
    public function breed()
    {
        return $this->belongsTo(Breed::class, 'breed_id');        
    }
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');    
    }
    public function movements() {
        return $this->hasMany(Movement::class,'animal_movement','animal_id', 'movement_id');
    }
}
