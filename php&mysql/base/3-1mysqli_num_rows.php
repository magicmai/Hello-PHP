<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT * FROM fruitshop"); 
// $res 为返回的结果集

// echo mysqli_num_rows($res);

if ($res && mysqli_num_rows($res)) {
	// 进行数据的输出
	while ($row = mysqli_fetch_row($res)) {
		echo $row[0] . '<br />';
	}
} else {
	echo '没有数据';
}


