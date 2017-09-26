<?php 

require_once('connect.php');
$id = intval($_GET['id']);  // 防止注入，带非法字符也要转为数字
$sql = "SELECT * FROM article WHERE id=$id";
// echo $sql;
$query = mysqli_query($con, $sql);
if ($query && mysqli_num_rows($query)) {
	$row = mysqli_fetch_assoc($query);
} else {
	echo '文章不存在！';
	exit();
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>文章发布系统</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="default.css" rel="stylesheet" />
</head>

<body>
	<div id="wrapper">

		<!-- start header -->
		<div id="header">
			<div id="logo">
				<h1><a href="#">php与mysql探秘</a></h1>
				<h2></h2>
			</div>
			<div id="menu">
				<ul>
					<li class="active"><a href="article.list.php">文章</a></li>
					<li><a href="about.php">关于我们</a></li>
					<li><a href="contact.php">联系我们</a></li>
				</ul>
			</div>
		</div><!-- end header -->

	</div>

	<!-- start page -->
	<div id="page">

		<!-- start content -->
		<div id="content">
			<div class="post">
				<h1 class="title"><?php echo $row['title']; ?>
					<span style="color: #ccc; font-size: 14px;">	作者：<?php echo $row['author']; ?></span>
				</h1>
				<div class="entry">
					<?php echo $row['content']; ?>
				</div>
			</div>
		</div><!-- end content -->
		

		<div style="clear: both;">&nbsp;</div>
	</div><!-- end page -->

	<!-- start footer -->
	<div id="footer">
		<p id="legal"></p>
	</div><!-- end footer -->

</body>
</html>