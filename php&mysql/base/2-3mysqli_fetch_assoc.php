<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT * FROM test");

$arr = mysqli_fetch_assoc($res);

print_r($arr);

/**
Array
(
    [id] => 1
    [name] => 苹果
    [num] => 3
    [price] => 0
)
 */

?>