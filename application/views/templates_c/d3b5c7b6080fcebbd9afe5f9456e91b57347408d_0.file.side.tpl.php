<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-19 12:06:42
=======
/* Smarty version 3.1.31, created on 2018-02-13 12:31:28
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mypage\include\side.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8a3f42261875_02296131',
=======
  'unifunc' => 'content_5a825c10d2b510_95286565',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3b5c7b6080fcebbd9afe5f9456e91b57347408d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mypage\\include\\side.tpl',
      1 => 1504687281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD
function content_5a8a3f42261875_02296131 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a825c10d2b510_95286565 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
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
								<li<?php if ($_smarty_tpl->tpl_vars['uri_string']->value == 'mypage') {?> class="active"<?php }?>>
									<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/">
										<i class="fa fa-bitcoin"></i> <span>ビットコイン販売所</span>
									</a>
								</li>
								<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 1) {?>
									<li<?php if (mb_strpos($_smarty_tpl->tpl_vars['uri_string']->value,'finance/jpy-deposit') !== false) {?> class="active"<?php }?>>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/finance/jpy-deposit/">
											<i class="fa fa-yen"></i> <span>日本円を入金する</span>
										</a>
									</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['usable'] == 1) {?>
									<li<?php if (mb_strpos($_smarty_tpl->tpl_vars['uri_string']->value,'finance/jpy-withdrawal') !== false) {?> class="active"<?php }?>>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/finance/jpy-withdrawal/">
											<i class="fa fa-university"></i> <span>日本円を出金する</span>
										</a>
									</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['id_check'] == 1) {?>
									<li<?php if (mb_strpos($_smarty_tpl->tpl_vars['uri_string']->value,'finance/reception') !== false) {?> class="active"<?php }?>>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/finance/reception/">
											<i class="fa fa-download"></i> <span>コイン受取</span>
										</a>
									</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['login_info']->value['status']['usable'] == 1) {?>
									<li<?php if (mb_strpos($_smarty_tpl->tpl_vars['uri_string']->value,'finance/send') !== false) {?> class="active"<?php }?>>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/finance/send/">
											<i class="fa fa-upload"></i> <span>コイン送金</span>
										</a>
									</li>
								<?php }?>
								<li<?php if (mb_strpos($_smarty_tpl->tpl_vars['uri_string']->value,'mypage/config') !== false) {?> class="active"<?php }?>>
									<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/config/">
										<i class="fa fa-share-alt"></i> <span>設定</span>
									</a>
								</li>
								<li>
									<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/faq/">
										<i class="fa fa-question-circle-o"></i> <span>よくあるご質問</span>
									</a>
								</li>
							</ul>
						</section>
						<!-- /.sidebar -->
					</aside>
<?php }
}
