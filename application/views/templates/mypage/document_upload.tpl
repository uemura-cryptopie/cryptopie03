<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>本人確認書類のアップロード | CryptoPie</title>
{include file="./include/head.tpl"}
</head>
<body class="skin-black">
{include file="./include/header.tpl"}
	<div class="wrapper row-offcanvas row-offcanvas-left">
		{include file="./include/side.tpl"}
		<aside class="right-side">

			<!-- Main content -->
			<section class="content">

				<!-- Form itself -->
				<section class="panel documentUpload">
					<form name="sentMessage" id="applicationForm" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						<div class="panel-body">
							<h2 class="heading heading-default heading-h2">本人確認書類のアップロード</h2>
							
							<div class="row m-b-20">
								<div class="col-md-12">
									<div class="documentUpload-text">
									<p>
										お客様の大切なご資産を保護する為、ご本人様確認の徹底をさせていただいております。つきましてはお客様の公的本人確認書類のご提出をお願い申し上げます。
									</p>
									<p>
										本人確認書類の提出はデータでのみ受け付けております。<br>
										下記いずれか１点の書類をスキャンまたは撮影し、データ化したものを提出してください。
									</p>
									</div>
								</div>
							</div>
							
							<div class="row m-b-20">
								<div class="col-md-12">
									<ul class="list-group list-2col">
										<li class="list-group-item col-md-6">運転免許証</li>
										<li class="list-group-item col-md-6">各種健康保険証</li>
										<li class="list-group-item col-md-6">住民票の写し</li>
										<li class="list-group-item col-md-6">特別永住者証明書</li>
										<li class="list-group-item col-md-6">個人番号カード</li>
										<li class="list-group-item col-md-6">パスポート（日本国が発行する旅券）</li>
										<li class="list-group-item col-md-6">在留カード</li>
										<li class="list-group-item -noItem col-md-6 ">&nbsp;</li>
									</ul>
										<p class="text-center">※ アップロードする画像はpng,jpg形式で、合計30MBまで対応しています。</p>
										<p class="text-center">{form_error('totalfile')}</p>
										
								</div>
							</div>
							
							<div id="documentUpload">
								{if $screen == 'corp'}
									<div class="form-group imgFileBox">
										<label class="col-md-3 col-sm-3 control-label">登記事項証明書<span class="form-icon-required">必須</span></label>
										<div class="col-md-3">
											<label class="label-file" for="file1">画像を選択する<input type="file" class="form-control input" name="file_certificate" id="file_certificate"></label>
											{form_error('file_certificate')}
										</div>
										<div class="col-md-6 col-sm-6 documentUpload-box">
											<div class="documentUpload-preview">
												{if $file_certificate != ''}
													<img src="{$urlImageUploaded}/{$file_certificate}" width="100%" class="preview" title="{$file_certificate}">
												{/if}
											</div>
											<p>登記簿謄本等の写し（発行から6ヶ月以内）</p>
										</div>
									</div>
								{/if}

								<div class="form-group imgFileBox">
									<label class="col-md-3 col-sm-3 control-label">IDセルフィー<span class="form-icon-required">必須</span></label>
									<div class="col-md-3">
										<label class="label-file" for="file1">画像を選択する<input type="file" class="form-control input" name="image_id" id="image_id"></label>
										<input type="hidden" value="1" class="form-control input" name="totalfile" id="totalfile">
										{form_error('image_id')}
									</div>
									<div class="col-md-6 col-sm-6 documentUpload-box pull-right">
										<div class="documentUpload-preview">
											{if $image_id != ''}
												<img src="{$urlImageUploaded}/{$image_id}" width="100%" class="preview" title="{$image_id}">
											{/if}
										</div>
										<p>取引されるご担当者様の、写真付き身分証明書とご本人様を一緒に撮影した写真をご提出してください。</p>
									</div>
									<div class="col-md-6 col-sm-6 documentUpload-sample">
										<img src="{$img_url}/mypage/img_documents_id_sample.jpg" alt="IDセルフィー 画像サンプル">
										<p>『必ず正面を向いての撮影をお願いいたします』</p>
									</div>
								</div>
								
								<div class="form-group imgFileBox">
									<label class="col-md-3 col-sm-3 control-label">本人確認書類 表面<span class="form-icon-required">必須</span></label>
									<div class="col-md-3">
										<label class="label-file" for="file2">画像を選択する<input type="file" class="form-control input" name="image_front" id="image_front"></label>
										{form_error('image_front')}
									</div>
									<div class="col-md-6 col-sm-6 documentUpload-box">
										<div class="documentUpload-preview">
											{if $image_front != ''}
												<img src="{$urlImageUploaded}/{$image_front}" width="100%" class="preview" title="{$image_front}">
											{/if}
										</div>
										<p>取引されるご担当者様の、顔写真がある面をご提出してください。</p>
									</div>
								</div>
								
								<div class="form-group imgFileBox">
									<label class="col-md-3 col-sm-3 control-label">本人確認書類 裏面<span class="form-icon-required">必須</span></label>
									<div class="col-md-3">
										<label class="label-file" for="file3">画像を選択する<input type="file" class="form-control input" name="image_back" id="image_back"></label>
										{form_error('image_back')}
									</div>
									<div class="col-md-6 col-sm-6 documentUpload-box">
										<div class="documentUpload-preview">
											{if $image_back != ''}
												<img src="{$urlImageUploaded}/{$image_back}" width="100%" class="preview" title="{$image_back}">
											{/if}
										</div>
										<p>パスポートをご提出される場合には住所記載のページをご提出してください。</p>
									</div>
								</div>

								{if is_array($list_image) }
									{foreach from=$list_image key=k item=file}
	   									<div class="form-group imgFileBox addFileBox"> 
											<label class="col-md-3 col-sm-3 control-label">本人確認書類</label> 
											<div class="col-md-3">
												<label class="label-file" for="file{$k}">画像を選択する<input type="file" class="form-control input" name="file{$k}" id="file{$k}" value="{$file}">
												</label>
												{form_error("file`$k`")}
											</div>
											<div class="col-md-6 col-sm-6 documentUpload-box">
												<div class="documentUpload-preview">
													{if $file != ''}
														<img src="{$urlImageUploaded}/{$file}" width="100%" class="preview" title="{$file}">
													{/if}
												</div>
											</div>
										</div>
										{$k = $k+1}
									{/foreach}
								{/if}
							</div>

							<div class="m-b-20">
								<a href="#" class="btn btn-primary btn-lg" id="addFileinputBtn"><i class="fa fa-plus-circle"></i> 確認書類を追加する</a>
							</div>

							<div class="text-center m-b-20">
								<button type="submit" name="uploadImage" class="btn btn-primary btn-lg">本人確認書類を提出する</button>
							</div>

							<div class="panel panel-list">
								<h4 class="panel-heading">ご提出いただく前のチェックポイント</h4>
								<div class="panel-body">
									<ul class="list-group">
										<li class="list-group-item">お申し込み時にご入力いただいた住所と本人確認書類の住所は一致していますか？</li>
										<li class="list-group-item">
											住所、氏名、生年月日ははっきり確認できますか？<br>
											<span>※不鮮明等の場合再提出をお願いすることがございます。</span>
										</li>
										<li class="list-group-item">
											ご提出いただく書類は有効期限内ですか？<br>
											<span>※不鮮明等の場合再提出をお願いすることがございます。</span>
										</li>
										<li class="list-group-item">
											裏面がある場合は、その内容がはっきり確認できますか？<br>
											<span>※住所変更されている場合は、現在所がお申し込み時にご入力いただいた住所と一致しているかご確認ください。</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</form>
				</section>
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
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>
<script src="{$js_url}additional-methods.min.js"></script>
<!-- Director for demo purposes -->
<script>
	//画像ファイルプレビュー表示
	$('#applicationForm').on('change', 'input[type="file"]', function(e) {
		var file = e.target.files[0],
				reader = new FileReader(),
				$preview = $(this).closest('.imgFileBox').find('.documentUpload-box .documentUpload-preview');
				t = this;

		// 画像ファイル以外の場合は何もしない
		if(file.type.indexOf("image") < 0){
			return false;
		}

		reader.onload = (function(file) {
			return function(e) {
				$preview.empty();
				$preview.append($('<img>').attr({
					src: e.target.result,
					width: "100%",
					class: "preview",
					title: file.name
				}));
			};
		})(file);

		$(this).closest('.documentUpload-box').find('.error_textBox').remove();
	  	reader.readAsDataURL(file);
	});
	
	
	
	$.validator.addMethod('filesize', function(value, element, param) {
		return this.optional(element) || (element.files[0].size <= param) 
	});
	
	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_textBox",
		groups: { // エラー表示のグループ化
		},
		rules             : { // バリデーションルールの設定
			file_certificate : {
				// required: true ,
				accept: "image/jpg,image/jpeg,image/png" ,
				filesize: {SIZE_IMAGE} },
			image_id         : {
				// required: true ,
				accept: "image/jpg,image/jpeg,image/png" ,
				filesize: {SIZE_IMAGE} },
			image_front       : {
				// required: true ,
				accept: "image/jpg,image/jpeg,image/png" ,
				filesize: {SIZE_IMAGE} },
			image_back       : {
				// required: true ,
				accept: "image/jpg,image/jpeg,image/png" ,
				filesize: {SIZE_IMAGE} },
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			eName = element.attr("name");
			// エラー表示の位置を変更
			if (eName == "zip1" || eName == "zip2") {
				error.appendTo(element.closest("div"));
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages: {
			file_certificate : {
				required: "画像が選択されていません",
				accept: "png,jpg形式で画像をアップロードしてください"  ,
				filesize: 'アップロードする画像は10M以内でお願い致します' },
			image_id          : {
				required: "画像が選択されていません",
				accept: "png,jpg形式で画像をアップロードしてください"  ,
				filesize: 'アップロードする画像は10M以内でお願い致します' },
			image_front       : {
				required: "画像が選択されていません",
				accept: "png,jpg形式で画像をアップロードしてください"  ,
				filesize: 'アップロードする画像は10M以内でお願い致します' },
			image_back       : {
				required: "画像が選択されていません",
				accept: "png,jpg形式で画像をアップロードしてください"  ,
				filesize: 'アップロードする画像は10M以内でお願い致します' }
		}
	});
	
	var addFileInpts = new appForm.addFileInpts({
		size_image: {SIZE_IMAGE}
	});
	
</script>
</body>
</html>