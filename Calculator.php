<?php

require_once 'Calc.php';
 
try {
    if (isset($argv[1]) && count($argv) > 0) {
        if ($argv[1] == 'sum') {
            $arg_value = $argv[2] ?? 0 ;
            $cal = new Calc($arg_value);

            if ($argv[1] == 'sum') {
                $cal->sum();
            }
        } else {
            throw new Exception('No function exist with this name.');
        }
    } else {
        throw new Exception('Wrong parameters.');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
