<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新規会員登録（法人） | CryptoPie</title>
	{include file="include/head.tpl"}
</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
	{include file="include/header.tpl"}

	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">
						新規会員登録（法人）
					</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<div class="row bs-wizard">
					<div class="col-xs-4 bs-wizard-step complete">
						<div class="text-center bs-wizard-stepnum">お客様情報入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">パスワード入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">完了</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
				</div>
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" method="post" novalidate="novalidate">
					<section class="panel">
						<header class="panel-heading form-heading">パスワード設定</header>
						<div class="panel-body form-body showPassword" id="js_showPass">
							
							<div class="form-group">
								<label class="col-sm-3 control-label">パスワード</label>
								<div class="col-sm-6">
									<input type="password" name="password" autocomplete="off" value="" class="form-control input new_password">
								</div>
								<div class="col-sm-3">
									<a href="#">表示する</a>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">確認パスワード</label>
								<div class="col-sm-6">
									<input type="password" name="password_again" autocomplete="off" value="" class="form-control input">
								</div>
								<div class="col-sm-3">
									<a href="#">表示する</a>
								</div>
							</div>

						</div>
					</section>
					<div class="text-center submit-area">
						<button type="button" name="btnBack" class="btn btn-default btn-lg pull-left" onclick='window.location.href="{$base_url}pre-registered/confirm-register/{$screen}"'>戻る</button>
						<button type="submit" name="btnPassword" value='true' class="btn btn-primary btn-lg">パスワードを設定する</button>
					</div>
				</form>
				
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
<script src="{$js_url}jquery.magnific-popup.min.js"></script>
<script src="{$js_url}jquery.jpostal.js"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
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
				check_password: "半角英字１文字以上・半角数字１文字以上を含めてください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			},
			"password_again"        : {
				required: "「確認パスワード」が正しくありません。",
				equalTo: "「確認パスワード」が正しくありません。",
				check_password: "半角英字１文字以上・半角数字１文字以上を含めてください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			}
		}
	});
});
</script>
</body></html>