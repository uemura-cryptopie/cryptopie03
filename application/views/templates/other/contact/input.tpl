<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>お問い合わせ | CryptoPie</title>
{include file="include/head.tpl"}
</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
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
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}{$controller}/register/" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">お問い合わせ内容入力</header>
						<div class="panel-body form-body">
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">お名前<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input type="text" class="form-control" placeholder="例）山田　太郎" name="name" value="">
								</div>
								{if isset($error.name)}<p id="name-error" class="error_text">{$error.name|escape}</p>{/if}
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">メールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input type="text" class="form-control" placeholder="例）cryptopie@gmail.com" id="mail" name="mail" value="">
									{if isset($error.mail)}<p id="mail-error" class="error_text">{$error.mail|escape}</p>{/if}
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
									{if isset($error.subject)}<p id="subject-error" class="error_text">{$error.subject|escape}</p>{/if}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">お問い合わせの内容<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<p>
										お問い合わせの内容、発生した時間、ブラウザやPC、スマートフォンなどの環境、などを具体的に記入してお送りください。
									</p>
									<textarea name="text" class="form-control" rows="10" placeholder="お問い合わせの内容、発生した時間、ブラウザやPC、スマートフォンなどの環境、などを具体的に記入してお送りください。"></textarea>
									{if isset($error.text)}<p id="text-error" class="error_text">{$error.text|escape}</p>{/if}
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">お問い合わせを送信</button>
						<button type="button" class="btn btn-default btn-lg pull-left" onclick='window.location.href="{$base_url}"'>TOPへ戻る</button>
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
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
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
</script>


</body>
</html>