<?php

namespace Chai17\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class DiceGame.
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 */
class DiceGameCreateObjectTest extends TestCase
{
    // Test winning point return value
    public function testWinningPoint()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setWinningPoint(50);
        $res = $diceGame->getWinningPoint();
        $exp = 50;
        $this->assertEquals($exp, $res);
    }
    // test return value on get/setPlayerName
    public function testPlayerName()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setPlayerName("Claes");
        $res = $diceGame->getPlayerName();
        $exp = "Claes";
        $this->assertEquals($exp, $res);
    }
    // test return value getComputerName
    public function testComputerName()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setComputerName("Calvin");
        $res = $diceGame->getComputerName();
        $exp = "Calvin";
        $this->assertEquals($exp, $res);
    }
    // test returntype on get activename
    public function testActiveName()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setPlayerName("Claes");
        $res = $diceGame->getActiveName();
        $exp = "string";
        $this->assertInternalType($exp, $res);
    }
    // test change player
    public function testChangePlayer()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setPlayerName("Claes");
        $diceGame->setComputerName("Calvin");
        $diceGame->changePlayer();
        //change check
        $res = $diceGame->getActiveName();
        $exp = "Calvin";
        $this->assertEquals($exp, $res);

        // change player again
        $diceGame->changePlayer();

        // check if the else works
        $res = $diceGame->getActiveName();
        $exp = "Claes";
        $this->assertEquals($exp, $res);
    }
    public function testTurnSum()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->roll();
        $diceGame->turnSums();
        $res = $diceGame->getTurnSums();
        $exp = $diceGame->sum();
        $this->assertEquals($exp, $res[0]);

        // test reset turnsum
        $diceGame->resetTurnsSums();
        $res = $diceGame->getTurnSums();
        $exp = [];
        $this->assertEquals($exp, $res);
    }
    public function testgetTurnTotal()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->roll();
        $diceGame->turnSums();
        $res = $diceGame->getTurnTotal();
        $exp = $diceGame->sum();
        $this->assertEquals($exp, $res);

        // second roll
        $diceGame->roll();
        $diceGame->turnSums();
        $res = $diceGame->getTurnTotal();
        $exp += $diceGame->sum();
        $this->assertEquals($exp, $res);
    }
    public function testsave()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setPlayerName("Claes");
        $diceGame->roll();
        $diceGame->turnSums();
        $exp = $diceGame->sum();
        $diceGame->save();
        $res = $diceGame->getPlayerTotal();
        $this->assertEquals($exp, $res);

        //computer player test
        $diceGame->resetTurnsSums();
        $diceGame->changePlayer();
        $diceGame->setComputerName("Marvin");
        $diceGame->roll();
        $diceGame->turnSums();
        $exp = $diceGame->sum();
        $diceGame->save();
        $res = $diceGame->getComputerTotal();
        $this->assertEquals($exp, $res);
    }

    public function testcheckOne()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $test[0] = 1;
        $res = $diceGame->checkOne($test);

        // check type
        $exp = "bool";
        $this->assertInternalType($exp, $res);

        //check return value true
        $exp = true;
        $this->assertEquals($exp, $res);

        //check return value false
        $test[0] = 2;
        $res = $diceGame->checkOne($test);
        $exp = false;
        $this->assertEquals($exp, $res);

        //test without input
        $res = $diceGame->checkOne();
        $exp = false;
        $this->assertEquals($exp, $res);
    }

    public function testcheckWinner()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setWinningPoint(20);
        $res = $diceGame->checkWinner();
        $exp = "bool";
        $this->assertInternalType($exp, $res);
    }

    public function testtoString()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $exp = "This is a DiceGame class";
        $res = $diceGame;
        $this->assertEquals($exp, $res);
    }

    public function testcomputerTurn()
    {
        $diceGame = new DiceGame();
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->changePlayer();
        $diceGame->setComputerName("Marvin");
        $diceGame->roll();
        $diceGame->turnSums();
        $diceGame->save();
        $res = $diceGame->computerTurn();
        $exp = "string";
        $this->assertInternalType($exp, $res);

        $diceGame = new DiceGame(6);
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setWinningPoint(100);
        $diceGame->changePlayer();
        $diceGame->setComputerName("Marvin");
        $diceGame->roll();
        $diceGame->turnSums();
        $diceGame->save();
        $res = $diceGame->computerTurn();
        $exp = "save";
        $this->assertEquals($exp, $res);

        $diceGame = new DiceGame(1);
        $this->assertInstanceOf("\Chai17\Dice\DiceGame", $diceGame);
        $diceGame->setWinningPoint(100);
        $diceGame->changePlayer();
        $diceGame->setComputerName("Marvin");
        $diceGame->roll();
        $diceGame->turnSums();
        $diceGame->save();
        $res = $diceGame->computerTurn();
        $exp = "roll";
        $this->assertEquals($exp, $res);
    }
}
