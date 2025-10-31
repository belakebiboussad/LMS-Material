<?php

namespace App\Enums;

final class Sexe
{
   public const Male="masculin";
   public const FEMALE="féminin";
    public static function values(): array
    {
        return [
            self::Male,
            self::FEMALE,
        ];
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }  
}
