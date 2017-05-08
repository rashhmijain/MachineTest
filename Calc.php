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
     */
    public function add()
    {
        try {
            $numbers = explode(',', $this->values);
            echo array_sum($numbers);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
