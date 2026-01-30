<?php

namespace SimpleProject\UnitTests;

require_once 'MathOperations.php'; 

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestWith;
use EvaluationSampleCode\MathOperations; 

final class MathOperationsTest extends TestCase
{
    private MathOperations $mathOperations;


    protected function setUp(): void
    {          
        $this->mathOperations = new MathOperations();
    }

    #[TestWith([1, 1, 2])]
    #[TestWith([0, 12, 12])]
    #[TestWith([-5, 13, 8])]
    #[TestWith([-54, -98, -152])]
    public function testadd_With2Numbers_ShouldReturnCorrectNumber(int $numberOne, int $numberTwo, int $exceptedResult): void
    {
        $result = $this->mathOperations->add($numberOne, $numberTwo);

        $this->assertSame($exceptedResult, $result);
    }

    #[TestWith([-7, 0])]
    #[TestWith([5, 0])]
    #[TestWith([854, 0])]
    public function testDivide_WithZero_ShouldThrowException(int $numberOne, int $numberTwo): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mathOperations->divide($numberOne, $numberTwo);
    }

    #[TestWith([-7])]
    #[TestWith([-5])]
    #[TestWith([-541])]
    public function testGetOddNumbers_WithNegativeNumbers_ShouldThrowException(int $limit): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->mathOperations->getOddNumbers($limit);
    }
    
    
}