<?php

if (function_exists('mysqli_connect')) {
    // echo 'mysqli扩展已经安装。';
}



/***********************************连接数据库
mysqli_connect
作  用：建立数据库连接
参  数：数据库服务器地址，数据库用户名，密码
返回值：1、连接成功 --> mysql连接标识符
        2、连接失败 --> false
*********************************************/
// if ($con = mysqli_connect('localhost', 'root', '')) {
// 	echo '连接成功！！';
// } else {
// 	echo '连接失败！！';
// }
/**********************************
报错：Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead
解决：mysql_connect('localhost', 'root', '') 改为 mysqli_connect('localhost', 'root', '')
 *********************************/



/***********************************选择数据库
mysqli_select_db
作  用：选择数据库
参  数：数据库名称（，mysql连接标识符，可选）
返回值：1、选择成功 --> true
        2、选择失败 --> false
*********************************************/
if (mysqli_select_db($con, 'info')) {	
	echo '数据库选择成功！！';
} else {
	echo '数据库选择失败！！';
}



/*****************************************mysql查询
mysqli_query
作  用：执行一条MySQL查询
参  数：sql命令（，mysql连接标识符，可选）
返回值：1、执行成功，目前已知的是 insert 成功 --> true
        2、执行失败 --> false
***************************************************/
$res = mysqli_query($con, "SELECT * FROM test");
$row = mysqli_fetch_array($res);
var_dump($row);


/*************************************query插入数据
注意：所有字段都要写进去（id、name），或者不写

$ins = "INSERT INTO test (id, name) VALUES (0, 'abc')";
$ins = "INSERT INTO test VALUES (0, 'abc')";
if (mysqli_query($con, $ins)) {	
	echo '数据插入成功！！';
} else {
	echo mysqli_error($con);   // 查看错误信息！
	echo '数据插入失败！！';
}
**************************************************/

$id = 1;
$name = '荔枝';
// 注意正确使用单双引号！
$sql = "INSERT INTO test (id, name) VALUES ('$id', '$name')";  

mysqli_query($con, 'set names utf8');

if (mysqli_query($con, $sql)) {	
	echo '数据插入成功！！';
} else {
	/******************************************mysql错误
	mysqli_error
	作  用：返回上一个MySQL操作产生的文本错误信息
	参  数：（可选mysql连接标识符）
	返回值：1、返回上一个MySQL操作产生的文本错误信息
	***************************************************/
	echo mysqli_error($con);
	echo '数据插入失败！！';
}
$uid = mysqli_insert_id($con);
echo $uid;                        /*0？？？？？？？？？？？*/



/*************************************关闭数据库连接
mysqli_close
作  用：函数关闭非持久的MySQL连接
参  数：mysql连接标识符
返回值：1、关闭成功 --> true
        2、关闭失败 --> false
***************************************************/
mysqli_close($con);  // 1