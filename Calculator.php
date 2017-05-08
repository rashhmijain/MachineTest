<?php

require_once 'Calc.php';
 
try {
    if (isset($argv[1]) && count($argv) > 0) {
        if ($argv[1] == 'sum' || $argv[1] == 'add') {
            $arg_value = $argv[2] ?? 0 ;
            $cal = new Calc($arg_value);

            if ($argv[1] == 'sum') {
                $cal->sum();
            } elseif ($argv[1] == 'add') {
                $cal->add();
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
