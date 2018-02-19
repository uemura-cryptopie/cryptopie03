<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>事前登録（個人） | CryptoPie</title>
{include file="include/head.tpl"}

</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">事前登録（個人）</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}{$controller}/kojin/" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">利用規約同意確認</header>
						<div class="panel-body form-body">
							
							<div class="terms_frame js_scroll" id="js_terms_frame">
								<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
								<div class="viewport">
									<div class="overview terms_frame_overview">
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト<br>
										テキストテキストテキストテキストテキストテキストテキストテキスト<br>
										
										
										
									</div>
								</div>
							</div>
							
						</div>
					</section>
					<div class="row terms_check js_scroll_check">
						<p class="terms_check--input"><label class="label_input"><input type="checkbox" class="input_check" name="xxx2">上記、利用規約に同意致しました。</label></p>
					</div>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg" disabled="disabled" id="js_submit">次へ</button>
						<button type="button" onclick="location.href='{$base_url}'" class="btn btn-default btn-lg pull-left">戻る</button>
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
<script src="{$js_url}jquery.tinyscrollbar.min.js"></script>
<script src="{$js_url}application.js"></script>

<script>
{literal}
$(function(){
	var $frame = $('#js_terms_frame'),
			height = $frame.outerHeight(),
			$check = $('.js_scroll_check'),
			$checkInput = $check.find('input'),
			scrollFlag = false;
	$check.css('color', "#aaa");
	$checkInput.prop('disabled', true);

	$frame.tinyscrollbar();
	var scrollbarData = $frame.data("plugin_tinyscrollbar");

	$frame.on('move', function() {
		var threshold       = 0.9,
				positionCurrent = scrollbarData.contentPosition + scrollbarData.viewportSize,
				positionEnd     = scrollbarData.contentSize * threshold;
		if(positionCurrent >= positionEnd) {
			$check.css('color', "#000");
			$checkInput.prop('disabled', false);
			scrollFlag = true;
			checkSubmit();
		}
	});


	$checkInput.on('click', function(e) {
		checkSubmit();
	});

	checkSubmit();

	function checkSubmit(){
		var $submit = $('#js_submit'),
				flag = false;
		var checks = $checkInput;
		for (var i = 0, len = checks.length; i < len; i++) {
			if (!checks[i].checked || checks[i].disabled) {
				flag = false;
				break;
			}
			flag = true;
		}

		if(flag && scrollFlag) {
			$submit.prop('disabled', false);
		} else {
			$submit.prop('disabled', true);
		}
	}
});
{/literal}
</script>


</body>
</html>