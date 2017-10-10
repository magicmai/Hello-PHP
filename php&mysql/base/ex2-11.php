<?php
//连接数据库
$con = mysqli_connect('127.0.0.1', 'root', '');
// echo mysqli_error($con);
mysqli_select_db($con, 'info');
// echo mysqli_error($con);
mysqli_query($con, "set names 'utf8'");
//已知的数据变量有
$name = '李四';
$age = 18;
$class = '高三二班';

//在这里进行数据查询
$sql = "insert into code1(name,age,class) values('$name', $age, '$class')\n";
// echo $sql;

mysqli_query($con, $sql);
// echo mysqli_error($con);

$uid = mysqli_insert_id($con);
// echo mysqli_error($con);
echo $uid;

?>