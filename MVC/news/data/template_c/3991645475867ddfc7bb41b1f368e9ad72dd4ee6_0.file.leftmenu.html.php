<?php
/* Smarty version 3.1.31, created on 2017-10-11 05:35:12
  from "D:\php_demo\imooc\MVC\news\tpl\admin\leftmenu.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59ddad90c45541_59293660',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3991645475867ddfc7bb41b1f368e9ad72dd4ee6' => 
    array (
      0 => 'D:\\php_demo\\imooc\\MVC\\news\\tpl\\admin\\leftmenu.html',
      1 => 1507620398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ddad90c45541_59293660 (Smarty_Internal_Template $_smarty_tpl) {
?>
<aside id="sidebar" class="column">
	
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="admin.php?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="admin.php?controller=admin&method=newslist">管理新闻</a></li>
	</ul>

	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="admin.php?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar --><?php }
}
