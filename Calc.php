<?php

/**
 * Calc implements the calulation methods.
 */

class Calc
{
    /** @var string Should contain command line arguments */
    private $values;

    public function __construct($params)
    {
        $this->values = $params;
    }
    
    /**
     * Count the sum of the arguments upto 2 numbers.
     * @return integer
     * @throws Exeception If arguments are more than two
     */
    public function sum()
    {
        try {
            $numbers = explode(',', $this->values);
            if (count($numbers) > 2) {
                throw new Exception('You can add upto 2 numbers.');
            }
            echo array_sum($numbers);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Count the sum of the arguments upto n numbers.
     * @return integer
     * @throws an Exception if number is negative
     */
    public function add()
    {
        try {
            $sum = 0;
            // Replaces any \n characters with comma
            $numbers = str_replace("n", ",", $this->values);
            $numbers = explode(',', $numbers);
            foreach ($numbers as $num) {
                //Ignoring value above 1000
                if ($num > 1000) {
                    continue;
                }

                //Throwing Exception if number is negative
                if ($num < 0) {
                    $neg = array_filter($numbers, function ($x) {
                        return $x < 0;
                    });
                    $neg = implode(',', $neg);
                    throw new Exception('Negative numbers [' . $neg . '] not allowed.');
                }
                $sum += $num;
            }
            echo $sum;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
