<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>設定 | CryptoPie</title>
{include file="./include/head.tpl"}
<link href="{$css_url}msdropdown/dd.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-black">
{include file="./include/header.tpl"}
	<div class="wrapper row-offcanvas row-offcanvas-left">
		{include file="./include/side.tpl"}
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
												{if $mode == 'no_code'}
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
												{else}
													<div class="col-md-12 m-b-15" id='box-reception'>
														<h3 class="heading -size-sm">二段階認証 利用設定</h3>
														<div class="form-group row js-authcheckbox">
															<div class="col-md-12 m-b-20">
																{if $mode == 'create_code'}
																	<p>
																		<img src="{$google_QR_Code}" alt="">
																	</p>
																{else}
																	<p class="m-b-20">
																		二段階認証を解除する場合は、全てのチェックを外して解除ボタンを押してください。
																	</p>
																{/if}
															</div>
															
															
															<div class="col-md-12 m-b-20">
																{if !empty($flashdata.error_save_setting)}
																	<div class="col-md-12">
																		<div class="alert alert-inlineblock alert-danger">
																			<strong>{$flashdata.error_save_setting|default:''}</strong>
																		</div>
																	</div>
																{/if}
																<label class="checkbox" for="setting_login">
																	<input type="hidden" name="setting_login" value='0'>
																	<input name="setting_login" class="input_checkbox" value="1" type="checkbox"{if $setting_login == '1'} checked="checked"{/if} id="setting_login" />
																	<span>ログイン時に二段階認証を使用する</span>
																</label>
																<p class="help-block m-lr-10">
																	ログインの時、認証コードの入力が必要となります。
																</p>
															</div>
															<div class="col-md-12 m-b-20">
																<label class="checkbox" for="setting_transfer_coin">
																	<input type="hidden" name="setting_transfer_coin" value='0'>
																	<input name="setting_transfer_coin" class="input_checkbox" value="1" type="checkbox"{if $setting_transfer_coin == '1'} checked="checked"{/if} id="setting_transfer_coin" />
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
														{if $mode == 'create_code'}
															
															<div class="col-md-6">
																<input type="hidden" name="token" value="{$token|default:''}">
																<button type="submit" name="saveQRCode" class="btn btn-primary">二段階認証を設定する</button>
															</div>
														{/if}
														{if $mode == 'tow_factor_setting'}
															<div class="col-md-6">
																<button type="submit" name="updateQRCode" class="btn btn-primary" id="js-authEditBtn">二段階認証の設定を変更する</button>
															</div>
														{/if}
															
														{if !empty($flashdata.error_code)}
															<div class="col-md-12">
																<div class="alert alert-inlineblock alert-danger">
																	<strong>{$flashdata.error_code|default:''}</strong>
																</div>
															</div>
														{/if}
														
														</div>
													</div>
												{/if}
												{if isset($flashdata.success)}
													<div class="col-md-12">
														<div class="alert alert-inlineblock alert-success">
															<strong>{$flashdata.success}</strong>
														</div>
													</div>
												{/if}
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
											住所ご変更の場合は<a href="{$base_url}mypage/contact/">お問い合わせ</a>までご連絡ください。
										</p>
									</div>
								</div>
								
								<section class="panel">
									<header class="panel-heading form-heading">お客様情報</header>
									<div class="panel-body form-body">
										<h3 class="form-intitle">お客様情報</h3>
										
										
										{if $user_type == 1}
											<!-- Name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">名前（漢字）</label>
												<div class="col-md-8 col-sm-8">
													{$params.family_name|escape|default:''} 
													{$params.first_name|escape|default:''}
												</div>
											</div>
											<!-- Name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">名前（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													{$params.family_name_kana|escape|default:''} 
													{$params.first_name_kana|escape|default:''}
												</div>
											</div>
											<!-- Birthday -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">生年月日</label>
												<div class="col-md-8 col-sm-8">
													{$params.year|escape|default:''}年{$params.month|escape|default:''}月{$params.day|escape|default:''}日
												</div>
											</div>
											
										{/if}
										
										{if $user_type == 2}
											<!-- Name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">法人名（漢字）</label>
												<div class="col-md-8 col-sm-8">
													{$params.corp_name|escape|default:''}
												</div>
											</div>
											
											<!-- Name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">法人名（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													{$params.corp_name_kana|escape|default:''}
												</div>
											</div>
											
											<!-- CEO name and CEO first name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">代表者名（漢字）</label>
												<div class="col-md-8 col-sm-8">
													{$params.ceo_name|escape|default:''} {$params.ceo_first_name|escape|default:''}
												</div>
											</div>
											
											<!-- CEO name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">代表者名（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													{$params.ceo_name_kana|escape|default:''} {$params.ceo_first_name_kana|escape|default:''}
												</div>
											</div>
										{/if}
										
										<!-- TEL -->
										<div class="form-group form-conf">
											<label class="col-md-3 col-sm-3 control-label">TEL</label>
											<div class="col-md-8 col-sm-8">
												{$params.tel1|escape|default:''}-{$params.tel2|escape|default:''}-{$params.tel3|escape|default:''}
											</div>
										</div>

										<!-- Email -->
										<div class="form-group form-conf">
											<label class="col-md-3 col-sm-3 control-label">メールアドレス</label>
											<div class="col-md-8 col-sm-8">
												{$params.mail|escape|default:''}
											</div>
										</div>

										<h3 class="form-intitle">住所(ご登録住所)</h3>
										
										{if $params.overseas_address_flag == 0}
											<!-- Zipcode -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">郵便番号</label>
												<div class="col-md-8 col-sm-8">
													{$params.post1|escape|default:''}-{$params.post2|escape|default:''}
												</div>
											</div>

											<!-- Prefecture -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">都道府県</label>
												<div class="col-md-8 col-sm-8">
													{$data.pref_list[$params.pref_id]|escape|default:''}
												</div>
											</div>

											<!-- City (Address 1) -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">市区町村</label>
												<div class="col-md-8 col-sm-8">
													{$params.city|escape|default:''}
												</div>
											</div>
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">住所（番地）</label>
												<div class="col-md-8 col-sm-8">
													{$params.address|escape|default:''}
												</div>
											</div>
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">建物</label>
												<div class="col-md-8 col-sm-8">
													{$params.building|escape|default:''}
												</div>
											</div>
										{elseif $params.overseas_address_flag == 1}
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Address Line1</label>
												<div class="col-md-8 col-sm-8">
													{$params.overseas_adr1|escape|default:''}
												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Address Line2</label>
												<div class="col-md-8 col-sm-8">
													{$params.overseas_adr2|escape|default:''}
												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">City</label>
												<div class="col-md-8 col-sm-8">
													{$params.overseas_city|escape|default:''}
												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">State/Region</label>
												<div class="col-md-8 col-sm-8">
													{$params.overseas_state|escape|default:''}
												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Zipcode</label>
												<div class="col-md-8 col-sm-8">
													{$params.overseas_zip|escape|default:''}
												</div>
											</div>
											
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">Country</label>
												<div class="col-md-8 col-sm-8">
													{$data.overseas_country_list[$params.overseas_country_id]|escape|default:''}
												</div>
											</div>
										{/if}
										
										
										
										{if $user_type == 2}
											<h3 class="form-intitle">取引責任者情報</h3>
											<!-- Pre name and first name -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">取引責任者（漢字）</label>
												<div class="col-md-8 col-sm-8">
													{$params.pre_name|escape|default:''} {$params.pre_first_name|escape|default:''}
												</div>
											</div>
											
											<!-- Pre name and first name kana -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">取引責任者（フリガナ）</label>
												<div class="col-md-8 col-sm-8">
													{$params.pre_name_kana|escape|default:''} {$params.pre_first_name_kana|escape|default:''}
												</div>
											</div>
											
											<!-- Pre post 1 and post 2 -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">郵便番号</label>
												<div class="col-md-8 col-sm-8">
													{if $params.pre_post1 != '0'}
														{$params.pre_post1|escape|default:''}
													{/if}
													
													{if $params.pre_post2 != '0'}
														{$params.pre_post2|escape|default:''}
													{/if}
												</div>
											</div>
											
											<!-- Pre prefecture -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">都道府県</label>
												<div class="col-sm-5">
													{$data.pref_list[$params.pre_pref_id]|escape|default:''}
												</div>
											</div>
											
											<!-- Pre city -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">市区町村</label>
												<div class="col-md-8 col-sm-8">
													{$params.pre_city|escape|default:''}
												</div>
											</div>
											
											<!-- Pre address -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">住所（番地）</label>
												<div class="col-md-8 col-sm-8">
													{$params.pre_address|escape|default:''}
												</div>
											</div>

											<!-- Pre building -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">建物</label>
												<div class="col-md-8 col-sm-8">
													{$params.pre_building|escape|default:''}
												</div>
											</div>
											
											<!-- Pre tel1, tel2, tel3 -->
											<div class="form-group form-conf">
												<label class="col-md-3 col-sm-3 control-label">TEL</label>
												<div class="col-md-8 col-sm-8">
													{$params.pre_tel1|escape|default:''}－{$params.pre_tel2|escape|default:''}－{$params.pre_tel3|escape|default:''}
												</div>
											</div>
										{/if}
										
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
								<form name="sentMessage" id="formPassword" class="form-horizontal" method="post" novalidate="novalidate" action="{$base_url}mypage/config/#password">
									<section class="panel">
										<div class="panel-body form-body showPassword" id="js_showPass">
											
											<div class="form-group">
												<label class="col-sm-3 control-label">現在のパスワード</label>
												<div class="col-sm-6 col-xs-8">
													<input type="password" name="password" autocomplete="off" value="" class="form-control input">
													{form_error('password')}
												</div>
												<div class="col-sm-3 col-xs-4">
													<a href="#">表示する</a>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">新しいパスワード</label>
												<div class="col-sm-6 col-xs-8">
													<input type="password" name="new_password" autocomplete="off" value="" class="form-control input new_password">
													{form_error('new_password')}
												</div>
												<div class="col-sm-3 col-xs-4">
													<a href="#">表示する</a>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-sm-3 control-label">新しいパスワードの確認</label>
												<div class="col-sm-6 col-xs-8">
													<input type="password" name="new_password_again" autocomplete="off" value="" class="form-control input">
													{form_error('password_again')}
												</div>
												<div class="col-sm-3 col-xs-4">
													<a href="#">表示する</a>
												</div>
											</div>
											
										</div>
									</section>
									{if isset($flashdata.success_password)}
										<div class="col-md-12 text-center">
											<div class="alert alert-inlineblock alert-success">
												<strong>{$flashdata.success_password}</strong>
											</div>
										</div>
									{/if}
									<div class="text-center submit-area">
										<button type="submit" name="btnPasswordUpdate" value='true' class="btn btn-primary btn-lg">パスワードを設定する</button>
									</div>
								</form>
								
							</div>
						</section>
					</div>
					
				</div>
				
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

<!-- msdropdown -->
<script src="{$js_url}plugins/msdropdown/jquery.dd.js"></script>

<!-- Director App -->
<script src="{$js_url}Director/app.js" type="text/javascript"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
	
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
	
</script>

</body>
</html>