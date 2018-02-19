<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>本人確認書類のアップロード | CryptoPie</title>
{include file="./include/head.tpl"}
</head>
<body class="skin-black">
{include file="./include/header.tpl"}
	<div class="wrapper row-offcanvas row-offcanvas-left">
		{include file="./include/side.tpl"}
		<aside class="right-side">
			
			<!-- Main content -->
			<section class="content">
				
				
				<!-- Form itself -->
				<section class="panel">
					<div class="panel-body">
						<h2 class="heading heading-default heading-h2">本人確認書類のアップロード</h2>
						<div class="row m-b-20">
							<div class="col-md-12 text-center m-b-20">
								<h3>本人確認処理を受け付けました</h3>
								<p class="text-lead m-b-20">
									確認までに3営業日～4営業程お時間がかかる場合がございます。<br>
									書類確認後御登録の住所に住所確認書類を送付させていただきます。<br>
									<br>
									住所確認書類到着後、お取引可能になります。
								</p>
								<div class="text-center submit-area">
									<a href="{$base_url}mypage" class="btn btn-primary btn-lg">HOMEへ戻る</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				
			</section><!-- /.content -->
			
			{include file="./include/footer.tpl"}
			
		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->


<!-- jQuery -->
<script src="{$js_url}jquery.js" type="text/javascript"></script>
<!-- jQuery UI 1.10.3 -->
<script src="{$js_url}jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{$js_url}bootstrap.min.js" type="text/javascript"></script>

<!-- clipboard -->
<script src="{$js_url}plugins/clipboard/clipboard.min.js"></script>

<!-- Director App -->
<script src="{$js_url}Director/app.js" type="text/javascript"></script>
<script src="{$js_url}application.js"></script>

<!-- Director for demo purposes -->
</body>
</html>