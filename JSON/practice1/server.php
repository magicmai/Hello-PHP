<?php 

// 连接数据库
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'info');
mysqli_query($con, 'set names utf8');



$inAjax = @$_GET['inAjax'];
$do = @$_GET['do'];
$do = $do? $do : 'default';

if (!$inAjax) {
	return false;
}



switch ($do) {
	case 'checkMember':
		$username = @$_GET['username'];
		$sql = "SELECT *FROM check_member WHERE username = '$username'";
		// echo $sql;
		$res = mysqli_query($con, $sql);
		$res_arr = mysqli_fetch_assoc($res);
		// print_r($res_arr);
		echo (!empty($res_arr))? json_encode($res_arr) : null;
		break;
	
	case 'default':
		die('nothing');
		break;
}






// 1. 连接数据库进行 数据读取




// 2. 把数据库查询返回的对象，转换成 JSON 格式，再返回给客户端


 ?>