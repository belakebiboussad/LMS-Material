<?php

namespace App\Enums;

enum Transaction: string
{
    case SELL = 'sell';
    case BUY = 'buy';
    case INTERNAL= 'internal';
    public function label(){
        return match($this) {
            self::SELL =>'Vendre',
            self::BUY =>'Acheter',
            self::INTERNAL =>'Interne',
        };
    }
}
