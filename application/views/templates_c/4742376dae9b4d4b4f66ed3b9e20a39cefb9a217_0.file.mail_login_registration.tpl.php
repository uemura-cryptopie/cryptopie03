<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-16 16:34:56
=======
/* Smarty version 3.1.31, created on 2018-02-08 12:14:45
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mail_login_registration.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8689a0b95386_38083520',
=======
  'unifunc' => 'content_5a7bc0a57c79c9_38816709',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4742376dae9b4d4b4f66ed3b9e20a39cefb9a217' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mail_login_registration.tpl',
      1 => 1503972432,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/mail_footer.tpl' => 1,
  ),
),false)) {
<<<<<<< HEAD
function content_5a8689a0b95386_38083520 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7bc0a57c79c9_38816709 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
この度はCryptoPie[クリプトパイ]へご登録いただきまして有難うございます。
まだ登録は完了しておりませんので、以下のリンクよりお手続きをお願い致します。


ID: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

パスワード: <?php echo $_smarty_tpl->tpl_vars['password']->value;?>


<?php echo $_smarty_tpl->tpl_vars['link']->value;?>



上記URLは24時間有効です。
本メールの受信後、24時間以内にご登録をお済ませください。


※このメールに心当たりのない場合は、上記リンクをクリックしないで下さい。

<?php $_smarty_tpl->_subTemplateRender("file:include/mail_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
