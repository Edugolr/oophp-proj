<?php

namespace Chai17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DiceCreateObjectTest extends TestCase
{
     // Construct new Dice without argument
    public function testCreateObjectNoArguments()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Chai17\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }
    // Construct new dice with argument
    public function testCreateObjectWithArgument()
    {
        $dice = new Dice(3);
        $this->assertInstanceOf("\Chai17\Dice\Dice", $dice);

        $res = $dice->getSides();
        $exp = 3;
        $this->assertEquals($exp, $res);
    }
    // controle function roll() null (no return value)
    public function testRoll()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Chai17\Dice\Dice", $dice);

        $res = $dice->roll();
        $exp = null;
        $this->assertEquals($exp, $res);
    }
    // controle return type from getLastRoll
    public function testTypeGetLastRoll()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\Chai17\Dice\Dice", $dice);
        $dice->roll();
        $res = $dice->getLastRoll();
        $this->assertInternalType('int', $res);
    }
}
