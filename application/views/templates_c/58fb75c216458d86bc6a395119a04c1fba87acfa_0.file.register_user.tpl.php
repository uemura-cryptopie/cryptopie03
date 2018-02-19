<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-16 17:00:23
=======
/* Smarty version 3.1.31, created on 2018-02-08 14:48:27
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\register_user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a868f978053f7_90099171',
=======
  'unifunc' => 'content_5a7be4ab09a1d5_51225579',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58fb75c216458d86bc6a395119a04c1fba87acfa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\register_user.tpl',
      1 => 1518067604,
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
function content_5a868f978053f7_90099171 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7be4ab09a1d5_51225579 (Smarty_Internal_Template $_smarty_tpl) {
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
/confirm-register/<?php echo $_smarty_tpl->tpl_vars['screen']->value;?>
" method="post" novalidate="novalidate">
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>

							<!-- Name -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">名前（漢字）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="苗字" name="name_sei" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['family_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									<input type="text" class="form-control input -col-2" placeholder="名前" name="name_mei" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['first_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
								</div>
							</div>

							<!-- Name kana -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">名前（フリガナ）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="ミョウジ" name="name_sei_kana" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['family_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									<input type="text" class="form-control input -col-2" placeholder="ナマエ" name="name_mei_kana" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['first_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
								</div>
							</div>

							<!-- Birthday -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">生年月日<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<select name="birthday_y" class="select form-control m-b-10">
										<option value="">----</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['year'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['year'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select><span>年</span>
									<select name="birthday_m" class="select form-control m-b-10">
										<option value="">--</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['month'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['month'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select><span>月</span>
									<select name="birthday_d" class="select form-control m-b-10">
										<option value="">--</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['day'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['day'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select><span>日</span>
								</div>
							</div>
							
							<!-- TEL -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">TEL<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<input type="text" class="form-control input -col-tel" name="tel1" maxlength="5" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['tel1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel2" maxlength="4" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['tel2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel3" maxlength="4" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['tel3'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
								</div>
							</div>

							<!-- Zip code -->
							<h3 class="form-intitle">現住所(ご登録住所)</h3>

							<div class="form-group">
								<label class="col-md-12 col-sm-12 checkbox text-center" id="js_address">
									<input name="overseas_address_flag" class="input_check" value="1" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_address_flag'] == '1') {?> checked="checked"<?php }?>>
									<span>海外にお住まいの方はこちらをチェックしてください</span>
								</label>
							</div>

							<!-- 日本住所 -->
							<div class="js_addressBlock" style="display: block;">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">郵便番号<span class="form-icon-required">必須</span></label>
									<div class="form-inline col-md-8 col-sm-8">
										<!-- zip 1 -->
										<input type="text" name="zip1" class="form-control input -col-4 js_numOnry size_post" maxlength="3" id="user_zip1" pattern="\d*" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['post1'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['post1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>"><span>－</span>
										<!-- zip 2 -->
										<input type="text" name="zip2" class="form-control input -col-4 js_numOnry size_post" maxlength="4" id="user_zip2" pattern="\d*" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['post2'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['post2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>">
										<!-- button zip -->
										<button type="button" class="btn btn-primary zip_btn" id="zip_btn"> 住所変換 </button>
									</div>
								</div>

								<!-- Prefecture -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">都道府県<span class="form-icon-required">必須</span></label>
									<div class="col-sm-5">
										<select name="adr1" class="select form-control m-b-10" id="pref">
											<option value="">選択してください</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['pref_list'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['pref_id'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										</select>
									</div>
								</div>

								<!-- City (Address 1) -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">市区町村<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="adr2" maxlength="30" class="form-control input" id="city" placeholder="例）新宿区" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									</div>
								</div>

								<!-- Address 2 -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">住所（番地）<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="adr3" class="form-control input" id="address1" maxlength="40" placeholder="例）○○○1-2-3" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['address'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									</div>
								</div>

								<!-- Address 3 -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">建物</label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="adr4" class="form-control input" maxlength="40" placeholder="例）メゾンドハイツ105" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['building'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									</div>
								</div>
							</div>

							<!-- 海外住所 -->
							<div class="js_addressBlock" disabled="disabled" style="display: none;">
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">Address Line1<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="overseas_adr1" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_adr1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" maxlength="100" class="form-control input" placeholder="" disabled="disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">Address Line2<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="overseas_adr2" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_adr2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" maxlength="100" class="form-control input" placeholder="" disabled="disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">City<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="overseas_city" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" maxlength="100" class="form-control input" placeholder="" disabled="disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">State/Region<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="overseas_state" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_state'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" maxlength="100" class="form-control input" placeholder="" disabled="disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">Zipcode<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" name="overseas_zip" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_zip'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" maxlength="100" class="form-control input" placeholder="" disabled="disabled">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">Country<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<select class="select form-control m-b-10" name="overseas_country_id" id="countrySelect" disabled="disabled">
											<option value="">Please select</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['overseas_country_list'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['overseas_country_id'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										</select>
									</div>
								</div>
							</div>
							
							<!-- Financial -->
							<h3 class="form-intitle">財務情報</h3>
							<!-- residentialForm -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">自宅形態<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="residentialForm">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['residentialForm'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['home_type'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>

							<!-- residenceYears -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">居住年数<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="residenceYears">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['residenceYears'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['stay_year'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>

							<!-- employmentSystem -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">雇用体系<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="employmentSystem" id="office_select">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['employmentSystem'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>
							
							
							<div class="officeArea" id="js_officeArea">
								
								<!-- officeName -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">勤務先名<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" class="form-control" name="officeName" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									</div>
								</div>

								<!-- officeZip -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">勤務先の郵便番号<span class="form-icon-required">必須</span></label>
									<div class="form-inline col-md-8 col-sm-8">
										<input type="text" name="officeZip1" class="form-control input -col-4 js_numOnry size_post" maxlength="3" id="user_zip1_office" pattern="\d*" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_post1'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_post1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>"><span>－</span>
										<input type="text" name="officeZip2" class="form-control input -col-4 js_numOnry size_post" maxlength="4" id="user_zip2_office" pattern="\d*" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_post2'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_post2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>">
										<button type="button" class="btn btn-primary zip_btn" id="zip_btn_office"> 住所変換 </button>
									</div>
								</div>

								<!-- officeAddress -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">勤務先の住所<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<input type="text" class="form-control" name="officeAddress" id="address_office" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_address'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
">
									</div>
								</div>

								<!-- officeTel -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">勤務先電話番号<span class="form-icon-required">必須</span></label>
									<div class="form-inline col-md-8 col-sm-8">
										<input type="text" class="form-control input -col-tel" name="officeTel1" maxlength="5" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel1'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>"><span>－</span>
										<input type="text" class="form-control input -col-tel" name="officeTel2" maxlength="4" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel2'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>"><span>－</span>
										<input type="text" class="form-control input -col-tel" name="officeTel3" maxlength="4" value="<?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel3'] != '0') {
echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_tel3'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);
}?>">
									</div>
								</div>

								<!-- serviceLength -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">勤続年数<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<select class="select form-control m-b-10" name="serviceLength">
											<option value="">選択してください</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['serviceLength'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['job_year'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										</select>
									</div>
								</div>
								
								<!-- annualIncome -->
								<div class="form-group">
									<label class="col-md-4 col-sm-4 control-label">ご年収(昨年度)<span class="form-icon-required">必須</span></label>
									<div class="col-md-8 col-sm-8">
										<select class="select form-control m-b-10" name="annualIncome">
											<option value="">選択してください</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['annualIncome'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['guarantee'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										</select>
									</div>
								</div>
								
							</div>

							<!-- borrowing -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">既存のお借り入れ<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="borrowing">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['borrowing'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['debt1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>

							<!-- paymentOverdue -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">お支払い延滞の有無<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="paymentOverdue">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['paymentOverdue'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['debt2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>

							<!-- familyStructure -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">家族構成 (独身or既婚)<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="familyStructure">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['familyStructure'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['famiry'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>

							<!-- Assets -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label"><span class="form-icon-required">必須</span>投資可能資産を<br>ご選択ください。</label>
								<div class="col-md-8 col-sm-8">
									<!-- investableAssets -->
									<div>
										<select class="select form-control m-b-10" name="investableAssets">
											<option value="">選択してください</option>
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['investableAssets'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['investment_asset'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
											<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

										</select>
									</div>

									<p class="form-text-block">投資可能資産はご自身の資産でお間違えありませんか？</p>

									<!-- investableAssetsRadio -->
									<div>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['investableAssetsRadio'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<label class="checkbox-inline radio">
												<input type="radio" name="investableAssets_radio" class="input_radio" value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['investment_asset_flag'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> checked="checked"<?php }?>>
												<span><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</span>
											</label>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</div>
								</div>
							</div>

							<!-- select_01 -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label"><span class="form-icon-required">必須</span>主な収入源を<br>ご選択ください。</label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="select_01">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select01'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['income'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
								</div>
							</div>

							<!-- checkbox1 -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label"><span class="form-icon-required">必須</span>取引目的をご選択ください。<br>（複数選択可）</label>
								<div class="col-md-8 col-sm-8">
									<!-- purpose1 -->
									<label class="checkbox">
										<input type="checkbox" name="purpose1" class="input_check js_purpose" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose1'] == '1') {?> checked="checked"<?php }?>>
										<span>仮想通貨を購入して、国内外への送金、決済のため</span>
									</label>
									
									<!-- purpose2 -->
									<label class="checkbox">
										<input type="checkbox" name="purpose2" class="input_check js_purpose" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose2'] == '1') {?> checked="checked"<?php }?>>
										<span>仮想通貨の価格変動による売買益のため</span>
									</label>
									
									<!-- purpose3 -->
									<label class="checkbox">
										<input type="checkbox" name="purpose3" class="input_check js_purpose" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose3'] == '1') {?> checked="checked"<?php }?>>
										<span>中・長期投資のため</span>
									</label>
									
									<!-- purpose4 -->
									<label class="checkbox">
										<input type="checkbox" name="purpose4" class="input_check js_purpose" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['purpose4'] == '1') {?> checked="checked"<?php }?>>
										<span>分散投資を行うため</span>
									</label>
								</div>
							</div>

							<!-- select_02 -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label"><span class="form-icon-required">必須</span>申込の経緯をご選択ください。</label>
								<div class="col-md-8 col-sm-8">
									<select class="select form-control m-b-10" name="select_02">
										<option value="">選択してください</option>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select02'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['subscription'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

									</select>
									<p class="form-text-block">その他をご選択された方は具体的な申込経緯をご記入ください。</p>
									<input type="text" class="form-control" name="select_02_other" value="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['subscription_text'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
" maxlength="50">
									<p class="form-text-block">※50文字以内で記入してください</p>
								</div>
							</div>

							<!-- select_03 to select_07 -->
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label"><span class="form-icon-required">必須</span>投資経験</label>
								<div class="col-md-8 form-table-inline">
									<!-- select_03 -->
									<div class="form-group">
										<div class="col-md-8">
											FX・CFD取引のご経験をご選択ください。
										</div>
										<div class="col-md-4">
											<select class="select form-control m-b-10" name="select_03">
												<option value="">選択してください</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select03'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['fx_trade'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

											</select>
										</div>
									</div>

									<!-- select_04 -->
									<div class="form-group">
										<div class="col-md-8">
											現物株式取引のご経験をご選択ください。
										</div>
										<div class="col-md-4">
											<select class="select form-control m-b-10" name="select_04">
												<option value="">選択してください</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select04'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['cash_trade'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

											</select>
										</div>
									</div>

									<!-- select_05 -->
									<div class="form-group">
										<div class="col-md-8">
											信用株式取引のご経験をご選択ください。
										</div>
										<div class="col-md-4">
											<select class="select form-control m-b-10" name="select_05">
												<option value="">選択してください</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select05'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['credit_trade'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

											</select>
										</div>
									</div>

									<!-- select_06 -->
									<div class="form-group">
										<div class="col-md-8">
											先物オプション取引のご経験をご選択ください。
										</div>
										<div class="col-md-4">
											<select class="select form-control m-b-10" name="select_06">
												<option value="">選択してください</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select06'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['option_trade'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

											</select>
										</div>
									</div>

									<!-- select_07 -->
									<div class="form-group">
										<div class="col-md-8">
											商品先物取引のご経験をご選択ください。
										</div>
										<div class="col-md-4">
											<select class="select form-control m-b-10" name="select_07">
												<option value="">選択してください</option>
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['select07'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['dataInsert']['item_trade'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp)) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
												<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

											</select>
										</div>
									</div>
								</div>
							</div>
							
							<h3 class="form-intitle">収益移転防止法に関する項目</h3>
							<div class="agreeSelect">
								<!-- agree_1 -->
								<div class="form-group">
									<div class="col-md-8 col-sm-8">
										<span class="form-icon-required -inline">必須</span>
										<p class="form-label-text">
											私は、日本以外に居住地がないことを確約いたします。また、居住地国に変更があった場合は、変更があった日から３ヶ月を経過する日までに異動届出書により申告します。
										</p>
									</div>
									<div class="col-md-3">
										<label class="checkbox-inline radio">
											<input type="radio" name="agree_1" value='1' class="input_radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_1'] == '1') {?> checked="checked"<?php }?>>
											<span>はい</span>
										</label>
										<label class="checkbox-inline radio">
											<input type="radio" name="agree_1" value='2' class="input_radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_1'] == '2') {?> checked="checked"<?php }?>>
											<span>いいえ</span>
										</label>
									</div>
								</div>

								<!-- agree_2 -->
								<div class="form-group -bg_even">
									<div class="col-md-8 col-sm-8">
										<span class="form-icon-required -inline">必須</span>
										<p class="form-label-text">
											私は、米国納税義務がないことを確約します。
										</p>
									</div>
									<div class="col-md-3">
										<label class="checkbox-inline radio">
											<input type="radio" name="agree_2" value='1' class="input_radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_2'] == '1') {?> checked="checked"<?php }?>>
											<span>はい</span>
										</label>
										<label class="checkbox-inline radio">
											<input type="radio" name="agree_2" value='2' class="input_radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_2'] == '2') {?> checked="checked"<?php }?>>
											<span>いいえ</span>
										</label>
									</div>
								</div>

								<!-- agree_3 -->
								<div class="form-group">
									<div class="col-md-8 col-sm-8">
										<span class="form-icon-required -inline">必須</span>
										<p class="form-label-text">
											私は、外国の重要な公人、もしくはその親族ではありません。
										</p>
									</div>
									<div class="col-md-3">
										<label class="checkbox-inline radio">
											<input type="radio" name="agree_3" value='1' class="input_radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_3'] == '1') {?> checked="checked"<?php }?>>
											<span>はい</span>
										</label>
										<label class="checkbox-inline radio">
											<input type="radio" name="agree_3" value='2' class="input_radio" <?php if ($_smarty_tpl->tpl_vars['data']->value['dataInsert']['agree_3'] == '2') {?> checked="checked"<?php }?>>
											<span>いいえ</span>
										</label>
									</div>
								</div>
								
							</div>
						</div>
					</section>
					<section class="panel">
						<div class="panel-body form-body">
							<div class="terms_frame">
								<div class="overview terms_frame_overview">
									
									<h2 class="terms_maintitle">利用規約</h2>
									<h3 class="terms_title">CryptoPie 利用規約</h3>
									<p class="terms_text">
										本利用規約は、株式会社CryptoPie（以下「当社」といいます。）が提供するウェブサービス「CryptoPie」（ドメイン「http://cryptopie.com/」において提供されるウェブサービスであり、以下「本サービス」といいます。）に関し、第２条に定める本会員及び本会員であった者と当社との間の権利義務関係を定めるものです。
									</p>
									<h3 class="terms_title">第１条 本利用規約の適用</h3>
									<ul class="terms_list">
										<li>1.本利用規約は、当社と本会員（以下、本条においては、本会員であった者を含む。）との間に適用され、本サービスに関する当社と本会員との間の一切の権利義務関係を定めるものとします。</li>
										<li>2.本会員は、本サービス利用の前提として、本利用規約全文の内容を理解の上で、本利用規約が本サービスに関する当社と本会員との間の一切の権利義務関係を定めるものであることについて同意しなければならないものとします。</li>
										<li>3.本会員が本サービスを利用する場合、本利用規約が本サービスに関する当社と本会員との間の一切の権利義務関係を定めるものであることについて同意したとみなされるものとします。</li>
									</ul>
									<h3 class="terms_title">第２条 本会員</h3>
									<ul class="terms_list">
										<li>1.本会員となろうとする者は、当社が定める手続に従って会員登録申請を行うものとします。当社は、当社の裁量により、会員登録申請の拒否を判断し、当社により会員登録を認められた者を本会員とします。</li>
										<li>2.本会員は、登録したログインＩＤ及びパスワードを自己の責任により管理するものとし、第三者に本会員としての地位の譲渡、利用許諾等の一切の処分をすることができないものとします。</li>
										<li>3.当社は、本会員が以下の各号のいずれか一つに該当したと判断した場合、本会員の登録抹消の処分をすることができるものとします。</li>
										<li>4.①本利用規約に違反した場合</li>
										<li>5.②本会員が登録したメールアドレスに対して当社が期限を定めて一定の回答を求める連絡をしたにもかかわらず、本会員から返答がなかった場合</li>
										<li>6.③本会員自身、本会員の役員若しくは従業員、若しくはその関係者が反社会勢力に該当した場合、又は、反社会勢力と直接若しくは間接を問わず関係を有した場合</li>
										<li>7.④その他当社が本会員として相応しくないと判断した場合</li>
										<li>8.⑤第６条の表明・保証に違反があった場合</li>
										<li>9.本会員は、本会員としての登録の抹消を希望する場合、当社が定める手続に従って本会員の登録抹消をすることができるものとします。</li>
									</ul>
									<h3 class="terms_title">第３条 本サービスの仕様及び利用許諾</h3>
									<ul class="terms_list">
										<li>1.利用許諾 1) 当社は、本会員に対し、本利用規約に従って本サービスを利用することを許諾します。</li>
										<li>2.2)本会員は本利用規約に従って本サービスを利用することができるものとします。ただし，当該利用許可は，本会員が本サービスを本利用規約により許可された方法で使用することを唯一の目的としております。</li>
										<li>3.仕様 1)本サービスの機能及び仕様は，下記4)記載のほか，当社が「http://cryptopie.com/」（これより下位の階層のウェブページを含む。）に掲載する内容とします。</li>
										<li>4.2)当社は，本サービスの仕様を当社の裁量によって随時変更するものとし，本会員は，これにあらかじめ同意するものとします。</li>
										<li>5.3)本会員は，本サービスの仕様が随時変更されるものであることを認識し，上記1)に掲載される内容を適時確認するものとします。</li>
										<li>6.4)本サービスの仕様は以下のとおりとします。本会員は，以下の各仕様をいずれも理解し，あらかじめこれに承諾します。</li>
										<li>7.①本サービスが永続することは保証されません。</li>
										<li>8.②本サービスの仕様は，当社により随時変更されます。</li>
										<li>9.③本サービスの利用にあたって本会員が送信したデータが当社により永続的に確実に保持されることは保証されません。消失を望まない重要なデータについては本会員が自らバックアップを取る必要があります。</li>
										<li>10.④通信環境の障害，天災，火災，戦争，テロ行為その他の理由により，本サービスの継続が不能又は困難となる事態が生じることがあり，当社は，本会員に事前の予告なく，本サービス又は本システムの全部又は一部について停止・中断する場合があります。</li>
										<li>11.⑤当社は，システムの管理・保守などのメンテナンスを行う目的，又は，システムの機能向上のためのアップグレードを行うなどの目的により，事前に本会員に通知し又は事前の予告なく本サービスの全部又は一部について停止・中断する場合があります。</li>
										<li>12.⑥当社は，本サービスがウイルスその他有害な内容を含まないこと，セキュリティーが有効であることなどの安全性に最大限の努力は行いますが，本サービスの安全性，完全性，バグ及び瑕疵がないことは保証されません。</li>
									</ul>
									<h3 class="terms_title">第４条 知的財産権</h3>
									<ul class="terms_list">
										<li>本会員は，本サービスにおける文章，画像その他のコンテンツに関する著作権，著作者人格権，特許権，商標権，実用新案権，意匠権，これらを受ける権利，商業上の信用，標章・呼称，アイデア，ノウハウ，その他の法的権利，法的利益及び事実上の利益に関し，いかなる権利又は利益も得るものではありません。</li>
									</ul>
									<h3 class="terms_title">第5条 禁止事項</h3>
									<ul class="terms_list">
										<li>本会員は，本サービスに関し，自ら直接に又は第三者を介して間接に行うなど方法の如何を問わず，以下の各号のいずれか一つに該当する行為をしてはなりません。</li>
										<li>①法令に違反する行為</li>
										<li>②犯罪行為</li>
										<li>③本利用規約に違反する行為</li>
										<li>④当社，当社の役員又は従業員，スポンサー企業，他の本会員，その他当社に関連する者に対し，その権利又は利益を侵害する行為</li>
										<li>⑤本サービスのソフトウェアのエラー，バグ，セキュリティーホール，その他瑕疵を利用する行為</li>
										<li>⑥当社の管理サーバに対し，コンピュータ・ウィルス，その他悪質なコードを送信等する行為</li>
										<li>⑦当社の管理するサーバ，ハードウェア又はネットワークの機能を破壊し，妨害し，又は，不必要に過度の負担をかける行為</li>
										<li>⑧本サービスを違法な目的により利用する行為</li>
										<li>⑨当社の本サービス又は本サービス以外のサービスを妨げる行為</li>
										<li>⑩以上の各行為のうちのいずれかの行為をするために準備をする行為，又は，着手する行為</li>
										<li>⑪以上の各行為に準じる行為であり，本サービスの趣旨に反する行為</li>
										<li>⑫第６条の表明・保証に違反する行為</li>
									</ul>
									<h3 class="terms_title">第6条 反社会的勢力に関する表明・保証</h3>
									<ul class="terms_list">
										<li>本会員は，当社に対し，本会員自身並びに本会員の役員及び従業員が暴力団，暴力団員，暴力団準構成員，暴力団関係者，総会屋その他の反社会的勢力（以下，一括して「反社会的勢力」といいます。）のいずれでもなく，また，そのいずれかと直接又は間接を問わず交流，資金・便宜の提供，取引その他の関係を有していないこと，及び，同状態が将来にわたり継続することを表明し，保証するものとします。</li>
									</ul>
									<h3 class="terms_title">第7条 本利用規約の変更</h3>
									<ul class="terms_list">
										<li>1.当社は，本利用規約を変更することができるものとします。</li>
										<li>2.本会員は，当社が本利用規約を変更する可能性があることを認識し，①定期的に「http://cryptopie.com/」（これより下位の階層のウェブページを含む。）を閲覧すること，及び，②当社からの連絡先として指定されたメールアドレスについて当社からのメールを受信することができる環境を維持し，かつ，当該メールアドレスに当社から送信されたメールの内容を閲覧すること，をしなければならないものとします。</li>
										<li>3.当社は，本利用規約を変更する場合，その旨を「http://cryptopie.com/」（これより下位の階層のウェブページを含む。）に掲載し，かつ，当社からの連絡先として指定された本会員のメールアドレス宛に通知するものとします。本会員は，本利用規約の当該変更に同意できない場合，上記掲載から３０日以内に本サービスの利用を終了し，本会員登録の抹消をしなければならないものとします。</li>
										<li>4.当社は，前項の掲載から３０日以内に本会員が本会員登録の抹消をしない場合，本会員が本利用規約の当該変更に同意したとみなすものとし，このようにみなされることについて本会員はあらかじめ同意するものとします。</li>
									</ul>
									<h3 class="terms_title">第8条 譲渡等禁止</h3>
									<ul class="terms_list">
										<li>当社及び本会員は，相手方の事前の書面による承諾なく，本利用規約に基づく権利義務又は地位について，第三者に対し，譲渡，承継，担保設定，その他の処分をすることができないものとします。</li>
									</ul>
									<h3 class="terms_title">第9条 免責</h3>
									<ul class="terms_list">
										<li>当社の債務不履行又は不法行為に基づく損害賠償責任（ただし，当社，当社の代表者，又は当社の使用する者の故意又は重大な過失によるものを除く。）は，本会員が本サービスの利用に伴って当社に対して支払済みの利用手数料を上限とするものとします。</li>
									</ul>
									<h3 class="terms_title">第10条 準拠法及び管轄裁判所</h3>
									<ul class="terms_list">
										<li>1.本利用規約の準拠法は日本法とします。</li>
										<li>4.本サービスに関する一切の紛争は，東京地方裁判所を第１審の専属的合意管轄裁判所とします。</li>
									</ul>
									
									<p class="terms_date">
										更新日：2017年4月1日
									</p>
									
								</div>
							</div>
							
						</div>
					</section>
					<div class="row terms_check">
						<p class="terms_check--input"><label class="label_input"><input type="checkbox" class="input_check" name="term">上記、利用規約に同意致しました。</label></p>
					</div>
					<div class="row text-center">
						<div class="col-md-12">
							<p id="overlapResult" class="overlapResult" data-result="" ></p>
						</div>
					</div>
					<div class="text-center submit-area">
						<button type="submit" name="btnRegister" value='true' class="btn btn-primary btn-lg">入力内容を確認する</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
	<?php $_smarty_tpl->_subTemplateRender("file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.easing.1.3.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- Vendor Scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
modernizr.custom.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.jpostal.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.validate.addmethod.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.validate.messages_ja.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
$(function(){
	// 日本・海外住所切替
	appForm.changeCheckboxElement('#js_address', '.js_addressBlock', 'single');
	
	
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		groups: { // エラー表示のグループ化
			name       : "name_sei name_mei",
			kana       : "name_sei_kana name_mei_kana",
			birthday   : "birthday_y birthday_m birthday_d",
			tel        : "tel1 tel2 tel3",
			zip        : "zip1 zip2",
			office_tel : "officeTel1 officeTel2 officeTel3",
			office_zip : "officeZip1 officeZip2",
			purpose    : "purpose1 purpose2 purpose3 purpose4",
			select     : "select_03 select_04 select_05 select_06 select_07",
			agree     : "agree_1 agree_2 agree_3"
		},
		rules             : { // バリデーションルールの設定
			"name_sei"         : { required: true, check_symbol: true },
			"name_mei"         : { required: true, check_symbol: true },
			"name_sei_kana"    : { required: true, check_kana: true },
			"name_mei_kana"    : { required: true, check_kana: true },
			// "sextype"          : { required: true },
			"birthday_y"       : { required: true, check_age: true },
			"birthday_m"       : { required: true, check_age: true },
			"birthday_d"       : { required: true, check_age: true },
			"tel1"             : { required: true, digits: true },
			"tel2"             : { required: true, digits: true },
			"tel3"             : { required: true, digits: true },
			"email"            : { required: true, check_mail: true },
			"zip1"             : { required: true, digits: true },
			"zip2"             : { required: true, digits: true },
			"adr1"             : { required: true },
			"adr2"             : { required: true },
			"adr3"             : { required: true, check_symbol: true },
			"adr4"             : { check_symbol: true },

			"overseas_adr1"    : { required: true },
			"overseas_adr2"    : { required: true },
			"overseas_city"    : { required: true },
			"overseas_state"   : { required: true },
			"overseas_zip"     : { required: true },
			"overseas_country_id" : { required: true },

			"residentialForm"  : { required: true },
			"residenceYears"   : { required: true },
			"employmentSystem" : { required: true },
			"officeName"       : { required: true },
			"officeZip1"       : { required: true, digits: true },
			"officeZip2"       : { required: true, digits: true },
			"officeAddress"    : { required: true },
			"officeTel1"       : { required: true, digits: true },
			"officeTel2"       : { required: true, digits: true },
			"officeTel3"       : { required: true, digits: true },
			"serviceLength"    : { required: true },
			"annualIncome"     : { required: true },
			"borrowing"        : { required: true },
			"paymentOverdue"   : { required: true },
			"familyStructure"  : { required: true },
			"investableAssets" : { required: true },
			"investableAssets_radio" : { required: true },
			"select_01" : { required: true },
			"select_02" : { required: true },
			"select_03" : { required: true },
			"select_04" : { required: true },
			"select_05" : { required: true },
			"select_06" : { required: true },
			"select_07" : { required: true },
			
			"purpose1" : { require_from_group: [1, ".js_purpose"] },
			"purpose2" : { require_from_group: [1, ".js_purpose"] },
			"purpose3" : { require_from_group: [1, ".js_purpose"] },
			"purpose4" : { require_from_group: [1, ".js_purpose"] },
			
			"agree_1"    : { required: true, check_agree: true },
			"agree_2"    : { required: true, check_agree: true },
			"agree_3"    : { required: true, check_agree: true },
			
			"term"             : { required: true }
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			eName = element.attr("name");
			// エラー表示の位置を変更
			if (eName == "zip1" || eName == "zip2") {
				error.appendTo(element.closest("div"));
			} else if (eName == "select_02") {
				error.insertAfter(element);
			} else if (eName == "select_03" || eName == "select_04" || eName == "select_05" || eName == "select_06" || eName == "select_07") {
				error.appendTo(element.closest(".form-table-inline"));
			} else if (eName == "agree_1" || eName == "agree_2" || eName == "agree_3") {
				error.appendTo(element.closest(".agreeSelect"));
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages: {
			"name_sei"         : { required: "「氏名」を入力してください", check_symbol:"使用できない記号が含まれています" },
			"name_mei"         : { required: "「氏名」を入力してください", check_symbol:"使用できない記号が含まれています" },
			"name_sei_kana"    : { required: "「氏名のフリガナ」を入力してください", check_kana:"全角カタカナで入力してください" },
			"name_mei_kana"    : { required: "「氏名のフリガナ」を入力してください", check_kana:"全角カタカナで入力してください" },
			// "sextype"          : { required: "「性別」を入力してください" },
			"birthday_y"       : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"birthday_m"       : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"birthday_d"       : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"tel1"             : { required: "「TEL」を入力してください" },
			"tel2"             : { required: "「TEL」を入力してください" },
			"tel3"             : { required: "「TEL」を入力してください" },
			"email"            : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" },
			"zip1"             : { required: "「郵便番号」を入力してください" },
			"zip2"             : { required: "「郵便番号」を入力してください" },
			"adr1"             : { required: "「都道府県」を入力してください" },
			"adr2"             : { required: "「市区町村」を入力してください" },
			"adr3"             : { required: "「住所」を入力してください", check_symbol:"使用できない記号が含まれています" },
			"adr4"             : { check_symbol:"使用できない記号が含まれています" },
			"residentialForm"  : { required: "「自宅形態」を選択してください" },
			"residenceYears"   : { required: "「居住年数」を選択してください" },
			"employmentSystem" : { required: "「雇用体系」を選択してください" },
			"officeName"       : { required: "「勤務先名」を入力してください" },
			"officeZip1"       : { required: "「勤務先の郵便番号」を入力してください" },
			"officeZip2"       : { required: "「勤務先の郵便番号」を入力してください" },
			"officeAddress"    : { required: "「勤務先の住所」を入力してください" },
			"officeTel1"       : { required: "「勤務先電話番号」を入力してください" },
			"officeTel2"       : { required: "「勤務先電話番号」を入力してください" },
			"officeTel3"       : { required: "「勤務先電話番号」を入力してください" },
			"serviceLength"    : { required: "「勤続年数」を選択してください" },
			"annualIncome"     : { required: "「ご年収(昨年度)」を選択してください" },
			"borrowing"        : { required: "「既存のお借り入れ」を選択してください" },
			"paymentOverdue"   : { required: "「お支払い延滞の有無」を選択してください" },
			"familyStructure"  : { required: "「家族構成 (独身or既婚)」を選択してください" },
			"investableAssets" : { required: "「投資可能資産」を選択してください" },
			"investableAssets_radio" : { required: "選択してください" },
			"select_01"        : { required: "「主な収入源」を選択してください" },
			"select_02"        : { required: "「申込の経緯」を選択してください" },
			"select_03"        : { required: "「投資経験」を全て選択してください" },
			"select_04"        : { required: "「投資経験」を全て選択してください" },
			"select_05"        : { required: "「投資経験」を全て選択してください" },
			"select_06"        : { required: "「投資経験」を全て選択してください" },
			"select_07"        : { required: "「投資経験」を全て選択してください" },
			"purpose1"         : { require_from_group: "「取引目的」を選択してください" },
			"purpose2"         : { require_from_group: "「取引目的」を選択してください" },
			"purpose3"         : { require_from_group: "「取引目的」を選択してください" },
			"purpose4"         : { require_from_group: "「取引目的」を選択してください" },
			"agree_1"          : { required: "選択してください", check_agree: "「いいえ」を選択した場合ご登録いただけません。" },
			"agree_2"          : { required: "選択してください", check_agree: "「いいえ」を選択した場合ご登録いただけません。" },
			"agree_3"          : { required: "選択してください", check_agree: "「いいえ」を選択した場合ご登録いただけません。" },
			"term"             : { required: "利用規約に同意いただけない場合はお申込みできません" }
		}
	});
	
	
	// 郵便番号住所検索実行
	new appForm.insertAddress({
		zip_elm1    : "#user_zip1",
		zip_elm2    : "#user_zip2",
		button      : "#zip_btn",
		address     : {
			'#pref'          : '%3',
			'#city'          : '%4',
			'#address1'      : '%5'
		},
		callback : function(){
			validator.element("#pref");
			validator.element("#city");
			validator.element("#address1");
		}
	});
	
	// 勤務先の郵便番号住所検索実行
	new appForm.insertAddress({
		zip_elm1    : "#user_zip1_office",
		zip_elm2    : "#user_zip2_office",
		button      : "#zip_btn_office",
		address     : {
			'#address_office' : '%3%4%5'
		},
		callback : function(){
			validator.element("#address_office");
		}
	});
	
	// 勤務先の郵便番号住所検索実行
	new appForm.officeSelect({
		select        : "#office_select",
		officeElement : "#js_officeArea",
		exclusion     : ["10","11","12","13"],
		callback : function(){
			
		}
	});
	
	
});
<?php echo '</script'; ?>
>
</body></html><?php }
}
