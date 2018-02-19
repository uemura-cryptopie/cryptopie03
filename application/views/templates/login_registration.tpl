<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>初回ログイン | CryptoPie</title>
	{include file="include/head.tpl"}
</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
	{include file="include/header.tpl"}
	
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
							{form_error('mail')}
							
							<label class="label-mini" for="password">パスワード</label>
							<input id="password" class="form-control" type="password" name='password' placeholder="パスワード">
							{form_error('password')}
							
							<!--
							<p class="login-recaptcha">
								<div id="captcha" class="g-recaptcha" name="captcha" data-sitekey="{RECAPTCHA_KEY}"></div>
							</p>
							{form_error('g-recaptcha-response')}
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
	{include file="include/footer.tpl"}
</div>

<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="{$js_url}jquery.js"></script>
<script src="{$js_url}jquery.easing.1.3.js"></script>
<script src="{$js_url}bootstrap.min.js"></script>
<!-- Vendor Scripts -->
<script src="{$js_url}modernizr.custom.js"></script>
<script src="{$js_url}ofi.min.js"></script>
<script src="{$js_url}jquery.isotope.min.js"></script>
<script src="{$js_url}jquery.magnific-popup.min.js"></script>
<script src="{$js_url}jquery.jpostal.js"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=ja'></script>

<script>

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
</script>
</body></html>