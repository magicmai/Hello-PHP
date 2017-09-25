<?php 

require_once('../connect.php');

$id = $_GET['id'];
// $deletesql = 'DELETE FROM article WHERE id=6';
$deletesql = "DELETE FROM article WHERE id=$id";  // 注意要使用双引号

if (mysqli_query($con, $deletesql)) {
	echo '<script>alert("删除成功"); window.location .href="article.manage.php";</script>';
} else {
	echo mysqli_error($con);		
	// echo '<script>alert("删除失败！"); window.location .href="article.manage.php";</script>';
}

 ?>