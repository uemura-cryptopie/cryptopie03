<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>日本円ご出金 | CryptoPie</title>
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
					<li class="active"><a href="#reception" data-toggle="tab">日本円 出金</a></li>
					<li><a href="#reception_histry" data-toggle="tab">日本円 出金履歴</a></li>
				</ul>
				
				<!-- タブ内容 -->
				<div class="tab-content">
					<div class="tab-pane -wrapper active" id="reception">
						<section class="panel">
							<div class="panel-body">
								<h2 class="heading heading-default heading-h2">日本円ご出金</h2>
								
								<div class="row form-horizontal">
									<div class="col-md-8">
										<form id="applicationForm" class="form-horizontal" action="{$base_url}mypage/finance/jpy-withdrawal-request/" method="post">
											<section class="panel panel-inner">
												<div class="panel-heading">お客様口座情報</div>
												<div class="panel-body">
													{foreach from=$bank item=item}
														<dl class="jpyDeposit-bunk">
															<dt><strong>銀行名</strong>{$item.bankname|escape|default:''}</dt>
															<dd class="jpyDeposit-bunk-info">
																<strong>支店名</strong>{$item.branchname|escape|default:''}<br>
																<strong>預金種別</strong>{$accountsubtype[$item.accountsubtype]|escape|default:''}<br>
																<strong>口座番号</strong>{$item.acnumber|escape|default:''}<br>
																<strong>口座名義</strong>{$item.ackana|escape|default:''}
															</dd>
															<dd class="jpyDeposit-bunk-select">
																<label class="radio">
																	<input name="bank" class="input_radio" value="{$item.id|escape|default:''}" type="radio">
																	<span>この銀行口座にご出金</span>
																</label>
															</dd>
														</dl>
													{foreachelse}
														<div class="col-md-12 m-b-15">
															<p>出金するためには口座を登録してください。</p>
														</div>
													{/foreach}
													
													<p class="">
														<a href="{$base_url}mypage/bank/" class="btn btn-primary"><i class="fa fa-bank"></i> 銀行口座情報を追加する</a>
													</p>
												</div>
											</section>
											
											{if !empty($bank)}
											<section class="panel panel-inner">
												<div class="panel-heading">ご出金額</div>
												<div class="panel-body">
													<div class="row m-b-20">
														<div class="col-md-6 m-b-15">
															<div class="input-group m-b-10">
																<input class="form-control input" type="text" name="amount" placeholder="1000" value="">
																<span class="input-group-addon">円</span>
															</div>
														</div>
														<div class="col-md-12">
															<button type="submit" class="btn btn-danger btn-lg">日本円を出金する（取消不可）</button>
														</div>
													</div>
													{if !empty($flashdata.error)}
														<div class="alert alert-block alert-danger">
															<strong>{$flashdata.error|default:''}</strong>
														</div>
													{/if}
													{if isset($flashdata.success)}
														<div class="alert alert-block alert-success">
															<strong>{$flashdata.success}</strong>
														</div>
													{/if}
												</div>
											</section>
											{/if}
										</form>

										<div class="row">
											<div class="col-md-12">
												<strong>【ご注意】</strong><br>
												・ セキュリティーのため、ご登録いただいた「お客様口座」以外の口座へはお振込できません。<br>
												・ 午前 11 時 30 分までにご依頼をいただいた場合は当日（銀行営業日）中、それ以降の場合は翌銀行営業日までに出金いたします。（状況により遅れる可能性もありますのでご了承ください。）
											</div>
										</div>
										
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
												<th>出金金額</th>
												<th>ステータス</th>
											</tr>
										</thead>
										<tbody>
											{foreach from=$history item=item}
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
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		groups: { // エラー表示のグループ化
		},
		rules : { // バリデーションルールの設定
		"bank"   : { required: true },
		"amount" : { required: true }
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			eName = element.attr("name");
			// エラー表示の位置を変更
			if (eName == "amount") {
				error.appendTo(element.parent().parent());
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages : {
		"bank"   : { required: "「口座」を選択してください" },
		"amount" : { required: "「金額」を指定してください" }
		}
	});
</script>

</body>
</html>