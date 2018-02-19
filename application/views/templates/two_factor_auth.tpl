<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>二段階認証 | CryptoPie</title>
    {include file="include/head.tpl"}
</head>

<body cz-shortcut-listen="true">
<div id="wrapper">
  {include file="include/header.tpl"}
  
  <section id="inner-headline">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="pageTitle">二段階認証</h2>
        </div>
      </div>
    </div>
  </section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<div class="login-wrap">
					<form method="post">
						<div class="login-form two-factor-auth">
							<h3>二段階認証コード</h3>
							<p>認証アプリを使用して取得した二段階認証コードをご入力ください。</p>

              				<input id="google_code" class="form-control" name="google_code" placeholder="認証コード">
              				{form_error('google_code')}

              				<div class="row">
								<div class="col-md-offset-2 col-md-8 col-md-offset-2">
									<button class="login-btn btn btn-primary btn-lg">送信する<i class="fa fa-angle-right"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
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

</body></html>