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
						<div class="login-form form-google-qr-code">
							<h3>Google Authenticator</h3>
							<p>Scan with Google Authenticator application on your smart phone.</p>
							<div id="img" class='google_qr_code'><img src='{$google_QR_Code}' /></div>
							<div class="row">
								<div class="col-md-offset-2 col-md-8 col-md-offset-2">
									<button name="googleQRCode" class="login-btn btn btn-primary btn-lg" value="true">送信する<i class="fa fa-angle-right"></i></button>
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
</body></html>