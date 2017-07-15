<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:03:09
         compiled from ".\templates\cara_belanja.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30098593e046d6a6667-75043026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6c5bbb697331a545e72d56bfe5910466750f20c' => 
    array (
      0 => '.\\templates\\cara_belanja.tpl',
      1 => 1476416150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30098593e046d6a6667-75043026',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e046d700675_10766208',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e046d700675_10766208')) {function content_593e046d700675_10766208($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrapper">
	<section class="section-head">
		<div class="container">
			<div class="row-fluid top-row">
				<div class="span5">
					
					<?php echo $_smarty_tpl->getSubTemplate ("logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					
				</div>
				
				<div class="span7">
					<?php echo $_smarty_tpl->getSubTemplate ("topnavigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			</div>
		</div>
		
		<div class="top-categories">
			<div class="container">
				<div class="row-fluid">
					<div class="span9">
						<?php echo $_smarty_tpl->getSubTemplate ("categoriesnavigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					</div>
					<div class="span3">
						<div class="search-field-holder">
							<form method="GET" action="products.php">
								<input type="hidden" name="mod" value="product">
								<input type="hidden" name="act" value="search">
								<input class="span12" name="q" type="text" placeholder="Cari produk ketik disini">
								<i class="icon-search"></i>
								<input type="submit" name="submit" value="Go" style="display: none;">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="breadcrumb-holder">
			<div class="container">
				<ul class="inline bcrumb">
					<li><a href="home">home</a></li>
					<li class="active">Cara Belanja?</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			<div class="phase-title current">
				<h1><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
			</div>
			
			<div class="row-fluid">
				<div class="span12" style="text-align: justify;">
					<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

					<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</section>

	<?php echo $_smarty_tpl->getSubTemplate ("partner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>