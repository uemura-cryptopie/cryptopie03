<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Bitcoin価格差表示 | CryptoPie</title>
{include file="include/head.tpl"}

</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">Bitcoin価格差表示</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row">
				
				<section class="panel">
					<div class="panel-body">
						<div class="policy-body">
							<table id="exchanges" class="table table-striped table-bordered exchanges" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th style="width:180px;">取引所</th>
										<th>購入価格</th>
										<th>売却価格</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</section>
				
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
<script src="{$js_url}application.js"></script>
<!-- daterangepicker -->
<script src="{$js_url}plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="{$js_url}plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script>
	
	$.fn.dataTable.ext.errMode = 'none';
	
	var dt = $('#exchanges')
		.on( 'error.dt', function ( e, settings, techNote, message ) {
			console.log( e );
		} )
		.DataTable({
			processing: true,
			stateSave : true,
			ajax: "{$base_url}bitcoin-price/register",
			ordering : true,
			paging: false,
			info: false,
			filter: false
		});
	
	var interval = setInterval( function () {
		dt.ajax.reload(null, true).draw();
	}, 5000 );
	
	
</script>

</body>
</html>