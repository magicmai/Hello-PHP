<?php
/* Smarty version 3.1.31, created on 2017-10-09 00:04:40
  from "D:\php_demo\smarty\test\tpl\func_plugin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59dabd18895406_97714547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23ec7e4425159e5346ad929fdbd7f30d0b87e34e' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\func_plugin.tpl',
      1 => 1507507438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dabd18895406_97714547 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_test')) require_once 'D:\\php_demo\\smarty\\smarty\\plugins\\function.test.php';
$_smarty_tpl->compiled->nocache_hash = '1510159dabd1871a536_28131363';
echo smarty_function_test(array('width'=>150,'height'=>200),$_smarty_tpl);
}
}
