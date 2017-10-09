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

$smarty->assign('str', 'Hello， My name is HanMeimei。 How are you？');

// 自定义插件：../smarty/plugins/block.test2.php

$smarty->display("block_functions_plugin.tpl");

 ?>