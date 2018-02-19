<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-19 10:08:14
=======
/* Smarty version 3.1.31, created on 2018-02-13 10:35:35
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8a237e44ded4_50466883',
=======
  'unifunc' => 'content_5a8240e76f5e23_57605273',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d8e20f17c5b3b7b7317ebcc41afb06bb8b321e4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\index.tpl',
      1 => 1518154905,
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
function content_5a8a237e44ded4_50466883 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a8240e76f5e23_57605273 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CryptoPie</title>
<?php $_smarty_tpl->_subTemplateRender("file:include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js?hl=ja'><?php echo '</script'; ?>
>
</head>
<body>
<div id="wrapper">
	<?php $_smarty_tpl->_subTemplateRender("file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	
	<section id="banner">
		<!-- Slider -->
		<div id="main-slider" class="flexslider">
			<ul class="slides">
				<li>
					<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
slides/01.jpg" alt="" />
					<div class="flex-caption">
						<h3>取引手数料 日本最安値</h3>
					</div>
				</li>
				<li>
					<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
slides/02.jpg" alt="" />
					<div class="flex-caption">
						<h3>世界一見やすい取引画面</h3>
					</div>
				</li>
				<li>
					<img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
slides/03.jpg" alt="" />
					<div class="flex-caption">
						<h3>堅牢なセキュリティ</h3>
					</div>
				</li>
			</ul>
		</div>
		<!-- end slider -->
		<div class="main-signup">
			<div class="signup-area">
				<form method="post">
					<div class="login-form">
						<h2 class="login-heading"><i class="fa fa-sign-in"></i>ユーザー登録</h2>
						<label class="label-mini" for="email">メールアドレス</label>
						<input id="email" class="form-control" type="email" placeholder="メールアドレス" name="mail">
						<?php echo form_error('mail');?>

						<!--
						<div id="captcha" class="g-recaptcha" name="captcha" data-sitekey="<?php echo RECAPTCHA_KEY;?>
"></div>
						<?php echo form_error('g-recaptcha-response');?>

						-->
						<button class="login-btn btn btn-action btn-lg">新規会員登録<i class="fa fa-angle-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
	<section id="call-to-action-2">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="introduction">
						<h2 class="introduction-heading">CryptoPieとは？</h2>
						<div class="introduction-video">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/NF5rF1uNDLA" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<div class="col-md-6 text-center">
					<div class="introduction -last">
						<h2 class="introduction-heading">利用方法</h2>
						<div class="introduction-video">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/wQc9Tgc4RtU?rel=0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container info-area">
			<div class="row">
				<div class="col-md-12">
					<div class="about-title text-center">
						<h2>CryptoPieの特徴</h2>
						<p>CryptoPieとは、Bitcoinなどの仮想通貨を取り扱う、仮想通貨取引所です。仮想通貨は現在800種類を超えていると言われています。多くの仮想通貨をよりシンプルに取引できる取引所を作り、仮想通貨の魅力を世界中の人たちに伝えたい。そんな思いからCryptoPieは作られました。</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-jpy"></i>
					<div class="info-blocks-in">
						<h3>取引手数料 ０％</h3>
						<p>
							取引手数料は０％です。一切手数料はかかりません。
						</p>
					</div>
				</div>
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-shield"></i>
					<div class="info-blocks-in">
						<h3>堅牢なセキュリティ</h3>
						<p>
							全体取引の95%以上のビットコインをオフライン管理しています。また、各ウォレットに暗号化を施しており、万全なセキュリティ体制を実現しています。
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-phone"></i>
					<div class="info-blocks-in">
						<h3>迅速なサポート体制</h3>
						<p>
							ご不明な点などございましたらいつでもカスタマーサポートまでお問い合わせください。２４時間以内に対応できるサポート体制を完備しています。
						</p>
					</div>
				</div>
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-laptop"></i>
					<div class="info-blocks-in">
						<h3>シンプルで見やすい取引画面</h3>
						<p>
							50社以上の仮想通貨取引所を実際に使い、ユーザーが使いやすいデザインとは何か徹底的に研究いたしました。世界一見やすく世界一取引しやすい取引画面を実現しています。初心者でも直感的に操作できるような画面設計を実現いたしました。
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-btc"></i>
					<div class="info-blocks-in">
						<h3>豊富な仮想通貨の種類</h3>
						<p>
							継続的な情報収集及び開発を行い、世界中の仮想通貨を取り扱えるよう準備しています。<br>
							※リリース直後はビットコインを含む数種類の仮想通貨のみ取り扱います。
						</p>
					</div>
				</div>
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-server"></i>
					<div class="info-blocks-in">
						<h3>スムーズな取引を実現。</h3>
						<p>
							サイト全体がサクサク動くようなサーバー設計を行っております。投資は一瞬の判断、一瞬の取引で数字が大きく変わってきますのでお客様のストレスを極限まで無くせるようにスムーズに動くサイト開発を心がけております。
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section-padding gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about-title text-center">
						<h2>CryptoPieの意味</h2>
						<p>アップルパイを皆に分け合うように、豊富な種類の仮想通貨を皆で共有し、仮想通貨の面白さをもっと知ってほしいという意味を込めてCryptoPieと命名しました。</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="about-text">
						<p class="about-text-lead">仮想通貨には以下のような特徴があります。</p>
						<div class="col-md-6 col-sm-6">
							<ul class="withArrow">
								<li>
									<h4><span class="fa fa-angle-right"></span> 送金手数料が安い</h4>
									<p>
										他行に振込む際、日本の銀行ですと700円前後の手数料がかかります。仮想通貨の場合は100円もかかりません。
									</p>
								</li>
								<li>
									<h4><span class="fa fa-angle-right"></span> 送金時間が短い</h4>
									<p>
										日本から海外へ送金する際、３日〜１週間ほど時間がかかります。仮想通貨であれば１０分以内に送金が完了します。
									</p>
								</li>
								<li>
									<h4><span class="fa fa-angle-right"></span> 価格変動が激しい</h4>
									<p>
										決済システム・通貨としての役割以外にも価格変動が激しいため投資商品としても非常に魅力があります。
									</p>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-sm-6">
							<ul class="withArrow">
								<li>
									<h4><span class="fa fa-angle-right"></span> 取引の透明性が高い</h4>
									<p>
										「ブロックチェーン」と呼ばれる仕組みで仮想通貨の送金履歴が全てオープンになります。
									</p>
								</li>
								<li>
									<h4><span class="fa fa-angle-right"></span> 発行主体が存在しない</h4>
									<p>
										例えば日本円は日本銀行が発行しています。しかし仮想通貨には特定の発行者がいません。特定の管理者によってインフレ・デフレをコントロールされることがありませんので世界規模で平等な通貨と言えます。
									</p>
								</li>
							</ul>
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section-padding socialmedia">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="fb-page" data-href="https://www.facebook.com/cryptopietrade/" data-width="500" data-height="600" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cryptopietrade/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cryptopietrade/">株式会社cryptopie</a></blockquote></div>
				</div>
				<div class="col-md-6 text-right">
					<div class="twitter">
						<a class="twitter-timeline" data-lang="ja" data-height="600" href="https://twitter.com/crypto_pie">Tweets by crypto_pie</a> <?php echo '<script'; ?>
 async src="//platform.twitter.com/widgets.js" charset="utf-8"><?php echo '</script'; ?>
>
					</div>
				</div>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.fancybox.pack.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.fancybox-media.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.flexslider.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
animate.js"><?php echo '</script'; ?>
>
<!-- Vendor Scripts -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
modernizr.custom.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
ofi.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.isotope.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
application.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
custom.js"><?php echo '</script'; ?>
>

<div id="fb-root"></div>
<?php echo '<script'; ?>
>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.9&appId=301326970311533";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));<?php echo '</script'; ?>
>

<!-- <?php echo '<script'; ?>
>
		objectFitImages('img.object-fit-img');
	$("form").submit(function(event) {
		$('#isRecaptcha, #recaptcha-error').remove();
		var recaptcha = $("#g-recaptcha-response").val();
		if (recaptcha === "") {
			$('.g-recaptcha').append('<p id="isRecaptcha" class="error_text">チェックを入れてください</p>');
			 return false;
		}
	});
<?php echo '</script'; ?>
> -->

<style type="text/css" media="screen">
	.error {
		color: red;
	}
</style>

</body>
</html><?php }
}
