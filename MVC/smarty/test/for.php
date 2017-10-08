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
$articlelist = array(
	array(
		'title' => '第一篇文章',
		'author' => '小红',
		'content' => '今天天气非常好'
	),
	array(
		'title' => '第二篇文章',
		'author' => '小水',
		'content' => '我在图书管里好好学习'
	),
);

$smarty->assign('articlelist', $articlelist);
/* tpl:
{section name=article loop=$articlelist max=1}
	{$articlelist[article].title}
	{$articlelist[article].author}
	{$articlelist[article].content}
<br />
{/section}

{foreach item=article from=$articlelist}
	{$article.title}
	{$article.author}
	{$article.content}
<br />
{foreachelse}
当前没有文章！
{/foreach}
 */
$smarty->display("for.tpl");

 ?>