<?php

namespace App\Enums;

enum AnimalStatus: string
{
    case SELLING = 'selling';
    case SELLED = 'selled';
    case BUYING = 'buying';
    case BUYED = 'buyed';
    case DEAD = 'dead';
    public function label(){
        return match($this) {
            self::SELLING =>'vente',
            self::SELLED =>'Vendu',
            self::BUYING =>'Achat',
            self::DEAD =>'Mort',
        };
    }
}
