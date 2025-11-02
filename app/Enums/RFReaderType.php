<?php

namespace App\Enums;

enum RFReaderType
{
    public const MOBILE="Mobile";
    public const FIXE="FIXE";
    public static function values(): array
    {
        return [
            self::MOBILE,
            self::FIXE,
        ];
    }
}
