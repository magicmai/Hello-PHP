<?php 

require('../smarty/Smarty.class.php');
$smarty = new Smarty();

// Smarty 的自编口诀：五配置两方法
// 五配置介绍
$smarty->setLeftDelimiter('{');  // 左定界符
$smarty->setRightDelimiter('}');  // 右定界符
$smarty->setTemplateDir("tpl");  // html 模板地址
$smarty->setCompileDir("template_c");  // 模板编译生成的文件
$smarty->setCacheDir("cache");  // 缓存地址

// 以下是开启缓存的另两个配置。因为通常不用 smarty 的缓存机制，所以此项为了解。
$smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);  // 开启缓存时间
$smarty->setCacheLifetime(300);


// 常用方法

$smarty->assign('time', time());
/*
{'Y-m-d'|date: $time}：因为'Y-m-d'要作为函数的第一个参数传入，所以换了位置
 */

$smarty->assign('str', 'abchefg');  // 目标：h -> d
// php方法：str_replace('h', 'd', $str);

// 自定义函数
function test ($params) {
	// print_r($params);  // Array ( [p1] => abc [p2] => def ) 
	$p1 = $params['p1'];
	$p2 = $params['p2'];
	return '传入的参数1值为：' . $p1 . '，传入的参数2值为：' . $p2;
}
$smarty->registerPlugin('function', 'f_test', 'test'); 


$smarty->display("func.tpl");

 ?>