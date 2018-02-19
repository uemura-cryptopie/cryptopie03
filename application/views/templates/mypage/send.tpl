<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>コイン送金 | CryptoPie</title>
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
					<li class="active"><a href="#reception" data-toggle="tab">BTC 送金</a></li>
					<li><a href="#reception_address" data-toggle="tab">BTC 送金先一覧</a></li>
					<li><a href="#reception_histry" data-toggle="tab">BTC 送金履歴</a></li>
				</ul>
				
				<!-- タブ内容 -->
				<div class="tab-content">
					{********************
					 *   ビットコインを送る   *
					 ********************}
					<div class="tab-pane -wrapper active" id="reception">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">ビットコインを送る</h2>
								<div class="row">
									<form action="{$base_url}mypage/finance/send-exec/" method="post" id="formSend">
										<div class="addressList container-fluid m-b-20">
											<div class="row m-b-20">
												<div class="col-md-12">
													<p>
														<a href="#reception_address" class="btn btn-primary nav-tab-link"><i class="fa fa-list"></i> 送信先アドレスを追加する</a>
													</p>
													{if !empty($addresses)}
														<select id="addresses" name="address">
															{foreach from=$addresses item=item}
																<option value="{$item.address|default:''|escape}" data-description="{$item.name|default:''|escape}" data-title="label1">{$item.address|default:''|escape}</option>
															{/foreach}
														</select>
													{/if}
												</div>
											</div>
											
											<div class="row m-b-20">
												{if !empty($addresses)}
													<div class="col-md-4 m-b-15">
														<label>送金数量（BTC）</label>
														<div class="input-group m-b-10">
															<span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
															<input class="form-control input" type="number" name="amount" step="0.1" value="0" min="0" id="tradeAmount">
														</div>
													</div>
													<div class="col-md-4 m-b-15">
														<label>日本円参考総額</label>
														<div class="input-group m-b-10">
															<input class="form-control input" type="text" value="0" disabled="disabled" id="tradeReferenceJPY">
															<span class="input-group-addon">円</span>
														</div>
													</div>
													
													<div class="col-md-12 m-b-15 sendCoinMessage" id="sendCoinMessage">
														<div class="sendCoinMessage--text"></div>
													</div>
													
													{if !empty($transfer_coin)}
														<div class="col-md-12 m-b-15">
															<label>二段階認証</label>
															<div class="input-group m-b-10">
																<input class="form-control input" type="text" name="google_code" value="">
															</div>
															{if !empty($flashdata.tf_error)}
																<div class="alert alert-inlineblock alert-danger">
																	<strong>{$flashdata.tf_error|default:''}</strong>
																</div>
															{/if}
														</div>
													{/if}
													
													<div class="col-md-6">
														<button type="button" class="btn btn-danger btn-lg" id="formSendBtn">ビットコインを送金する（取消不可）</button>
													</div>
												{else}
													<div class="col-md-12 m-b-15">
														<p>送金するためには送金先アドレスを登録してください。</p>
													</div>
												{/if}
											</div>
											{if !empty($flashdata.error)}
												<div class="alert alert-inlineblock alert-danger">
													<strong>{$flashdata.error|default:''}</strong>
												</div>
											{/if}
											{if isset($flashdata.success)}
												<div class="alert alert-inlineblock alert-success">
													<strong>{$flashdata.success}</strong>
												</div>
											{/if}
										</div>
									</form>
								</div>

								
								<div class="row">
									<div class="col-md-12">
										<strong>【ご注意】</strong><br>
										・ 当社は外部ビットコインアドレスで起きたことに関して一切の責任を負いません。<br>
										・ 外部ビットコインアドレスを間違えて送金した場合、ビットコインは絶対に取戻せません。<br>
										・ 外部ビットコインウォレットのパスワードまたはプライベートキーを紛失した場合、永遠にそのウォレットのビットコインを使用できなくなる可能性があります。<br>
										・ 基本手数料として一律 0.002 BTC かかります。<br>
										・ ご指定された優先度にかかる追加手数料はお客様のご負担となります。追加手数料はビットコインマイナーへ支払われます。<br>
										・ 他のお客様による大量のビットコイン送金依頼がある場合等に総量規制を行います。その場合は、お客様の外部ビットコインへの送金が遅れることがあるのでご注意ください。
									</div>
								</div>
								
							</div>
						</section>
					</div>
					
					{********************
					 *      送金先一覧     *
					 ********************}
					<div class="tab-pane -wrapper" id="reception_address">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">送金先一覧</h2>
								<div class="row m-b-15">
									<form action="{$base_url}mypage/finance/add_address#reception_address" method="post">
										<div class="col-md-3 m-b-10">
											<input type="text" class="form-control input" placeholder="名称" name="name" value="{$params.name|default:''}">
										</div>
										<div class="col-md-5 m-b-10">
											<input type="text" class="form-control input" placeholder="新しいビットコインアドレス" name="address" value="{$params.address|default:''}">
										</div>
										<div class="col-md-4 m-b-10">
											<button class="btn btn-primary btn-block">ビットコインアドレスを追加する</button>
										</div>
									</form>
								</div>
								
								<ul class="addressList list-group teammates">
									{foreach from=$addresses item=item}
										<li class="list-group-item js-editAddress-item">
											<span class="addressList-label">{$item.name|default:''|escape}</span>
											<span class="addressList-code">{$item.address|default:''|escape}</span>
											<span class="addressList-btn">
												<button class="btn btn-primary btn-sm modal_editAddress_btn" data-itemId="{$item.id|default:''|escape}">編集</button>
											</span>
										</li>
									{/foreach}
								</ul>
								
							</div>
						</section>
					</div>
					
					{********************
					 *     送金履歴    *
					 ********************}
					<div class="tab-pane -wrapper" id="reception_histry">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">送金履歴</h2>
								
								<div class="table-responsive">
									<table class="trading-history table table-bordered table-striped">
										<thead>
											<tr class="trading-history-head">
												<th>受付日時</th>
												<th>通貨区分</th>
												<th>数量（BTC）</th>
												<th>ビットコインアドレス</th>
												<th>トランザクションID</th>
												<th>ステータス</th>
											</tr>
										</thead>
										<tbody>
											{foreach from=$history item=item}
												<tr>
													<td>{$item.inserted_at|default:''}</td>
													<td>{$item.m_currency_id|default:''}</td>
													<td class="text-right">{$item.amount|default:''}</td>
													<td><a href="https://blockchain.info/address/{$item.to_address|default:''}">{$item.to_address|default:''}</a></td>
													<td><a href="https://blockchain.info/tx-index/{$item.tx_hash|default:''}" target="_blank">{$item.tx_hash_trim|default:''}</a></td>
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

{********************
 * アドレス変更 モーダル *
 ********************}
<div id="modal_editAddress" class="modal_window modal_editAddress">
	<a class="modal_window_close" href="javascript:void(0);">×</a>
	<div class="modal_box_In">
		<h2 class="modal_window_heading">送付先情報を編集してください。</h2>
		<form action="{$base_url}mypage/finance/update_address/" method="post">
			<div class="m-b-20 js-editAddress">
				<input type="hidden" name="id" value="">
				<div class="m-b-10">
					<label>名称</label>
					<input type="text" class="form-control input" name="name" value="">
				</div>
				<div>
					<label>ビットコインアドレス</label>
					<input type="text" class="form-control input" name="address" value="">
				</div>
			</div>
			<div class="m-b-20 text-center">
				<label class="checkbox-inline checkbox">
					<input name="delete_flag" class="input_checkbox" value="1" type="checkbox" id="js-deleteAddress">
					<span>送付先情報を削除する</span>
				</label>
			</div>
			<div class="row m-b-10">
				<div class="col-md-4 m-b-10">
					<button class="btn btn-default btn-block btn-lg modal_window_cancel">キャンセル</button>
				</div>
				<div class="col-md-8 m-b-10">
					<button class="btn btn-primary btn-block btn-lg" id="js-editAddressBtn">編集する</button>
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

<!-- msdropdown -->
<script src="{$js_url}plugins/msdropdown/jquery.dd.js"></script>

<!-- Director App -->
<script src="{$js_url}Director/app.js" type="text/javascript"></script>
<script src='{$js_url}plugins/bignumber/bignumber.js'></script>
<script src="{$js_url}application.js"></script>

<script>
	
	// アドレス選択
	$("#addresses").msDropdown({
		visibleRows: 6
	});
	
	var editAddress = new appForm.editAddress();
	
	var trading = new appForm.referenceJPY({
		url: "{$base_url}api/ticker/get/"
	});
	
	var sendValidation = new appForm.sendValidation({
		balanceUrl : '{$base_url}mypage/shop/balance/'
	});
	
	
</script>

</body>
</html>