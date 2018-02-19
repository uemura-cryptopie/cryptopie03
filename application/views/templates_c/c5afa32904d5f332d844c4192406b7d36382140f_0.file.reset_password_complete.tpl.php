<?php
/* Smarty version 3.1.31, created on 2018-02-08 18:32:41
  from "C:\xampp\htdocs\cryptopie\application\views\templates\reset_password_complete.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7c19399f2642_24554486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5afa32904d5f332d844c4192406b7d36382140f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\reset_password_complete.tpl',
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
function content_5a7c19399f2642_24554486 (Smarty_Internal_Template $_smarty_tpl) {
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
					<h2 class="pageTitle">パスワードの再設定完了</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<form id="applicationForm" class="form-horizontal" method="post" novalidate="novalidate">
					<div class="row text-center">
						<h3>パスワードの再設定が完了しました</h3>
					</div>
					<div class="text-center submit-area">
						<button type="sumbit" name="btnResetPasswordComplete" value="true" class="btn btn-primary btn-lg">ログイン画面へ</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
	<?php $_smarty_tpl->_subTemplateRender("file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body></html><?php }
}
