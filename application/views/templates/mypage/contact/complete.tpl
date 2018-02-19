<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>お問い合わせ | CryptoPie</title>
{include file="../include/head.tpl"}
</head>
<body class="skin-black">
{include file="../include/header.tpl"}
	<div class="wrapper row-offcanvas row-offcanvas-left">
		{include file="../include/side.tpl"}
		<aside class="right-side">
			
			<!-- Main content -->
			<section class="content">
				
				<!-- Form itself -->
				<section class="panel" style="max-width:800px; min-height: 450px;">
					<div class="panel-body text-center">
						<h2 class="heading heading-default heading-h2">お問い合わせの送信が完了いたしました。</h2>
						<div class="row">
							<div class="col-md-12 m-b-20">
								<p class="text-lead">
									この度はお問い合わせメールをお送りいただきありがとうございます。<br>
									後ほど、担当者よりご連絡をさせていただきます。<br>
									今しばらくお待ちくださいますようよろしくお願い申し上げます。
								</p>
							</div>
							<div class="col-md-12 text-center submit-area">
								<a href="{$base_url}mypage/" class="btn btn-primary btn-lg m-l-15">HOMEへ戻る</a>
							</div>
						</div>
					</div>
					
				</section>
				
			</section><!-- /.content -->
			
			{include file="../include/footer.tpl"}
			
		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->



<!-- Placed at the end of the document so the pages load faster -->
<script src="{$js_url}jquery.js"></script>
<script src="{$js_url}jquery.easing.1.3.js"></script>
<script src="{$js_url}bootstrap.min.js"></script>
<!-- Vendor Scripts -->
<script src="{$js_url}modernizr.custom.js"></script>
<script src="{$js_url}Director/app.js"></script>

<script src="{$js_url}application.js"></script>

</body>
</html>