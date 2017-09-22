<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT name, num FROM test");
if($res) {
	echo '指令发送成功！<br/>';
}

// print_r(mysqli_fetch_row($res));  // Array ( [0] => 苹果 [1] => 3 )

while ($row = mysqli_fetch_row($res)) {
	echo $row[0] . $row[1] . "个<br/>";
	/***********
	苹果3个
	芒果10个
	荔枝20个
	***********/
}

?>