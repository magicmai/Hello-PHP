<?php
/* Smarty version 3.1.31, created on 2017-10-11 13:55:42
  from "D:\php_demo\imooc\MVC\news\tpl\index\show.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ddb25e5e3bc1_32775946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1a60165d6bea653649249874cc3c90481f55a45' => 
    array (
      0 => 'D:\\php_demo\\imooc\\MVC\\news\\tpl\\index\\show.html',
      1 => 1507699764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ddb25e5e3bc1_32775946 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>MVC综合实例</title>
	<link rel="stylesheet" href="img/css/main.css">
</head>

<body>
	<header>
		<h1>新闻发布系统</h1>
		<p>MVC综合实例——微型框架的实际运用</p>
	</header>

	<div class="container">

		<div class="fleft">

			<div class="item">
				<p class="meta"><?php echo $_smarty_tpl->tpl_vars['data']->value['author'];?>
发布于<span class="date"><?php echo $_smarty_tpl->tpl_vars['data']->value['dateline'];?>
</span></p>
				<h1 id="title"><a href="#"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</a></h1>
				<p class="content"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</p>
			</div>

		</div>

		<div class="fright">
			<h4 style="color: green;">关于我们</h4>
			<p class="about">
				<?php echo $_smarty_tpl->tpl_vars['about']->value;?>

			</p>
		</div>

	</div>

</body>

</html><?php }
}
