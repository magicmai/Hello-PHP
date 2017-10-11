<?php 

// 入口文件

header("Content-type: text/html; charset=utf-8");
session_start();
require_once('config.php');         // 配置信息
require_once('framework/pc.php');   // 启动引擎程序
PC::run($config);

 ?>