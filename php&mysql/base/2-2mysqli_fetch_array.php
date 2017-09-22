<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT * FROM test");


/*****************************************
mysqli_fetch_array 的第二个参数：
1、MYSQL_ASSOC - 关联数组
2、MYSQL_NUM   - 数字数组
3、MYSQL_BOTH  - 默认
*****************************************/

/*********** 关联 + 索引数组 ************/
$arr = mysqli_fetch_array($res);

// Array ( [0] => 1 [id] => 1 [1] => 苹果 [name] => 苹果 [2] => 3 [num] => 3 [3] => 0 [price] => 0 )
// 
// $arr = mysqli_fetch_array($res, MYSQL_BOTH);
// 
// Array ( [0] => 1 [id] => 1 [1] => 苹果 [name] => 苹果 [2] => 3 [num] => 3 [3] => 0 [price] => 0 )

/*************** 关联数组 ***************/
// $arr = mysqli_fetch_array($res, MYSQL_ASSOC);
// 
// Array ( [id] => 1 [name] => 苹果 [num] => 3 [price] => 0 )

/*************** 索引数组 ***************/
// $arr = mysqli_fetch_row($res);
// 
// $arr = mysqli_fetch_array($res, MYSQL_NUM);
// 
// Array ( [0] => 1 [1] => 苹果 [2] => 3 [3] => 0 )


print_r($arr);

/**********************************************************
mysqli_fetch_row 和 mysqli_fetch_array 的区别：
1、mysqli_fetch_row 取一条数据产生一个索引数组
2、mysqli_fetch_array 默认状态下取一条数据产生一个索引数组和一个关联数组
3、mysqlii_fetch_row 比 mysqli_fetch_array 快，因为数字下标会比字符串下标快
**********************************************************/


echo '<br>';
echo $arr['name'];  



?>