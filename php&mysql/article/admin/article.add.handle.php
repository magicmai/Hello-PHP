<?php

	require_once('../connect.php');

	date_default_timezone_set('Asia/Shanghai');

	// 把传递过来的信息入库，在入库之前对所有的信息进行检验。
	// print_r($_POST);
	if (!(isset($_POST['title']) && (!empty($_POST['title'])))) {
		echo '<script>alert("标题不能为空！"); window.location.href = "article.add.php";</script> ';
		exit();
	}
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];

	// $dateline = date('Y-m-d H:i:s',time());  // 如何传入格式化的时间值？
	$dateline = time();

	$insertsql = "INSERT INTO article (title, author, description, content, dateline) VALUES ('$title', '$author', '$description', '$content', $dateline)";

	echo $insertsql;

	if (mysqli_query($con, $insertsql)) {
		echo '<script>alert("发布文章成功啦~"); window.location.href = "article.add.php";</script>';
	} else {
		echo mysqli_error($con);
		echo '<script>alert("发布文章失败！");</script>';
	}
 ?>
 