<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>CryptoPie</title>
{include file="include/head.tpl"}
	<script src='https://www.google.com/recaptcha/api.js?hl=ja'></script>
</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section class="mainview">
		<div class="mainview-container clearfix">
			<div class="mainview-contents">
				<h3>ビットコイン1000円分<br>プレゼントキャンペーン実施中！</h3>
			</div>
			<div class="login-area login-area-custom">
				<form method="post">
					<div class="login-form">
						<h2 class="login-heading"><i class="fa fa-sign-in"></i>ログイン</h2>
						<label class="label-mini" for="email">メールアドレス</label>
						<input id="email" class="form-control" type="email" placeholder="メールアドレス" name="mail">
						{form_error('mail')}
						<div id="captcha" class="g-recaptcha" name="captcha" data-sitekey="{RECAPTCHA_KEY}" style="padding-bottom: 20px;
      padding-left: 25px;">
						</div>
						
						<button class="login-btn btn btn-action btn-lg login-btn-custom">新規会員登録<i class="fa fa-angle-right"></i></button>
					</div>
				</form>
			</div>
		</div>
	</section>
	
	<section id="call-to-action-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3>ビットコイン1000円分プレゼントキャンペーン実施中！</h3>
					<p>
						４月１７日から事前登録の受付を開始いたしました。<br>
						先着5000名のみ、事前登録された方にビットコイン1000円分をプレゼントしています。
					</p>
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
						<p>CryptoPieとは、Bitcoinなどの仮想通貨を取り扱う、仮想通貨取引所です。仮想通貨は現在800種類を超えていると言われていますが、取引所で取引できる仮想通貨は多くありません。豊富な数の仮想通貨をよりシンプルに取引できる取引所があればもっと仮想通貨は面白くなると考え、このCryptoPieが誕生しました。</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-jpy"></i>
					<div class="info-blocks-in">
						<h3>取引手数料 日本最安値</h3>
						<p>
							取引手数料は0%です。一切手数料はかかりません。
						</p>
					</div>
				</div>
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-laptop"></i>
					<div class="info-blocks-in">
						<h3>世界一見やすい取引画面</h3>
						<p>
							20社以上の仮想通貨取引所を実際に使い、ユーザーが使いやすいデザインとは何か研究いたしました。世界一見やすく世界一取引しやすい取引画面を実現しています。
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-shield"></i>
					<div class="info-blocks-in">
						<h3>堅牢なセキュリティ</h3>
						<p>
							全体取引の95%以上のビットコインをオフライン管理しています。また、各ウォレットに暗号化を施しており、万全なセキュリティ体制を実現しています。
						</p>
					</div>
				</div>
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-btc"></i>
					<div class="info-blocks-in">
						<h3>豊富な仮想通貨の種類</h3>
						<p>
							３年に渡って世界中の仮想通貨を取り扱えるよう準備しています。<br>
							※リリース直後はビットコインを含む数種類の仮想通貨のみ取り扱います。
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-building-o"></i>
					<div class="info-blocks-in">
						<h3>上場企業が運営/サポート</h3>
						<p>
							弊社は世界で最も仮想通貨の人気がある上海市場にて上場しています。<br>
							上場企業だからこそ実現できるサポート体制を完備しています。
						</p>
					</div>
				</div>
				<div class="col-sm-6 info-blocks clearfix">
					<i class="icon-info-blocks fa fa-calendar"></i>
					<div class="info-blocks-in">
						<h3>２４時間３６５日のサポート体制</h3>
						<p>
							仮想通貨の市場は２４時間３６５日開かれています。
							24時間365日、迅速に対応できるサポート体制を実現いたしました。
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
				<div class="col-md-6 col-sm-6">
					<div class="about-text">
						<p class="about-text-lead">仮想通貨には以下のような特徴があります。</p>
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
				<div class="col-md-6 col-sm-6">
					<div class="Introduction-video">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/NF5rF1uNDLA" frameborder="0" allowfullscreen></iframe>
					</div>
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
<script src="{$js_url}jquery.fancybox.pack.js"></script>
<script src="{$js_url}jquery.fancybox-media.js"></script>
<script src="{$js_url}jquery.flexslider.js"></script>
<script src="{$js_url}animate.js"></script>

<!-- Vendor Scripts -->
<script src="{$js_url}modernizr.custom.js"></script>
<script src="{$js_url}ofi.min.js"></script>
<script src="{$js_url}jquery.isotope.min.js"></script>
<script src="{$js_url}jquery.magnific-popup.min.js"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}custom.js"></script>

<script>
  	objectFitImages('img.object-fit-img');
  	$("form").submit(function(event) {
		$('#isRecaptcha').remove();
	   	var recaptcha = $("#g-recaptcha-response").val();
	   	if (recaptcha === "") {
	      	$('.g-recaptcha').append('<p id="isRecaptcha" class="error_text">チェックを入れてください</p>');
			return false;
	   	}
	});
</script>

<style type="text/css" media="screen">
	.error {
		color: red;
	}
</style>

</body>
</html>