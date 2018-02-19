<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>日本円ご入金 | CryptoPie</title>
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
					<li class="active"><a href="#reception" data-toggle="tab">日本円 入金</a></li>
					<li><a href="#reception_histry" data-toggle="tab">日本円 入金履歴</a></li>
				</ul>
				
				<!-- タブ内容 -->
				<div class="tab-content">
					<div class="tab-pane -wrapper active" id="reception">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">日本円ご入金</h2>
								
								<div class="row">
									<div class="col-md-8">
										<section class="panel panel-inner">
											<div class="panel-heading">振込入金先銀行口座情報</div>
											<div class="panel-body">
												<table class="table jpyDeposit-table">
													<tbody>
														<tr>
															<th>銀行名</th>
															<td>住信SBIネット銀行</td>
														</tr>
														<tr>
															<th>支店名</th>
															<td>法人第一支店（店番号 106）</td>
														</tr>
														<tr>
															<th>預金種別</th>
															<td>普通</td>
														</tr>
														<tr>
															<th>口座番号</th>
															<td>1164081</td>
														</tr>
														<tr>
															<th>口座名義人名</th>
															<td>ｶ)ｸﾘﾌﾟﾄﾊﾟｲ</td>
														</tr>
													</tbody>
												</table>
												<p class="jpyDeposit-note">
													<strong>必ず、本人名義の金融機関口座よりお振込みください。</strong><br>
													振込人名義に 6 桁の数字を入力せずお振込してしまった場合、<a href="{$base_url}contact/">お問合せフォーム</a>から「アカウント ID」「6 桁の数字 振込名義」「振込日時」「振込金額」 をお知らせください。
												</p>
												<dl class="jpyDeposit-user">
													<dt>お振込名義</dt>
													<dd>
														<p class="jpyDeposit-note">
															※6桁の数字は、同姓同名の複数のお客様による振込があった際に、迅速に入金処理をするための識別番号となります。必ずご入力ください。
														</p>
														<p class="jpyDeposit-number">{$payment.payment_id|default:''} {$payment.name|default:''}</p>
													</dd>
												</dl>
												
												<div class="row">
													<div class="col-md-12">
														<strong>【ご注意】</strong><br>
														・ 日本円のご入金に必要な金融機関手数料はお客様のご負担になります。<br>
														・ ご登録いただいた「お客様口座」以外からは、決して振込まないでください。ご登録のない口座から振込まれると、ご入金元不明となり CryptoPie アカウントに反映されません。<br>
														・ 振込先口座にご入金いただいた日本円は、仮想通貨の売買にのみご使用いただけます。
													</div>
												</div>
											</div>
												
										</section>
									</div>
								</div>
							</div>
						</section>
						
						
					</div>
					
					<div class="tab-pane -wrapper" id="reception_histry">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">取引一覧</h2>
								
								<div class="table-responsive">
									<table class="trading-history table table-bordered table-striped">
										<thead>
											<tr class="trading-history-head">
												<th>受付日時</th>
												<th>入金金額</th>
												<th>ステータス</th>
											</tr>
										</thead>
										<tbody>
											{foreach from=$history|default:array() item=item}
												<tr>
													<td>{$item.inserted_at|default:''}</td>
													<td class="text-right">{$item.amount|default:''} 円</td>
													<td class="text-center">{$item.status|default:''}</td>
												</tr>
											{/foreach}
										</tbody>
									</table>
								</div>
								
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


</body>
</html>