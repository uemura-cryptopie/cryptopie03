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
					<h2 class="pageTitle">パスワードの再設定完了</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<form id="applicationForm" class="form-horizontal" method="post" novalidate="novalidate">
					<div class="row text-center">
						<h3>パスワードの再設定が完了しました</h3>
					</div>
					<div class="text-center submit-area">
						<button type="sumbit" name="btnResetPasswordComplete" value="true" class="btn btn-primary btn-lg">ログイン画面へ</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
	{include file="include/footer.tpl"}
	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</body></html>