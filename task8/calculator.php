<?php

class Calculator
{
    public function Add($numbers = 0)
    {
        $result = 0;
        $errors = array();
        $negative_numbers = array();
        if(!empty($numbers)){
            $numbers = Calculator::getNumbers($numbers);
            foreach ($numbers as $key => $number) {
                if(is_numeric($number)){
                    if($number < 0){
                        $negative_numbers[] = $number;
                    }

                    if($number <= 1000){
                        $result += $number;
                    }

                }else{
                    $errors[] = $number;
                }
            }
        }

        if(!empty($negative_numbers)){
            echo "Negative numbers {".implode(',', $negative_numbers)."} are not allowed.\n";
            exit();
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

    public function Multiply($numbers = 0)
    {
        $result = 1;
        $errors = array();
        $negative_numbers = array();
        if(!empty($numbers)){
            $numbers = Calculator::getNumbers($numbers);
            foreach ($numbers as $key => $number) {
                if(is_numeric($number)){
                    if($number < 0){
                        $negative_numbers[] = $number;
                    }

                    if($number <= 1000){
                        $result = $number*$result;
                    }

                }else{
                    $errors[] = $number;
                }
            }
        }

        if(!empty($negative_numbers)){
            echo "Negative numbers {".implode(',', $negative_numbers)."} are not allowed.\n";
            exit();
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

    public function getNumbers($numbers){
        $input = explode('\\',$numbers);
        $delimeter = $input[2];
        $numbers = preg_split('/'.$delimeter.'/', $input[4] );
        return $numbers;
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