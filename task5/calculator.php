<?php

class Calculator
{
    public function Add($numbers = 0)
    {
        $input = explode('\\',$numbers);
        $delimeter = $input[2];
        $numbers = preg_split('/'.$delimeter.'/', $input[4] );
        $result = 0;
        $errors = array();
        if(!empty($numbers)){
            foreach ($numbers as $key => $number) {
                if(is_numeric($number)){
                    if($number < 0){
                        echo "Negative numbers are not allowed.\n";
                        exit();
                    }
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