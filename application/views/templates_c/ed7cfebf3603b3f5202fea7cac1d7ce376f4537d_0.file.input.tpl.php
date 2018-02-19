<?php
/* Smarty version 3.1.31, created on 2018-02-16 18:56:38
  from "C:\xampp\htdocs\cryptopie\application\views\templates\other\contact\input.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a86aad6835203_01451561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed7cfebf3603b3f5202fea7cac1d7ce376f4537d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\other\\contact\\input.tpl',
      1 => 1504683225,
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
function content_5a86aad6835203_01451561 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>お問い合わせ | CryptoPie</title>
<?php $_smarty_tpl->_subTemplateRender("file:include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>
<div id="wrapper">
	<?php $_smarty_tpl->_subTemplateRender("file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">お問い合わせ</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;
echo $_smarty_tpl->tpl_vars['controller']->value;?>
/register/" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">お問い合わせ内容入力</header>
						<div class="panel-body form-body">
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">お名前<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input type="text" class="form-control" placeholder="例）山田　太郎" name="name" value="">
								</div>
								<?php if (isset($_smarty_tpl->tpl_vars['error']->value['name'])) {?><p id="name-error" class="error_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">メールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input type="text" class="form-control" placeholder="例）cryptopie@gmail.com" id="mail" name="mail" value="">
									<?php if (isset($_smarty_tpl->tpl_vars['error']->value['mail'])) {?><p id="mail-error" class="error_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value['mail'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">お問い合わせ種別<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select name="subject" class="select form-control">
										<option value="">選択してください</option>
										<option value="銀行からの振込で名義に数字を入れ忘れた">銀行からの振込で名義に数字を入れ忘れた</option>
										<option value="登録住所の変更をしたい">登録住所の変更をしたい</option>
										<option value="サービスについて">サービスについて</option>
										<option value="取材、広告等について">取材、広告等について</option>
										<option value="メディアに関するお問い合わせ">メディアに関するお問い合わせ</option>
										<option value="その他のお問い合わせ">その他のお問い合わせ</option>
									</select>
									<?php if (isset($_smarty_tpl->tpl_vars['error']->value['subject'])) {?><p id="subject-error" class="error_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value['subject'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">お問い合わせの内容<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<p>
										お問い合わせの内容、発生した時間、ブラウザやPC、スマートフォンなどの環境、などを具体的に記入してお送りください。
									</p>
									<textarea name="text" class="form-control" rows="10" placeholder="お問い合わせの内容、発生した時間、ブラウザやPC、スマートフォンなどの環境、などを具体的に記入してお送りください。"></textarea>
									<?php if (isset($_smarty_tpl->tpl_vars['error']->value['text'])) {?><p id="text-error" class="error_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value['text'], ENT_QUOTES, 'UTF-8', true);?>
</p><?php }?>
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">お問い合わせを送信</button>
						<button type="button" class="btn btn-default btn-lg pull-left" onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"'>TOPへ戻る</button>
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
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		onfocusout: false,
		rules : { // バリデーションルールの設定
			"name"    : { required: true },
			"mail"    : { required: true, check_mail: true },
			"subject" : { required: true },
			"text"    : { required: true }
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			eName = element.attr("name");
			// エラー表示の位置を変更
			if (eName == "post1" || eName == "post2") {
				error.appendTo(element.closest("div"));
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages : {
			"name"    : { required: "「お名前」を入力してください" },
			"mail"    : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" },
			"subject" : { required: "「お問い合わせ種別」を入力してください" },
			"text"    : { required: "「問い合わせ内容」を入力してください" }
		}
	});
	
});
<?php echo '</script'; ?>
>


</body>
</html><?php }
}
