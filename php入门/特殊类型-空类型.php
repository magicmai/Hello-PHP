<?php 
 error_reporting(0); //禁止显示PHP警告提示

 $var;
 var_dump($var); //NULL

 $var1 = null;
 var_dump($var1); //NULL

 $var2 = NULL;
 var_dump( $var2); //NULL

 $var3 = "节日快乐！";
 unset($var3);  //unset()方法; 释放$var3
 var_dump($var3); //NULL
?>