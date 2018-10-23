<?php

namespace Chai17\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
class Dice
{
    protected $sides;
    private $lastroll;

    public function __construct(int $sides = 6)
    {
        $this->sides  = $sides;
    }
    public function roll()
    {
        $this->lastroll = rand(1, $this->sides);
    }
    public function getLastRoll()
    {
        return $this->lastroll;
    }
    public function getSides()
    {
        return $this->sides;
    }
}
