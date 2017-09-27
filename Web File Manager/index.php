<?php
require_once 'dir.func.php';
require_once 'file.func.php';
require_once 'common.func.php';
$path = 'file';
$path = @$_REQUEST['path']? @$_REQUEST['path'] : $path;

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
$dirname=@$_REQUEST['dirname'];
$info = readDirectory($path);
//print_r($info);
//var_dump($info);exit; //没有文件或目录时返回 null
if (!$info) {
	echo '<script>alert("该目录下没有内容！"); location.href = "index.php";</script>';
}
$redirect = "index.php?path={$path}";

if ($act == 'createFile') {                          /* 新建文件 */
	// echo $path, '--';
	// echo $filename;
	$mes = createFile($path.'/'.$filename);
	alertMes($mes, $redirect);

} elseif ($act == 'showContent') {                   /* 查看文件 */
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

} elseif ($act == 'editContent') {                   /* 修改文件 */
	// echo '编辑文件';
	$content = file_get_contents($filename);
	// echo $content;
	$str = <<<eof
	<form action="index.php?act=doEdit" method="post">
		<textarea name="content" cols="100" rows="5">{$content}</textarea><br />
		<input type="hidden" name="filename" value="{$filename}">
		<input type="hidden" name="path" value="{$path}">
		<input type="submit" value="修改文件内容" />
	</form>
eof;
	echo $str;

} elseif ($act == 'doEdit') {
	$content = @$_REQUEST['content'];
	// echo $content;
	if (file_put_contents($filename, $content)) {
		$mes = '文件修改成功';
	} else {
		$mes = '文件修改失败';
	}
	alertMes($mes, $redirect);

} elseif ($act == 'renameFile') {                   /* 重命名文件 */
	$str = <<<EOF
	<form action="index.php?act=doRename" method="post">
		请填写新文件名：<input type="text" name="newname" placeholder="重命名">
		<input type="hidden" name="filename" value="{$filename}">
		<input type="hidden" name="path" value="{$path}">
		<input type="submit" value="重命名">
	</form>
EOF;
	echo $str;

} elseif ($act == 'doRename') {
	$newname = @$_REQUEST['newname'];
	$mes = renameFile($filename, $newname);
	alertMes($mes, $redirect);

} elseif ($act == 'delFile') {                   /* 删除文件 */
	//echo '删除文件操作';
	$mes = delFile($filename);
	alertMes($mes, $redirect);

} elseif ($act == 'downFile') {                   /* 下载文件 */
	$mes = downFile($filename);

} elseif ($act == '创建文件夹') {	                 /* 创建文件夹 */
	$mes = createFolder($path."/".$dirname);
	alertMes($mes, $redirect);

} elseif ($act == 'copyFolder') {                   /* 复制文件夹 */
	$str = <<<EOF
	<form action="index.php?act=doCopyFolder" method="post">
		将文件夹复制到：<input type="text" name="dstname" placeholder="将文件夹复制到">
		<input type="hidden" name="path" value="{$path}">
		<input type="hidden" name="dirname" value="{$dirname}">
		<input type="submit" value="复制文件夹">
	</form>
EOF;
	echo $str;

} elseif ($act == 'doCopyFolder') {
	$dstname = @$_REQUEST['dstname'];
	$mes = copyFolder($dirname, $path.'/'.$dstname.'/'.basename($dirname));
	echo $mes;
	// alertMes($mes, $redirect);
	
} elseif ($act == 'renameFolder') {                 /* 重命名文件夹 */
	// echo $dirname;
	$str = <<<EOF
	<form action="index.php?act=doRenameFolder" method="post">
		请填写新文件夹名称：<input type="text" name="newname" placeholder="重命名">
		<input type="hidden" name="path" value="{$path}">
		<input type="hidden" name="dirname" value="{$dirname}">
		<input type="submit" value="重命名">
	</form>
EOF;
	echo $str;

} elseif ($act == 'doRenameFolder') {
	$newname = @$_REQUEST['newname'];
	// echo $newname, '-', $dirname, '-', $path;
	$mes = renameFolder($dirname, $path.'/'.$newname);
	echo $mes;

} elseif ($act == 'cutFolder') {                   /* 剪切文件夹 */
	$str = <<<EOF
	<form action="index.php?act=doCutFolder" method="post">
		将文件夹剪切到：<input type="text" name="dstname" placeholder="剪切到">
		<input type="hidden" name="path" value="{$path}">
		<input type="hidden" name="dirname" value="{$dirname}">
		<input type="submit" value="剪切文件夹">
	</form>
EOF;
	echo $str;

} elseif ($act == 'doCutFolder') {
	// echo '剪切文件夹';
	$dstname = @$_REQUEST['dstname'];
	$mes = cutFolder($dirname, $path.'/'.$dstname);
	echo $mes;
	// alertMes($mes, $redirect);

} elseif ($act == 'delFolder') {                   /* 删除文件夹 */
	// 完成删除文件夹操作
	// echo '文件夹被删除';
	$mes = delFolder($dirname);
	alertMes($mes, $redirect);

} elseif ($act == 'copyFile') {                   /* 复制文件 */
	$str = <<<EOF
	<form action="index.php?act=doCopyFile" method="post">
		将文件复制到：<input type="text" name="dstname" placeholder="复制到">
		<input type="hidden" name="path" value="{$path}">
		<input type="hidden" name="filename" value="{$filename}">
		<input type="submit" value="复制文件">
	</form>
EOF;
	echo $str;

} elseif ($act == 'doCopyFile') {
	$dstname = @$_REQUEST['dstname'];
	$mes = copyFile($filename, $path.'/'.$dstname);
	// echo $mes;
	alertMes($mes, $redirect);
	
} elseif ($act == 'cutFile') {                   /* 剪切文件 */
	$str = <<<EOF
	<form action="index.php?act=doCutFile" method="post">
		将文件剪切到：<input type="text" name="dstname" placeholder="剪切到">
		<input type="hidden" name="path" value="{$path}">
		<input type="hidden" name="filename" value="{$filename}">
		<input type="submit" value="剪切文件">
	</form>
EOF;
	echo $str;

} elseif ($act == 'doCutFile') {
	$dstname = @$_REQUEST['dstname'];
	$mes = cutFile($filename, $path.'/'.$dstname);
	echo $mes;
	// alertMes($mes, $redirect);
	
} elseif ($act == '上传文件') {                   /* 上传文件 */
	// print_r($_FILES);
	// Array ( [myFile] => Array ( [name] => updown1.txt [type] => text/plain [tmp_name] => D:\wamp\tmp\php165F.tmp [error] => 0 [size] => 13 ) )
	$fileInfo = $_FILES['myFile'];
	$mes = uploadFile($fileInfo, $path);
	// echo $mes;
	alertMes($mes, $redirect);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线文件管理器</title>
	<link rel="stylesheet" href="css/cikonss.css">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.custom.css"  type="text/css"/>
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui-1.10.4.custom.js"></script>
	<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
<div id="showDetail" style="display: none;">
	<img id="showImg" src="" alt="">
</div>

<h1 style="text-align: center;">慕课网——在线文件管理</h1>

<div id="top">
	<ul id="navi">
<!-- Home -->
		<li>
			<a href="index.php" title="主目录"><span class="icon icon-small icon-square"><span class="icon-home"></span></span></a>
		</li>
<!-- 新建文件 -->
		<li>
			<a href="#" title="新建文件" onclick="show('createFile')"><span class="icon icon-small icon-square"><span class="icon-file"></span></span></a>
		</li>
<!-- 新建文件夹 -->
		<li>
			<a href="#" title="新建文件夹" onclick="show('createFolder')"><span class="icon icon-small icon-square"><span class="icon-folder"></span></span></a>
		</li>
<!-- 上传文件 -->
		<li>
			<a href="#" title="上传文件" onclick="show('uploadFile')"><span class="icon icon-small icon-square"><span class="icon-upload"></span></span></a>
		</li>
<!-- 返回上级目录 -->
		<?php
		$back = ($path == "file")? "file" : dirname($path);
		// echo $back;
		?>
		<li>
			<a href="#" title="返回上级目录" onclick="goBack('<?php echo $back;?>');"><span class="icon icon-small icon-square"><span class="icon-arrowLeft"></span></span></a>
		</li>
	</ul>
</div>

<form action="index.php" method="post" enctype="multipart/form-data">
<table border="1">
<!-- 新建文件 -->
	<tr id="createFile"  style="display:none;">
		<td>请输入文件名称</td>
		<td>
			<input type="text" name="filename" />
			<input type="hidden" name="path" value="<?php echo $path;?>" />
			<input type="hidden" name="act" value="createFile" />
			<input type="submit" value="创建文件" />	
		</td>
	</tr>
<!-- 新建文件夹 -->
	<tr id="createFolder"  style="display: none;">
		<td>请输入文件夹名称</td>
		<td>
			<input type="text" name="dirname" />
			<input type="hidden" name="path"  value="<?php echo $path;?>" />
			<input type="submit"  name="act"  value="创建文件夹" />
		</td>
	</tr>
<!-- 上传文件 -->
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

<!-- 读取文件的操作-->
	<?php
	// 设置时区
	date_default_timezone_set('Asia/Shanghai');
	if(@$info['file']) {
		$i = 1;
		foreach (@$info['file'] as $val) {
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
						<a href="index.php?act=showContent&path=<?php echo $path;?>&filename=<?php echo $p;?>"><img class="small" src="images/show.png"  alt="" title="查看"/></a>|
				<?php
					}
				?>
<!-- 修改 -->
					<a href="index.php?act=editContent&path=<?php echo $path;?>&filename=<?php echo $p;?>"><img class="small" src="images/edit.png"  alt="" title="修改"/></a>|
<!-- 重命名 -->
					<a href="index.php?act=renameFile&path=<?php echo $path;?>&filename=<?php echo $p;?>"><img class="small" src="images/rename.png"  alt="" title="重命名"/></a>|
<!-- 复制文件 -->
					<a href="index.php?act=copyFile&path=<?php echo $path;?>&filename=<?php echo $p;?>"><img class="small" src="images/copy.png"  alt="" title="复制"/></a>|
<!-- 剪切文件 -->
					<a href="index.php?act=cutFile&path=<?php echo $path;?>&filename=<?php echo $p;?>"><img class="small" src="images/cut.png"  alt="" title="剪切"/></a>|
<!-- 删除文件 -->					
					<a href="#" onclick="delFile('<?php echo $p;?>')"><img class="small" src="images/delete.png" alt="" title="删除"/></a>|
<!-- 下载文件 -->
					<a href="index.php?act=downFile&path=<?php echo $path;?>&filename=<?php echo $p;?>"><img class="small" src="images/download.png" alt="" title="下载"/></a>
				</td>
			</tr>
	<?php
			$i++;
		}
	}
	?>


<!-- 读取目录的操作-->
	<?php
	date_default_timezone_set('Asia/Shanghai');
	if(@$info['dir']) {
		@$i = $i == null ? 1 : $i;
		//echo $i;exit;

		foreach (@$info['dir'] as $val) {
			$p = $path.'/'.$val;
	?>

			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $val;?></td>
				<td><?php $src=filetype($p) == 'file'? 'file_ico.png':'folder_ico.png';?><img src="images/<?php echo $src;?>" alt=""></td>
<!-- 文件夹大小 -->
				<td><?php // $sum=0; echo transByte(dirSize($p));?></td>

				<td><?php $src=is_readable($p)? 'correct.png':'error.png';?><img src="images/<?php echo $src;?>" width='20px' alt=""></td>
				<td><?php $src=is_writable($p)? 'correct.png':'error.png';?><img src="images/<?php echo $src;?>" width='20px' alt=""></td>
				<td><?php $src=is_executable($p)? 'correct.png':'error.png';?><img src="images/<?php echo $src;?>" width='20px' alt=""></td>
				<td><?php echo date('Y-m-d H:m:s', filectime($p));?></td>
				<td><?php echo date('Y-m-d H:m:s', filemtime($p));?></td>
				<td><?php echo date('Y-m-d H:m:s', fileatime($p));?></td>
				
				<td>
<!-- 查看文件夹 -->		
					<a href="index.php?path=<?php echo $p?>"><img class="small" src="images/show.png"  alt="" title="查看"/></a>|
<!-- 重命名文件夹，有些小bug：http://www.imooc.com/qadetail/72339 -->
					<a href="index.php?act=renameFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/rename.png"  alt="" title="重命名"/></a>|
<!-- 复制文件夹 -->
					<a href="index.php?act=copyFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/copy.png"  alt="" title="复制"/></a>|
<!-- 剪切文件夹 -->
					<a href="index.php?act=cutFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>"><img class="small" src="images/cut.png"  alt="" title="剪切"/></a>|
<!-- 删除文件夹 -->
					<a href="#" onclick="delFolder('<?php echo $p;?>', '<?php echo $path;?>')"><img class="small" src="images/delete.png" alt="" title="删除"/></a>|
<!-- 下载文件夹 -->
					<!-- <a href="index.php?act=downFile&path=<?php //echo $path;?>&filename=<?php //echo $p;?>"><img class="small" src="images/download.png" alt="" title="下载"/></a> -->
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