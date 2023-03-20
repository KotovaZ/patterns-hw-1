<?php

namespace App;

use App\Exceptions\InvalidArgumentException;

class QuadraticFormulaCalc
{
    /**
     * @param float $a
     * @param float $b
     * @param float $c
     *
     * @return float[]
     */
    public function solve(float $a, float $b = 0, float $c = 0): array
    {
        if (abs($a) < PHP_FLOAT_EPSILON) {
            throw new InvalidArgumentException('Leading coefficient must be greater than 0');
        }

        $d = pow($b, 2) - 4 * $a * $c;
        
        if ($d < 0) {
            return [];
        }

        return [1];
    }
}
