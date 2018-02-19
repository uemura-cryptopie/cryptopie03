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
				
				<div class="row bs-wizard">
					<div class="col-xs-4 bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">登録</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">パスワード入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">事前登録完了</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
				</div>
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}{$controller}/kojin-password/" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録 確認</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">名前（漢字）</label>
								<div class="col-md-9 col-sm-8">
									{$params.family_name|escape|default:''} {$params.first_name|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">名前（フリガナ）</label>
								<div class="col-md-9 col-sm-8">
									{$params.family_name_kana|escape|default:''} {$params.first_name_kana|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">生年月日</label>
								<div class="col-md-9 col-sm-8">
									{$params.year|escape|default:''}年{$params.month|escape|default:''}月{$params.day|escape|default:''}日
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">TEL</label>
								<div class="col-md-9 col-sm-8">
									{$params.tel1|escape|default:''}-{$params.tel2|escape|default:''}-{$params.tel3|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">メールアドレス</label>
								<div class="col-md-9 col-sm-8">
									{$params.mail|escape|default:''}
								</div>
							</div>
							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">郵便番号</label>
								<div class="col-md-9 col-sm-8">
									{$params.post1|escape|default:''}-{$params.post2|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">都道府県</label>
								<div class="col-sm-5">
									{$pref_list[$params.pref_id]|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">市区町村</label>
								<div class="col-md-9 col-sm-8">
									{$params.city|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">住所（番地）</label>
								<div class="col-md-9 col-sm-8">
									{$params.address|escape|default:''}
								</div>
							</div>
							<div class="form-group form-conf">
								<label class="col-md-3 col-sm-4 control-label">建物</label>
								<div class="col-md-9 col-sm-8">
									{$params.building|escape|default:''}
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">登録する</button>
						<button type="button" class="btn btn-default btn-lg pull-left" id="js_formBack">戻る</button>
					</div>
					{foreach from=$params item=item key=key}
						{if $key|mb_strpos:'password' !== FALSE}{continue}{/if}
						<input type="hidden" name="{$key}" value="{$item|escape}">
					{/foreach}
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
<script src="{$js_url}application.js"></script>

<script>
$(function(){
	appForm.formBack({
		button: '#js_formBack',
		url: '{$base_url}{$controller}/kojin/'
		
	});
});
</script>

</body>
</html>