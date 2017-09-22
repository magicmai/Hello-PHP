<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT * FROM fruitshop");



// $arr = mysqli_fetch_object($res);

// print_r($arr);
/***********************
stdClass Object
(
    [id] => 1
    [name] => 香蕉
    [num] => 3
    [price] => 12
)
***********************/

// echo $arr -> name;	// 香蕉



while ($arr = mysqli_fetch_object($res)) {
	echo $arr -> name;
	echo '<br />';
}
/******
香蕉
芒果
荔枝
榴莲
******/

?>