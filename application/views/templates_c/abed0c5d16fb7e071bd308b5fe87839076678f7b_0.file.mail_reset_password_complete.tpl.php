<?php
/* Smarty version 3.1.31, created on 2018-02-08 18:32:41
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mail_reset_password_complete.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7c1939022399_14138216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abed0c5d16fb7e071bd308b5fe87839076678f7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mail_reset_password_complete.tpl',
      1 => 1503972125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/mail_footer.tpl' => 1,
  ),
),false)) {
function content_5a7c1939022399_14138216 (Smarty_Internal_Template $_smarty_tpl) {
?>
お客様のパスワードを下記の内容にて設定完了致しました。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
パスワード      ：<?php echo $_smarty_tpl->tpl_vars['password']->value;?>

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


<?php $_smarty_tpl->_subTemplateRender("file:include/mail_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
