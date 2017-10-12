<?php 

// 后台入口文件
// URL：admin.php?controller=admin&method=login

header("Content-type: text/html; charset=utf-8");  // 字符集设置
session_start();
require_once('config.php');         // 配置信息
require_once('framework/pc.php');   // 启动引擎程序
PC::run($config);

 ?>