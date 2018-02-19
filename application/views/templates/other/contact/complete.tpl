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
					<h2 class="pageTitle">お問い合わせ 送信完了</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<div class="row text-center">
					<h3>お問い合わせの送信が完了いたしました。</h3>
					<p class="text-lead">
						この度はお問い合わせメールをお送りいただきありがとうございます。<br>
						後ほど、担当者よりご連絡をさせていただきます。<br>
						今しばらくお待ちくださいますようよろしくお願い申し上げます。
					</p>
				</div>
				<div class="text-center submit-area">
					<a href="{$base_url}" class="btn btn-primary btn-lg">TOPへ戻る</a>
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
<script src="{$js_url}application.js"></script>

</body>
</html>