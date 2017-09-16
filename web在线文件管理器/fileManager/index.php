<?php
require_once 'dir.func.php';
require_once 'file.func.php';
require_once 'common.func.php';
$path = 'file';

/**
$act = $_REQUEST['act'];
$filename = $_REQUEST['filename'];

以上两句会报错：Notice: Undefined index
  
解决方法一：
$act = !empty($_REQUEST['act']) ? $_REQUEST['act'] : null;
$filename  = !empty($_REQUEST['filename']) ? $_REQUEST['filename'] : null;
 
解决方法二：
function re($str){ 
	$val = !empty($_REQUEST[$str]) ? $_REQUEST[$str] : null; 
	return $val; 
}
$act = re('act');
$filename = re('filename');

解决方法三：
*/
$act = @$_REQUEST['act'];
$filename = @$_REQUEST['filename'];

$info = readDirectory($path);
//print_r($info);
$redirect = "index.php?path={$path}";

if ($act == 'createFile') {
	// 创建文件
	// echo $path, '--';
	// echo $filename;
	$mes = createFile($path.'/'.$filename);
	alertMes($mes, $redirect);
} elseif ($act == 'showContent') {
	// 查看文件内容
	$content = file_get_contents($filename);
	// echo "<textarea readonly='readonly' cols='100 rows='10'>{$content}</textarea>";
	// 高亮显示 PHP 代码：
	// 高亮显示字符串中的 PHP 代码
	if (strlen($content)) {
		$newContent = highlight_string($content, true);
		// 高亮显示文件中的 PHP 代码 
		// highlight_file($filename);
		$str = <<<eof
			<table border="1" style="background: #ff9df1;">
				<tr>
					<td>{$newContent}</td>
				</tr>
			</table>
eof;
		echo $str;
	} else {
		alertMes('文件内容为空，请编辑后在查看', $redirect);
	}	
} elseif ($act == 'editContent') {
	// 修改文件内容
	// echo '编辑文件';
	$content = file_get_contents($filename);
	// echo $content;
	$str = <<<eof
	<form action="index.php?act=doEdit" method="post">
		<textarea name="content" cols="100" rows="5">{$content}</textarea><br />
		<input type="hidden" name="filename" value="{$filename}">
		<input type="submit" value="修改文件内容" />
	</form>
eof;
	echo $str;
} elseif ($act == 'doEdit') {
	// 修改文件内容的操作
	$content = @$_REQUEST['content'];
	// echo $content;
	if (file_put_contents($filename, $content)) {
		$mes = '文件修改成功';
	} else {
		$mes = '文件修改失败';
	}
	alertMes($mes, $redirect);
} elseif ($act == 'renameFile') {
	// 完成重命名
	$str = <<<EOF
	<form action="index.php?act=doRename" method="post">
		请填写新文件名：<input type="text" name="newname" placeholder="重命名">
		<input type="hidden" name="filename" value="{$filename}">
		<input type="submit" value="重命名">
	</form>
EOF;
	echo $str;
} elseif ($act == 'doRename') {
	// 实现重命名的操作
	$newname = @$_REQUEST['newname'];
	$mes = renameFile($filename, $newname);
	alertMes($mes, $redirect);
} elseif ($act == 'delFile') {
	// 删除文件操作
	//echo '删除文件操作';
	$mes = delFile($filename);
	alertMes($mes, $redirect);
} elseif ($act == 'downFile') {
	// 下载文件
	$mes = downFile($filename);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线文件管理器</title>
	<link rel="stylesheet" href="cikonss.css">
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css"  type="text/css"/>
	<script src="jquery-ui/js/jquery-1.10.2.js"></script>
	<script src="jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
	<script src="jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script>
		function show (dis) {
			document.getElementById(dis).style.display = 'block';
		}

		function delFile(filename) {
			if (confirm('确定要删除此文件吗？')) {
				location.href = 'index.php?act=delFile&filename=' + filename;
			}
		}

		// 弹出图片
		function showDetail(t, filename) {
			console.log('ok');
			$('#showImg').attr('src', filename);
			$('#showDetail').dialog({
				height: 'auto',
				width: 'auto',
				position: {my: 'center', at: 'center', collision: 'fit'},
				modal: false,    // 是否模式对话框
				draggable: true, // 是否允许拖拽
				resizable: true, // 是否允许拖动
				title: t,        // 对话框标题
				show: 'slide',
				hide: 'explode'
			});
		}
	</script>
</head>
<body>
<div id="showDetail" style="display: none;">
	<img id="showImg" src="" alt="">
</div>

<h1>慕课网——在线文件管理</h1>

<div id="top">
	<ul id="navi">
		<li>
			<a href="index.php" title="主目录"><span class="icon icon-small icon-square"><span class="icon-home"></span></span></a>
		</li>
		<li>
			<a href="#" title="新建文件" onclick="show('createFile')"><span class="icon icon-small icon-square"><span class="icon-file"></span></span></a>
		</li>
		<li>
			<a href="#" title="新建文件夹"><span class="icon icon-small icon-square"><span class="icon-folder"></span></span></a>
		</li>
		<li>
			<a href="#" title="上传文件"><span class="icon icon-small icon-square"><span class="icon-upload"></span></span></a>
		</li>
		<li>
			<a href="#" title="返回上级目录"><span class="icon icon-small icon-square"><span class="icon-arrowLeft"></span></span></a>
		</li>
	</ul>
</div>

<form action="index.php" method="post">
<table border="1">
	<tr id="createFolder"  style="display: none;">
		<td>请输入文件夹名称</td>
		<td>
			<input type="text" name="dirname" />
			<input type="hidden" name="path"  value="<?php echo $path;?>" />
			<input type="submit"  name="act"  value="创建文件夹" />
		</td>
	</tr>

	<tr id="createFile"  style="display:none;">
		<td>请输入文件名称</td>
		<td>
			<input type="text" name="filename" />
			<input type="hidden" name="path" value="<?php echo $path;?>" />
			<input type="hidden" name="act" value="createFile" />
			<input type="submit" value="创建文件" />	
		</td>
	</tr>

	<tr id="uploadFile" style="display:none;">
		<td>请选择要上传的文件</td>
		<td>
			<input type="file" name="myFile" />
			<input type="submit" name="act" value="上传文件" />	
		</td>
	</tr>

	<tr>
		<th>编号</th>
		<th>名称</th>
		<th>类型</th>
		<th>大小</th>
		<th>可读</th>
		<th>可写</th>
		<th>可执行</th>
		<th>创建时间</th>
		<th>修改时间</th>
		<th>访问时间</th>
		<th>操作</th>
	</tr>

	<!-- 读取目录的操作-->
	<?php
	if($info['file']) {
		$i = 1;
		foreach ($info['file'] as $val) {
			$p = $path.'/'.$val;
	?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $val;?></td>
				<td><?php $src=filetype($p) == 'file'? 'file_ico.png':'folder_ico.png';?><img src="images/<?php echo $src;?>" alt=""></td>
				<td><?php echo transByte(filesize($p));?></td>
				<td><?php $src=is_readable($p)? 'correct.png':'error.png';?><img src="images/<?php echo $src;?>" width='20px' alt=""></td>
				<td><?php $src=is_writable($p)? 'correct.png':'error.png';?><img src="images/<?php echo $src;?>" width='20px' alt=""></td>
				<td><?php $src=is_executable($p)? 'correct.png':'error.png';?><img src="images/<?php echo $src;?>" width='20px' alt=""></td>
				<td><?php echo date('Y-m-d H:m:s', filectime($p));?></td>
				<td><?php echo date('Y-m-d H:m:s', filemtime($p));?></td>
				<td><?php echo date('Y-m-d H:m:s', fileatime($p));?></td>
				<td>
<!-- 查看 -->
				<?php 
					// 得到文件扩展名
					$ext_name = explode('.', $val);
					$ext = strtolower(end($ext_name));
					$imageRxt = array('gif', 'jpg', 'jpeg', 'png');
					if (in_array($ext, $imageRxt)) {
				?>
						<a href="#" onclick="showDetail('<?php echo $val;?>', '<?php echo $p;?>')"><img class="small" src="images/show.png"  alt="" title="查看"/></a>|
				<?php 
					} else {
				?>
						<a href="index.php?act=showContent&filename=<?php echo $p;?>"><img class="small" src="images/show.png"  alt="" title="查看"/></a>|
				<?php
					}
				?>
<!-- 修改 -->
					<a href="index.php?act=editContent&filename=<?php echo $p;?>"><img class="small" src="images/edit.png"  alt="" title="修改"/></a>|
<!-- 重命名 -->
					<a href="index.php?act=renameFile&filename=<?php echo $p;?>"><img class="small" src="images/rename.png"  alt="" title="重命名"/></a>|


					<a href="index.php?act=copyFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/copy.png"  alt="" title="复制"/></a>|
					<a href="index.php?act=cutFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/cut.png"  alt="" title="剪切"/></a>|
<!-- 删除文件 -->					
					<a href="#" onclick="delFile('<?php echo $p;?>')"><img class="small" src="images/delete.png" alt="" title="删除"/></a>|
<!-- 下载文件 -->
					<a href="index.php?act=downFile&filename=<?php echo $p;?>"><img class="small" src="images/download.png" alt="" title="下载"/></a>
				</td>
			</tr>
	<?php
			$i++;
		}
	}
	?>

</table>
</form>
</body>
</html>