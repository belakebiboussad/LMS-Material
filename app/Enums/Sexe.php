<?php

namespace App\Enums;

enum Sexe: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    public function label(){
        return match($this) {
            self::MALE =>'Mâle',
            self::FEMALE =>'Femelle',
        };
    }
}