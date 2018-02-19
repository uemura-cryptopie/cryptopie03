<?php
/* Smarty version 3.1.31, created on 2018-02-08 16:07:25
  from "C:\xampp\htdocs\cryptopie\application\views\templates\reset_password_sendmail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7bf72d9e42c6_71984922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c5dfa0fb78ceb4c83b18b0aa918490a54cf6c99' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\reset_password_sendmail.tpl',
      1 => 1503103478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/head.tpl' => 1,
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5a7bf72d9e42c6_71984922 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>パスワードの再設定 | CryptoPie</title>
    <?php $_smarty_tpl->_subTemplateRender("file:include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
    <?php $_smarty_tpl->_subTemplateRender("file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">パスワードの再設定用メールを送信</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<div class="row text-center">
					<h3>パスワードの再設定用のメールを送信しました。</h3>
					<p>
						メールに記載されているURLから24時間以内にパスワード変更手続きを行ってください。
					</p>
				</div>
				
			</div>
		</div>
		
	</section>
	
	<?php $_smarty_tpl->_subTemplateRender("file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

</body></html><?php }
}
