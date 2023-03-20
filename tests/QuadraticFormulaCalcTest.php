<?php

require_once $_SERVER['DOCUMENT_ROOT'] . 'vendor/autoload.php';

use App\Exceptions\InvalidArgumentException;
use App\QuadraticFormulaCalc;
use PHPUnit\Framework\TestCase;

final class QuadraticFormulaCalcTest extends TestCase
{
    protected QuadraticFormulaCalc $calculator;

    public function setUp(): void
    {
        $this->calculator = new QuadraticFormulaCalc;
    }

    public function testLeadingCoefficientException()
    {
        $this->calculator->solve(PHP_FLOAT_EPSILON, 1);
        $this->expectException(InvalidArgumentException::class);
        $this->calculator->solve(0, 1);
    }

    public function testNoRoots()
    {
        $roots = $this->calculator->solve(1, 0, 1);
        $this->assertCount(0, $roots);
    }
}
