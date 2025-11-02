<?php

namespace App\Enums;

enum TagStatus :string
{
    case ACTIVE ="Active";
    case INACTIVE="Inactive";
    case LOST ="Perdue";
     public function label(){
        return match($this) {
            self::ACTIVE =>'Active',
            self::INACTIVE =>'Inactive',
            self::LOST =>'Perdue',
         };
    }
}
