<?php

namespace App\Enums;

enum Sexe: string
{
    case MALE = 'male';
    case FEMAL = 'féminin';
    public function label(){
        return match($this) {
            self::MALE =>'Male',
            self::FEMAL =>'Féminin',
        };
    }
}