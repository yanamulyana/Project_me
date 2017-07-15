<?php /* Smarty version Smarty-3.1.11, created on 2017-07-09 18:40:45
         compiled from ".\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4610593db3cb264f44-83889588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97d060df136bc68287855ad0037b446ebb85b73d' => 
    array (
      0 => '.\\templates\\home.tpl',
      1 => 1499600443,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4610593db3cb264f44-83889588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593db3cb5de776_82082607',
  'variables' => 
  array (
    'popup' => 0,
    'msgNewsletter' => 0,
    'referer' => 0,
    'dataNewProduct' => 0,
    'sessLevel' => 0,
    'dataNewProduct2' => 0,
    'dataBestProduct' => 0,
    'dataBestProduct2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593db3cb5de776_82082607')) {function content_593db3cb5de776_82082607($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>

<!--<style>
	#popup{
		display: none;
	}
</style>
<?php if ($_smarty_tpl->tpl_vars['popup']->value=='OK'){?>

	<script>
	window.jQuery(document).ready(function() {
		$.fancybox(['#popup'],{
			closeBtn : false,
			helpers : {
				overlay : {closeClick: false}
			}
		});
	});
	</script>

<?php }?>
-->
<?php if ($_smarty_tpl->tpl_vars['msgNewsletter']->value=='1'){?>
	
		<script>alert('Email Anda berhasil tersimpan dalam newsletter');</script>
	
<?php }?>

<div class="container">


	<!--<div id="popup">
		<p>Anda telah menambahkan produk ke dalam keranjang belanja.</p>
		<center>
			<a class="cusmo-btn add-button" href="<?php echo $_smarty_tpl->tpl_vars['referer']->value;?>
">Lanjutkan Belanja</a>
			<a class="cusmo-btn add-button" href="checkout.html">Checkout</a>
		</center>
	</div>-->
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
	</section>
	
	<section id="home" class="home-slider">
		<div class="container">
			<div class="flexslider">
				
				<?php echo $_smarty_tpl->getSubTemplate ("slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				
			</div>
		</div>
	</section>
	
	<section class="section-home-products">
		<div class="container">
			<div class="controls-holder nav-tabs">
				<ul class="inline">
					<li class="active"><a data-toggle="tab" href="#new-products">New products</a></li>
					<li><a data-toggle="tab" href="#best-sellers">Best sellers</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="new-products" class="products-holder active tab-pane">
					<div class="row-fluid">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['name'] = 'dataNewProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNewProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct']['total']);
?>
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['productID'];?>
">
							<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['productSeo'];?>
">
							<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['buyPrice'];?>
">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div <?php if ($_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['qty']<1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['qty']<1){?>
									<div class="dot-badge dark">
										EMPTY 
									</div>
								<?php }elseif($_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['qty']=='1'){?>
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK 
									</div>
								<?php }?>
								<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['productSeo'];?>
.html">
									<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['image1'];?>
" />
									<h1><?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['productName'];?>
</h1>
								</a>
								<div class="price">
									<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['resellerPriceRp'];?>

										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['resellerPrice'];?>
">
									<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['specialPrice'];?>
">
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['specialPriceRp'];?>

									<?php }else{ ?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['salePrice'];?>
">
										<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['discountPrice'];?>
">
										<?php if ($_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['discountPrice']>0){?>
											<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['salePriceRp'];?>
</s><br>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['discountPriceRp'];?>

										<?php }else{ ?>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['salePriceRp'];?>

										<?php }?>
									<?php }?>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['dataNewProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct']['index']]['qty']>=1){?>
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								<?php }else{ ?>
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								<?php }?>
							</div>
							</form>
						</div>
						<?php endfor; endif; ?>
					</div>
					<div class="row-fluid">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['name'] = 'dataNewProduct2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNewProduct2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewProduct2']['total']);
?>
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['productID'];?>
">
							<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['productSeo'];?>
">
							<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['buyPrice'];?>
">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div <?php if ($_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['qty']<1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['qty']<1){?>
									<div class="dot-badge dark">
										EMPTY 
									</div>
								<?php }elseif($_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['qty']=='1'){?>
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK 
									</div>
								<?php }?>
								<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['productSeo'];?>
.html">
									<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['image1'];?>
" />
									<h1><?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['productName'];?>
</h1>
								</a>
								<div class="price">
									<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['resellerPriceRp'];?>

										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['resellerPrice'];?>
">
									<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['specialPrice'];?>
">
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['specialPriceRp'];?>

									<?php }else{ ?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['salePrice'];?>
">
										<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['discountPrice'];?>
">
										<?php if ($_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['discountPrice']>0){?>
											<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['salePriceRp'];?>
</s><br>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['discountPriceRp'];?>

										<?php }else{ ?>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['salePriceRp'];?>

										<?php }?>
									<?php }?>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['dataNewProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewProduct2']['index']]['qty']>=1){?>
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								<?php }else{ ?>
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								<?php }?>
							</div>
							</form>
						</div>
						<?php endfor; endif; ?>
					</div>
				</div>
			</div>
			
			<div id="best-sellers" class="products-holder tab-pane">
				<div class="row-fluid">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['name'] = 'dataBestProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBestProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct']['total']);
?>
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['productID'];?>
">
							<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['productSeo'];?>
">
							<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['buyPrice'];?>
">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div <?php if ($_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['qty']<1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['qty']<1){?>
									<div class="dot-badge dark">
										EMPTY 
									</div>
								<?php }elseif($_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['qty']=='1'){?>
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK
									</div>
								<?php }?>
								<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['productSeo'];?>
.html">
									<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['image1'];?>
" />
									<h1><?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['productName'];?>
</h1>
								</a>
								<div class="price">
									<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['resellerPriceRp'];?>

										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['resellerPrice'];?>
">
									<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['specialPrice'];?>
">
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['specialPriceRp'];?>

									<?php }else{ ?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['salePrice'];?>
">
										<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['discountPrice'];?>
">
										<?php if ($_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['discountPrice']>0){?>
											<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['salePriceRp'];?>
</s><br>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['discountPriceRp'];?>

										<?php }else{ ?>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['salePriceRp'];?>

										<?php }?>
									<?php }?>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['dataBestProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct']['index']]['qty']>=1){?>
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								<?php }else{ ?>
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								<?php }?>
							</div>
							</form>
						</div>
					<?php endfor; endif; ?>
				</div>
				<div class="row-fluid">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['name'] = 'dataBestProduct2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBestProduct2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBestProduct2']['total']);
?>
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['productID'];?>
">
							<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['productSeo'];?>
">
							<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['buyPrice'];?>
">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div <?php if ($_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['qty']<1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['qty']<1){?>
									<div class="dot-badge dark">
										EMPTY 
									</div>
								<?php }elseif($_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['qty']=='2'){?>
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK
									</div>
								<?php }?>
								<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['productSeo'];?>
.html">
									<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['image1'];?>
" />
									<h1><?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['productName'];?>
</h1>
								</a>
								<div class="price">
									<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['resellerPriceRp'];?>

										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['resellerPrice'];?>
">
									<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['specialPrice'];?>
">
										Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['specialPriceRp'];?>

									<?php }else{ ?>
										<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['salePrice'];?>
">
										<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['discountPrice'];?>
">
										<?php if ($_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['discountPrice']>0){?>
											<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['salePriceRp'];?>
</s><br>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['discountPriceRp'];?>

										<?php }else{ ?>
											Rp. <?php echo $_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['salePriceRp'];?>

										<?php }?>
									<?php }?>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['dataBestProduct2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBestProduct2']['index']]['qty']>=1){?>
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								<?php }else{ ?>
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								<?php }?>
							</div>
							</form>
						</div>
					<?php endfor; endif; ?>
				</div>
			</div>
		</div>
	</section>
	<!--
	<section class="section-carousel">
		<div class="container">
			<div class="nav-holder">
				<a class="carousel-nav carousel_prev" href="#prev"><i class="icon-angle-left"></i></a>
				<a class="carousel-nav carousel_next" href="#next"><i class="icon-angle-right"></i></a>
			</div>
			
			<div class="carousel-holder">
				<div id="clients-carousel" class="clients-holder carousel">
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-1.png" />
						</a>
					</div>
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-2.png" />
						</a>
					</div>
					
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-3.png" />
						</a>
					</div>
					
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-4.png" />
						</a>
					</div>
					
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-5.png" />
						</a>
					</div>
					
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-6.png" />
						</a>
					</div>
					
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-7.png" />
						</a>
					</div>
					
					<div class="client-item">
						<a href="#">
							<img alt="" src="images/partner-8.png" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>-->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>