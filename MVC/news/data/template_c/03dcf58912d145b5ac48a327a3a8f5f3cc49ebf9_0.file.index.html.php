<?php
/* Smarty version 3.1.31, created on 2017-10-11 13:31:57
  from "D:\php_demo\imooc\MVC\news\tpl\index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ddaccd40f1a7_99239778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03dcf58912d145b5ac48a327a3a8f5f3cc49ebf9' => 
    array (
      0 => 'D:\\php_demo\\imooc\\MVC\\news\\tpl\\index\\index.html',
      1 => 1507699502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ddaccd40f1a7_99239778 (Smarty_Internal_Template $_smarty_tpl) {
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

			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'news');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
?>
			<div class="item">
				<p class="meta"><?php echo $_smarty_tpl->tpl_vars['news']->value['author'];?>
发布于<span class="date"><?php echo $_smarty_tpl->tpl_vars['news']->value['dateline'];?>
</span></p>
				<h1 id="title"><a href="index.php?controller=index&method=newsshow&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a></h1>
				<p class="content"><?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>
</p>
			</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


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
