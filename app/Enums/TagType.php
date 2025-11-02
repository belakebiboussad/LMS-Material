<?php

namespace App\Enums;

enum TagType: string
{
    case BIRTH="naissance";
    case REMPLACEMENT="remplacement";
    public function label(){
        return match($this) {
             self::BIRTH =>'Naissance',
             self::REMPLACEMENT =>'Remplacement',
         };
    }
}
