<?php

namespace App\Enum;

enum Sale : int {
    case APROVED = 1;
    case REJECTED = 0;

    public static function value() : array{
        return array_column(self::cases(), "name", "value");
    }
}
