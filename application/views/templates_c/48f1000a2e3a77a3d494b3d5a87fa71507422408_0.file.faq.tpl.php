<?php
<<<<<<< HEAD
/* Smarty version 3.1.31, created on 2018-02-16 18:59:43
=======
/* Smarty version 3.1.31, created on 2018-02-09 11:51:09
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  from "C:\xampp\htdocs\cryptopie\application\views\templates\mypage\faq.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
<<<<<<< HEAD
  'unifunc' => 'content_5a86ab8fa44946_91388837',
=======
  'unifunc' => 'content_5a7d0c9d8830c0_36251507',
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48f1000a2e3a77a3d494b3d5a87fa71507422408' => 
    array (
      0 => 'C:\\xampp\\htdocs\\cryptopie\\application\\views\\templates\\mypage\\faq.tpl',
      1 => 1504165846,
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
function content_5a86ab8fa44946_91388837 (Smarty_Internal_Template $_smarty_tpl) {
=======
function content_5a7d0c9d8830c0_36251507 (Smarty_Internal_Template $_smarty_tpl) {
>>>>>>> a73414e6c05052dceecc2d18f8493edb4f015bba
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>よくあるご質問 | CryptoPie</title>
<?php $_smarty_tpl->_subTemplateRender("file:./include/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body class="skin-black">
<?php $_smarty_tpl->_subTemplateRender("file:./include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="wrapper row-offcanvas row-offcanvas-left">
		<?php $_smarty_tpl->_subTemplateRender("file:./include/side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<aside class="right-side">
			
			<!-- Main content -->
			<section class="content">
				
				
				<!-- Form itself -->
				<section class="panel faq">
					<div class="panel-body faq-body">
						<h2 class="heading heading-default heading-h2">よくあるご質問</h2>
						<ul class="faq-list">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['faq']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
								<li>
									<div class="faq-question-title"><i class="fa fa-question-circle"></i> <?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['question'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
</div>
									<div class="faq-question-body">
										<?php echo nl2br((($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['answer'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp));?>

									</div>
								</li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

						</ul>
					</div>
				</section>
				
			</section><!-- /.content -->
			
			<?php $_smarty_tpl->_subTemplateRender("file:./include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			
		</aside><!-- /.right-side -->

	</div><!-- ./wrapper -->


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

<!-- clipboard -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
plugins/clipboard/clipboard.min.js"><?php echo '</script'; ?>
>

<!-- Director App -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
Director/app.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js_url']->value;?>
application.js"><?php echo '</script'; ?>
>

<!-- Director for demo purposes -->
</body>
</html><?php }
}
