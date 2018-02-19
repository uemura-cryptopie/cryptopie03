<?php
/* Smarty version 3.1.31, created on 2018-02-08 16:07:25
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mail_reset_password.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7bf72d019069_60211201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97c74e95e34a419fc6513783c5894296452f889b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mail_reset_password.tpl',
      1 => 1503972120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/mail_footer.tpl' => 1,
  ),
),false)) {
function content_5a7bf72d019069_60211201 (Smarty_Internal_Template $_smarty_tpl) {
?>
パスワード再発行依頼を受け付けました。
以下より新しいパスワードを設定して下さい。

<?php echo $_smarty_tpl->tpl_vars['link']->value;?>


上記URLは24時間有効です。
パスワードの再設定は本メールの受信後、24時間以内に設定を完了させて下さい。

※このメールに心当たりのない場合は、上記リンクをクリックしないで下さい。

<?php $_smarty_tpl->_subTemplateRender("file:include/mail_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
