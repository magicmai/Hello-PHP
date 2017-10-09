<?php
/* Smarty version 3.1.31, created on 2017-10-09 02:26:22
  from "D:\php_demo\smarty\test\tpl\modifiers_plugin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59dade4eba53e1_28264796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daeeaf1f4095c4a6844529083e26765f1a82a88b' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\modifiers_plugin.tpl',
      1 => 1507515156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dade4eba53e1_28264796 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_test')) require_once 'D:\\php_demo\\smarty\\smarty\\plugins\\modifier.test.php';
$_smarty_tpl->compiled->nocache_hash = '2819959dade4eb283c0_90859089';
echo smarty_modifier_test($_smarty_tpl->tpl_vars['time']->value,'Y-m-d H:m:s');
}
}
