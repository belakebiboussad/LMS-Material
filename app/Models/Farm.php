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
        'name',
        'position',
        'x_lon',
        'y_lat',
        'wilaya_id',
        'owner_id',
    ];
}
