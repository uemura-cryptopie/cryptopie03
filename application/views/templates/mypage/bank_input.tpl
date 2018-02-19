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
					<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}mypage/bank/conf/" method="post">
						<div class="panel-body">
							<h2 class="heading heading-default heading-h2">銀行口座情報の登録</h2>
							<div class="row m-b-20">
								<div class="col-md-12">
									
									<div class="row m-b-20">
										
										<div class="col-sm-12">
											
											<div class="bankSelect" id="bankSelect">
												<ol class="backSelect_flow">
													<li class="backSelect_flow_list -active"><span>1</span>金融機関を選択</li>
													<li class="backSelect_flow_list"><span>2</span>支店名を選択</li>
												</ol>
												<div class="bankSelect_search">
													<div class="bankSelect_initials">
														<h3 class="bankSelect_heading"></h3>
														<div class="bankSelect_initials--body">
															<ul class="bankSelect_initials--line">
																<li><a href="ｱ">あ</a></li>
																<li><a href="ｲ">い</a></li>
																<li><a href="ｳ">う</a></li>
																<li><a href="ｴ">え</a></li>
																<li><a href="ｵ">お</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ｶ">か</a></li>
																<li><a href="ｷ">き</a></li>
																<li><a href="ｸ">く</a></li>
																<li><a href="ｹ">け</a></li>
																<li><a href="ｺ">こ</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ｻ">さ</a></li>
																<li><a href="ｼ">し</a></li>
																<li><a href="ｽ">す</a></li>
																<li><a href="ｾ">せ</a></li>
																<li><a href="ｿ">そ</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ﾀ">た</a></li>
																<li><a href="ﾁ">ち</a></li>
																<li><a href="ﾂ">つ</a></li>
																<li><a href="ﾃ">て</a></li>
																<li><a href="ﾄ">と</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ﾅ">な</a></li>
																<li><a href="ﾆ">に</a></li>
																<li><a href="ﾇ">ぬ</a></li>
																<li><a href="ﾈ">ね</a></li>
																<li><a href="ﾉ">の</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ﾊ">は</a></li>
																<li><a href="ﾋ">ひ</a></li>
																<li><a href="ﾌ">ふ</a></li>
																<li><a href="ﾍ">へ</a></li>
																<li><a href="ﾎ">ほ</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ﾏ">ま</a></li>
																<li><a href="ﾐ">み</a></li>
																<li><a href="ﾑ">む</a></li>
																<li><a href="ﾒ">め</a></li>
																<li><a href="ﾓ">も</a></li>
															</ul>
															<ul class="bankSelect_initials--line -word3">
																<li><a href="ﾔ">や</a></li>
																<li><a href="ﾕ">ゆ</a></li>
																<li><a href="ﾖ">よ</a></li>
															</ul>
															<ul class="bankSelect_initials--line">
																<li><a href="ﾗ">ら</a></li>
																<li><a href="ﾘ">り</a></li>
																<li><a href="ﾙ">る</a></li>
																<li><a href="ﾚ">れ</a></li>
																<li><a href="ﾛ">ろ</a></li>
															</ul>
															<ul class="bankSelect_initials--line -word3">
																<li><a href="ﾜ">わ</a></li>
																<li><a href="ｦ" class="bankSelect_initials--none">を</a></li>
																<li><a href="ﾝ" class="bankSelect_initials--none">ん</a></li>
															</ul>
														</div>
													</div>
													<div class="bankSelect_search--code">
														<h3 class="bankSelect_heading"></h3>
														<input type="text" name="" value="" placeholder="銀行コード" class="form-control input">
														<button type="button" class="btn btn-primary">検索</button>
													</div>
												</div>
												<div class="bankSelect_list">
													<h3 class="bankSelect_heading"></h3>
													<ul></ul>
												</div>
												<div class="bankSelect_loading"><span></span></div>
											</div>
											
										</div>
									</div>
									
									<div class="form-group" id="bankEditArea">
										<label class="col-sm-2 control-label">銀行コード</label>
										<div class="col-sm-4">
											<input type="text" name="bankcode" value="{$params.bankcode|escape|default:''}" class="form-control input" maxlength="7" id="js_bank_id" placeholder="">
											{if isset($error.bankcode)}<p id="bankcode-error" class="error_text">{$error.bankcode|escape}</p>{/if}
										</div>
										<label class="col-sm-2 control-label">銀行名</label>
										<div class="col-sm-4">
											<input type="text" name="bankname" value="{$params.bankname|escape|default:''}" class="form-control input" maxlength="30" id="js_bank_name" placeholder="">
											{if isset($error.bankname)}<p id="bankname-error" class="error_text">{$error.bankname|escape}</p>{/if}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">支店コード</label>
										<div class="col-sm-4">
											<input type="text" name="branchcode" value="{$params.branchcode|escape|default:''}" class="form-control input" maxlength="7" id="js_branch_id" placeholder="">
											{if isset($error.branchcode)}<p id="branchcode-error" class="error_text">{$error.branchcode|escape}</p>{/if}
										</div>
										<label class="col-sm-2 control-label">支店名</label>
										<div class="col-sm-4">
											<input type="text" name="branchname" value="{$params.branchname|escape|default:''}" class="form-control input" maxlength="30" id="js_branch_name" placeholder="">
											{if isset($error.branchname)}<p id="branchname-error" class="error_text">{$error.branchname|escape}</p>{/if}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">口座区分</label>
										<div class="col-sm-4">
											<label class="radio-inline radio">
												<input type="radio" name="accountsubtype" class="input_radio" value="1"{if $params.accountsubtype|default:1 == '1'} checked="checked"{/if}> <span>普通</span>
											</label>
											<label class="radio-inline radio">
												<input type="radio" name="accountsubtype" class="input_radio" value="2"{if $params.accountsubtype|default:1 == '2'} checked="checked"{/if}> <span>当座</span>
											</label>
											{if isset($error.accountsubtype)}<p id="accountsubtype-error" class="error_text">{$error.accountsubtype|escape}</p>{/if}
										</div>
										<label class="col-sm-2 control-label">口座番号</label>
										<div class="col-sm-4">
											<input type="text" name="acnumber" value="{$params.acnumber|escape|default:''}" class="form-control input" maxlength="30" placeholder="">
											{if isset($error.acnumber)}<p id="acnumber-error" class="error_text">{$error.acnumber|escape}</p>{/if}
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">口座名義<br>（カタカナ）</label>
										<div class="col-sm-10">
											<div>
												<input type="text" name="ackana" value="{$params.ackana|escape|default:''}" class="form-control input" maxlength="30" placeholder="">
												{if isset($error.ackana)}<p id="ackana-error" class="error_text">{$error.ackana|escape}</p>{/if}
											</div>
											<div class="m-t-15">
												<strong>ご登録口座通帳に記載された口座名義（カタカナ）をご記入ください。</strong><br>
												口座名義の入力間違いにお気をつけください。名義が完全に一致しない場合は認証いたしかねます。
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="col-sm-12 text-center m-b-20">
									<button type="submit" class="btn btn-primary btn-lg">登録内容を確認する</button>
									<button type="button" class="btn btn-default btn-lg pull-left" id="js_formBack">戻る</button>
								</div>
									
							</div>
						</div>
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
	
	
	// 金融機関選択
	var selectBank = new appForm.selectBank({
		selecter    : "#bankSelect",
		shopUrl     : "{$base_url}mypage/bank/bankname",
		branchUrl   : "{$base_url}mypage/bank/branchname"
	});
	
	
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		groups: { // エラー表示のグループ化
		},
		rules             : { // バリデーションルールの設定
			"bankcode"         : { required: true, digits: true },
			"bankname"         : { required: true, check_fullwide: true },
			"branchcode"       : { required: true, digits: true },
			"branchname"       : { required: true, check_fullwide: true },
			"accountsubtype"   : { required: true },
			"acnumber"         : { required: true, digits: true },
			"ackana"           : { required: true, check_bank_kana: true }
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			eName = element.attr("name");
			// エラー表示の位置を変更
			if (eName == "zip1" || eName == "zip2") {
				error.appendTo(element.closest("div"));
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages: {
			"bankcode"         : { required: "「銀行コード」を入力してください" },
			"bankname"         : { required: "「銀行名」を入力してください", check_fullwide:"全角文字で入力してください" },
			"branchcode"       : { required: "「支店コード」を入力してください" },
			"branchname"       : { required: "「支店名」を入力してください", check_fullwide:"全角文字で入力してください" },
			"accountsubtype"   : { required: "「口座区分」を入力してください" },
			"acnumber"         : { required: "「口座番号」を入力してください" },
			"ackana"           : { required: "「口座名義」を入力してください", check_bank_kana:"カタカナで入力してください", check_symbol:"使用できない記号が含まれています" }
		}
	});
	
</script>
</body>
</html>