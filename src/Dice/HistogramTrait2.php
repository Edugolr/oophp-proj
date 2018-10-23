<?php

namespace chai17\Dice;

/**
 * A trait implementing histogram for integers.
 */
trait HistogramTrait2
{
    /**
     * @var array $serie  The numbers stored in sequence.
     */
    private $serie = [];



    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()
    {
        return $this->serie;
    }
    public function setHistogramSerie($roll)
    {
        foreach ($roll as $value) {
            $this->serie[] = $value;
        }
    }


    /**
     * Print out the histogram, default is to print out only the numbers
     * in the serie, but when $min and $max is set then print also empty
     * values in the serie, within the range $min, $max.
     *
     * @param int $min The lowest possible integer number.
     * @param int $max The highest possible integer number.
     *
     * @return string representing the histogram.
     */
    public function printHistogram($min = null, $max = null)
    {
        asort($this->serie);
        $histogram="";

        $testa = array_count_values($this->serie);
        if (isset($min) && isset($max)) {
            for ($i=$min; $i <= $max; $i++) {
                if (array_key_exists($i, $testa)) {
                    $histogram.= $i . ":   " . str_repeat("*", $testa[$i]) . "\r\n";
                } else {
                    $histogram.= $i . ":   " . "\r\n";
                }
            }
        } else {
            foreach ($testa as $key => $value) {
                $histogram.= $key . ":   " . str_repeat("*", $value) . "\r\n";
            }
        }
        return $histogram;
    }
}
