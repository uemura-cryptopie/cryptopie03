<?php
/* Smarty version 3.1.31, created on 2018-02-08 18:31:44
  from "C:\xampp\htdocs\cryptopie\application\views\templates\reset_password_reset.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7c1900d85163_59990101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7430e4f3dec14307bd02722567dac1e5f6af8ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\reset_password_reset.tpl',
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
function content_5a7c1900d85163_59990101 (Smarty_Internal_Template $_smarty_tpl) {
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
					<h2 class="pageTitle">パスワードの新規設定</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" method="post" novalidate="novalidate">
					<section class="panel">
						<header class="panel-heading form-heading">パスワードの新規設定</header>
						<div class="panel-body form-body showPassword" id="js_showPass">
							
							<div class="form-group">
								<label class="col-sm-3 control-label">新しいパスワード</label>
								<div class="col-sm-6">
									<input type="password" name="password" autocomplete="off" value="" class="form-control input new_password">
								</div>
								<div class="col-sm-3">
									<a href="#">表示する</a>
								</div>
								<?php echo form_error('password');?>

							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">新しいパスワードの確認</label>
								<div class="col-sm-6">
									<input type="password" name="password_again" autocomplete="off" value="" class="form-control input">
								</div>
								<div class="col-sm-3">
									<a href="#">表示する</a>
								</div>
								<?php echo form_error('password_again');?>

							</div>
							
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" name="btnResetPasswordReset" value='true' class="btn btn-primary btn-lg">パスワードを設定する</button>
					</div>
				</form>
				
			</div>
		</div>
		
	</section>
	
	<?php $_smarty_tpl->_subTemplateRender("file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.easing.1.3.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- Vendor Scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
modernizr.custom.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.jpostal.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.validate.addmethod.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.validate.messages_ja.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
$(function(){
	
	appForm.showPassword('#js_showPass');
	
	// カスタムルールを定義します($.validator.addMethod(項目名, 検証ルール)で設定します)。
	var methods = {
		check_password: function(value, element){
			return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
		}
	};
	$.each(methods, function(key){
		$.validator.addMethod(key, this);
	});
	
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		focusInvalid: false,
		onkeyup: false,
		rules : { // バリデーションルールの設定
			"password"           : { required: true, check_password: true, minlength:6, maxlength:12 },
			"password_again"     : { required: true, equalTo: ".new_password", check_password: true, minlength:6, maxlength:12 }
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			error.appendTo(element.closest("div"));
		},
		messages: {
			"password"        : {
				required: "「新しいパスワード」を入力してください。",
				check_password: "半角英字または半角数字で入力してください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			},
			"password_again"        : {
				required: "「確認パスワード」が正しくありません。",
				equalTo: "「確認パスワード」が正しくありません。",
				check_password: "半角英字または半角数字で入力してください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			}
		}
	});
});
<?php echo '</script'; ?>
>
</body></html><?php }
}
