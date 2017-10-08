<?php
/* Smarty version 3.1.31, created on 2017-10-08 09:11:29
  from "D:\php_demo\smarty\test\tpl\for.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d9ebc17e6cc6_73256812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '614fc9233758908d2f20340a8add97c3b1b0c0aa' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\for.tpl',
      1 => 1507453884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d9ebc17e6cc6_73256812 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2202959d9ebc1765e23_79455304';
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articlelist']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
	<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

	<?php echo $_smarty_tpl->tpl_vars['article']->value['author'];?>

	<?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>

<br />
<?php
}
} else {
?>

当前没有文章！
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
