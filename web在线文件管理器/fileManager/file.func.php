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
		return '非法文件名';
	}
}