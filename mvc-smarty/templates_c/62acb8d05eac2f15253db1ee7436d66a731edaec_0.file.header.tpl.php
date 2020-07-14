<?php
/* Smarty version 3.1.34-dev-7, created on 2020-07-14 11:37:48
  from 'D:\xampp\htdocs\tungocvan\wp-content\themes\tungocvan\mvc-smarty\mvc\views\smarty\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f0d7cecede737_41285850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62acb8d05eac2f15253db1ee7436d66a731edaec' => 
    array (
      0 => 'D:\\xampp\\htdocs\\tungocvan\\wp-content\\themes\\tungocvan\\mvc-smarty\\mvc\\views\\smarty\\header.tpl',
      1 => 1594706370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f0d7cecede737_41285850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\xampp\\htdocs\\tungocvan\\wp-content\\themes\\tungocvan\\mvc-smarty\\mvc\\core\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
<h2>HEADER TPL</h2>

<b><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['Name']->value, 'UTF-8');?>
</b>
<br>

<?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bold')) {?><b><?php }?>
Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title'));?>

<?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bold')) {?></b><?php }
}
}
