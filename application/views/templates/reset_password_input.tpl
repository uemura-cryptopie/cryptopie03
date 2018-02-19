<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>パスワードの再設定 | CryptoPie</title>
	{include file="include/head.tpl"}
</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">パスワードを再設定する</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" method="post" novalidate="novalidate">
					<section class="panel">
						<div class="panel-body form-body">
							<!-- いずれかの項目に誤りがあります。 -->
							{if $error != ''}
								<div class="error_textBox">
									{$error}
								</div>
							{/if}
							
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">ご登録のメールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input type="text" class="form-control" id="mail" name="mail">
									{form_error('mail')}
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">ご登録の生年月日<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<select name="year" class="select form-control m-b-10">
										<option value="">----</option>
										{foreach from=$data['year'] item=item key=key}
											<option value="{$key}"{if $key == $data.dataInsert.year|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select><span>年</span>
									
									<select name="month" class="select form-control m-b-10">
										<option value="">--</option>
										{foreach from=$data['month'] item=item key=key}
											<option value="{$key}"{if $key == $data.dataInsert.month|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select><span>月</span>

									<select name="day" class="select form-control m-b-10">
										<option value="">--</option>
										{foreach from=$data['day'] item=item key=key}
											<option value="{$key}"{if $key == $data.dataInsert.day|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select><span>日</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">ご登録の電話番号<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<input type="text" class="form-control input -col-tel" name="tel1"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel2"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel3">
								</div>
							</div>
						</div>
					</section>
					<div class="text-center submit-area">
						<button type="submit" name="btnResetPasswordInput" value="true" class="btn btn-primary btn-lg">パスワード再設定を依頼する</button>
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
<script src="{$js_url}jquery.jpostal.js"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
$(function(){
	
	// 郵便番号住所検索実行
	new appForm.insertAddress({
		zip_elm1    : "#user_zip1",
		zip_elm2    : "#user_zip2",
		button      : "#zip_btn",
		address     : {
			'#pref'          : '%3',
			'#city'          : '%4',
			'#address1'      : '%5'
		}
	});
	
	// 郵便番号住所検索実行
	new appForm.insertAddress({
		zip_elm1    : "#user_zip1_office",
		zip_elm2    : "#user_zip2_office",
		button      : "#zip_btn_office",
		address     : {
			'#address_office' : '%3%4%5'
		}
		
	});
	
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		groups: { // エラー表示のグループ化
			name    : "name_sei name_mei",
			kana    : "name_sei_kana name_mei_kana",
			birthday: "year month day",
			tel     : "tel1 tel2 tel3",
			zip     : "zip1 zip2",
			office_tel     : "officeTel1 officeTel2 officeTel3",
			office_zip     : "officeZip1 officeZip2",
			select     : "select_03 select_04 select_05 select_06 select_07"
		},
		rules             : { // バリデーションルールの設定
			"year"       : { required: true, check_age: true },
			"month"       : { required: true, check_age: true },
			"day"       : { required: true, check_age: true },
			"tel1"             : { required: true, digits: true },
			"tel2"             : { required: true, digits: true },
			"tel3"             : { required: true, digits: true },
			"mail"            : { required: true, check_mail: true }
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
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages: {
			"year"       : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"month"       : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"day"       : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"tel1"             : { required: "「TEL」を入力してください" },
			"tel2"             : { required: "「TEL」を入力してください" },
			"tel3"             : { required: "「TEL」を入力してください" },
			"mail"            : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" }
		}
	});
	
});
</script>
</body></html>