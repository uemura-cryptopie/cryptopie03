<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新規会員登録 | CryptoPie</title>
	{include file="include/head.tpl"}
</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">
						新規会員登録
					</h2>
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
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}{$controller}/password-register/{$screen}" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録 確認</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<!-- Name -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">名前（漢字）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.family_name|escape|default:''} 
									{$data.dataInsert.first_name|escape|default:''}
								</div>
							</div>

							<!-- Name kana -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">名前（フリガナ）</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.family_name_kana|escape|default:''} 
									{$data.dataInsert.first_name_kana|escape|default:''}
								</div>
							</div>

							<!-- Birthday -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">生年月日</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.year|escape|default:''}年{$data.dataInsert.month|escape|default:''}月{$data.dataInsert.day|escape|default:''}日
								</div>
							</div>
							
							<!-- TEL -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">TEL</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.tel1|escape|default:''}-{$data.dataInsert.tel2|escape|default:''}-{$data.dataInsert.tel3|escape|default:''}
								</div>
							</div>

							<!-- Email -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">メールアドレス</label>
								<div class="col-md-8 col-sm-8">
									{$data.dataInsert.mail|escape|default:''}
								</div>
							</div>

							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							
							{if $data.dataInsert.overseas_address_flag == 0}
								<!-- Zipcode -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">郵便番号</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.post1|escape|default:''}-{$data.dataInsert.post2|escape|default:''}
									</div>
								</div>

								<!-- Prefecture -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">都道府県</label>
									<div class="col-md-8 col-sm-8">
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
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">住所（番地）</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.address|escape|default:''}
									</div>
								</div>
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">建物</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.building|escape|default:''}
									</div>
								</div>
							{elseif $data.dataInsert.overseas_address_flag == 1}
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
							
							<!-- Financial -->
							<h3 class="form-intitle">財務情報</h3>

							<!-- residentialForm -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">自宅形態</label>
								<div class="col-md-8 col-sm-8">
									{$data.residentialFormValue|escape|default:''}
								</div>
							</div>

							<!-- residenceYears -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">居住年数</label>
								<div class="col-md-8 col-sm-8">
									{$data.residenceYearsValue|escape|default:''}
								</div>
							</div>

							<!-- employmentSystem -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">雇用体系</label>
								<div class="col-md-8 col-sm-8">
									{$data.employmentSystemValue|escape|default:''}
								</div>
							</div>

							{if $data.job_flag}
								<!-- officeName -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先名</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.job_name|escape|default:''}
									</div>
								</div>

								<!-- officeZip -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先の郵便番号</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.job_post1|escape|default:''}-{$data.dataInsert.job_post2|escape|default:''}
									</div>
								</div>

								<!-- officeAddress -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先の住所</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.job_address|escape|default:''}
									</div>
								</div>

								<!-- officeTel -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先電話番号</label>
									<div class="col-md-8 col-sm-8">
										{$data.dataInsert.job_tel1|escape|default:''}-{$data.dataInsert.job_tel2|escape|default:''}-{$data.dataInsert.job_tel3|escape|default:''}
									</div>
								</div>

								<!-- serviceLength -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤続年数</label>
									<div class="col-md-8 col-sm-8">
										{$data.serviceLengthValue|escape|default:''}
									</div>
								</div>

								<!-- annualIncome -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">ご年収(昨年度)</label>
									<div class="col-md-8 col-sm-8">
										{$data.annualIncomeValue|escape|default:''}
									</div>
								</div>
							{/if}

							<!-- borrowing -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">既存のお借り入れ</label>
								<div class="col-md-8 col-sm-8">
									{$data.borrowingValue|escape|default:''}
								</div>
							</div>

							<!-- paymentOverdue -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">お支払い延滞の有無</label>
								<div class="col-md-8 col-sm-8">
									{$data.paymentOverdueValue|escape|default:''}
								</div>
							</div>

							<!-- familyStructure -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">家族構成</label>
								<div class="col-md-8 col-sm-8">
									{$data.familyStructureValue|escape|default:''}
								</div>
							</div>

							<!-- Assets -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">投資可能資産</label>
								<div class="col-md-8 col-sm-8">
									<!-- investableAssets -->
									<div>
										{$data.investableAssetsValue|escape|default:''}
									</div>

									<p class="form-text-block">投資可能資産はご自身の資産でお間違えありませんか？</p>

									<!-- investableAssetsRadio -->
									<div>
										{$data.investableAssetsRadioValue|escape|default:''}
									</div>
								</div>
							</div>

							<!-- select_01 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">主な収入源</label>
								<div class="col-md-8 col-sm-8">
									{$data.select01Value|escape|default:''}
								</div>
							</div>

							<!-- checkbox1 -->
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

							<!-- select_02 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">申込の経緯</label>
								<div class="col-md-8 col-sm-8">
									{$data.select02Value|escape|default:''}
									{$data.dataInsert.subscription_text|escape|default:''}
								</div>
							</div>

							<!-- select_03 to select_07 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">投資経験</label>
								<div class="col-md-8 form-table-inline">
									<!-- select_03 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											FX・CFD取引の経験
										</div>
										<div class="col-md-4">
											{$data.select03Value|escape|default:''}
										</div>
									</div>

									<!-- select_04 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											現物株式取引の経験
										</div>
										<div class="col-md-4">
											{$data.select04Value|escape|default:''}
										</div>
									</div>

									<!-- select_05 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											信用株式取引の経験
										</div>
										<div class="col-md-4">
											{$data.select05Value|escape|default:''}
										</div>
									</div>

									<!-- select_06 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											先物オプション取引の経験
										</div>
										<div class="col-md-4">
											{$data.select06Value|escape|default:''}
										</div>
									</div>

									<!-- select_07 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											商品先物取引の経験
										</div>
										<div class="col-md-4">
											{$data.select07Value|escape|default:''}
										</div>
									</div>
								</div>
							</div>
							
							<h3 class="form-intitle">収益移転防止法に関する項目</h3>
							<!-- agree_1 -->
							<div class="form-group form-conf">
								<div class="col-md-8 col-sm-8">
									私は、日本以外に居住地がないことを確約いたします。また、居住地国に変更があった場合は、変更があった日から３ヶ月を経過する日までに異動届出書により申告します。
								</div>
								<div class="col-md-3">
									{if $data.dataInsert.agree_1 == '1'}
										はい
									{else}
										いいえ
									{/if}
								</div>
							</div>

							<!-- agree_2 -->
							<div class="form-group -bg_even">
								<div class="col-md-8 col-sm-8">
									私は、米国納税義務がないことを確約します。
								</div>
								<div class="col-md-3">
									{if $data.dataInsert.agree_2 == '1'}
										はい
									{else}
										いいえ
									{/if}
								</div>
							</div>

							<!-- agree_3 -->
							<div class="form-group form-conf">
								<div class="col-md-8 col-sm-8">
									私は、外国の重要な公人、もしくはその親族ではありません。
								</div>
								<div class="col-md-3">
									{if $data.dataInsert.agree_3 == '1'}
										はい
									{else}
										いいえ
									{/if}
								</div>
							</div>
							
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" name="btnConfirm" value='true' class="btn btn-primary btn-lg">パスワード入力へ</button>
						<button type="button" class="btn btn-default btn-lg pull-left" onclick='window.location.href="{$base_url}pre-registered/register/{$screen}"'>戻る</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
  	{include file="include/footer.tpl"}
	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

</body></html>