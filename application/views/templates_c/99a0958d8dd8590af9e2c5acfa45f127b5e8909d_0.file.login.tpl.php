<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-19 10:14:58
=======
/* Smarty version 3.1.31, created on 2018-02-13 10:35:45
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8a25128f5159_47024618',
=======
  'unifunc' => 'content_5a8240f15de991_38169527',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99a0958d8dd8590af9e2c5acfa45f127b5e8909d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\login.tpl',
      1 => 1518070825,
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
function content_5a8a25128f5159_47024618 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a8240f15de991_38169527 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ログイン | CryptoPie</title>
<?php $_smarty_tpl->_subTemplateRender("file:include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js?hl=ja'><?php echo '</script'; ?>
>
</head>
<body>
<div id="wrapper">
	<?php $_smarty_tpl->_subTemplateRender("file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">ログイン</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<div class="login-wrap">
					<form method="post">
						<div class="login-form">
							<?php echo validation_errors();?>

							
							<label class="label-mini" for="email">メールアドレス2</label>
							<input id="email" class="form-control" type="email" name="mail" placeholder="メールアドレス">
							
							<label class="label-mini" for="password">パスワード</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="パスワード">
							
							<div class="row">
								<div class="col-md-offset-2 col-md-8 col-md-offset-2">
									<button class="login-btn btn btn-primary btn-lg">ログインする<i class="fa fa-angle-right"></i></button>
									<p class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
forgot-password">パスワードを忘れた方はこちら</a></p>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.fancybox.pack.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.fancybox-media.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.flexslider.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
animate.js"><?php echo '</script'; ?>
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
application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
custom.js"><?php echo '</script'; ?>
>

<!-- 
<?php echo '<script'; ?>
>
   	objectFitImages('img.object-fit-img');
   	$("form").submit(function(event) {
	 	$('#isRecaptcha').remove();
	    	var recaptcha = $("#g-recaptcha-response").val();
	    	if (recaptcha === "") {
	       	$('.g-recaptcha').append('<p id="isRecaptcha" class="error_text">チェックを入れてください</p>');
	 		return false;
	    	}
	 });
<?php echo '</script'; ?>
>
-->
</body>
</html><?php }
}
