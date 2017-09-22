<?php

// 连库、选库、设定字符集
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');

// 发指令、取数据
$res = mysqli_query($con, "SELECT COUNT(*) FROM fruitshop");

// mysql 的增删改
// 通过 mysql_query 向 mysql 数据库传递 insert, update, delete 语句
// if(mysqli_query($con, "UPDATE fruitshop SET num = 10 WHERE id = 1")) {
// 	echo '修改成功，修改了的数据条数是';
// 	echo mysqli_affected_rows($con);  // 连接标志符，当修改的数据和之前一样的时候，影响条数为0
// } else {
// 	echo mysqli_error($con);
// 	echo '修改失败';
// }
mysqli_query($con, "INSERT INTO fruitshop VALUES (7, '西瓜', 1, 12)");

if(mysqli_query($con, "INSERT INTO fruitshop VALUES (8, '菠萝', 1, 13)")) {
	echo '插入成功，插入了的数据条数是';
	echo mysqli_affected_rows($con);  // 只能获取到前一次操作所影响的行数
} else {
	echo mysqli_error($con);
	echo '插入失败';
}