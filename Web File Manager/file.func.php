<?php

/**
 * 转换字节大小
 * @param number $size
 * @return number
 */

// Bytes/KB/MB/GB/TB/EB
function transByte($size) {
	$arr = array('B', 'KB', 'MB', 'GB', 'TB', 'EB');
	$i = 0;
	while ($size >= 1024) {
		$size /= 1024;
		$i++;
	}
	echo round($size, 2).$arr[$i];  //保留两位小数
}

/**
 * 创建文件
 * @param string $filename
 * @return string
 */

function createFile($filename) {
	// file/1.txt
	// 验证文件名的合法性，是否包含 /:*"<>|
	$pattern = "/[\/,\*,<>,\?\|]/";
	if (!preg_match($pattern, basename($filename))) {
		// 检测当前目录下是否存在同名文件
		if(!file_exists($filename)) {
			// 通过 touch($filename) 来创建!
			if (touch($filename)) {
				return '文件创建成功';
			} else {
				return '文件创建失败';
			}
		} else {
			return '文件已存在，请重命名后创建';
		}
	}else {
		return '非法文件名!';
	}
}

/**
 * 重命名文件
 * @param string $oldname, $newname
 * @return string
 */

function renameFile($oldname, $newname) {
	// echo $oldname,$newname;
	// 验证文件名是否合法
	if (checkFilename($newname)) {
		// 检测当前目录下是否存在同名文件
		echo $newname;
		$path = dirname($oldname);
		if (!file_exists($path.'/'.$newname)) {
			// 进行重命名

			if (rename($oldname, $path.'/'.$newname)) {
				return '重命名成功';
			} else {
				return '重命名失败';
			}
		} else {
			return '存在同名文件，需要重新命名';
		}
	} else {
		return '非法文件名!';
	}
}

/**
 * 封装一个检查文件名合法性的函数
 * @param string $filename
 * @return boolean
 */
function checkFilename($filename) {
	$pattern = "/[\/,\*,<>,\?\|]/";
	if (preg_match($pattern, $filename)) {
		return false;
	} else {
		return true;
	}
}

/**
 * 删除文件
 * @param string $filename
 * @return string
 */
function delFile($filename) {
	if (unlink($filename)) {
		$mes = '文件删除成功';
	} else {
		$mes = '文件删除失败！';
	}
	return $mes;
}

/**
 * 下载文件
 * @param string $filename
 * @return string
 */
function downFile($filename) {
	// echo $filename;exit;  // file/a.txt，下载的文件名为file-a.txt
	header('content-disposition:attachment;filename=' . basename($filename));
	header('content-length:' . filesize($filename));
	readfile($filename);
}

/**
 * 复制文件
 * @param string $filename, $dstname
 * @return string
 */
function copyFile($filename, $dstname) {
	if (file_exists($dstname)) {
		if (!file_exists($dstname.'/'.basename($filename))) {
			if (copy($filename, $dstname.'/'.basename($filename))) {
				$mes = '文件复制成功';
			} else {
				$mes = '文件复制失败';
			}
		} else {
			$mes = '存在同名文件';
		}
	} else {
		$mes = '目标目录不存在';
	}
	return $mes;
}

/**
 * 剪切文件
 * @param string $filename, $dstname
 * @return string
 */
function cutFile($filename, $dstname) {
	if (file_exists($dstname)) {
		if (!file_exists($dstname.'/'.basename($filename))) {
			if (rename($filename, $dstname.'/'.basename($filename))) {
				$mes = '文件剪切成功';
			} else {
				$mes = '文件剪切失败';
			}
		} else {
			$mes = '存在同名文件';
		}
	} else {
		$mes = '目标目录不存在';
	}
	return $mes;
}

/**
 * 上传文件
 * @param string $filename, $dstname
 * @return string
 */
function uploadFile($fileInfo, $path, $allowExt = array('jpeg', 'jpg', 'png', 'gif', 'txt'), $maxSize = 10485760) {
	// 判断错误行
	if ($fileInfo['error'] == UPLOAD_ERR_OK) {
		// 文件是否是通过 HTTP POST 上传的
		if (is_uploaded_file($fileInfo['tmp_name'])) {
			// 上传文件的文件名，只允许上传JPEG|jpg、png、gif、txt文件
			// $allowExt = array('jpeg', 'jpg', 'png', 'gif', 'txt'); // 放入参数
			$ext = getExt($fileInfo['name']);
			$uniqid = getUniqidName();
			$destination = $path.'/'.pathinfo($fileInfo['name'], PATHINFO_FILENAME).'_'.$uniqid.'.'.$ext;
			if (in_array($ext, $allowExt)) {
				if ($fileInfo['size'] <= $maxSize) {
					if (move_uploaded_file($fileInfo['tmp_name'], $destination)) {
						$mes = '文件上传成功';
					} else {
						$mes = '文件移动失败';
					}
				} else {
					$mes = '文件过大';
				}
			} else {
				$mes = '非法文件类型';
			}
		} else {
			$mes = '文件是否是通过 HTTP POST 上传的';
		}
	} else {
		switch ($fileInfo[error]) {
			case 1:
				$mes = '超过了配置文件的大小';
				break;
			case 2:
				$mes = '超过了表单允许接收的数据的大小';
				break;
			case 3:
				$mes = '文件部分被上传';
				break;
			
			case 4:
				$mes = '没有文件被上传';
				break;
		}
	}

	return $mes;
}