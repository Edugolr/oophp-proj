<?php

namespace Chai17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHandCreateObjectTest extends TestCase
{
    // Construct new DiceHand without argument
    public function testCreateObjectNoArguments()
    {
        $dice = new DiceHand();
        $this->assertInstanceOf("\Chai17\Dice\DiceHand", $dice);
        $res = $dice->getNumberOfDices();
        $exp = 5;
        $this->assertEquals($exp, $res);
    }
    // check return value null on roll function
    public function testRoll()
    {
        $dice = new DiceHand();
        $this->assertInstanceOf("\Chai17\Dice\DiceHand", $dice);
        $res = $dice->roll();
        $exp = null;
        $this->assertEquals($exp, $res);
    }
    // check return type on values array and contains ints
    public function testValues()
    {
        $dice = new DiceHand();
        $this->assertInstanceOf("\Chai17\Dice\DiceHand", $dice);
        $dice->roll();
        $res = $dice->values();

        foreach ($res as $value) {
            $this->assertInternalType('int', $value);
        }
        $this->assertInternalType('array', $res);
    }
    //check return type on sum()
    public function testSum()
    {
        $dice = new DiceHand();
        $this->assertInstanceOf("\Chai17\Dice\DiceHand", $dice);
        $dice->roll();
        $res = $dice->sum();
        $exp = "int";
        $this->assertInternalType($exp, $res);
    }
    //check return type on average()
    public function testaverage()
    {
        $dice = new DiceHand();
        $this->assertInstanceOf("\Chai17\Dice\DiceHand", $dice);
        $dice->roll();
        $res = $dice->average();
        $exp = "float";
        $this->assertInternalType($exp, $res);
    }
    // check return value on getSides
    public function testgetSides()
    {
        $dice = new DiceHand(1, 3);
        $this->assertInstanceOf("\Chai17\Dice\DiceHand", $dice);
        $dice->roll();
        $res = $dice->getSides();
        $exp = 3;
        $this->assertEquals($exp, $res);
    }
}
