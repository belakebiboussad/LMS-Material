<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $primaryKey = 'number';
   protected $keyType = 'string';
   public $incrementing = false;
   //Numéro,Date délivrance,Numéro demande,Numéro exploitation,Type (Ovin, Bovin,Camel)
   protected $fillable = [
    'Number',
   ];
}
