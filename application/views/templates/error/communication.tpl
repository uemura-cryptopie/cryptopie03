<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CryptoPie</title>
{include file="include/head.tpl"}
</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">通信エラーが発生しました</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section class="error-content">
		<div class="container">
			<p class="text-center">
				時間を置いてビットコイン送金をお願いいたします。
			</p>
		</div>

		<div class="text-center submit-area">
			<a href="{$base_url}mypage/" class="btn btn-primary btn-lg">HOMEへ戻る</a>
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
<script src="{$js_url}custom.js"></script>

<script>

</script>


</body>
</html>