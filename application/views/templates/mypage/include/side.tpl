					<!-- Left side column. contains the logo and sidebar -->
					<aside class="left-side sidebar-offcanvas">
						<!-- sidebar: style can be found in sidebar.less -->
						<section class="sidebar">
							
							<!-- Sidebar toggle button-->
							<div class="sidebar-navBtn">
								<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</a>
							</div>
							
							<!-- sidebar menu: : style can be found in sidebar.less -->
							<ul class="sidebar-menu">
								<li{if $uri_string == 'mypage'} class="active"{/if}>
									<a href="{$base_url}mypage/">
										<i class="fa fa-bitcoin"></i> <span>ビットコイン販売所</span>
									</a>
								</li>
								{if $login_info.status.id_check == 1}
									<li{if $uri_string|mb_strpos:'finance/jpy-deposit' !== false} class="active"{/if}>
										<a href="{$base_url}mypage/finance/jpy-deposit/">
											<i class="fa fa-yen"></i> <span>日本円を入金する</span>
										</a>
									</li>
								{/if}
								{if $login_info.status.usable == 1}
									<li{if $uri_string|mb_strpos:'finance/jpy-withdrawal' !== false} class="active"{/if}>
										<a href="{$base_url}mypage/finance/jpy-withdrawal/">
											<i class="fa fa-university"></i> <span>日本円を出金する</span>
										</a>
									</li>
								{/if}
								{if $login_info.status.id_check == 1}
									<li{if $uri_string|mb_strpos:'finance/reception' !== false} class="active"{/if}>
										<a href="{$base_url}mypage/finance/reception/">
											<i class="fa fa-download"></i> <span>コイン受取</span>
										</a>
									</li>
								{/if}
								{if $login_info.status.usable == 1}
									<li{if $uri_string|mb_strpos:'finance/send' !== false} class="active"{/if}>
										<a href="{$base_url}mypage/finance/send/">
											<i class="fa fa-upload"></i> <span>コイン送金</span>
										</a>
									</li>
								{/if}
								<li{if $uri_string|mb_strpos:'mypage/config' !== false} class="active"{/if}>
									<a href="{$base_url}mypage/config/">
										<i class="fa fa-share-alt"></i> <span>設定</span>
									</a>
								</li>
								<li>
									<a href="{$base_url}mypage/faq/">
										<i class="fa fa-question-circle-o"></i> <span>よくあるご質問</span>
									</a>
								</li>
							</ul>
						</section>
						<!-- /.sidebar -->
					</aside>
