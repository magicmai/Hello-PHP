<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT COUNT(*) FROM fruitshop");

// echo mysqli_num_rows($res);  // 1
// print_r(mysqli_fetch_row($res));  // Array ( [0] => 4 )

//$arr = mysqli_fetch_row($res);
// echo $arr[0];  // 4



// echo mysql_result($res, 2, 'name');  
//mysqli 扩展中没有这个函数！