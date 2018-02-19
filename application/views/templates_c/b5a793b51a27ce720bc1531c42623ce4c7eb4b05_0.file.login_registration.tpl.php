<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-16 16:44:23
=======
/* Smarty version 3.1.31, created on 2018-02-08 12:58:31
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\login_registration.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a868bd77725b4_72842869',
=======
  'unifunc' => 'content_5a7bcae7489bd1_17586303',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5a793b51a27ce720bc1531c42623ce4c7eb4b05' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\login_registration.tpl',
      1 => 1518062302,
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
<<<<<<< HEAD
function content_5a868bd77725b4_72842869 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7bcae7489bd1_17586303 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>初回ログイン | CryptoPie</title>
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
					<h2 class="pageTitle">初回ログイン</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<div class="login-wrap">
					<form method='post'>
						<div class="login-form">
							<label class="label-mini" for="email">メールアドレス</label>
							<input id="email" class="form-control" type="email" name='mail' placeholder="メールアドレス">
							<?php echo form_error('mail');?>

							
							<label class="label-mini" for="password">パスワード</label>
							<input id="password" class="form-control" type="password" name='password' placeholder="パスワード">
							<?php echo form_error('password');?>

							
							<!--
							<p class="login-recaptcha">
								<div id="captcha" class="g-recaptcha" name="captcha" data-sitekey="<?php echo RECAPTCHA_KEY;?>
"></div>
							</p>
							<?php echo form_error('g-recaptcha-response');?>

							-->

							<div class="row">
								<div class="col-md-6">
									<button class="login-btn btn btn-primary btn-lg" id="individual">個人会員登録<i class="fa fa-angle-right"></i></button>
								</div>
								
								<div class="col-md-6">
									<button class="login-btn btn btn-primary btn-lg" id="corp">法人会員登録<i class="fa fa-angle-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
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
ofi.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.isotope.min.js"><?php echo '</script'; ?>
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
 src='https://www.google.com/recaptcha/api.js?hl=ja'><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

	$(function(){
		objectFitImages('img.object-fit-img');
/*
		$("form").submit(function(event) {
			$('#isRecaptcha, #recaptcha-error').remove();
			var recaptcha = $("#g-recaptcha-response").val();
			if (recaptcha === "") {
				event.preventDefault();
				$('.g-recaptcha').append('<p id="isRecaptcha" class="error_text">チェックを入れてください</p>');
				return false;
			}
		});
*/		
	  	// ログイン遷移先振り分け
		$('#individual, #corp').on('click', function(e) {
			var id = $(this).attr('id');

			var screen = '';
			if (id == "individual") {
				screen = 'user';
			}
			
			if (id == "corp") {
				screen = 'corp';
			}
			
			var htmlButtonRegister = '<input type="hidden" value="'+screen+'" name="btnLoginRegistration">'
			$(this).closest('form').append(htmlButtonRegister);
		});
		
		var validator = $("#applicationForm").validate({
			errorElement: "p",
			errorClass: "error_text",
			groups: { // エラー表示のグループ化
			},
			rules             : { // バリデーションルールの設定
				"email"            : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" },
				"password"           : { required: true, check_password: true, minlength:6, maxlength:12 }
			},
			errorPlacement: function(error, element) {
				// エラー表示の位置を変更
				eName = element.attr("name");
				// エラー表示の位置を変更
				if (eName == "zip1" || eName == "zip2") {
					error.appendTo(element.closest("div"));
				} else {
					// 条件以外はtdタグの中の最後に表示
					error.appendTo(element.closest("div"));
				}
			},
			messages: {
				"email"      : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" },
				"password"   : { required: "「パスワード」を入力してください。" }
			}
		});
	});
<?php echo '</script'; ?>
>
</body></html><?php }
}
