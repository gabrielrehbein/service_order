<?php

namespace App\Services\Generic;

class HandleNumericService
{
    public static function convertBrazilianMoneyToFloat(string $value): float {
        $value = str_replace(",", ".", $value);

        return (float) $value;
    }
}
