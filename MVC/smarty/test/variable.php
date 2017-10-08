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
// 1. 变量输出
$smarty->assign("articletitle", "文章标题");

// $arr = array('title'=>'smarty学习', 'author'=>'小红');  // 一维数组
// $arr = array('articlecontent' => array('title' => 'smarty学习', 'author' => '小红'));  // 二维数组
// $smarty->assign('arr', $arr);


// 2. 变量调节器

// 2.1 首字母大写：capitalize
$smarty->assign('articletitle', 'i ate an apple');  
// tpl： {$articletitle|capitalize}
// 输出：I Ate An Apple

// 2.2 字符串连接：cat
// tpl： {$articletitle|cat: " yesterday."}
// 输出：i ate an apple yesterday.

// 2.3 日期格式化：date_format
$smarty->assign('time', time());
/**********************************
tpl:  {$time}
输出：1507449305
tpl:  {$time|date_format}
输出：Oct 8, 2017

tpl:  {$time|date_format: "%H:%M:%S"}
输出：07:56:44

tpl:  {$time|date_format: "%B %e, %Y"}
输出：October 8, 2017

tpl:  {$time|date_format: "%A, %B %e, %Y"}
输出：Sunday, October 8, 2017

tpl:  {$time|date_format: "%A, %B %e, %Y %H:%M:%S"}
输出：Sunday, October 8, 2017 08:01:57
**********************************/

// 2.4 制定默认值：default
$smarty->assign('username');  
// tpl:  {$username|default: "no name"}
// 输出：no name

// 2.5 转码：escape
$smarty->assign('url', 'http://www.imooc.com/video/1059');
// tpl:  {$url|escape: "url"}
// 输出：http%3A%2F%2Fwww.imooc.com%2Fvideo%2F1059

// 2.6 大小写转换：lower，upper
$smarty->assign('string', 'Happy Birthday!');
/**************************
tpl:  {$string|lower}
	  <br />
	  {$string|upper}
输出：happy birthday!
	  HAPPY BIRTHDAY!
**************************/

// 2.7 换行符替换为 <br /> 标签：nl2br
$smarty->assign('article', '祝你生日快乐
	祝你生日快乐
	祝你生日快乐');
// tpl:  {$article|nl2br}
// 输出：
// 祝你生日快乐<br />
// 祝你生日快乐<br />
// 祝你生日快乐

$smarty->display("test.tpl");

 ?>