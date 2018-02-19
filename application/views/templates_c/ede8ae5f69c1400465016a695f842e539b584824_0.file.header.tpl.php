<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-19 12:06:42
=======
/* Smarty version 3.1.31, created on 2018-02-13 12:31:28
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mypage\include\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a8a3f42008476_60096497',
=======
  'unifunc' => 'content_5a825c10b070f7_73936946',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ede8ae5f69c1400465016a695f842e539b584824' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mypage\\include\\header.tpl',
<<<<<<< HEAD
      1 => 1518746662,
=======
      1 => 1510801836,
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD
function content_5a8a3f42008476_60096497 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a825c10b070f7_73936946 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>

		<!-- header logo: style can be found in header.less -->
		<header class="header">
			<a class="logo" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage"><img src="<?php echo $_smarty_tpl->tpl_vars['img_url']->value;?>
mypage/logo_cryptopie_02.png" alt="CryptoPie"/></a>
			
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
									<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['login_info']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
 <i class="caret"></i></span>
								</a>
								<ul class="dropdown-menu dropdown-custom dropdown-menu-right">
									<li class="dropdown-header text-center">アカウント</li>
									<li>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/faq"><i class="fa fa-question fa-fw pull-right"></i>よくあるご質問</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
mypage/contact/input">
											<i class="fa fa-envelope fa-fw pull-right"></i>
											お問い合わせ
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url();?>
logout"><i class="fa fa-ban fa-fw pull-right"></i> ログアウト</a>
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
							<?php echo number_format((($tmp = @$_smarty_tpl->tpl_vars['balance']->value['JPY'])===null||$tmp==='' ? 0 : $tmp));?>
 円
						</span>
					</div>
					<div class="sm-st">
						<span class="sm-st-icon st-orange">BTC</span>
						<span class="sm-st-info">
<<<<<<< HEAD
=======
							
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
							<?php echo (($tmp = @$_smarty_tpl->tpl_vars['balance']->value['BTC'])===null||$tmp==='' ? 0 : $tmp);?>
 BTC
						</span>
					</div>
<<<<<<< HEAD
					<div class="sm-st">
						<span class="sm-st-icon st-green">BCH</span>
						<span class="sm-st-info">
							<?php echo (($tmp = @$_smarty_tpl->tpl_vars['balance']->value['BCH'])===null||$tmp==='' ? 0 : $tmp);?>
 BCH
						</span>
					</div>
					<div class="sm-st">
						<span class="sm-st-icon st-blue">ETH</span>
						<span class="sm-st-info">
							<?php echo (($tmp = @$_smarty_tpl->tpl_vars['balance']->value['ETH'])===null||$tmp==='' ? 0 : $tmp);?>
 ETH
						</span>
					</div>
=======
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
				</div>
			</nav>
		</header>
<?php }
}
