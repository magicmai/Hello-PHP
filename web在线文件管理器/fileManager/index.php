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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线文件管理器</title>
	<link rel="stylesheet" href="cikonss.css">
	<link rel="stylesheet" href="main.css">
	<script>
		function show (dis) {
			document.getElementById(dis).style.display = 'block';
		}
	</script>
</head>
<body>
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
					<a href="index.php?act=showContent&filename=<?php echo $p;?>"><img class="small" src="images/show.png"  alt="" title="查看"/></a>|
					<a href="index.php?act=editContent&filename=<?php echo $p;?>"><img class="small" src="images/edit.png"  alt="" title="修改"/></a>|
					<a href="index.php?act=renameFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/rename.png"  alt="" title="重命名"/></a>|
					<a href="index.php?act=copyFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/copy.png"  alt="" title="复制"/></a>|
					<a href="index.php?act=cutFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/cut.png"  alt="" title="剪切"/></a>|
					<a href="#"  onclick="delFolder('<?php echo $p;?>','<?php echo $path;?>')"><img class="small" src="images/delete.png"  alt="" title="删除"/></a>|
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