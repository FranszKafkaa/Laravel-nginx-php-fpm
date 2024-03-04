<?php

namespace App\Enum;

enum Sale: int
{
    case APROVED = 1;
    case CANCELLED = 0;

    public static function value(int $value): string
    {
        return [
            self::APROVED => 'Aproved',
            self::CANCELLED => 'Cancelled',
        ][$value];
    }
}
