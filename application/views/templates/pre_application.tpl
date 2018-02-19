<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>事前登録（個人） | CryptoPie</title>
{include file="include/head.tpl"}
</head>
<body>
<div id="wrapper">
	{include file="include/header.tpl"}
	
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">事前登録（個人）</h2>
				</div>
			</div>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<div class="row form-container">
				
				<div class="row bs-wizard">
					<div class="col-xs-4 bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">登録</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">パスワード入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">事前登録完了</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
				</div>
				
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="{$base_url}{$controller}/kojin-conf/" method="post">
					<section class="panel">
						<header class="panel-heading form-heading">お客様情報のご登録</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">名前（漢字）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="苗字" name="family_name" value="{$params.family_name|escape|default:''}">
									<input type="text" class="form-control input -col-2" placeholder="名前" name="first_name" value="{$params.first_name|escape|default:''}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">名前（フリガナ）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="ミョウジ" name="family_name_kana" value="{$params.family_name_kana|escape|default:''}">
									<input type="text" class="form-control input -col-2" placeholder="ナマエ" name="first_name_kana" value="{$params.first_name_kana|escape|default:''}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">生年月日<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<select name="year" class="select form-control m-b-10">
										<option value="">----</option>
										{foreach from=$year item=item key=key}
											<option value="{$key}"{if $key == $params.year|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select><span>年</span>
									<select name="month" class="select form-control m-b-10">
										<option value="">--</option>
										{foreach from=$month item=item key=key}
											<option value="{$key}"{if $key == $params.month|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select><span>月</span>
									<select name="day" class="select form-control m-b-10">
										<option value="">--</option>
										{foreach from=$date item=item key=key}
											<option value="{$key}"{if $key == $params.day|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select><span>日</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">TEL<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-tel" name="tel1" value="{$params.tel1|escape|default:''}"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel2" value="{$params.tel2|escape|default:''}"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel3" value="{$params.tel3|escape|default:''}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">メールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" class="form-control" id="mail" name="mail" value="{$params.mail|escape|default:''}">
								</div>
							</div>
							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">郵便番号<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" name="post1" value="{$params.post1|escape|default:''}" class="form-control input -col-4 js_numOnry size_post" maxlength="3" id="user_zip1"><span>－</span>
									<input type="text" name="post2" value="{$params.post2|escape|default:''}" class="form-control input -col-4 js_numOnry size_post" maxlength="4" id="user_zip2">
									<button type="button" class="btn btn-primary" id="zip_btn"> 住所変換 </button>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">都道府県<span class="form-icon-required">必須</span></label>
								<div class="col-sm-5">
									<select name="pref_id" class="select form-control m-b-10" id="pref">
										<option value="">選択してください</option>
										{foreach from=$pref_list item=item key=key}
											<option value="{$key}"{if $key == $params.pref_id|escape|default:''} selected="selected"{/if}>{$item}</option>
										{/foreach}
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">市区町村<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="city" value="{$params.city|escape|default:''}" maxlength="30" class="form-control input" id="city" placeholder="例）新宿区">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">住所（番地）<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="address" value="{$params.address|escape|default:''}" class="form-control input" id="address1" maxlength="40" placeholder="例）○○○1-2-3">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">建物</label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="building" value="{$params.building|escape|default:''}" class="form-control input" maxlength="40" placeholder="例）メゾンドハイツ105">
								</div>
							</div>
						</div>
					</section>
					<section class="panel">
						<div class="panel-body form-body">
							<div class="terms_frame">
								<div class="overview terms_frame_overview">
									
									<h2 class="terms_maintitle">利用規約</h2>
									<h3 class="terms_title">CryptoPie 利用規約</h3>
									<p class="terms_text">
										本利用規約は、株式会社CryptoPie（以下「当社」といいます。）が提供するウェブサービス「CryptoPie」（ドメイン「http://cryptopie.com/」において提供されるウェブサービスであり、以下「本サービス」といいます。）に関し、第２条に定める本会員及び本会員であった者と当社との間の権利義務関係を定めるものです。
									</p>
									<h3 class="terms_title">第１条 本利用規約の適用</h3>
									<ul class="terms_list">
										<li>1.本利用規約は、当社と本会員（以下、本条においては、本会員であった者を含む。）との間に適用され、本サービスに関する当社と本会員との間の一切の権利義務関係を定めるものとします。</li>
										<li>2.本会員は、本サービス利用の前提として、本利用規約全文の内容を理解の上で、本利用規約が本サービスに関する当社と本会員との間の一切の権利義務関係を定めるものであることについて同意しなければならないものとします。</li>
										<li>3.本会員が本サービスを利用する場合、本利用規約が本サービスに関する当社と本会員との間の一切の権利義務関係を定めるものであることについて同意したとみなされるものとします。</li>
									</ul>
									<h3 class="terms_title">第２条 本会員</h3>
									<ul class="terms_list">
										<li>1.本会員となろうとする者は、当社が定める手続に従って会員登録申請を行うものとします。当社は、当社の裁量により、会員登録申請の拒否を判断し、当社により会員登録を認められた者を本会員とします。</li>
										<li>2.本会員は、登録したログインＩＤ及びパスワードを自己の責任により管理するものとし、第三者に本会員としての地位の譲渡、利用許諾等の一切の処分をすることができないものとします。</li>
										<li>3.当社は、本会員が以下の各号のいずれか一つに該当したと判断した場合、本会員の登録抹消の処分をすることができるものとします。</li>
										<li>4.①本利用規約に違反した場合</li>
										<li>5.②本会員が登録したメールアドレスに対して当社が期限を定めて一定の回答を求める連絡をしたにもかかわらず、本会員から返答がなかった場合</li>
										<li>6.③本会員自身、本会員の役員若しくは従業員、若しくはその関係者が反社会勢力に該当した場合、又は、反社会勢力と直接若しくは間接を問わず関係を有した場合</li>
										<li>7.④その他当社が本会員として相応しくないと判断した場合</li>
										<li>8.⑤第６条の表明・保証に違反があった場合</li>
										<li>9.本会員は、本会員としての登録の抹消を希望する場合、当社が定める手続に従って本会員の登録抹消をすることができるものとします。</li>
									</ul>
									<h3 class="terms_title">第３条 本サービスの仕様及び利用許諾</h3>
									<ul class="terms_list">
										<li>1.利用許諾 1) 当社は、本会員に対し、本利用規約に従って本サービスを利用することを許諾します。</li>
										<li>2.2)本会員は本利用規約に従って本サービスを利用することができるものとします。ただし，当該利用許可は，本会員が本サービスを本利用規約により許可された方法で使用することを唯一の目的としております。</li>
										<li>3.仕様 1)本サービスの機能及び仕様は，下記4)記載のほか，当社が「http://cryptopie.com/」（これより下位の階層のウェブページを含む。）に掲載する内容とします。</li>
										<li>4.2)当社は，本サービスの仕様を当社の裁量によって随時変更するものとし，本会員は，これにあらかじめ同意するものとします。</li>
										<li>5.3)本会員は，本サービスの仕様が随時変更されるものであることを認識し，上記1)に掲載される内容を適時確認するものとします。</li>
										<li>6.4)本サービスの仕様は以下のとおりとします。本会員は，以下の各仕様をいずれも理解し，あらかじめこれに承諾します。</li>
										<li>7.①本サービスが永続することは保証されません。</li>
										<li>8.②本サービスの仕様は，当社により随時変更されます。</li>
										<li>9.③本サービスの利用にあたって本会員が送信したデータが当社により永続的に確実に保持されることは保証されません。消失を望まない重要なデータについては本会員が自らバックアップを取る必要があります。</li>
										<li>10.④通信環境の障害，天災，火災，戦争，テロ行為その他の理由により，本サービスの継続が不能又は困難となる事態が生じることがあり，当社は，本会員に事前の予告なく，本サービス又は本システムの全部又は一部について停止・中断する場合があります。</li>
										<li>11.⑤当社は，システムの管理・保守などのメンテナンスを行う目的，又は，システムの機能向上のためのアップグレードを行うなどの目的により，事前に本会員に通知し又は事前の予告なく本サービスの全部又は一部について停止・中断する場合があります。</li>
										<li>12.⑥当社は，本サービスがウイルスその他有害な内容を含まないこと，セキュリティーが有効であることなどの安全性に最大限の努力は行いますが，本サービスの安全性，完全性，バグ及び瑕疵がないことは保証されません。</li>
									</ul>
									<h3 class="terms_title">第４条 知的財産権</h3>
									<ul class="terms_list">
										<li>本会員は，本サービスにおける文章，画像その他のコンテンツに関する著作権，著作者人格権，特許権，商標権，実用新案権，意匠権，これらを受ける権利，商業上の信用，標章・呼称，アイデア，ノウハウ，その他の法的権利，法的利益及び事実上の利益に関し，いかなる権利又は利益も得るものではありません。</li>
									</ul>
									<h3 class="terms_title">第5条 禁止事項</h3>
									<ul class="terms_list">
										<li>本会員は，本サービスに関し，自ら直接に又は第三者を介して間接に行うなど方法の如何を問わず，以下の各号のいずれか一つに該当する行為をしてはなりません。</li>
										<li>①法令に違反する行為</li>
										<li>②犯罪行為</li>
										<li>③本利用規約に違反する行為</li>
										<li>④当社，当社の役員又は従業員，スポンサー企業，他の本会員，その他当社に関連する者に対し，その権利又は利益を侵害する行為</li>
										<li>⑤本サービスのソフトウェアのエラー，バグ，セキュリティーホール，その他瑕疵を利用する行為</li>
										<li>⑥当社の管理サーバに対し，コンピュータ・ウィルス，その他悪質なコードを送信等する行為</li>
										<li>⑦当社の管理するサーバ，ハードウェア又はネットワークの機能を破壊し，妨害し，又は，不必要に過度の負担をかける行為</li>
										<li>⑧本サービスを違法な目的により利用する行為</li>
										<li>⑨当社の本サービス又は本サービス以外のサービスを妨げる行為</li>
										<li>⑩以上の各行為のうちのいずれかの行為をするために準備をする行為，又は，着手する行為</li>
										<li>⑪以上の各行為に準じる行為であり，本サービスの趣旨に反する行為</li>
										<li>⑫第６条の表明・保証に違反する行為</li>
									</ul>
									<h3 class="terms_title">第6条 反社会的勢力に関する表明・保証</h3>
									<ul class="terms_list">
										<li>本会員は，当社に対し，本会員自身並びに本会員の役員及び従業員が暴力団，暴力団員，暴力団準構成員，暴力団関係者，総会屋その他の反社会的勢力（以下，一括して「反社会的勢力」といいます。）のいずれでもなく，また，そのいずれかと直接又は間接を問わず交流，資金・便宜の提供，取引その他の関係を有していないこと，及び，同状態が将来にわたり継続することを表明し，保証するものとします。</li>
									</ul>
									<h3 class="terms_title">第7条 本利用規約の変更</h3>
									<ul class="terms_list">
										<li>1.当社は，本利用規約を変更することができるものとします。</li>
										<li>2.本会員は，当社が本利用規約を変更する可能性があることを認識し，①定期的に「http://cryptopie.com/」（これより下位の階層のウェブページを含む。）を閲覧すること，及び，②当社からの連絡先として指定されたメールアドレスについて当社からのメールを受信することができる環境を維持し，かつ，当該メールアドレスに当社から送信されたメールの内容を閲覧すること，をしなければならないものとします。</li>
										<li>3.当社は，本利用規約を変更する場合，その旨を「http://cryptopie.com/」（これより下位の階層のウェブページを含む。）に掲載し，かつ，当社からの連絡先として指定された本会員のメールアドレス宛に通知するものとします。本会員は，本利用規約の当該変更に同意できない場合，上記掲載から３０日以内に本サービスの利用を終了し，本会員登録の抹消をしなければならないものとします。</li>
										<li>4.当社は，前項の掲載から３０日以内に本会員が本会員登録の抹消をしない場合，本会員が本利用規約の当該変更に同意したとみなすものとし，このようにみなされることについて本会員はあらかじめ同意するものとします。</li>
									</ul>
									<h3 class="terms_title">第8条 譲渡等禁止</h3>
									<ul class="terms_list">
										<li>当社及び本会員は，相手方の事前の書面による承諾なく，本利用規約に基づく権利義務又は地位について，第三者に対し，譲渡，承継，担保設定，その他の処分をすることができないものとします。</li>
									</ul>
									<h3 class="terms_title">第9条 免責</h3>
									<ul class="terms_list">
										<li>当社の債務不履行又は不法行為に基づく損害賠償責任（ただし，当社，当社の代表者，又は当社の使用する者の故意又は重大な過失によるものを除く。）は，本会員が本サービスの利用に伴って当社に対して支払済みの利用手数料を上限とするものとします。</li>
									</ul>
									<h3 class="terms_title">第10条 準拠法及び管轄裁判所</h3>
									<ul class="terms_list">
										<li>1.本利用規約の準拠法は日本法とします。</li>
										<li>4.本サービスに関する一切の紛争は，東京地方裁判所を第１審の専属的合意管轄裁判所とします。</li>
									</ul>
									
									<p class="terms_date">
										更新日：2017年4月1日
									</p>
									
								</div>
							</div>
							
						</div>
					</section>
					<div class="row terms_check">
						<p class="terms_check--input"><label class="label_input"><input type="checkbox" class="input_check" name="term">上記、利用規約に同意致しました。</label></p>
					</div>
					<div class="row text-center">
						<div class="col-md-12">
							<p id="overlapResult" class="overlapResult" data-result="" ></p>
						</div>
					</div>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">入力内容を確認する</button>
					</div>
					<input type="hidden" name="media_id" value="{$media_id|escape|default:0}">
				</form>
				
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
<script src="{$js_url}jquery.magnific-popup.min.js"></script>
<script src="{$js_url}jquery.jpostal.js"></script>
<script src="{$js_url}application.js"></script>
<script src="{$js_url}jquery.validate.js"></script>
<script src="{$js_url}jquery.validate.addmethod.js"></script>
<script src="{$js_url}jquery.validate.messages_ja.js"></script>

<script>
$(function(){
	
	// 登録情報重複確認
	var checkOverlapUser  = new appForm.checkOverlapUser({
		url : "{$base_url}{$controller}/is-duplicate/"
	});
	
	// 郵便番号住所検索実行
	new appForm.insertAddress({
		zip_elm1    : "#user_zip1",
		zip_elm2    : "#user_zip2",
		pref        : "#pref",
		pref_kana   : "#pref_kana",
		city        : "#city",
		city_kana   : "#city_kana",
		address     : "#address1",
		address_kana: "#address1_kana"
	});

	var validator = $("#applicationForm").validate({
		errorElement: "p",
		errorClass: "error_text",
		onfocusout: false,
		groups: { // エラー表示のグループ化
			name     : "family_name first_name",
			kana     : "family_name_kana first_name_kana",
			birthday : "year month day",
			tel      : "tel1 tel2 tel3",
			zip      : "post1 post2"
		},
		rules : { // バリデーションルールの設定
			"family_name"      : { required: true, check_symbol: true },
			"first_name"       : { required: true, check_symbol: true },
			"family_name_kana" : { required: true, check_num_kana: true },
			"first_name_kana"  : { required: true, check_num_kana: true },
			"year"             : { required: true },
			"month"            : { required: true },
			"day"              : { required: true },
			"tel1"             : { required: true, digits: true },
			"tel2"             : { required: true, digits: true },
			"tel3"             : { required: true, digits: true },
			"mail"             : { required: true, check_mail: true },
			"post1"            : { required: true, digits: true, minlength: 3 },
			"post2"            : { required: true, digits: true, minlength: 4 },
			"pref_id"          : { required: true },
			"city"             : { required: true },
			"address"          : { required: true, check_symbol: true },
			"building"         : { check_symbol: true },
			"term"             : { required: true }
		},
		submitHandler: function(form) {
			checkOverlapUser.check(form);
			return false;
		},
		errorPlacement: function(error, element) {
			// エラー表示の位置を変更
			eName = element.attr("name");
			// エラー表示の位置を変更
			if (eName == "post1" || eName == "post2") {
				error.appendTo(element.closest("div"));
			} else {
				// 条件以外はtdタグの中の最後に表示
				error.appendTo(element.closest("div"));
			}
		},
		messages : {
			"family_name"      : { required: "「氏名」を入力してください", check_symbol:"使用できない記号が含まれています" },
			"first_name"       : { required: "「氏名」を入力してください", check_symbol:"使用できない記号が含まれています" },
			"family_name_kana" : { required: "「氏名のフリガナ」を入力してください", check_num_kana:"半角数字か半角カタカナで入力してください" },
			"first_name_kana"  : { required: "「氏名のフリガナ」を入力してください", check_num_kana:"半角数字か半角カタカナで入力してください" },
			"year"             : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"month"            : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"day"              : { required: "「生年月日」を選択してください", check_age:"20歳未満の方は登録できせん" },
			"tel1"             : { required: "「TEL1」を入力してください" },
			"tel2"             : { required: "「TEL1」を入力してください" },
			"tel3"             : { required: "「TEL1」を入力してください" },
			"mail"             : { required: "「メールアドレス」を入力してください", check_mail:"アルファベット、数字、特殊文字の一部以外は入力できません" },
			"post1"            : { required: "「郵便番号」を入力してください" },
			"post2"            : { required: "「郵便番号」を入力してください" },
			"pref_id"          : { required: "「都道府県」を入力してください" },
			"city"             : { required: "「市区町村」を入力してください" },
			"address"          : { required: "「住所」を入力してください", check_symbol:"使用できない記号が含まれています" },
			"building"         : { check_symbol:"使用できない記号が含まれています" },
			"term"             : { required: "利用規約に同意いただけない場合はお申込みできません" }
		}
	});
	
});
</script>


</body>
</html>