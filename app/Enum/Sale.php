<?php

namespace App\Enum;

enum Sale: int
{
    case APPROVED = 1;
    case CANCELLED = 0;

    public static function value(int $value): string
    {
        return [
            self::APPROVED => 'Approved',
            self::CANCELLED => 'Cancelled',
        ][$value];
    }
}
