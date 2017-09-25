<?php 

require_once('../connect.php');

$id = $_POST['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$dateline = time();
$updatesql = "UPDATE article SET title='$title', author='$author', description='$description', content='$content', dateline=$dateline WHERE id=$id";

if (mysqli_query($con, $updatesql)) {
	echo '<script>alert("修改成功"); window.location .href="article.manage.php";</script>';
} else {
	// echo mysqli_error($con);		
	echo '<script>alert("修改失败！"); window.location .href="article.manage.php";</script>';
}

?>