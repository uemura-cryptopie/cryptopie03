<?php
/* Smarty version 3.1.31, created on 2018-02-08 18:30:36
  from "C:\xampp\htdocs\cryptopie\application\views\templates\reset_password_input.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a7c18bca02610_60818576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '406c41b156b8e6ded37f60cf788cca9eda0cc41e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\reset_password_input.tpl',
      1 => 1503103478,
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
function content_5a7c18bca02610_60818576 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>パスワードの再設定 | CryptoPie</title>
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
							<?php if ($_smarty_tpl->tpl_vars['error']->value != '') {?>
								<div class="error_textBox">
									<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

								</div>
							<?php }?>
							
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">ご登録のメールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-8 col-sm-8">
									<input type="text" class="form-control" id="mail" name="mail">
									<?php echo form_error('mail');?>

								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 col-sm-4 control-label">ご登録の生年月日<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-8 col-sm-8">
									<select name="year" class="select form-control m-b-10">
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
									
									<select name="month" class="select form-control m-b-10">
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

									<select name="day" class="select form-control m-b-10">
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
<?php echo '</script'; ?>
>
</body></html><?php }
}
