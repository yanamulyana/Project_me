<?php /* Smarty version Smarty-3.1.11, created on 2017-06-16 13:02:53
         compiled from ".\templates\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166125943748d1c7072-59344892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '774330a8010175eead47c18a453c760881a564e0' => 
    array (
      0 => '.\\templates\\about.tpl',
      1 => 1497216411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166125943748d1c7072-59344892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageTitle' => 0,
    'image' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5943748d22ac98_68486866',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5943748d22ac98_68486866')) {function content_5943748d22ac98_68486866($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
					<li class="active">Tentang Anaku.Com</li>
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
					<center><p style="padding: 10px;"><?php if ($_smarty_tpl->tpl_vars['image']->value!=''){?><img src="images/profile/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
"><?php }?></p></center>
					<?php echo $_smarty_tpl->tpl_vars['description']->value;?>

					<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</section>

	<?php echo $_smarty_tpl->getSubTemplate ("partner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>