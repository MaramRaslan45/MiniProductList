<?php

namespace app\helpers;

class Utilhelper{

   public static function randomString($n)
{
    $charachters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str='';
    for($i=0;$i<$n;$i++){
    $index=rand(0,strlen($charachters)-1);
    $str .=$charachters[$index];
    }
    return $str;
}
}