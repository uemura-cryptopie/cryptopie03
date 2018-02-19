<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-16 17:21:29
=======
/* Smarty version 3.1.31, created on 2018-02-08 15:02:13
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mail_register_user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a869489483778_82483986',
=======
  'unifunc' => 'content_5a7be7e562e473_94168355',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d2da102f13c292f522af3bb3fd262b9c2b50735' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mail_register_user.tpl',
      1 => 1503972155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/mail_footer.tpl' => 1,
  ),
),false)) {
<<<<<<< HEAD
function content_5a869489483778_82483986 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7be7e562e473_94168355 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
echo $_smarty_tpl->tpl_vars['name']->value;?>
様

御登録ありがとうございます
以下のリンクからログイン後本人確認書類の登録を
行ってください


<?php echo $_smarty_tpl->tpl_vars['link_login']->value;?>



今後ともCryptoPieをよろしくお願いいたします。


このメールは送信専用アドレスより送信しております。
そのため返信頂いても内容の確認ができません。

ご不明点がありましたらこちらからお問い合わせ下さい。
<?php echo $_smarty_tpl->tpl_vars['link_contact']->value;?>




<?php $_smarty_tpl->_subTemplateRender("file:include/mail_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
