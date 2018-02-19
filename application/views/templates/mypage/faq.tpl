<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>よくあるご質問 | CryptoPie</title>
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
				<section class="panel faq">
					<div class="panel-body faq-body">
						<h2 class="heading heading-default heading-h2">よくあるご質問</h2>
						<ul class="faq-list">
							{foreach from=$faq item=item key=key}
								<li>
									<div class="faq-question-title"><i class="fa fa-question-circle"></i> {$item.question|escape|default:''}</div>
									<div class="faq-question-body">
										{$item.answer|escape|default:''|nl2br}
									</div>
								</li>
							{/foreach}
						</ul>
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