<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-16 17:16:39
=======
/* Smarty version 3.1.31, created on 2018-02-08 14:52:20
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\confirm_register_user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a869367735cd5_49914919',
=======
  'unifunc' => 'content_5a7be59407c468_67947566',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5f5a988325428ca046cb034f6a54f5c683ffcc9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\confirm_register_user.tpl',
      1 => 1504416304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/head.tpl' => 1,
    'file:include/header.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
<<<<<<< HEAD
function content_5a869367735cd5_49914919 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7be59407c468_67947566 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>新規会員登録 | CryptoPie</title>
	<?php $_smarty_tpl->_subTemplateRender("file:include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
	<?php $_smarty_tpl->_subTemplateRender("file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
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
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;
echo $_smarty_tpl->tpl_vars['controller']->value;?>
/password-register/<?php echo $_smarty_tpl->tpl_vars['screen']->value;?>
" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録 確認</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<!-- Name -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">名前（漢字）</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['family_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['first_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- Name kana -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">名前（フリガナ）</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['family_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['first_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- Birthday -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">生年月日</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['year'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
年<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['month'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
月<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['day'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
日
								</div>
							</div>
							
							<!-- TEL -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">TEL</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['tel1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['tel2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['tel3'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- Email -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">メールアドレス</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['mail'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							
							<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_address_flag'] == 0) {?>
								<!-- Zipcode -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">郵便番号</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['post1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['post2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- Prefecture -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">都道府県</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['prefectureValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- City (Address 1) -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">市区町村</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">住所（番地）</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['address'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">建物</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['building'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
							<?php } elseif ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_address_flag'] == 1) {?>
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Address Line1</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_adr1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Address Line2</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_adr2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">City</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">State/Region</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_state'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Zipcode</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_zip'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
								
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">Country</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['overseasCountryValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
							<?php }?>
							
							<!-- Financial -->
							<h3 class="form-intitle">財務情報</h3>

							<!-- residentialForm -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">自宅形態</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['residentialFormValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- residenceYears -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">居住年数</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['residenceYearsValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- employmentSystem -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">雇用体系</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['employmentSystemValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<?php if ($_smarty_tpl->tpl_vars['data']->value['job_flag']) {?>
								<!-- officeName -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先名</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- officeZip -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先の郵便番号</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_post1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_post2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- officeAddress -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先の住所</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_address'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- officeTel -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤務先電話番号</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel3'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- serviceLength -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">勤続年数</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['serviceLengthValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>

								<!-- annualIncome -->
								<div class="form-group form-conf">
									<label class="col-md-4 col-sm-4 control-label">ご年収(昨年度)</label>
									<div class="col-md-8 col-sm-8">
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['annualIncomeValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
							<?php }?>

							<!-- borrowing -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">既存のお借り入れ</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['borrowingValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- paymentOverdue -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">お支払い延滞の有無</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['paymentOverdueValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- familyStructure -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">家族構成</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['familyStructureValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- Assets -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">投資可能資産</label>
								<div class="col-md-8 col-sm-8">
									<!-- investableAssets -->
									<div>
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['investableAssetsValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>

									<p class="form-text-block">投資可能資産はご自身の資産でお間違えありませんか？</p>

									<!-- investableAssetsRadio -->
									<div>
										<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['investableAssetsRadioValue'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									</div>
								</div>
							</div>

							<!-- select_01 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">主な収入源</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select01Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

								</div>
							</div>

							<!-- checkbox1 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">取引目的</label>
								<div class="col-md-8 col-sm-8">
									<!-- purpose1 -->
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose1'] == '1') {?>
											仮想通貨を購入して、国内外への送金、決済のため<br>
									<?php }?>
									
									<!-- purpose2 -->
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose2'] == '1') {?>
											仮想通貨の価格変動による売買益のため<br>
									<?php }?>
									
									<!-- purpose3 -->
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose3'] == '1') {?>
											中・長期投資のため<br>
									<?php }?>
									
									<!-- purpose4 -->
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose4'] == '1') {?>
											分散投資を行うため
									<?php }?>
								</div>
							</div>

							<!-- select_02 -->
							<div class="form-group form-conf">
								<label class="col-md-4 col-sm-4 control-label">申込の経緯</label>
								<div class="col-md-8 col-sm-8">
									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select02Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

									<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['subscription_text'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

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
											<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select03Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

										</div>
									</div>

									<!-- select_04 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											現物株式取引の経験
										</div>
										<div class="col-md-4">
											<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select04Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

										</div>
									</div>

									<!-- select_05 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											信用株式取引の経験
										</div>
										<div class="col-md-4">
											<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select05Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

										</div>
									</div>

									<!-- select_06 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											先物オプション取引の経験
										</div>
										<div class="col-md-4">
											<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select06Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

										</div>
									</div>

									<!-- select_07 -->
									<div class="form-group form-conf">
										<div class="col-md-8">
											商品先物取引の経験
										</div>
										<div class="col-md-4">
											<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['select07Value'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

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
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_1'] == '1') {?>
										はい
									<?php } else { ?>
										いいえ
									<?php }?>
								</div>
							</div>

							<!-- agree_2 -->
							<div class="form-group -bg_even">
								<div class="col-md-8 col-sm-8">
									私は、米国納税義務がないことを確約します。
								</div>
								<div class="col-md-3">
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_2'] == '1') {?>
										はい
									<?php } else { ?>
										いいえ
									<?php }?>
								</div>
							</div>

							<!-- agree_3 -->
							<div class="form-group form-conf">
								<div class="col-md-8 col-sm-8">
									私は、外国の重要な公人、もしくはその親族ではありません。
								</div>
								<div class="col-md-3">
									<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_3'] == '1') {?>
										はい
									<?php } else { ?>
										いいえ
									<?php }?>
								</div>
							</div>
							
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" name="btnConfirm" value='true' class="btn btn-primary btn-lg">パスワード入力へ</button>
						<button type="button" class="btn btn-default btn-lg pull-left" onclick='window.location.href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
pre-registered/register/<?php echo $_smarty_tpl->tpl_vars['screen']->value;?>
"'>戻る</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
  	<?php $_smarty_tpl->_subTemplateRender("file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

</body></html><?php }
}
