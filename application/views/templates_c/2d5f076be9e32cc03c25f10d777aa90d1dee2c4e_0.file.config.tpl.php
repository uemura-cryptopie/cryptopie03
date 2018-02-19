<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-19 12:06:41
=======
/* Smarty version 3.1.31, created on 2018-02-09 18:29:54
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mypage\config.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8a3f41d9cc04_38156672',
=======
  'unifunc' => 'content_5a7d6a12b15020_96457524',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d5f076be9e32cc03c25f10d777aa90d1dee2c4e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mypage\\config.tpl',
<<<<<<< HEAD
      1 => 1518773899,
=======
      1 => 1510799411,
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./include/head.tpl' => 1,
    'file:./include/header.tpl' => 1,
    'file:./include/side.tpl' => 1,
    'file:./include/footer.tpl' => 1,
  ),
),false)) {
<<<<<<< HEAD
function content_5a8a3f41d9cc04_38156672 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7d6a12b15020_96457524 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>設定 | CryptoPie</title>
<?php $_smarty_tpl->_subTemplateRender("file:./include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="<?php echo $_smarty_tpl->tpl_vars['css_url']->value;?>
msdropdown/dd.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-black">
<?php $_smarty_tpl->_subTemplateRender("file:./include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php $_smarty_tpl->_subTemplateRender("file:./include/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<aside class="right-side">
			
			<!-- Main content -->
			<section class="content">
				
				<!-- タブ・メニュー -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#twofactor" data-toggle="tab">二段階認証</a></li>
					<li><a href="#information" data-toggle="tab">登録情報変更</a></li>
					<li><a href="#password" data-toggle="tab">パスワード変更</a></li>
				</ul>
				
				<!-- タブ内容 -->
				<div class="tab-content">
					<div class="tab-pane -wrapper active" id="twofactor">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">二段階認証</h2>
								
								<div class="row">
									<div class="addressList container-fluid m-b-20">
										<div class="row m-b-20">
											
											<form method="post" class="form-horizontal">
												<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'no_code') {?>
													<div class="col-md-12 m-b-20">
														<p><strong>二段階認証は設定されていません。</strong></p>
														<button type="submit" name="setQRCode" class="btn btn-primary" id="reception-btn-content">二段階認証を設定する</button>
													</div>
													<div class="col-md-12 m-b-20">
														<p class="m-b-20">
															二段階認証を設定することで、お客様のアカウントのセキュリティ強化をすることが可能です。<br>
															二段階認証を行う場合は認証アプリが必要になります。
														</p>
														<p><strong>iOS用 二段階認証アプリケーション</strong></p>
														<p class="m-b-20">
															<a href="https://itunes.apple.com/jp/app/google-authenticator/id388497605?mt=8" target="_blank">Google Authenticator</a><br>
														</p>
														<p><strong>android用 二段階認証アプリケーション</strong></p>
														<p class="m-b-20">
															<a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=ja" target="_blank">Google 認証システム</a>
														</p>
													</div>
												<?php } else { ?>
													<div class="col-md-12 m-b-15" id='box-reception'>
														<h3 class="heading -size-sm">二段階認証 利用設定</h3>
														<div class="form-group row js-authcheckbox">
															<div class="col-md-12 m-b-20">
																<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'create_code') {?>
																	<p>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['google_QR_Code']->value;?>
" alt="">
																	</p>
																<?php } else { ?>
																	<p class="m-b-20">
																		二段階認証を解除する場合は、全てのチェックを外して解除ボタンを押してください。
																	</p>
																<?php }?>
															</div>
															
															
															<div class="col-md-12 m-b-20">
																<?php if (!empty($_smarty_tpl->tpl_vars['flashdata']->value['error_save_setting'])) {?>
																	<div class="col-md-12">
																		<div class="alert alert-inlineblock alert-danger">
																			<strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['flashdata']->value['error_save_setting'])===null||$tmp==='' ? '' : $tmp);?>
</strong>
																		</div>
																	</div>
																<?php }?>
																<label class="checkbox" for="setting_login">
																	<input type="hidden" name="setting_login" value='0'>
																	<input name="setting_login" class="input_checkbox" value="1" type="checkbox"<?php if ($_smarty_tpl->tpl_vars['setting_login']->value == '1') {?> checked="checked"<?php }?> id="setting_login" />
																	<span>ログイン時に二段階認証を使用する</span>
																</label>
																<p class="help-block m-lr-10">
																	ログインの時、認証コードの入力が必要となります。
																</p>
															</div>
															<div class="col-md-12 m-b-20">
																<label class="checkbox" for="setting_transfer_coin">
																	<input type="hidden" name="setting_transfer_coin" value='0'>
																	<input name="setting_transfer_coin" class="input_checkbox" value="1" type="checkbox"<?php if ($_smarty_tpl->tpl_vars['setting_transfer_coin']->value == '1') {?> checked="checked"<?php }?> id="setting_transfer_coin" />
																	<span>コイン送金時に二段階認証を使用する</span>
																</label>
																<p class="help-block m-lr-10">
																	コイン送金時、認証コードの入力が必要となります。
																</p>
															</div>
															<div class="col-md-12">
																<p>アプリケーションで生成された6桁の数字を入力してください。</p>
															</div>
															<div class="col-md-3">
																<input class="form-control input m-b-10" type="number" name="google_code" value=""  placeholder="123456">
															</div>
														<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'create_code') {?>
															
															<div class="col-md-6">
																<input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
																<button type="submit" name="saveQRCode" class="btn btn-primary">二段階認証を設定する</button>
															</div>
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'tow_factor_setting') {?>
															<div class="col-md-6">
																<button type="submit" name="updateQRCode" class="btn btn-primary" id="js-authEditBtn">二段階認証の設定を変更する</button>
															</div>
														<?php }?>
															
														<?php if (!empty($_smarty_tpl->tpl_vars['flashdata']->value['error_code'])) {?>
															<div class="col-md-12">
																<div class="alert alert-inlineblock alert-danger">
																	<strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['flashdata']->value['error_code'])===null||$tmp==='' ? '' : $tmp);?>
</strong>
																</div>
															</div>
														<?php }?>
														
														</div>
													</div>
												<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['flashdata']->value['success'])) {?>
													<div class="col-md-12">
														<div class="alert alert-inlineblock alert-success">
															<strong><?php echo $_smarty_tpl->tpl_vars['flashdata']->value['success'];?>
</strong>
														</div>
													</div>
												<?php }?>
											</form>
											
										</div>
									</div>
								</div>
								
							</div>
						</section>
					</div>
					
					<div class="tab-pane -wrapper" id="information">
						<section class="panel">
							<div class="panel-body form-horizontal">
								<h2 class="heading heading-default heading-h2">登録情報変更</h2>
								
								<div class="row m-b-15">
									<div class="col-md-12 m-b-20">
										<p class="text-lead">
											住所ご変更の場合は<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/contact/">お問い合わせ</a>までご連絡ください。
										</p>
									</div>
								</div>
								
								<section class="panel">
									<header class="panel-heading form-heading">お客様情報</header>
									<div class="panel-body form-body">
										<h3 class="form-intitle">お客様情報</h3>
										
										
										<?php if ($_smarty_tpl->tpl_vars['user_type']->value == 1) {?>
											<!-- Name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">名前（漢字）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['family_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['first_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											<!-- Name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">名前（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['family_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['first_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											<!-- Birthday -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">生年月日</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['year'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
年<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['month'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
月<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['day'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
日
												</div>
											</div>
											
										<?php }?>
										
										<?php if ($_smarty_tpl->tpl_vars['user_type']->value == 2) {?>
											<!-- Name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">法人名（漢字）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['corp_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- Name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">法人名（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['corp_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- CEO name and CEO first name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">代表者名（漢字）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['ceo_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 <?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['ceo_first_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- CEO name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">代表者名（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['ceo_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 <?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['ceo_first_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
										<?php }?>
										
										<!-- TEL -->
										<div class="form-group form-conf">
											<label class="col-md-3 col-sm-3 control-label">TEL</label>
											<div class="col-md-8 col-sm-8">
												<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['tel1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['tel2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['tel3'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

											</div>
										</div>

										<!-- Email -->
										<div class="form-group form-conf">
											<label class="col-md-3 col-sm-3 control-label">メールアドレス</label>
											<div class="col-md-8 col-sm-8">
												<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['mail'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

											</div>
										</div>

										<h3 class="form-intitle">住所(ご登録住所)</h3>
										
										<?php if ($_smarty_tpl->tpl_vars['params']->value['overseas_address_flag'] == 0) {?>
											<!-- Zipcode -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">郵便番号</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['post1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
-<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['post2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>

											<!-- Prefecture -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">都道府県</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['pref_list'][$_smarty_tpl->tpl_vars['params']->value['pref_id']], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>

											<!-- City (Address 1) -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">市区町村</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">住所（番地）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['address'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">建物</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['building'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
										<?php } elseif ($_smarty_tpl->tpl_vars['params']->value['overseas_address_flag'] == 1) {?>
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Address Line1</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['overseas_adr1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Address Line2</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['overseas_adr2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">City</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['overseas_city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">State/Region</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['overseas_state'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Zipcode</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['overseas_zip'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Country</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['overseas_country_list'][$_smarty_tpl->tpl_vars['params']->value['overseas_country_id']], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
										<?php }?>
										
										
										
										<?php if ($_smarty_tpl->tpl_vars['user_type']->value == 2) {?>
											<h3 class="form-intitle">取引責任者情報</h3>
											<!-- Pre name and first name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">取引責任者（漢字）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 <?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_first_name'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- Pre name and first name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">取引責任者（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
 <?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_first_name_kana'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- Pre post 1 and post 2 -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">郵便番号</label>
												<div class="col-md-8 col-sm-8">
													<?php if ($_smarty_tpl->tpl_vars['params']->value['pre_post1'] != '0') {?>
														<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_post1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

													<?php }?>
													
													<?php if ($_smarty_tpl->tpl_vars['params']->value['pre_post2'] != '0') {?>
														<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_post2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

													<?php }?>
												</div>
											</div>
											
											<!-- Pre prefecture -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">都道府県</label>
												<div class="col-sm-5">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['pref_list'][$_smarty_tpl->tpl_vars['params']->value['pre_pref_id']], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- Pre city -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">市区町村</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_city'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- Pre address -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">住所（番地）</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_address'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>

											<!-- Pre building -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">建物</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_building'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
											
											<!-- Pre tel1, tel2, tel3 -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">TEL</label>
												<div class="col-md-8 col-sm-8">
													<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_tel1'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
－<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_tel2'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
－<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['params']->value['pre_tel3'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>

												</div>
											</div>
										<?php }?>
										
<<<<<<< HEAD
=======
										
										
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
									</div>
								</section>
								
							</div>
						</section>
					</div>
					
					<div class="tab-pane -wrapper" id="password">
						<section class="panel panel-fixed">
							<div class="panel-body form-horizontal">
								<h2 class="heading heading-default heading-h2">パスワード変更</h2>
								
								<!-- Form itself -->
								<form name="sentMessage" id="formPassword" class="form-horizontal" method="post" novalidate="novalidate" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/config/#password">
									<section class="panel">
										<div class="panel-body form-body showPassword" id="js_showPass">
											
											<div class="form-group">
												<label class="col-sm-3 control-label">現在のパスワード</label>
												<div class="col-sm-6 col-xs-8">
													<input type="password" name="password" autocomplete="off" value="" class="form-control input">
													<?php echo form_error('password');?>

												</div>
												<div class="col-sm-3 col-xs-4">
													<a href="#">表示する</a>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">新しいパスワード</label>
												<div class="col-sm-6 col-xs-8">
													<input type="password" name="new_password" autocomplete="off" value="" class="form-control input new_password">
													<?php echo form_error('new_password');?>

												</div>
												<div class="col-sm-3 col-xs-4">
													<a href="#">表示する</a>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">新しいパスワードの確認</label>
												<div class="col-sm-6 col-xs-8">
													<input type="password" name="new_password_again" autocomplete="off" value="" class="form-control input">
													<?php echo form_error('password_again');?>

												</div>
												<div class="col-sm-3 col-xs-4">
													<a href="#">表示する</a>
												</div>
											</div>
											
										</div>
									</section>
									<?php if (isset($_smarty_tpl->tpl_vars['flashdata']->value['success_password'])) {?>
										<div class="col-md-12 text-center">
											<div class="alert alert-inlineblock alert-success">
												<strong><?php echo $_smarty_tpl->tpl_vars['flashdata']->value['success_password'];?>
</strong>
											</div>
										</div>
									<?php }?>
									<div class="text-center submit-area">
										<button type="submit" name="btnPasswordUpdate" value='true' class="btn btn-primary btn-lg">パスワードを設定する</button>
									</div>
								</form>
								
							</div>
						</section>
					</div>
					
				</div>
				
			</section><!-- /.content -->
			
			<?php $_smarty_tpl->_subTemplateRender("file:./include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			
		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->

<!-- jQuery -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- jQuery UI 1.10.3 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery-ui-1.10.3.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- Bootstrap -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>

<!-- msdropdown -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
plugins/msdropdown/jquery.dd.js"><?php echo '</script'; ?>
>

<!-- Director App -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
Director/app.js" type="text/javascript"><?php echo '</script'; ?>
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
	
	appForm.showPassword('#js_showPass');
	
	// カスタムルールを定義します($.validator.addMethod(項目名, 検証ルール)で設定します)。
	var methods = {
		check_password: function(value, element){
			return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
		}
	};
	$.each(methods, function(key){
		$.validator.addMethod(key, this);
	});
	
	var validator = $("#formPassword").validate({
		errorElement: "p",
		errorClass: "error_text",
		focusInvalid: false,
		rules : { // バリデーションルールの設定
			"password"           : { required: true, check_password: true, minlength:6, maxlength:12 },
			"new_password"       : { required: true, check_password: true, minlength:6, maxlength:12 },
			"new_password_again" : { required: true, equalTo: ".new_password", check_password: true, minlength:6, maxlength:12 }
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			error.appendTo(element.closest("div"));
		},
		messages: {
			"password"        : {
				required: "「現在のパスワード」を入力してください。",
				check_password: "半角英字または半角数字で入力してください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			},
			"new_password"        : {
				required: "「新しいパスワード」を入力してください。",
				check_password: "半角英字または半角数字で入力してください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			},
			"new_password_again"      : {
				required: "「新しいパスワードの確認」が正しくありません。",
				equalTo: "「新しいパスワードの確認」が正しくありません。",
				check_password: "半角英字または半角数字で入力してください。",
				minlength: "6文字以上12文字以内で入力してください。",
				maxlength: "6文字以上12文字以内で入力してください。"
			}
		}
	});

	function processTextButton(flag) {
		var $btn = $('#js-authEditBtn');
		if (flag) {
			$btn.removeClass('btn-primary').addClass('btn-danger').text('二段階認証の設定を解除する');
		} else {
			$btn.removeClass('btn-danger').addClass('btn-primary').text('二段階認証の設定を変更する');
		}
	}
	
	// アドレス編集 削除切替
	$('.js-authcheckbox').on('change', 'input:checkbox', function(event) {
		event.preventDefault();
		
		var $wrap = $(this).closest('.js-authcheckbox');
		var $btn = $('#js-authEditBtn');
		var flag  = true;
		
		$wrap.find('input:checkbox').each(function(index, el) {
			if ($(this).prop('checked')) {
				flag = false;
			}
		});
		
		processTextButton(flag);
	});
	
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
