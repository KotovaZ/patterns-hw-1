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

    public function testSolveReturnsTwoRealSquereRoots()
    {
        $roots = $this->calculator->solve(1, 0, -1);
        $this->assertCount(2, $roots);
        $this->assertEquals(1, $roots[0]);
        $this->assertEquals(-1, $roots[1]);
    }

    public function testSolveReturnsOneRootOfMultiplicity2()
    {
        $roots = $this->calculator->solve(1, 2, 1);
        $this->assertCount(1, $roots);
        $this->assertEquals(-1, $roots[0]);
    }
}
