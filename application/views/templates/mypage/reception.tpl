<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>コイン受信 | CryptoPie</title>
{include file="./include/head.tpl"}
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
					<li class="active"><a href="#reception" data-toggle="tab">BTC 受信</a></li>
					<li><a href="#reception_histry" data-toggle="tab">BTC 受取履歴</a></li>
				</ul>
				
				<!-- タブ内容 -->
				<div class="tab-content">
					<div class="tab-pane -wrapper active" id="reception">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">ビットコインを受け取る</h2>
								
								<div class="row m-b-20">
									<div class="col-md-12">
										{if empty($wallet)}
											{* BITコインアドレス未作成 *}
											<form action="{$base_url}mypage/{$controller}/create-reception/" method="post">
												<button class="btn btn-primary btn-lg">受信用ビットコインアドレスを取得</button>
											</form>
										{else}
											{* BITコインアドレス作成済み *}
											<div class="row reception-address">
												<div class="reception-address-qr">
													<img src="https://blockchain.info/qr?data={$wallet.BTC.address}&size=200" alt="QRコード">
												</div>
												<div class="reception-address-code">
													<p>
														<span class="reception-address-code--icon"><i class="fa fa-file-text"></i></span><span class="reception-address-code--code" id="js-addressText">{$wallet.BTC.address}</span>
													</p>
													<p>
														<button type="submit" class="btn btn-primary btn-lg" id="js-addressCopy" data-clipboard-action="copy" data-clipboard-target="#js-addressText">受信用ビットコインアドレスをコピー</button>
													</p>
												</div>
											</div>
										{/if}
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<strong>【ご注意】</strong><br>
										誤ったビットコインアドレスに送付した場合、ビットコインは当社に届きません。お預入の際には、送付元で入力したアドレスに誤りがないか、十分にご確認をお願い致します。<br>
										ビットコインのお預入に際し、当社は預入手数料を徴収しておりません。ただし、送付元によって送付手数料が徴収され、お客様負担となる場合があります。<br>
										ビットコインのお預入は、セキュリティのチェック及びブロックチェーンの性質上、当社がお預入を検知してからお客様の口座に反映されるまで、最短でも数十分以上を要します。
									</div>
								</div>
								
							</div>
						</section>
					</div>
					
					<div class="tab-pane -wrapper" id="reception_histry">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">ビットコイン受け取り履歴</h2>
								
								<div class="table-responsive">
									<table class="trading-history table table-bordered table-striped">
										<thead>
											<tr class="trading-history-head">
												<th>受付日時</th>
												<th>通貨区分</th>
												<th>数量（BTC）</th>
												<th>トランザクションID</th>
												<th>ステータス</th>
											</tr>
										</thead>
										<tbody>
											{foreach from=$history item=item}
												<tr>
													<td>{$item.created_at|default:''}</td>
													<td>{$item.m_currency_id|default:''}</td>
													<td class="text-right">{$item.amount|default:''}</td>
													<td><a href="https://blockchain.info/tx-index/{$item.tx_hash|default:''}">{$item.tx_hash_trim|default:''}</a></td>
													<td class="text-center"><span class="label label-{if !$item.status|default:''}danger{else}success{/if}">{$item.status_view|default:''}</span></td>
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

<!-- clipboard -->
<script src="{$js_url}plugins/clipboard/clipboard.min.js"></script>

<!-- Director App -->
<script src="{$js_url}Director/app.js" type="text/javascript"></script>

<!-- Director for demo purposes -->
<script>
	var clipboard = new Clipboard('#js-addressCopy');
	clipboard.on('success', function(e) {
		alert("ビットコインアドレスをコピーしました");
		console.log(e);
	});
	clipboard.on('error', function(e) {
		console.log(e);
	});
</script>
</body>
</html>