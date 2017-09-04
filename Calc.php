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
     *
     * @throws Exeception If arguments are more than two
     *
     * @return int
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
     * Perform operation on arguments based on parameter passed.
     *
     * @param string
     *
     * @throws an Exception if number is negative
     *
     * @return int
     */
    public function operation($op)
    {
        try {
            if ($op === '+') {
                $res = 0;
            } elseif ($op === '*') {
                $res = 1;
            } else {
                throw new InvalidArgumentException('Invalid parameter.');
            }

            $delimiter = ',';
            //Assuming this list of delimiters
            $delimiters = [';', ',', '.', ':'];

            $data = explode('\\', $this->values);
            if (count($data) == 3) {
                $delimiter = $data[1];
                $numbers = $data[2];
            } else {
                $numbers = $data[0];
            }

            if (in_array($delimiter, $delimiters)) {
                // Replaces any \n characters with comma
                $numbers = str_replace('n', $delimiter, $numbers);
                $numbers = explode($delimiter, $numbers);
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

                        throw new Exception('Negative numbers ['.$neg.'] not allowed.');
                    }

                    if ($op === '+') {
                        $res += $num;
                    } else {
                        $res *= $num;
                    }
                }
                echo $res;
            } else {
                throw new Exception('Unknown delimiter.');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
