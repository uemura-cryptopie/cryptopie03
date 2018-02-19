
		<!-- header logo: style can be found in header.less -->
		<header class="header">
			<a class="logo" href="{$base_url}mypage"><img src="{$img_url}mypage/logo_cryptopie_02.png" alt="CryptoPie"/></a>
			
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top row" role="navigation">
				<div class="header-navbar col-sm-1 col-xs-3">
					<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
				</div>
				<div class="header-menu col-md-3 col-sm-5 col-xs-9">
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-user"></i>
									<span>{$login_info.name|default:''} <i class="caret"></i></span>
								</a>
								<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
									<li class="dropdown-header text-center">アカウント</li>
									<li>
										<a href="{$base_url}mypage/faq"><i class="fa fa-question fa-fw pull-right"></i>よくあるご質問</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="{$base_url}mypage/contact/input">
											<i class="fa fa-envelope fa-fw pull-right"></i>
											お問い合わせ
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="{base_url()}logout"><i class="fa fa-ban fa-fw pull-right"></i> ログアウト</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div class="header-balance col-md-9 col-sm-6 col-sm-12">
					<div class="sm-st">
						<span class="sm-st-icon st-red">JPY</span>
						<span class="sm-st-info">
							{$balance.JPY|default:0|number_format} 円
						</span>
					</div>
					<div class="sm-st">
						<span class="sm-st-icon st-orange">BTC</span>
						<span class="sm-st-info">
<<<<<<< HEAD
							{$balance.BTC|default:0} BTC
						</span>
					</div>
					<div class="sm-st">
						<span class="sm-st-icon st-green">BCH</span>
						<span class="sm-st-info">
							{$balance.BCH|default:0} BCH
						</span>
					</div>
					<div class="sm-st">
						<span class="sm-st-icon st-blue">ETH</span>
						<span class="sm-st-info">
							{$balance.ETH|default:0} ETH
						</span>
					</div>
=======
							{* 1,000.123<span>45678</span> BTC *}
							{$balance.BTC|default:0} BTC
						</span>
					</div>
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
				</div>
			</nav>
		</header>
