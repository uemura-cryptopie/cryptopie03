<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>マイページ | CryptoPie</title>
{include file="./include/head.tpl"}
</head>
<body class="skin-black">
<<<<<<< HEAD
{include file="./include/header.tpl" ask=floatval($ask)}

	<div class="wrapper row-offcanvas row-offcanvas-left">
		{include file="./include/side.tpl"}
		<aside class="right-side">
			<!-- Main content -->
			<section class="content">

=======
{include file="./include/header.tpl"}
	<div class="wrapper row-offcanvas row-offcanvas-left">
		{include file="./include/side.tpl"}
		<aside class="right-side">

			<!-- Main content -->
			<section class="content">
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
				<div class="row">
					<div class="col-md-12">
						{if (!$is_upload && $login_info.status.id_check == 0) || $login_info.status.id_check == 2}
							<div class="alert alert-block alert-danger">
								{if !$is_upload && $login_info.status.id_check == 0}<strong>本人確認書類の提出がまだです</strong>{/if}　「<a href="{$base_url}mypage/auth/document_upload{if $login_info.user_type == 2}_corp{/if}">本人確認書類のアップロード</a>」から{if $login_info.status.id_check == 2}再{/if}提出をお願いします
							</div>
						{else if $login_info.status.id_check == 0 && $is_upload}
							<div class="alert alert-block alert-danger">
								<strong>本人確認書類の確認中です</strong>
							</div>
						{/if}
					</div>
				</div>
				
				<!-- Main row -->
				<div class="row">
					
					<div class="col-md-12">
						<!--chat start-->
<<<<<<< HEAD
						<div class="panel tradingWrap">
=======
						<section class="panel tradingWrap">
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
							<div class="panel-body">
								<form action="{$base_url}mypage/shop/trade/" method="post" id="tradingForm">
									<div class="price-board price-board-buy">
										購入価格（BTC/JPY）
<<<<<<< HEAD
										<strong class="price-board-ask" id="price-ask">{$ask}</strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（BTC/JPY）
										<strong class="price-board-bid" id="price-bid">{$bid}</strong>
=======
										<strong class="price-board-ask" id="price-ask"></strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（BTC/JPY）
										<strong class="price-board-bid" id="price-bid"></strong>
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>数量（BTC）</label>
											<div class="input-group m-b-10">
												<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
												<input class="form-control" type="number" step="0.1" min="0" value="0" id="tradeAmount">
											</div>
										</div>
										<div class="col-md-6">
											<label>日本円参考総額</label>
											<div class="input-group m-b-10">
												<input class="form-control" type="text" value="0" disabled="disabled" id="tradeReferenceJPY">
												<span class="input-group-addon">円</span>
											</div>
										</div>
									</div>
									<div class="row row-10 m-b-10" id="tradingSpinBtn">
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="1">+1</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0.1">+0.1</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0.01">+0.01</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0">クリア</button></div>
									</div>
									<div class="row" id="tradingBtn">
										{if $login_info.status.usable != 1}
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを買う</a></div>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを売る</a></div>
										{else}
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-danger modal_trade_btn" data-type="1">コインを買う</button></div>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-success modal_trade_btn" data-type="2">コインを売る</button></div>
										{/if}
									</div>
								</form>
							</div>
<<<<<<< HEAD
						</div>

						<div class="panel tradingWrap">
							<div class="panel-body">
								<form action="{$base_url}mypage/shop/trade/" method="post" id="tradingForm">
									<div class="price-board price-board-buy">
										購入価格（BCH/BTC）
										<strong class="price-board-ask" id="price-ask">{$ask_bch}</strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（BCH/BTC）
										<strong class="price-board-bid" id="price-bid">{$bid_bch}</strong>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>数量（BCH）</label>
											<div class="input-group m-b-10">
												<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
												<input class="form-control" type="number" step="0.1" min="0" value="0" id="tradeAmount">
											</div>
										</div>
										<div class="col-md-6">
											<label>日本円参考総額</label>
											<div class="input-group m-b-10">
												<input class="form-control" type="text" value="0" disabled="disabled" id="tradeReferenceJPY">
												<span class="input-group-addon">円</span>
											</div>
										</div>
									</div>
									<div class="row row-10 m-b-10" id="tradingSpinBtn">
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="1">+1</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0.1">+0.1</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0.01">+0.01</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0">クリア</button></div>
									</div>
									<div class="row" id="tradingBtn">
										{if $login_info.status.usable != 1}
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを買う</a></div>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを売る</a></div>
										{else}
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-danger modal_trade_btn" data-type="1">コインを買う</button></div>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-success modal_trade_btn" data-type="2">コインを売る</button></div>
										{/if}
									</div>
								</form>
							</div>
						</div>

						<div class="panel tradingWrap">
							<div class="panel-body">
								<form action="{$base_url}mypage/shop/trade/" method="post" id="tradingForm">
									<div class="price-board price-board-buy">
										購入価格（ETH/BTC）
										<strong class="price-board-ask" id="price-ask">{$ask_eth}</strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（ETH/BTC）
										<strong class="price-board-bid" id="price-bid">{$bid_eth}</strong>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>数量（ETH）</label>
											<div class="input-group m-b-10">
												<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
												<input class="form-control" type="number" step="0.1" min="0" value="0" id="tradeAmount">
											</div>
										</div>
										<div class="col-md-6">
											<label>日本円参考総額</label>
											<div class="input-group m-b-10">
												<input class="form-control" type="text" value="0" disabled="disabled" id="tradeReferenceJPY">
												<span class="input-group-addon">円</span>
											</div>
										</div>
									</div>
									<div class="row row-10 m-b-10" id="tradingSpinBtn">
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="1">+1</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0.1">+0.1</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0.01">+0.01</button></div>
										<div class="col-md-3 col-xs-3"><button type="button" class="btn btn-block btn-default" value="0">クリア</button></div>
									</div>
									<div class="row" id="tradingBtn">
										{if $login_info.status.usable != 1}
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを買う</a></div>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを売る</a></div>
										{else}
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-danger modal_trade_btn" data-type="1">コインを買う</button></div>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-success modal_trade_btn" data-type="2">コインを売る</button></div>
										{/if}
									</div>
								</form>
							</div>
						</div>

						
=======
						</section>
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						
						
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default">注文履歴一覧</h2>
								
								<div class="table-responsive">
									<table id="js-oderList" class="trading-history table table-bordered table-striped">
										<thead>
											<tr class="trading-history-head">
												<th>取引日時</th>
												<th>取引種別</th>
												<th>価格</th>
<<<<<<< HEAD
												<th>BCH数量</th>
=======
												<th>BTC数量</th>
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
												<th>JPY数量</th>
												<th>手数料</th>
											</tr>
										</thead>
										<tbody>
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

<div id="modal_trade" class="modal_window modal_trade">
	<a class="modal_window_close" href="javascript:void(0);">×</a>
	<div class="modal_box_In">
		<h2 class="modal_window_heading">6 秒以内に注文を実行してください。</h2>
		<form action="" method="post">
			<div class="m-b-10">
				<div class="progress" id="trade-progressBar">
				</div>
			</div>
			<div class="row m-b-10">
				<div class="col-md-4 m-b-10">
					<button class="btn btn-default btn-block btn-lg modal_window_cancel">キャンセル</button>
				</div>
				<div class="col-md-8 m-b-10">
					<button class="btn btn-primary btn-block btn-lg" id="js-tradeBtn">注文実行</button>
				</div>
			</div>
		</form>
	</div>
</div>


<!-- jQuery -->
<script src="{$js_url}jquery.js" type="text/javascript"></script>
<!-- jQuery UI 1.10.3 -->
<script src="{$js_url}jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="{$js_url}bootstrap.min.js" type="text/javascript"></script>
<script src="{$js_url}plugins/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/javascript"></script>
<!-- datatables -->
<script src="{$js_url}plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{$js_url}plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script src="{$js_url}Director/app.js" type="text/javascript"></script>

<script src='{$js_url}plugins/bignumber/bignumber.js'></script>
<script src="{$js_url}application.js"></script>


<script type="text/javascript">
	
	var selectBank = new app.ticker();
	$('#js-oderList').DataTable({
		"order" : [],
		"dom"   : '<"top"lf>rt<"bottom"ip><"clear">',
		serverSide: true,
		ajax: {
			url: '{$base_url}mypage/index/ajax/',
			type: 'POST'
		},
		{literal}
			columns: [
				{},
				{},
				{ 'class':'text-right' },
				{ 'class':'text-right' },
				{ 'class':'text-right' },
				{ 'class':'text-right' },
			]
		{/literal}
	});
	
	var trading = new appForm.trading({
		balanceUrl : '{$base_url}mypage/shop/balance/',
		checkUrl   : '{$base_url}mypage/shop/check/'
	});
	
</script>

</body>
</html>