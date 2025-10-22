<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalTypeFactory> */
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
