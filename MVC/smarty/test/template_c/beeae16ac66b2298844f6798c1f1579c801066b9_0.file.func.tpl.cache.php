<?php
/* Smarty version 3.1.31, created on 2017-10-08 12:14:49
  from "D:\php_demo\smarty\test\tpl\func.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59da16b94a32e2_96049667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beeae16ac66b2298844f6798c1f1579c801066b9' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\func.tpl',
      1 => 1507464888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59da16b94a32e2_96049667 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '883859da16b942a145_57058107';
echo date('Y-m-d',$_smarty_tpl->tpl_vars['time']->value);?>

<br />

<?php echo str_replace('h','d',$_smarty_tpl->tpl_vars['str']->value);?>

<br />

<?php echo test(array('p1'=>'abc','p2'=>'def'),$_smarty_tpl);
}
}
