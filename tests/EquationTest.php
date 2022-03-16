<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EquationTest extends TestCase
{
    public function testSolve(): void
    {
        // p3
        $this->assertEmpty(
            Equation::solve(1, 0, 1)
        );

        // p5
        $this->assertEquals(
            [1, -1], Equation::solve(1, 0, -1)
        );

        // p7
        $this->assertEquals(
            [-1, -1], Equation::solve(1, 2, 1)
        );

        // p11
        $this->assertEquals(
            [-0.1002, -0.1002], Equation::solve(0.1, 2.004, 10.04)
        );

        // p9
        $this->expectException(InvalidArgumentException::class);
        Equation::solve(0.00001, 0, 0);
    }
}
