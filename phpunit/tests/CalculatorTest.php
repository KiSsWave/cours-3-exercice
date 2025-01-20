<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->add(1, 2);
        $this->assertEquals(3, $result);
        $this->assertIsFloat($result);
    }

    public function testSub()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->sub(2, 1);
        $this->assertEquals(1, $result);
        $this->assertIsFloat($result);
    }

    public function testMul()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->mul(2, 3);
        $this->assertEquals(6, $result);
        $this->assertIsFloat($result);
    }

    public function testDiv()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->div(6, 3);
        $this->assertEquals(2, $result);
        $this->assertIsFloat($result);
    }

    public function testPow()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->pow(2, 3);
        $this->assertEquals(8, $result);
        $this->assertIsFloat($result);
    }

    public function testSqrt()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->sqrt(9);
        $this->assertEquals(3, $result);
        $this->assertIsFloat($result);
    }

    public function testSplitFloat()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->splitFloat(3.14159);
        $this->assertEquals(["left" => 3, "right" => 14159], $result);
        $this->assertIsArray($result);
    }

    public function testGenerateTandomCalculatorName()
    {
        $calculator = new \App\Calculator();
        $result = $calculator->generateRandomCalculatorName();
        $this->assertIsString($result);
    }




}
