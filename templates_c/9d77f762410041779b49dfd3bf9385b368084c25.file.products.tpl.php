<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 07:02:45
         compiled from ".\templates\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7272593db53123fdb6-62511735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d77f762410041779b49dfd3bf9385b368084c25' => 
    array (
      0 => '.\\templates\\products.tpl',
      1 => 1497225760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7272593db53123fdb6-62511735',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593db531880145_76653438',
  'variables' => 
  array (
    'popup' => 0,
    'referer' => 0,
    'module' => 0,
    'act' => 0,
    'categoryName' => 0,
    'subCategoryName' => 0,
    'sort' => 0,
    'page' => 0,
    'categoryID' => 0,
    'titleSeo' => 0,
    'subCategoryID' => 0,
    'q' => 0,
    'numsProducts' => 0,
    'dataProduct' => 0,
    'sessLevel' => 0,
    'pageLink' => 0,
    'dataListCategory' => 0,
    'categorySeo' => 0,
    'subCategorySeo' => 0,
    'msgEmail' => 0,
    'productName' => 0,
    'image1' => 0,
    'image2' => 0,
    'image3' => 0,
    'image4' => 0,
    'image5' => 0,
    'image6' => 0,
    'productID' => 0,
    'productSeo' => 0,
    'buyPrice' => 0,
    'ukuran' => 0,
    'volume' => 0,
    'alcohol' => 0,
    'weight' => 0,
    'stock' => 0,
    'vintage' => 0,
    'country' => 0,
    'point' => 0,
    'qty' => 0,
    'resellerPriceRp' => 0,
    'resellerPrice' => 0,
    'specialPrice' => 0,
    'specialPriceRp' => 0,
    'salePrice' => 0,
    'discountPrice' => 0,
    'discountPriceRp' => 0,
    'salePriceRp' => 0,
    'description' => 0,
    'dataRelated' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593db531880145_76653438')) {function content_593db531880145_76653438($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>

<style>
	#popup{
		display: none;
	}
	
	a.tooltip2 {
		outline:none; 
	}
	a.tooltip2 strong {
		line-height:30px;
	}
	a.tooltip2:hover {
		text-decoration:none;
	} 
	a.tooltip2 span {
	    z-index:10;
	    display:none; 
	    padding:14px 20px;
	    margin-top:-30px; 
	    margin-left:10px;
	    width:223px; 
	    line-height:16px;
	}
	a.tooltip2:hover span{
	    display:inline; 
	    position:absolute; 
	    color:#111;
	    border:1px solid #DCA; 
	    background:#fffAF0;
	}
	.callout {
		z-index:20;position:absolute;top:30px;border:0;left:-12px;
	}
	    
	/*CSS3 extras*/
	a.tooltip2 span
	{
	    border-radius:4px;
	    box-shadow: 5px 5px 8px #CCC;
	}
</style>
<!--
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

	<script>
		$(document).ready(function() {
			$(".various2").fancybox({
				fitToView: false,
				scrolling: 'no',
				afterLoad: function(){
					this.width = $(this.element).data("width");
					this.height = $(this.element).data("height");
				},
				'afterClose':function () {
					window.location.reload();
				}
			});
		});
	</script>


<div class="wrapper">
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
		<div class="breadcrumb-holder">
			<div class="container">
				<?php if ($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='category'){?>
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li class="active"><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</li>
					</ul>
				
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='categorylist'){?>
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li class="active"><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</li>
					</ul>
					
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategory'){?>
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</li>
						<li>&raquo;</li>
						<li class="active"><?php echo $_smarty_tpl->tpl_vars['subCategoryName']->value;?>
</li>
					</ul>
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategorylist'){?>
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</li>
						<li>&raquo;</li>
						<li class="active"><?php echo $_smarty_tpl->tpl_vars['subCategoryName']->value;?>
</li>
					</ul>
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='detail'){?>
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li><?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
</li>
						<li>&raquo;</li>
						<li class="active"><?php echo $_smarty_tpl->tpl_vars['subCategoryName']->value;?>
</li>
					</ul>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='category'){?>
					<div class="grid-list-buttons">
						<ul class="inline">
							<li class="active"><a href="category-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-large"></i> Grid</a></li>
							<li><a href="categorylist-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
					
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='categorylist'){?>
					<div class="grid-list-buttons">
						<ul class="inline">
							<li><a href="category-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-large"></i> Grid</a></li>
							<li class="active"><a href="categorylist-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
				
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategory'){?>
					<div class="grid-list-buttons">
						<ul class="inline">
							<li class="active"><a href="subcategory-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-large"></i> Grid</a></li>
							<li><a href="subcategorylist-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
				
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategorylist'){?>
					<div class="grid-list-buttons">
						<ul class="inline">
							<li><a href="subcategory-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-large"></i> Grid</a></li>
							<li class="active"><a href="subcategorylist-<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['titleSeo']->value;?>
.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
				<?php }?>
			</div>
		</div>
	</section>
	
	<?php if ($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
		<section class="section-two-columns">
			<div class="container">
				<div class="row-fluid">
					<div class="span12">
						<center>
							<h4>Pencarian Produk<br><i><?php echo $_smarty_tpl->tpl_vars['q']->value;?>
</i></h4>
							<p>Ditemukan <?php echo $_smarty_tpl->tpl_vars['numsProducts']->value;?>
 data</p>
						</center>
						<div id="grid-view" class="products-grid products-holder active tab-pane">
							
							<?php if ($_smarty_tpl->tpl_vars['numsProducts']->value=='0'){?>
								Tidak ada produk dalam kategori ini
							<?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['i']=='1'){?>
									<div class="row-fluid">
								<?php }?>
								<div class="span3">
									<form method="POST" action="cart.php?mod=cart&act=input">
									<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
">
									<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
">
									<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
">
									<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
">
									<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
">
									<input id="qty" type="hidden" name="qty" size="2" value="1" />
									<div <?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<=1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
										<!--<div class="dot-badge red">
											hot 
										</div>
										<div class="dot-badge yellow">
											new 
										</div>-->
										<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<1){?>
											<div class="dot-badge dark">
												EMPTY 
											</div>
										<?php }elseif($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']=='1'){?>
											<div class="dot-badge red" style="width: 70px;">
												LAST STOCK
											</div>
										<?php }?>
										<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
.html">
											<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image1'];?>
" />
											<h1><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</h1>
										</a>
										<div class="tag-line">
                                            <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['description'];?>

                                        </div>
                                        <div class="price">
                                        	<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
												Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPriceRp'];?>

												<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPrice'];?>
">
											<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
												<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPrice'];?>
">
												Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPriceRp'];?>

											<?php }else{ ?>
												<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
">
												<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
">
												<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice']>0){?>
													<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>
</s><br>
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPriceRp'];?>

												<?php }else{ ?>
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>

												<?php }?>
											<?php }?>
										</div>
										<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']>=1){?>
											<button class="cusmo-btn add-button" type="submit">add to cart</a>
										<?php }else{ ?>
											<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
										<?php }?>
											
									</div>
									</form>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['i']=='4'){?>
									</div>
								<?php }?>	
							<?php endfor; endif; ?>
						</div>
						<br>
						<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
					</div>
				</div>
			</div>
		</section>
	
	<?php }else{ ?>
		<section class="section-two-columns">
			<div class="container">
				<div class="row-fluid">
					<div class="span3">
						<div class="sidebar">
							<div class="accordion-widget category-accordions">
								<div class="accordion">
									
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['name'] = 'dataListCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataListCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListCategory']['total']);
?>
									<div class="accordion-group">
										<div class="accordion-heading">
											<?php if ($_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['numsListSub']>0){?>
												<a class="accordion-toggle" data-toggle="collapse"  href="#collapse<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['i'];?>
">
													<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['categoryName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['numsJmlCat'];?>
)
												</a>
											<?php }else{ ?>
												<a href="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['categorySeo'];?>
.html" style="margin-left: 20px;">
													<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['categoryName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['numsJmlCat'];?>
)
												</a>
											<?php }?>
										</div>
										<div id="collapse<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['i'];?>
" class="accordion-body collapse in">
											<div class="accordion-inner">
												<ul>
													<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['name'] = 'dataListSub';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['dataListSub']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataListSub']['total']);
?>
														<li><a href="subcategory-0-1-<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['dataListSub'][$_smarty_tpl->getVariable('smarty')->value['section']['dataListSub']['index']]['subCategoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['dataListSub'][$_smarty_tpl->getVariable('smarty')->value['section']['dataListSub']['index']]['subCategorySeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['dataListSub'][$_smarty_tpl->getVariable('smarty')->value['section']['dataListSub']['index']]['subCategoryName'];?>
 (<?php echo $_smarty_tpl->tpl_vars['dataListCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataListCategory']['index']]['dataListSub'][$_smarty_tpl->getVariable('smarty')->value['section']['dataListSub']['index']]['numsJml'];?>
)</a></li>
													<?php endfor; endif; ?>
												</ul>
											</div>
										</div>
									</div>
									<?php endfor; endif; ?>
								</div>
							</div>
							<hr>
							<?php if ($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='category'){?>
								<div class="accordion-widget filter-accordions">
									<div class="accordion">
										<div class="accordion-group">
											<div class="accordion-heading">
												<a class="accordion-toggle" data-toggle="collapse"  href="#collapse11">
													sort by
												</a>
											</div>
											<div id="collapse11" class="accordion-body collapse in">
												<div class="accordion-inner">
													<ul>
														<li><a href="category-0-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Default</a></li>
														<li><a href="category-1-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">A - Z</a></li>
														<li><a href="category-2-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Z - A</a></li>
														<li><a href="category-3-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Harga Terendah</a></li>
														<li><a href="category-4-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='categorylist'){?>
								<div class="accordion-widget filter-accordions">
									<div class="accordion">
										<div class="accordion-group">
											<div class="accordion-heading">
												<a class="accordion-toggle" data-toggle="collapse"  href="#collapse11">
													sort by
												</a>
											</div>
											<div id="collapse11" class="accordion-body collapse in">
												<div class="accordion-inner">
													<ul>
														<li><a href="categorylist-0-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Default</a></li>
														<li><a href="categorylist-1-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">A - Z</a></li>
														<li><a href="categorylist-2-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Z - A</a></li>
														<li><a href="categorylist-3-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Harga Terendah</a></li>
														<li><a href="categorylist-4-1-<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['categorySeo']->value;?>
.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategory'){?>
								<div class="accordion-widget filter-accordions">
									<div class="accordion">
										<div class="accordion-group">
											<div class="accordion-heading">
												<a class="accordion-toggle" data-toggle="collapse"  href="#collapse11">
													sort by
												</a>
											</div>
											<div id="collapse11" class="accordion-body collapse in">
												<div class="accordion-inner">
													<ul>
														<li><a href="subcategory-0-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Default</a></li>
														<li><a href="subcategory-1-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">A - Z</a></li>
														<li><a href="subcategory-2-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Z - A</a></li>
														<li><a href="subcategory-3-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Harga Terendah</a></li>
														<li><a href="subcategory-4-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategorylist'){?>
								<div class="accordion-widget filter-accordions">
									<div class="accordion">
										<div class="accordion-group">
											<div class="accordion-heading">
												<a class="accordion-toggle" data-toggle="collapse"  href="#collapse11">
													sort by
												</a>
											</div>
											<div id="collapse11" class="accordion-body collapse in">
												<div class="accordion-inner">
													<ul>
														<li><a href="subcategorylist-0-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Default</a></li>
														<li><a href="subcategorylist-1-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">A - Z</a></li>
														<li><a href="subcategorylist-2-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Z - A</a></li>
														<li><a href="subcategorylist-3-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Harga Terendah</a></li>
														<li><a href="subcategorylist-4-1-<?php echo $_smarty_tpl->tpl_vars['subCategoryID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['subCategorySeo']->value;?>
.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php }?>
						</div>
					</div>
					
					<?php if ($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='category'){?>
						<div class="span9">
							<div id="grid-view" class="products-grid products-holder active tab-pane">
								
								<?php if ($_smarty_tpl->tpl_vars['numsProducts']->value=='0'){?>
									Tidak ada produk dalam kategori ini
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['i']=='1'){?>
										<div class="row-fluid">
									<?php }?>
									<div class="span4">
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
">
										<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
">
										<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div <?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<=1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<1){?>
												<div class="dot-badge dark">
													EMPTY 
												</div>
											<?php }elseif($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']=='1'){?>
												<div class="dot-badge red" style="width: 70px;">
													LAST STOCK
												</div>
											<?php }?>
											<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
.html">
												<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image1'];?>
" />
												<h1><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</h1>
											</a>
											<div class="tag-line">
	                                            <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['description'];?>

	                                        </div>
											<div class="price">
												<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPriceRp'];?>

													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPrice'];?>
">
												<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPrice'];?>
">
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPriceRp'];?>

												<?php }else{ ?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
">
													<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
">
													<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice']>0){?>
														<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>
</s><br>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPriceRp'];?>

													<?php }else{ ?>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>

													<?php }?>
												<?php }?>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']>=1){?>
												<button class="cusmo-btn add-button" type="submit">add to cart</a>
											<?php }else{ ?>
												<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
											<?php }?>
										</div>
										</form>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['i']=='3'){?>
										</div>
									<?php }?>	
								<?php endfor; endif; ?>
							</div>
							<br>
							<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
						</div>
						
					<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='categorylist'){?>
						<div class="span9">
							<div id="list-view" class="products-list products-holder active tab-pane">
								
								<?php if ($_smarty_tpl->tpl_vars['numsProducts']->value=='0'){?>
									Tidak ada produk dalam kategori ini
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
									
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
">
										<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
">
										<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div class="list-item" style="padding: 10px; border-bottom: 1px dotted #CCC;">
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
.html">
												<h1><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</h1>
											</a>
											<div class="tag-line">
	                                            <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['description'];?>

	                                            
	                                            <?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<1){?>
													EMPTY 
												<?php }elseif($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']=='1'){?>
													LAST STOCK
												<?php }?>
	                                        </div>
											<div class="price">
												<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPriceRp'];?>

													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPrice'];?>
">
												<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPrice'];?>
">
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPriceRp'];?>

												<?php }else{ ?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
">
													<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
">
													<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice']>0){?>
														<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>
</s>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPriceRp'];?>

													<?php }else{ ?>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>

													<?php }?>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']>=1){?>
													<button class="cusmo-btn add-button" style="float:right;" type="submit">add to cart</a>
												<?php }else{ ?>
													<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
												<?php }?>
											</div>
											<br>
										</div>
										</form>
								<?php endfor; endif; ?>
							</div>
							<br>
							<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
						</div>
					
					<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategory'){?>
						<div class="span9">
							<div id="grid-view" class="products-grid products-holder active tab-pane">
								
								<?php if ($_smarty_tpl->tpl_vars['numsProducts']->value=='0'){?>
									Tidak ada produk dalam kategori ini
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['i']=='1'){?>
										<div class="row-fluid">
									<?php }?>
									<div class="span4">
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
">
										<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
">
										<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div <?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<=1){?>class="product-item2"<?php }else{ ?>class="product-item"<?php }?>>
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<1){?>
												<div class="dot-badge dark">
													EMPTY 
												</div>
											<?php }elseif($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']=='1'){?>
												<div class="dot-badge red" style="width: 70px;">
													LAST STOCK
												</div>
											<?php }?>
											<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
.html">
												<img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image1'];?>
" />
												<h1><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</h1>
											</a>
											<div class="tag-line">
	                                            <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['description'];?>

	                                        </div>
											<div class="price">
												<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPriceRp'];?>

													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPrice'];?>
">
												<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPrice'];?>
">
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPriceRp'];?>

												<?php }else{ ?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
">
													<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
">
													<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice']>0){?>
														<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>
</s><br>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPriceRp'];?>

													<?php }else{ ?>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>

													<?php }?>
												<?php }?>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']>=1){?>
												<button class="cusmo-btn add-button" type="submit">add to cart</a>
											<?php }else{ ?>
												<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
											<?php }?>
										</div>
										</form>
									</div>
									<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['i']=='3'){?>
										</div>
									<?php }?>	
								<?php endfor; endif; ?>
							</div>
							<br>
							<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
						</div>
					
					<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='subcategorylist'){?>
						<div class="span9">
							<div id="list-view" class="products-list products-holder active tab-pane">
								
								<?php if ($_smarty_tpl->tpl_vars['numsProducts']->value=='0'){?>
									Tidak ada produk dalam kategori ini
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
									
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
">
										<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
">
										<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div class="list-item" style="padding: 10px; border-bottom: 1px dotted #CCC;">
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											
											<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productSeo'];?>
.html">
												<h1><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</h1>
											</a>
											<div class="tag-line">
	                                            <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['description'];?>

	                                            
	                                            <?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']<1){?>
													EMPTY 
												<?php }elseif($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']=='1'){?>
													LAST STOCK
												<?php }?>
	                                        </div>
											<div class="price">
												<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPriceRp'];?>

													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['resellerPrice'];?>
">
												<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPrice'];?>
">
													Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['specialPriceRp'];?>

												<?php }else{ ?>
													<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
">
													<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
">
													<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice']>0){?>
														<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>
</s>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPriceRp'];?>

													<?php }else{ ?>
														Rp. <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceRp'];?>

													<?php }?>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['qty']>=1){?>
													<button class="cusmo-btn add-button" style="float:right;" type="submit">add to cart</a>
												<?php }else{ ?>
													<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
												<?php }?>
											</div>
											<br>
										</div>
										</form>
								<?php endfor; endif; ?>
							</div>
							<br>
							<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
						</div>
						
					<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='detail'){?>
						<div class="span9">
							<div class="page-content">
								<?php if ($_smarty_tpl->tpl_vars['msgEmail']->value=='1'){?>
									<p style="color: green;">Anda telah sukses mendaftarkan layanan request qty untuk ketersediaan produk ini.</p>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['msgEmail']->value=='2'){?>
									<p style="color: red;">Email Anda sudah terdaftar untuk request qty produk ini.</p>
								<?php }?>
								<div class="products-page-head">
									<h1><?php echo $_smarty_tpl->tpl_vars['productName']->value;?>
</h1><br>
								</div>
								<p>&nbsp;</p>
								<div class="row-fluid">
									<div class="span7">
										<div class="flexslider product-gallery">
											<ul class="slides">
												<?php if ($_smarty_tpl->tpl_vars['image1']->value!=''){?>
													<li data-thumb="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image1']->value;?>
">
														<img alt="" src="images/products/<?php echo $_smarty_tpl->tpl_vars['image1']->value;?>
" />
													</li>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['image2']->value!=''){?>
													<li data-thumb="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image2']->value;?>
">
														<img alt="" src="images/products/<?php echo $_smarty_tpl->tpl_vars['image2']->value;?>
" />
													</li>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['image3']->value!=''){?>
													<li data-thumb="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image3']->value;?>
">
														<img alt="" src="images/products/<?php echo $_smarty_tpl->tpl_vars['image3']->value;?>
" />
													</li>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['image4']->value!=''){?>
													<li data-thumb="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image4']->value;?>
">
														<img alt="" src="images/products/<?php echo $_smarty_tpl->tpl_vars['image4']->value;?>
" />
													</li>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['image5']->value!=''){?>
													<li data-thumb="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image5']->value;?>
">
														<img alt="" src="images/products/<?php echo $_smarty_tpl->tpl_vars['image5']->value;?>
" />
													</li>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['image6']->value!=''){?>
													<li data-thumb="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image6']->value;?>
">
														<img alt="" src="images/products/<?php echo $_smarty_tpl->tpl_vars['image6']->value;?>
" />
													</li>
												<?php }?>
											</ul>
										</div>
									</div>
									<form method="POST" action="cart.php?mod=cart&act=input">
									<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
">
									<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['productSeo']->value;?>
">
									<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['buyPrice']->value;?>
">
									<div class="span5">
										<div class="product-info-box">
											<div class="info-holder">
												<h4>Product ID: 6254362</h4>
												<div class="fb-like" data-href="http://Anaku.com/product-<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['productSeo']->value;?>
.html" data-width="100%" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
											</div>
											<hr>
											<div class="info-holder">
												<p>
												Ukuran : <?php echo $_smarty_tpl->tpl_vars['ukuran']->value;?>
 S M L X XXL <br>
												<!-- Volume : <?php echo $_smarty_tpl->tpl_vars['volume']->value;?>
 ML<br>
												Kadar Alkohol : <?php echo $_smarty_tpl->tpl_vars['alcohol']->value;?>
 %<br> -->
												Berat : <?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
 Kg<br>
												Stok : <?php if ($_smarty_tpl->tpl_vars['stock']->value>0){?>Ready Stock<?php }else{ ?>Stok Kosong<?php }?><br>
												Vintage : <?php echo $_smarty_tpl->tpl_vars['vintage']->value;?>
<br>
												Country : <?php echo $_smarty_tpl->tpl_vars['country']->value;?>
<br>
												Point Reward : <?php echo $_smarty_tpl->tpl_vars['point']->value;?>
 
												<a href="#" class="tooltip2"><img src="images/icon/help.png">
													<span>
												        <img class="callout" src="images/icon/callout.gif" />
												        <strong>Point Reward yang Anda dapatkan dapat ditukarkan dengan kupon belanja!</strong>
												    </span></a>
												</p>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['stock']->value>=1){?>
												<div class="drop-downs-holder">
													
													<div class="drop-selector">
														<span>amount</span>
														<select class="chosen-select" name="qty">
															<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['qty'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['name'] = 'qty';
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['qty']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['qty']['total']);
?>
																<option value="<?php echo $_smarty_tpl->tpl_vars['qty']->value[$_smarty_tpl->getVariable('smarty')->value['section']['qty']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['qty']->value[$_smarty_tpl->getVariable('smarty')->value['section']['qty']['index']];?>
</option>
															<?php endfor; endif; ?>
														</select>
													</div>
												</div>
											<?php }?>
											<hr>
											<div class="price-holder">
												<div class="price">
													<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
														Rp. <?php echo $_smarty_tpl->tpl_vars['resellerPriceRp']->value;?>

														<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['resellerPrice']->value;?>
">
													<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
														<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['specialPrice']->value;?>
">
														Rp. <?php echo $_smarty_tpl->tpl_vars['specialPriceRp']->value;?>

													<?php }else{ ?>
														<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['salePrice']->value;?>
">
														<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['discountPrice']->value;?>
">
														<?php if ($_smarty_tpl->tpl_vars['discountPrice']->value>0){?>
															<span>Rp. <?php echo $_smarty_tpl->tpl_vars['discountPriceRp']->value;?>
</span><br>
															<span class="old">Rp. <?php echo $_smarty_tpl->tpl_vars['salePriceRp']->value;?>
</span>
														<?php }else{ ?>
															Rp. <?php echo $_smarty_tpl->tpl_vars['salePriceRp']->value;?>

														<?php }?>
													<?php }?>
												</div>
											</div>
											<div class="buttons-holder">
												<?php if ($_smarty_tpl->tpl_vars['stock']->value>=1){?>
													<button class="cusmo-btn add-button" type="submit">add to cart</button>
												<?php }else{ ?>
													<p>
														<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
													</p>
												<?php }?>
											</div>
											<!--<?php if ($_smarty_tpl->tpl_vars['stock']->value<=1){?>
												<hr>
												<div class="drop-downs-holder">
													
													<div class="drop-selector">
														<a class="various2 fancybox.iframe" data-width="520" data-height="280" href="email.php?mod=tell&act=me&productID=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
"><button class="cusmo-btngreen add-button" type="submit">Request Order</button></a>
													</div>
												</div>
											<?php }?>-->
										</div>
									</div>
									</form>
								</div>
								<div class="product-tabs">
									<div class="controls-holder nav-tabs">
										<ul class="inline">
											<li class="active"><a data-toggle="tab" href="#description">Deskripsi Produk</a></li>
											<!--<li><a data-toggle="tab" href="#reviews">Komentar</a></li>-->
										</ul>
									</div>
									
									<div class="tab-content">
										<div id="description" class=" active tab-pane ">
											<p><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</p><br>
											<h4>Komentar untuk Produk Ini :</h4><br>
											<div class="fb-comments" data-href="http://Anaku.com/product-<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['productSeo']->value;?>
.html" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
										</div>
										
										<!--<div id="reviews" class=" tab-pane ">
											<div class="fb-comments" data-href="http://Anaku.com/product-<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['productSeo']->value;?>
.html" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
										</div>-->
									</div>
								</div>
								
								<div class="middle-header-holder">
									<div class="middle-header">Produk Terkait</div>
								</div>
								
								<div class="products-holder related-products">
									<div class="row-fluid">
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['name'] = 'dataRelated';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataRelated']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRelated']['total']);
?>
											<div class="span4">
												<form method="POST" action="cart.php?mod=cart&act=input">
												<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productID'];?>
">
												<input type="hidden" name="productSeo" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productSeo'];?>
">
												<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['salePrice'];?>
">
												<input type="hidden" name="buyPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['buyPrice'];?>
">
												<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['discountPrice'];?>
">
												<input id="qty" type="hidden" name="qty" size="2" value="1" />
												<div class="product-item">
													<a href="product-<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productSeo'];?>
.html"><img alt="" src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['image1'];?>
" /></a>
													<h1><a href="product-<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productSeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['productName'];?>
</a></h1>
													<div class="price">
														<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>
															Rp. <?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['resellerPriceRp'];?>

															<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['resellerPrice'];?>
">
														<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>
															<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['specialPrice'];?>
">
															Rp. <?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['specialPriceRp'];?>

														<?php }else{ ?>
															<input type="hidden" name="salePrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['salePrice'];?>
">
															<input type="hidden" name="discountPrice" value="<?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['discountPrice'];?>
">
															<?php if ($_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['discountPrice']>0){?>
																<s>Rp. <?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['salePriceRp'];?>
</s><br>
																Rp. <?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['discountPriceRp'];?>

															<?php }else{ ?>
																Rp. <?php echo $_smarty_tpl->tpl_vars['dataRelated']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRelated']['index']]['salePriceRp'];?>

															<?php }?>
														<?php }?>
													</div>
													<button class="cusmo-btn add-button" type="submit">add to cart</a>
												</div>
												</form>
											</div>
										<?php endfor; endif; ?>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</section>
	<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>