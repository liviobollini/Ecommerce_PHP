<?php
function generatePassword($length)
{
    $password = '';
    $possibleChars =
   array(
'0123456789',
 'BCDEFGHIJKLMNOPQRSTUVWXYZ',
 '_*+!><-:/',
 'bcdefghijklmnopqrstuvwxyz',
 '0123456789bcdefghijklmnopqrstuvwxyz
 BCDEFGHIJKLMNOPQRSTUVWXYZ'
	);
    $Ind_Array = 0;
    $Ind_Password = 0;
    while ($Ind_Password < $length) {
        $char = substr(
            $possibleChars[$Ind_Array],
            mt_rand(0, strlen($possibleChars[$Ind_Array])-1),
            1
        );
        if (!strstr($password, $char)) {
            $password .= $char;
            $Ind_Password++;
            if ($Ind_Array < 4) {
                $Ind_Array++;
            }
        }
    }
    $password= str_shuffle($password);
    return $password;
};