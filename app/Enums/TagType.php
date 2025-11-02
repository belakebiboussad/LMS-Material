<?php

namespace App\Enums;

enum TagType
{
    public const BIRTH="naissance";
    public const REMPLACEMENT="remplacement";
    public static function values(): array
    {
        return [
            self::BIRTH,
            self::REMPLACEMENT,
        ];
    }
}
