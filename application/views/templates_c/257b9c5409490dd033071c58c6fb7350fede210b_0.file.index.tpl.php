<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-19 12:00:06
=======
/* Smarty version 3.1.31, created on 2018-02-13 12:31:28
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mypage\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8a3db6931900_51930857',
=======
  'unifunc' => 'content_5a825c1098ca06_00352986',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '257b9c5409490dd033071c58c6fb7350fede210b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mypage\\index.tpl',
<<<<<<< HEAD
      1 => 1518765242,
=======
      1 => 1508209381,
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./include/head.tpl' => 1,
    'file:./include/header.tpl' => 1,
    'file:./include/side.tpl' => 1,
    'file:./include/footer.tpl' => 1,
  ),
),false)) {
<<<<<<< HEAD
function content_5a8a3db6931900_51930857 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a825c1098ca06_00352986 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>マイページ | CryptoPie</title>
<?php $_smarty_tpl->_subTemplateRender("file:./include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body class="skin-black">
<<<<<<< HEAD
<?php $_smarty_tpl->_subTemplateRender("file:./include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ask'=>floatval($_smarty_tpl->tpl_vars['ask']->value)), 0, false);
?>


=======
<?php $_smarty_tpl->_subTemplateRender("file:./include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php $_smarty_tpl->_subTemplateRender("file:./include/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<aside class="right-side">
<<<<<<< HEAD
			<!-- Main content -->
			<section class="content">

=======

			<!-- Main content -->
			<section class="content">
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
				<div class="row">
					<div class="col-md-12">
						<?php if ((!$_smarty_tpl->tpl_vars['is_upload']->value && $_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 0) || $_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 2) {?>
							<div class="alert alert-block alert-danger">
								<?php if (!$_smarty_tpl->tpl_vars['is_upload']->value && $_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 0) {?><strong>本人確認書類の提出がまだです</strong><?php }?>　「<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/auth/document_upload<?php if ($_smarty_tpl->tpl_vars['login_info']->value['user_type'] == 2) {?>_corp<?php }?>">本人確認書類のアップロード</a>」から<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 2) {?>再<?php }?>提出をお願いします
							</div>
						<?php } elseif ($_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 0 && $_smarty_tpl->tpl_vars['is_upload']->value) {?>
							<div class="alert alert-block alert-danger">
								<strong>本人確認書類の確認中です</strong>
							</div>
						<?php }?>
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
								<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/shop/trade/" method="post" id="tradingForm">
									<div class="price-board price-board-buy">
										購入価格（BTC/JPY）
<<<<<<< HEAD
										<strong class="price-board-ask" id="price-ask"><?php echo $_smarty_tpl->tpl_vars['ask']->value;?>
</strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（BTC/JPY）
										<strong class="price-board-bid" id="price-bid"><?php echo $_smarty_tpl->tpl_vars['bid']->value;?>
</strong>
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
										<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['usable'] != 1) {?>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを買う</a></div>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを売る</a></div>
										<?php } else { ?>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-danger modal_trade_btn" data-type="1">コインを買う</button></div>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-success modal_trade_btn" data-type="2">コインを売る</button></div>
										<?php }?>
									</div>
								</form>
							</div>
<<<<<<< HEAD
						</div>

						<div class="panel tradingWrap">
							<div class="panel-body">
								<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/shop/trade/" method="post" id="tradingForm">
									<div class="price-board price-board-buy">
										購入価格（BCH/BTC）
										<strong class="price-board-ask" id="price-ask"><?php echo $_smarty_tpl->tpl_vars['ask_bch']->value;?>
</strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（BCH/BTC）
										<strong class="price-board-bid" id="price-bid"><?php echo $_smarty_tpl->tpl_vars['bid_bch']->value;?>
</strong>
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
										<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['usable'] != 1) {?>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを買う</a></div>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを売る</a></div>
										<?php } else { ?>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-danger modal_trade_btn" data-type="1">コインを買う</button></div>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-success modal_trade_btn" data-type="2">コインを売る</button></div>
										<?php }?>
									</div>
								</form>
							</div>
						</div>

						<div class="panel tradingWrap">
							<div class="panel-body">
								<form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/shop/trade/" method="post" id="tradingForm">
									<div class="price-board price-board-buy">
										購入価格（ETH/BTC）
										<strong class="price-board-ask" id="price-ask"><?php echo $_smarty_tpl->tpl_vars['ask_eth']->value;?>
</strong>
									</div>
									<div class="price-board price-board-sell">
										売却価格（ETH/BTC）
										<strong class="price-board-bid" id="price-bid"><?php echo $_smarty_tpl->tpl_vars['bid_eth']->value;?>
</strong>
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
										<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['usable'] != 1) {?>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを買う</a></div>
											<div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-block btn-lg" disabled="disabled">コインを売る</a></div>
										<?php } else { ?>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-danger modal_trade_btn" data-type="1">コインを買う</button></div>
											<div class="col-md-6 col-xs-6"><button type="button" class="btn btn-block btn-lg btn-success modal_trade_btn" data-type="2">コインを売る</button></div>
										<?php }?>
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
			<?php $_smarty_tpl->_subTemplateRender("file:./include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- jQuery UI 1.10.3 -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
jquery-ui-1.10.3.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- Bootstrap -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
plugins/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- datatables -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
plugins/datatables/jquery.dataTables.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
plugins/datatables/dataTables.bootstrap.js" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
Director/app.js" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src='<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
plugins/bignumber/bignumber.js'><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
application.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">
	
	var selectBank = new app.ticker();
	$('#js-oderList').DataTable({
		"order" : [],
		"dom"   : '<"top"lf>rt<"bottom"ip><"clear">',
		serverSide: true,
		ajax: {
			url: '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/index/ajax/',
			type: 'POST'
		},
		
			columns: [
				{},
				{},
				{ 'class':'text-right' },
				{ 'class':'text-right' },
				{ 'class':'text-right' },
				{ 'class':'text-right' },
			]
		
	});
	
	var trading = new appForm.trading({
		balanceUrl : '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/shop/balance/',
		checkUrl   : '<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/shop/check/'
	});
	
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
