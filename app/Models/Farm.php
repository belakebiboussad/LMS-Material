<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    /** @use HasFactory<\Database\Factories\FarmFactory> */
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'recordNbr',
        'name',
        'creationDt',
        'owner_id',
        'area',
        'address',
        'wilaya_id',//'position',
        'x_lon',
        'y_lat',
        'phone'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
    public function animalTypes()
    {
        return $this->belongsToMany(AnimalType::class, 'animal_type_farm', 'farm_id', 'animal_type_id');
    }
}
