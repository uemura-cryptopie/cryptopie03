<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>銀行口座情報の登録 | CryptoPie</title>
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
				<section class="panel documentUpload">
					<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}mypage/bank/register/" method="post">
						<div class="panel-body">
							<h2 class="heading heading-default heading-h2">銀行口座情報の確認</h2>
							<div class="row m-b-20">
								<div class="col-md-10">
									
									<div class="form-group form-conf">
										<label class="col-sm-2 control-label">銀行コード</label>
										<div class="col-sm-2">
											{$params.bankcode|escape}
										</div>
										<label class="col-sm-2 control-label">銀行名</label>
										<div class="col-sm-4">
											{$params.bankname|escape}
										</div>
									</div>
									<div class="form-group form-conf">
										<label class="col-sm-2 control-label">支店コード</label>
										<div class="col-sm-2">
											{$params.branchcode|escape}
										</div>
										<label class="col-sm-2 control-label">支店名</label>
										<div class="col-sm-4">
											{$params.branchname|escape}
										</div>
									</div>
									<div class="form-group form-conf">
										<label class="col-sm-2 control-label">口座区分</label>
										<div class="col-sm-2">
											{$params.accountsubtype|escape}
										</div>
										<label class="col-sm-2 control-label">口座番号</label>
										<div class="col-sm-4">
											{$params.acnumber|escape}
										</div>
									</div>
									<div class="form-group form-conf">
										<label class="col-sm-2 control-label">口座名義</label>
										<div class="col-sm-10">
											{$params.ackana|escape}
										</div>
									</div>
									
								</div>
								
								<div class="col-sm-12 text-center m-b-20">
									<button type="submit" class="btn btn-primary btn-lg">登録する</button>
									<button type="button" class="btn btn-default btn-lg pull-left" id="js_formBack">戻る</button>
								</div>
									
							</div>
						</div>
						
						{foreach from=$params item=item key=key}
							<input type="hidden" name="{$key}" value="{$item|escape}">
						{/foreach}
					</form>
					
					
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
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
	
</script>
</body>
</html>