<?php
/* Smarty version 3.1.31, created on 2017-10-08 08:55:10
  from "D:\php_demo\smarty\test\tpl\if.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d9e7ee012cb1_15944160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fad17df16d866cac9c8196e388eeacb8b00c2a4' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\if.tpl',
      1 => 1507452869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d9e7ee012cb1_15944160 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '291659d9e7edee3c17_77019201';
?>



<?php if ($_smarty_tpl->tpl_vars['score']->value > 90) {?>
	优秀
<?php } elseif ($_smarty_tpl->tpl_vars['score']->value > 60) {?>
	及格
<?php } else { ?>
	不及格
<?php }
}
}
