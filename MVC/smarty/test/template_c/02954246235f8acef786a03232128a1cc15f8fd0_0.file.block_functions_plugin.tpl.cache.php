<?php
/* Smarty version 3.1.31, created on 2017-10-09 02:27:48
  from "D:\php_demo\smarty\test\tpl\block_functions_plugin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59dadea40f27d2_74704761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02954246235f8acef786a03232128a1cc15f8fd0' => 
    array (
      0 => 'D:\\php_demo\\smarty\\test\\tpl\\block_functions_plugin.tpl',
      1 => 1507516048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dadea40f27d2_74704761 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_block_test2')) require_once 'D:\\php_demo\\smarty\\smarty\\plugins\\block.test2.php';
$_smarty_tpl->compiled->nocache_hash = '2752559dadea40851b2_36473337';
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('test2', array('replace'=>'true','maxnum'=>29));
$_block_repeat=true;
echo smarty_block_test2(array('replace'=>'true','maxnum'=>29), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();
?>

<?php echo $_smarty_tpl->tpl_vars['str']->value;?>

<?php $_block_repeat=false;
echo smarty_block_test2(array('replace'=>'true','maxnum'=>29), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
}
}
