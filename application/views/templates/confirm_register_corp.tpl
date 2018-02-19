<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新規会員登録（法人） | CryptoPie</title>
	{include file="include/head.tpl"}
</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">新規会員登録（法人）</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">

				<div class="row bs-wizard">
					<div class="col-xs-4 bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">お客様情報入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">パスワード入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">完了</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
				</div>
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}{$controller}/password-register/{$screen}" method="post" novalidate="novalidate">
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>

							<!-- Name -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">法人名（漢字）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.corp_name|escape|default:''}
								</div>
							</div>
							
							<!-- Name kana -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">法人名（フリガナ）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.corp_name_kana|escape|default:''}
								</div>
							</div>
							
							<!-- CEO name and CEO first name -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">代表者名（漢字）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.ceo_name|escape|default:''} {$data.dataInsert.ceo_first_name|escape|default:''}
								</div>
							</div>
							
							<!-- CEO name kana -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">代表者名（フリガナ）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.ceo_name_kana|escape|default:''} {$data.dataInsert.ceo_first_name_kana|escape|default:''}
								</div>
							</div>
							
							{if $data.dataInsert.overseas_address_flag == 0}
								<!-- 日本住所 -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">郵便番号</label>
									<div class="col-md-8 col-sm-8">
										{if $data.dataInsert.post1 != '0'}
											{$data.dataInsert.post1|escape|default:''}
										{/if}
										
										{if $data.dataInsert.post2 != '0'}
											－{$data.dataInsert.post2|escape|default:''}
										{/if}
									</div>
								</div>
								
								<!-- Prefecture -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">都道府県</label>
									<div class="col-sm-5">
										{$data.prefectureValue|escape|default:''}
									</div>
								</div>
								
								<!-- City (Address 1) -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">市区町村</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.city|escape|default:''}
									</div>
								</div>
								
								<!-- Address 2 -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">住所（番地）</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.address|escape|default:''}
									</div>
								</div>
								
								<!-- Address 3 -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">建物</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.building|escape|default:''}
									</div>
								</div>
							{elseif $data.dataInsert.overseas_address_flag == 1}
								<!-- 海外住所 -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Address Line1</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.overseas_adr1|escape|default:''}
									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Address Line2</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.overseas_adr2|escape|default:''}
									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">City</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.overseas_city|escape|default:''}
									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">State/Region</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.overseas_state|escape|default:''}
									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Zipcode</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.overseas_zip|escape|default:''}
									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Country</label>
									<div class="col-md-8 col-sm-8">
										{$data.overseasCountryValue|escape|default:''}
									</div>
								</div>
							{/if}
							
							<!-- TEL -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">TEL</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.tel1|escape|default:''}－{$data.dataInsert.tel2|escape|default:''}－{$data.dataInsert.tel3|escape|default:''}
								</div>
							</div>
							
							<h3 class="form-intitle">取引責任者情報</h3>
							<!-- Pre name and first name -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">取引責任者（漢字）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.pre_name|escape|default:''} {$data.dataInsert.pre_first_name|escape|default:''}
								</div>
							</div>
							
							<!-- Pre name and first name kana -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">取引責任者（フリガナ）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.pre_name_kana|escape|default:''} {$data.dataInsert.pre_first_name_kana|escape|default:''}
								</div>
							</div>
							
							<!-- Pre post 1 and post 2 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">郵便番号</label>
								<div class="col-md-8 col-sm-8">
									{if $data.dataInsert.pre_post1 != '0'}
										{$data.dataInsert.pre_post1|escape|default:''}
									{/if}
									
									{if $data.dataInsert.pre_post2 != '0'}
										{$data.dataInsert.pre_post2|escape|default:''}
									{/if}
								</div>
							</div>
							
							<!-- Pre prefecture -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">都道府県</label>
								<div class="col-sm-5">
									{$data.prePrefectureValue|escape|default:''}
								</div>
							</div>
							
							<!-- Pre city -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">市区町村</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.pre_city|escape|default:''}
								</div>
							</div>
							
							<!-- Pre address -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">住所（番地）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.pre_address|escape|default:''}
								</div>
							</div>

							<!-- Pre building -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">建物</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.pre_building|escape|default:''}
								</div>
							</div>
							
							<!-- Pre tel1, tel2, tel3 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">TEL</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.pre_tel1|escape|default:''}－{$data.dataInsert.pre_tel2|escape|default:''}－{$data.dataInsert.pre_tel3|escape|default:''}
								</div>
							</div>
							
							<h3 class="form-intitle">財務情報</h3>
							<!-- Amount sales -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">前期売上高</label>
								<div class="col-md-8 col-sm-8">
									<div>
										{$data.amountSalesValue|escape|default:''}
									</div>
								</div>
							</div>
							
							<!-- Net Income -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">年間純利益</label>
								<div class="col-md-8 col-sm-8">
									<div>
										{$data.netIncomeValue|escape|default:''}
									</div>
								</div>
							</div>
							
							<!-- Net Worth -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">純資産</label>
								<div class="col-md-8 col-sm-8">
									<div>
										{$data.netWorthValue|escape|default:''}
									</div>
								</div>
							</div>
							
							<!-- Birthday -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">会社設立年月日</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.year|escape|default:''}年{$data.dataInsert.month|escape|default:''}月{$data.dataInsert.day|escape|default:''}日
								</div>
							</div>
							
							<!-- business -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">主な事業内容</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.business|escape|default:''}
								</div>
							</div>
							
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">取引目的</label>
								<div class="col-md-8 col-sm-8">
									<!-- purpose1 -->
									{if $data.dataInsert.purpose1 == '1'}
											仮想通貨を購入して、国内外への送金、決済のため<br>
									{/if}
									
									<!-- purpose2 -->
									{if $data.dataInsert.purpose2 == '1'}
											仮想通貨の価格変動による売買益のため<br>
									{/if}
									
									<!-- purpose3 -->
									{if $data.dataInsert.purpose3 == '1'}
											中・長期投資のため<br>
									{/if}
									
									<!-- purpose4 -->
									{if $data.dataInsert.purpose4 == '1'}
											分散投資を行うため
									{/if}
								</div>
							</div>
							
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">申込の経緯</label>
								<div class="col-md-8 col-sm-8">
									<!-- subscription -->
									{$data.subscriptionValue|escape|default:''}

									<!-- subscription_text -->
									{$data.dataInsert.subscription_text|escape|default:''}
								</div>
							</div>
							
							<h3 class="form-intitle">収益移転防止法に関する項目</h3>
							<div class="form-group form-conf -bg_even">
								<div class="col-md-8 col-sm-8">
									弊社は、米国納税義務がないことを確約します。
								</div>
								<div class="col-md-3">
									{if $data.dataInsert.agree_1 == '1'}
										はい
									{else}
										いいえ
									{/if}
								</div>
							</div>
							
							<div class="form-group form-conf">
								<div class="col-md-8 col-sm-8">
									弊社役員は、外国の重要な公人、もしくはその親族ではありません。
								</div>
								<div class="col-md-3">
									{if $data.dataInsert.agree_2 == '1'}
										はい
									{else}
										いいえ
									{/if}
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" name="btnRegister" value='true' class="btn btn-primary btn-lg">パスワード入力へ</button>
						<button type="button" class="btn btn-default btn-lg pull-left" onclick='window.location.href="{$base_url}pre-registered/register/{$screen}"'>戻る</button>
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


</body></html>