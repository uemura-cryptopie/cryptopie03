<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>パスワードの再設定 | CryptoPie</title>
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
						パスワードを忘れた方へ
					</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<!-- Form itself -->
				<form id="applicationForm" class="form-horizontal" method="post">
					<section class="panel">
						<div class="panel-body form-body">
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">メールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input id="email" class="form-control" type="email" name="mail">
									{form_error('mail')}
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" name="btnResetPassword" value='true' class="btn btn-primary btn-lg">パスワード再設定を依頼する</button>
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
		var validator = $("#applicationForm").validate({
			errorElement: "p",
			errorClass: "error_text",
			groups: { // エラー表示のグループ化
			},
			rules             : { // バリデーションルールの設定
				"email" : { required: true, check_mail: true }
			},
			errorPlacement: function(error, element) {
				// エラー表示の位置を変更
				eName = element.attr("name");
				// エラー表示の位置を変更
				if (eName == "zip1" || eName == "zip2") {
					error.appendTo(element.closest("div"));
				} else if (eName == "select_02") {
					error.insertAfter(element);
				} else if (eName == "select_03" || eName == "select_04" || eName == "select_05" || eName == "select_06" || eName == "select_07") {
					error.appendTo(element.closest(".form-table-inline"));
				} else {
					// 条件以外はtdタグの中の最後に表示
					error.appendTo(element.closest("div"));
				}
			},
			messages: {
				"email" : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" }
			}
		});
	});
</script>
</body></html>