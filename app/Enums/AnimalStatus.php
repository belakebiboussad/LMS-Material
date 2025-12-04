<?php

namespace App\Enums;

enum AnimalStatus: string
{
    case SELLED = 'selled';
    case BUYED = 'buyed';
    case DEAD = 'dead';
    public function label(){
        return match($this) {
            self::SELLED =>'Vendu',
            self::BUYED =>'Achat',
            self::DEAD =>'Mort',
        };
    }
}
