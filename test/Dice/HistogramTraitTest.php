<?php

namespace Chai17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceGame.
 */
class HistogramTest extends TestCase
{
    public function testHistogramSerie()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->roll();
        $diceGame->setHistogramSerie($diceGame->values());
        $res = $diceGame->getHistogramSerie();
        $exp = $diceGame->values();
        $this->assertEquals($exp, $res);

        $res = $diceGame->printHistogram();
        $exp = "string";
        $this->assertInternalType($exp, $res);

        $res = $diceGame->printHistogram(1, 5);
        $this->assertInternalType($exp, $res);
    }
}
