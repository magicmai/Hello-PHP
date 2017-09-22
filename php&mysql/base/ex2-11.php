<?php
//连接数据库
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, "set names 'utf8'");

if($con) {
    echo "连接数据库成功！";
} else {
    echo "连接数据库失败！";
}

//已知的数据变量有
$name = '李四';
$age = 18;
$class = '高三一班';

//在这里进行数据查询
$sql = "insert into user(name, age, class) values('$name', '$age', '$class')";
echo $sql;

if($uid = mysqli_query($con, $sql)){
    echo $uid;
    echo "插入数据成功！";
}else{
    mysqli_error($con);
    echo "插数据入失败！";
}

?>