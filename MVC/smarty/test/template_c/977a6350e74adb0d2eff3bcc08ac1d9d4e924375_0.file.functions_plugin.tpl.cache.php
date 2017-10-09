<?php
/* Smarty version 3.1.31, created on 2017-10-09 02:27:42
  from "D:\php_demo\smarty\test\tpl\functions_plugin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59dade9e202993_98369954',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '977a6350e74adb0d2eff3bcc08ac1d9d4e924375' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\functions_plugin.tpl',
      1 => 1507507438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dade9e202993_98369954 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_test')) require_once 'D:\\php_demo\\smarty\\smarty\\plugins\\function.test.php';
$_smarty_tpl->compiled->nocache_hash = '1049259dade9e17dc74_92092938';
echo smarty_function_test(array('width'=>150,'height'=>200),$_smarty_tpl);
}
}
