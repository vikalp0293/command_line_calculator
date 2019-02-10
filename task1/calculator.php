<?php

class Calculator
{
    public function sum($numbers = 0)
    {
        $result = 0;
        $errors = array();
        $numbers = explode(',', $numbers);
        if(!empty($numbers)){
            foreach ($numbers as $key => $number) {
                if(is_numeric($number)){
                    $result += $number;
                }else{
                    $errors[] = $number;
                }
            }
        }
        echo $result."\n";
        if(!empty($errors)){
            if(count($errors) == 1){
                echo "Error : ".implode(',', $errors)." is not a number\n";
            }else{
                echo "Error : ".implode(',', $errors)." are not numbers\n";
            }
        }
    }
}


// position [0] is the script's file name
array_shift($argv);
$className = 'Calculator';
$funcName = array_shift($argv);
if(empty($funcName)){
    echo "Please enter operation\n";
    exit();
}
echo "Calling '$className::$funcName'...\n";
call_user_func_array(array($className, $funcName), $argv);

?>