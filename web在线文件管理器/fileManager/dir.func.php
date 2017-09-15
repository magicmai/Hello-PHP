<?php
/**
 * 遍历目录，只读取目录中最外层的内容
 * @param string $path
 * @return array
 */

//打开指定目录
function readDirectory ($path) {
	$handle = opendir($path);
	while (($item = readdir($handle)) !== false) {
		//.和..这两个特殊目录
		if ($item !== "." && $item !== "..") {
			if (is_file($path . "/" . $item)) {
				$arr["file"][] = $item;
			}
			if (is_dir($path . "/" . $item)) {
				$arr["dir"][] = $item;
			}
		}
	}
	closedir($handle);
	return $arr;
}

// $path = "file";
// print_r(readDirectory($path));