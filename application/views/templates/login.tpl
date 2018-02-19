<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ログイン | CryptoPie</title>
{include file="include/head.tpl"}
<script src='https://www.google.com/recaptcha/api.js?hl=ja'></script>
</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
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
							{validation_errors()}
							
							<label class="label-mini" for="email">メールアドレス2</label>
							<input id="email" class="form-control" type="email" name="mail" placeholder="メールアドレス">
							
							<label class="label-mini" for="password">パスワード</label>
							<input id="password" class="form-control" type="password" name="password" placeholder="パスワード">
							
							<div class="row">
								<div class="col-md-offset-2 col-md-8 col-md-offset-2">
									<button class="login-btn btn btn-primary btn-lg">ログインする<i class="fa fa-angle-right"></i></button>
									<p class="text-center"><a href="{$base_url}forgot-password">パスワードを忘れた方はこちら</a></p>
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
<script src="{$js_url}jquery.fancybox.pack.js"></script>
<script src="{$js_url}jquery.fancybox-media.js"></script>
<script src="{$js_url}jquery.flexslider.js"></script>
<script src="{$js_url}animate.js"></script>
<!-- Vendor Scripts -->
<script src="{$js_url}modernizr.custom.js"></script>
<script src="{$js_url}ofi.min.js"></script>
<script src="{$js_url}jquery.isotope.min.js"></script>
<script src="{$js_url}jquery.magnific-popup.min.js"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}custom.js"></script>

<!-- 
<script>
   	objectFitImages('img.object-fit-img');
   	$("form").submit(function(event) {
	 	$('#isRecaptcha').remove();
	    	var recaptcha = $("#g-recaptcha-response").val();
	    	if (recaptcha === "") {
	       	$('.g-recaptcha').append('<p id="isRecaptcha" class="error_text">チェックを入れてください</p>');
	 		return false;
	    	}
	 });
</script>
-->
</body>
</html>