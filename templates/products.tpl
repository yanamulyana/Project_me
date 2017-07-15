{include file="header.tpl"}

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
{if $popup == 'OK'}
{literal}
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
{/literal}
{/if}
-->
{literal}
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
{/literal}

<div class="wrapper">
	<!--<div id="popup">
		<p>Anda telah menambahkan produk ke dalam keranjang belanja.</p>
		<center>
			<a class="cusmo-btn add-button" href="{$referer}">Lanjutkan Belanja</a>
			<a class="cusmo-btn add-button" href="checkout.html">Checkout</a>
		</center>
	</div>-->
	<section class="section-head">
		<div class="container">
			<div class="row-fluid top-row">
				<div class="span5">
					
					{include file="logo.tpl"}
					
				</div>
				
				<div class="span7">
					{include file="topnavigation.tpl"}
				</div>
			</div>
		</div>
		
		<div class="top-categories">
			<div class="container">
				<div class="row-fluid">
					<div class="span9">
						{include file="categoriesnavigation.tpl"}
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
				{if $module == 'product' AND $act == 'category'}
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li class="active">{$categoryName}</li>
					</ul>
				
				{elseif $module == 'product' AND $act == 'categorylist'}
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li class="active">{$categoryName}</li>
					</ul>
					
				{elseif $module == 'product' AND $act == 'subcategory'}
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li>{$categoryName}</li>
						<li>&raquo;</li>
						<li class="active">{$subCategoryName}</li>
					</ul>
				{elseif $module == 'product' AND $act == 'subcategorylist'}
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li>{$categoryName}</li>
						<li>&raquo;</li>
						<li class="active">{$subCategoryName}</li>
					</ul>
				{elseif $module == 'product' AND $act == 'detail'}
					<ul class="inline bcrumb">
						<li><a href="home">home</a></li>
						<li>&raquo;</li>
						<li>{$categoryName}</li>
						<li>&raquo;</li>
						<li class="active">{$subCategoryName}</li>
					</ul>
				{/if}
				
				{if $module == 'product' AND $act == 'category'}
					<div class="grid-list-buttons">
						<ul class="inline">
							<li class="active"><a href="category-{$sort}-{$page}-{$categoryID}-{$titleSeo}.html"><i class="icon-th-large"></i> Grid</a></li>
							<li><a href="categorylist-{$sort}-{$page}-{$categoryID}-{$titleSeo}.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
					
				{elseif $module == 'product' AND $act == 'categorylist'}
					<div class="grid-list-buttons">
						<ul class="inline">
							<li><a href="category-{$sort}-{$page}-{$categoryID}-{$titleSeo}.html"><i class="icon-th-large"></i> Grid</a></li>
							<li class="active"><a href="categorylist-{$sort}-{$page}-{$categoryID}-{$titleSeo}.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
				
				{elseif $module == 'product' AND $act == 'subcategory'}
					<div class="grid-list-buttons">
						<ul class="inline">
							<li class="active"><a href="subcategory-{$sort}-{$page}-{$subCategoryID}-{$titleSeo}.html"><i class="icon-th-large"></i> Grid</a></li>
							<li><a href="subcategorylist-{$sort}-{$page}-{$subCategoryID}-{$titleSeo}.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
				
				{elseif $module == 'product' AND $act == 'subcategorylist'}
					<div class="grid-list-buttons">
						<ul class="inline">
							<li><a href="subcategory-{$sort}-{$page}-{$subCategoryID}-{$titleSeo}.html"><i class="icon-th-large"></i> Grid</a></li>
							<li class="active"><a href="subcategorylist-{$sort}-{$page}-{$subCategoryID}-{$titleSeo}.html"><i class="icon-th-list"></i> List</a></li>
						</ul>
					</div>
				{/if}
			</div>
		</div>
	</section>
	
	{if $module == 'product' AND $act == 'search'}
		<section class="section-two-columns">
			<div class="container">
				<div class="row-fluid">
					<div class="span12">
						<center>
							<h4>Pencarian Produk<br><i>{$q}</i></h4>
							<p>Ditemukan {$numsProducts} data</p>
						</center>
						<div id="grid-view" class="products-grid products-holder active tab-pane">
							
							{if $numsProducts == '0'}
								Tidak ada produk dalam kategori ini
							{/if}
							{section name=dataProduct loop=$dataProduct}
								{if $dataProduct[dataProduct].i == '1'}
									<div class="row-fluid">
								{/if}
								<div class="span3">
									<form method="POST" action="cart.php?mod=cart&act=input">
									<input type="hidden" name="productID" value="{$dataProduct[dataProduct].productID}">
									<input type="hidden" name="productSeo" value="{$dataProduct[dataProduct].productSeo}">
									<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].salePrice}">
									<input type="hidden" name="buyPrice" value="{$dataProduct[dataProduct].buyPrice}">
									<input type="hidden" name="discountPrice" value="{$dataProduct[dataProduct].discountPrice}">
									<input id="qty" type="hidden" name="qty" size="2" value="1" />
									<div {if $dataProduct[dataProduct].qty <= 1}class="product-item2"{else}class="product-item"{/if}>
										<!--<div class="dot-badge red">
											hot 
										</div>
										<div class="dot-badge yellow">
											new 
										</div>-->
										{if $dataProduct[dataProduct].qty < 1}
											<div class="dot-badge dark">
												EMPTY 
											</div>
										{elseif $dataProduct[dataProduct].qty == '1'}
											<div class="dot-badge red" style="width: 70px;">
												LAST STOCK
											</div>
										{/if}
										<a href="product-{$dataProduct[dataProduct].productID}-{$dataProduct[dataProduct].productSeo}.html">
											<img alt="" src="images/products/thumb/small_{$dataProduct[dataProduct].image1}" />
											<h1>{$dataProduct[dataProduct].productName}</h1>
										</a>
										<div class="tag-line">
                                            {$dataProduct[dataProduct].description}
                                        </div>
                                        <div class="price">
                                        	{if $sessLevel == '2'}
												Rp. {$dataProduct[dataProduct].resellerPriceRp}
												<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].resellerPrice}">
											{elseif $sessLevel == '3'}
												<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].specialPrice}">
												Rp. {$dataProduct[dataProduct].specialPriceRp}
											{else}
												<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].salePrice}">
												<input type="hidden" name="discountPrice" value="{$dataProduct[dataProduct].discountPrice}">
												{if $dataProduct[dataProduct].discountPrice > 0}
													<s>Rp. {$dataProduct[dataProduct].salePriceRp}</s><br>
													Rp. {$dataProduct[dataProduct].discountPriceRp}
												{else}
													Rp. {$dataProduct[dataProduct].salePriceRp}
												{/if}
											{/if}
										</div>
										{if $dataProduct[dataProduct].qty >= 1}
											<button class="cusmo-btn add-button" type="submit">add to cart</a>
										{else}
											<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
										{/if}
											
									</div>
									</form>
								</div>
								{if $dataProduct[dataProduct].i == '4'}
									</div>
								{/if}	
							{/section}
						</div>
						<br>
						<div class="pagination">{$pageLink}</div>
					</div>
				</div>
			</div>
		</section>
	
	{else}
		<section class="section-two-columns">
			<div class="container">
				<div class="row-fluid">
					<div class="span3">
						<div class="sidebar">
							<div class="accordion-widget category-accordions">
								<div class="accordion">
									
									{section name=dataListCategory loop=$dataListCategory}
									<div class="accordion-group">
										<div class="accordion-heading">
											{if $dataListCategory[dataListCategory].numsListSub > 0}
												<a class="accordion-toggle" data-toggle="collapse"  href="#collapse{$dataListCategory[dataListCategory].i}">
													{$dataListCategory[dataListCategory].categoryName} ({$dataListCategory[dataListCategory].numsJmlCat})
												</a>
											{else}
												<a href="category-0-1-{$dataListCategory[dataListCategory].categoryID}-{$dataListCategory[dataListCategory].categorySeo}.html" style="margin-left: 20px;">
													{$dataListCategory[dataListCategory].categoryName} ({$dataListCategory[dataListCategory].numsJmlCat})
												</a>
											{/if}
										</div>
										<div id="collapse{$dataListCategory[dataListCategory].i}" class="accordion-body collapse in">
											<div class="accordion-inner">
												<ul>
													{section name=dataListSub loop=$dataListCategory[dataListCategory].dataListSub}
														<li><a href="subcategory-0-1-{$dataListCategory[dataListCategory].dataListSub[dataListSub].subCategoryID}-{$dataListCategory[dataListCategory].dataListSub[dataListSub].subCategorySeo}.html">{$dataListCategory[dataListCategory].dataListSub[dataListSub].subCategoryName} ({$dataListCategory[dataListCategory].dataListSub[dataListSub].numsJml})</a></li>
													{/section}
												</ul>
											</div>
										</div>
									</div>
									{/section}
								</div>
							</div>
							<hr>
							{if $module == 'product' AND $act == 'category'}
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
														<li><a href="category-0-1-{$categoryID}-{$categorySeo}.html">Default</a></li>
														<li><a href="category-1-1-{$categoryID}-{$categorySeo}.html">A - Z</a></li>
														<li><a href="category-2-1-{$categoryID}-{$categorySeo}.html">Z - A</a></li>
														<li><a href="category-3-1-{$categoryID}-{$categorySeo}.html">Harga Terendah</a></li>
														<li><a href="category-4-1-{$categoryID}-{$categorySeo}.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							{elseif $module == 'product' AND $act == 'categorylist'}
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
														<li><a href="categorylist-0-1-{$categoryID}-{$categorySeo}.html">Default</a></li>
														<li><a href="categorylist-1-1-{$categoryID}-{$categorySeo}.html">A - Z</a></li>
														<li><a href="categorylist-2-1-{$categoryID}-{$categorySeo}.html">Z - A</a></li>
														<li><a href="categorylist-3-1-{$categoryID}-{$categorySeo}.html">Harga Terendah</a></li>
														<li><a href="categorylist-4-1-{$categoryID}-{$categorySeo}.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							{elseif $module == 'product' AND $act == 'subcategory'}
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
														<li><a href="subcategory-0-1-{$subCategoryID}-{$subCategorySeo}.html">Default</a></li>
														<li><a href="subcategory-1-1-{$subCategoryID}-{$subCategorySeo}.html">A - Z</a></li>
														<li><a href="subcategory-2-1-{$subCategoryID}-{$subCategorySeo}.html">Z - A</a></li>
														<li><a href="subcategory-3-1-{$subCategoryID}-{$subCategorySeo}.html">Harga Terendah</a></li>
														<li><a href="subcategory-4-1-{$subCategoryID}-{$subCategorySeo}.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							{elseif $module == 'product' AND $act == 'subcategorylist'}
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
														<li><a href="subcategorylist-0-1-{$subCategoryID}-{$subCategorySeo}.html">Default</a></li>
														<li><a href="subcategorylist-1-1-{$subCategoryID}-{$subCategorySeo}.html">A - Z</a></li>
														<li><a href="subcategorylist-2-1-{$subCategoryID}-{$subCategorySeo}.html">Z - A</a></li>
														<li><a href="subcategorylist-3-1-{$subCategoryID}-{$subCategorySeo}.html">Harga Terendah</a></li>
														<li><a href="subcategorylist-4-1-{$subCategoryID}-{$subCategorySeo}.html">Harga Tertinggi</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							{/if}
						</div>
					</div>
					
					{if $module == 'product' AND $act == 'category'}
						<div class="span9">
							<div id="grid-view" class="products-grid products-holder active tab-pane">
								
								{if $numsProducts == '0'}
									Tidak ada produk dalam kategori ini
								{/if}
								{section name=dataProduct loop=$dataProduct}
									{if $dataProduct[dataProduct].i == '1'}
										<div class="row-fluid">
									{/if}
									<div class="span4">
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="{$dataProduct[dataProduct].productID}">
										<input type="hidden" name="productSeo" value="{$dataProduct[dataProduct].productSeo}">
										<input type="hidden" name="buyPrice" value="{$dataProduct[dataProduct].buyPrice}">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div {if $dataProduct[dataProduct].qty <= 1}class="product-item2"{else}class="product-item"{/if}>
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											{if $dataProduct[dataProduct].qty < 1}
												<div class="dot-badge dark">
													EMPTY 
												</div>
											{elseif $dataProduct[dataProduct].qty == '1'}
												<div class="dot-badge red" style="width: 70px;">
													LAST STOCK
												</div>
											{/if}
											<a href="product-{$dataProduct[dataProduct].productID}-{$dataProduct[dataProduct].productSeo}.html">
												<img alt="" src="images/products/thumb/small_{$dataProduct[dataProduct].image1}" />
												<h1>{$dataProduct[dataProduct].productName}</h1>
											</a>
											<div class="tag-line">
	                                            {$dataProduct[dataProduct].description}
	                                        </div>
											<div class="price">
												{if $sessLevel == '2'}
													Rp. {$dataProduct[dataProduct].resellerPriceRp}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].resellerPrice}">
												{elseif $sessLevel == '3'}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].specialPrice}">
													Rp. {$dataProduct[dataProduct].specialPriceRp}
												{else}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].salePrice}">
													<input type="hidden" name="discountPrice" value="{$dataProduct[dataProduct].discountPrice}">
													{if $dataProduct[dataProduct].discountPrice > 0}
														<s>Rp. {$dataProduct[dataProduct].salePriceRp}</s><br>
														Rp. {$dataProduct[dataProduct].discountPriceRp}
													{else}
														Rp. {$dataProduct[dataProduct].salePriceRp}
													{/if}
												{/if}
											</div>
											{if $dataProduct[dataProduct].qty >= 1}
												<button class="cusmo-btn add-button" type="submit">add to cart</a>
											{else}
												<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
											{/if}
										</div>
										</form>
									</div>
									{if $dataProduct[dataProduct].i == '3'}
										</div>
									{/if}	
								{/section}
							</div>
							<br>
							<div class="pagination">{$pageLink}</div>
						</div>
						
					{elseif $module == 'product' AND $act == 'categorylist'}
						<div class="span9">
							<div id="list-view" class="products-list products-holder active tab-pane">
								
								{if $numsProducts == '0'}
									Tidak ada produk dalam kategori ini
								{/if}
								{section name=dataProduct loop=$dataProduct}
									
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="{$dataProduct[dataProduct].productID}">
										<input type="hidden" name="productSeo" value="{$dataProduct[dataProduct].productSeo}">
										<input type="hidden" name="buyPrice" value="{$dataProduct[dataProduct].buyPrice}">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div class="list-item" style="padding: 10px; border-bottom: 1px dotted #CCC;">
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											<a href="product-{$dataProduct[dataProduct].productID}-{$dataProduct[dataProduct].productSeo}.html">
												<h1>{$dataProduct[dataProduct].productName}</h1>
											</a>
											<div class="tag-line">
	                                            {$dataProduct[dataProduct].description}
	                                            
	                                            {if $dataProduct[dataProduct].qty < 1}
													EMPTY 
												{elseif $dataProduct[dataProduct].qty == '1'}
													LAST STOCK
												{/if}
	                                        </div>
											<div class="price">
												{if $sessLevel == '2'}
													Rp. {$dataProduct[dataProduct].resellerPriceRp}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].resellerPrice}">
												{elseif $sessLevel == '3'}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].specialPrice}">
													Rp. {$dataProduct[dataProduct].specialPriceRp}
												{else}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].salePrice}">
													<input type="hidden" name="discountPrice" value="{$dataProduct[dataProduct].discountPrice}">
													{if $dataProduct[dataProduct].discountPrice > 0}
														<s>Rp. {$dataProduct[dataProduct].salePriceRp}</s>
														Rp. {$dataProduct[dataProduct].discountPriceRp}
													{else}
														Rp. {$dataProduct[dataProduct].salePriceRp}
													{/if}
												{/if}
												{if $dataProduct[dataProduct].qty >= 1}
													<button class="cusmo-btn add-button" style="float:right;" type="submit">add to cart</a>
												{else}
													<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
												{/if}
											</div>
											<br>
										</div>
										</form>
								{/section}
							</div>
							<br>
							<div class="pagination">{$pageLink}</div>
						</div>
					
					{elseif $module == 'product' AND $act == 'subcategory'}
						<div class="span9">
							<div id="grid-view" class="products-grid products-holder active tab-pane">
								
								{if $numsProducts == '0'}
									Tidak ada produk dalam kategori ini
								{/if}
								{section name=dataProduct loop=$dataProduct}
									{if $dataProduct[dataProduct].i == '1'}
										<div class="row-fluid">
									{/if}
									<div class="span4">
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="{$dataProduct[dataProduct].productID}">
										<input type="hidden" name="productSeo" value="{$dataProduct[dataProduct].productSeo}">
										<input type="hidden" name="buyPrice" value="{$dataProduct[dataProduct].buyPrice}">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div {if $dataProduct[dataProduct].qty <= 1}class="product-item2"{else}class="product-item"{/if}>
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											{if $dataProduct[dataProduct].qty < 1}
												<div class="dot-badge dark">
													EMPTY 
												</div>
											{elseif $dataProduct[dataProduct].qty == '1'}
												<div class="dot-badge red" style="width: 70px;">
													LAST STOCK
												</div>
											{/if}
											<a href="product-{$dataProduct[dataProduct].productID}-{$dataProduct[dataProduct].productSeo}.html">
												<img alt="" src="images/products/thumb/small_{$dataProduct[dataProduct].image1}" />
												<h1>{$dataProduct[dataProduct].productName}</h1>
											</a>
											<div class="tag-line">
	                                            {$dataProduct[dataProduct].description}
	                                        </div>
											<div class="price">
												{if $sessLevel == '2'}
													Rp. {$dataProduct[dataProduct].resellerPriceRp}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].resellerPrice}">
												{elseif $sessLevel == '3'}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].specialPrice}">
													Rp. {$dataProduct[dataProduct].specialPriceRp}
												{else}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].salePrice}">
													<input type="hidden" name="discountPrice" value="{$dataProduct[dataProduct].discountPrice}">
													{if $dataProduct[dataProduct].discountPrice > 0}
														<s>Rp. {$dataProduct[dataProduct].salePriceRp}</s><br>
														Rp. {$dataProduct[dataProduct].discountPriceRp}
													{else}
														Rp. {$dataProduct[dataProduct].salePriceRp}
													{/if}
												{/if}
											</div>
											{if $dataProduct[dataProduct].qty >= 1}
												<button class="cusmo-btn add-button" type="submit">add to cart</a>
											{else}
												<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
											{/if}
										</div>
										</form>
									</div>
									{if $dataProduct[dataProduct].i == '3'}
										</div>
									{/if}	
								{/section}
							</div>
							<br>
							<div class="pagination">{$pageLink}</div>
						</div>
					
					{elseif $module == 'product' AND $act == 'subcategorylist'}
						<div class="span9">
							<div id="list-view" class="products-list products-holder active tab-pane">
								
								{if $numsProducts == '0'}
									Tidak ada produk dalam kategori ini
								{/if}
								{section name=dataProduct loop=$dataProduct}
									
										<form method="POST" action="cart.php?mod=cart&act=input">
										<input type="hidden" name="productID" value="{$dataProduct[dataProduct].productID}">
										<input type="hidden" name="productSeo" value="{$dataProduct[dataProduct].productSeo}">
										<input type="hidden" name="buyPrice" value="{$dataProduct[dataProduct].buyPrice}">
										<input id="qty" type="hidden" name="qty" size="2" value="1" />
										<div class="list-item" style="padding: 10px; border-bottom: 1px dotted #CCC;">
											<!--<div class="dot-badge red">
												hot 
											</div>
											<div class="dot-badge yellow">
												new 
											</div>-->
											
											<a href="product-{$dataProduct[dataProduct].productID}-{$dataProduct[dataProduct].productSeo}.html">
												<h1>{$dataProduct[dataProduct].productName}</h1>
											</a>
											<div class="tag-line">
	                                            {$dataProduct[dataProduct].description}
	                                            
	                                            {if $dataProduct[dataProduct].qty < 1}
													EMPTY 
												{elseif $dataProduct[dataProduct].qty == '1'}
													LAST STOCK
												{/if}
	                                        </div>
											<div class="price">
												{if $sessLevel == '2'}
													Rp. {$dataProduct[dataProduct].resellerPriceRp}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].resellerPrice}">
												{elseif $sessLevel == '3'}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].specialPrice}">
													Rp. {$dataProduct[dataProduct].specialPriceRp}
												{else}
													<input type="hidden" name="salePrice" value="{$dataProduct[dataProduct].salePrice}">
													<input type="hidden" name="discountPrice" value="{$dataProduct[dataProduct].discountPrice}">
													{if $dataProduct[dataProduct].discountPrice > 0}
														<s>Rp. {$dataProduct[dataProduct].salePriceRp}</s>
														Rp. {$dataProduct[dataProduct].discountPriceRp}
													{else}
														Rp. {$dataProduct[dataProduct].salePriceRp}
													{/if}
												{/if}
												{if $dataProduct[dataProduct].qty >= 1}
													<button class="cusmo-btn add-button" style="float:right;" type="submit">add to cart</a>
												{else}
													<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
												{/if}
											</div>
											<br>
										</div>
										</form>
								{/section}
							</div>
							<br>
							<div class="pagination">{$pageLink}</div>
						</div>
						
					{elseif $module == 'product' AND $act == 'detail'}
						<div class="span9">
							<div class="page-content">
								{if $msgEmail == '1'}
									<p style="color: green;">Anda telah sukses mendaftarkan layanan request qty untuk ketersediaan produk ini.</p>
								{/if}
								{if $msgEmail == '2'}
									<p style="color: red;">Email Anda sudah terdaftar untuk request qty produk ini.</p>
								{/if}
								<div class="products-page-head">
									<h1>{$productName}</h1><br>
								</div>
								<p>&nbsp;</p>
								<div class="row-fluid">
									<div class="span7">
										<div class="flexslider product-gallery">
											<ul class="slides">
												{if $image1 != ""}
													<li data-thumb="images/products/thumb/small_{$image1}">
														<img alt="" src="images/products/{$image1}" />
													</li>
												{/if}
												{if $image2 != ""}
													<li data-thumb="images/products/thumb/small_{$image2}">
														<img alt="" src="images/products/{$image2}" />
													</li>
												{/if}
												{if $image3 != ""}
													<li data-thumb="images/products/thumb/small_{$image3}">
														<img alt="" src="images/products/{$image3}" />
													</li>
												{/if}
												{if $image4 != ""}
													<li data-thumb="images/products/thumb/small_{$image4}">
														<img alt="" src="images/products/{$image4}" />
													</li>
												{/if}
												{if $image5 != ""}
													<li data-thumb="images/products/thumb/small_{$image5}">
														<img alt="" src="images/products/{$image5}" />
													</li>
												{/if}
												{if $image6 != ""}
													<li data-thumb="images/products/thumb/small_{$image6}">
														<img alt="" src="images/products/{$image6}" />
													</li>
												{/if}
											</ul>
										</div>
									</div>
									<form method="POST" action="cart.php?mod=cart&act=input">
									<input type="hidden" name="productID" value="{$productID}">
									<input type="hidden" name="productSeo" value="{$productSeo}">
									<input type="hidden" name="buyPrice" value="{$buyPrice}">
									<div class="span5">
										<div class="product-info-box">
											<div class="info-holder">
												<h4>Product ID: 6254362</h4>
												<div class="fb-like" data-href="http://Anaku.com/product-{$productID}-{$productSeo}.html" data-width="100%" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
											</div>
											<hr>
											<div class="info-holder">
												<p>
												Ukuran : {$ukuran} S M L X XXL <br>
												<!-- Volume : {$volume} ML<br>
												Kadar Alkohol : {$alcohol} %<br> -->
												Berat : {$weight} Kg<br>
												Stok : {if $stock > 0}Ready Stock{else}Stok Kosong{/if}<br>
												Vintage : {$vintage}<br>
												Country : {$country}<br>
												Point Reward : {$point} 
												<a href="#" class="tooltip2"><img src="images/icon/help.png">
													<span>
												        <img class="callout" src="images/icon/callout.gif" />
												        <strong>Point Reward yang Anda dapatkan dapat ditukarkan dengan kupon belanja!</strong>
												    </span></a>
												</p>
											</div>
											{if $stock >= 1}
												<div class="drop-downs-holder">
													
													<div class="drop-selector">
														<span>amount</span>
														<select class="chosen-select" name="qty">
															{section name=qty loop=$qty}
																<option value="{$qty[qty]}">{$qty[qty]}</option>
															{/section}
														</select>
													</div>
												</div>
											{/if}
											<hr>
											<div class="price-holder">
												<div class="price">
													{if $sessLevel == '2'}
														Rp. {$resellerPriceRp}
														<input type="hidden" name="salePrice" value="{$resellerPrice}">
													{elseif $sessLevel == '3'}
														<input type="hidden" name="salePrice" value="{$specialPrice}">
														Rp. {$specialPriceRp}
													{else}
														<input type="hidden" name="salePrice" value="{$salePrice}">
														<input type="hidden" name="discountPrice" value="{$discountPrice}">
														{if $discountPrice > 0}
															<span>Rp. {$discountPriceRp}</span><br>
															<span class="old">Rp. {$salePriceRp}</span>
														{else}
															Rp. {$salePriceRp}
														{/if}
													{/if}
												</div>
											</div>
											<div class="buttons-holder">
												{if $stock >= 1}
													<button class="cusmo-btn add-button" type="submit">add to cart</button>
												{else}
													<p>
														<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
													</p>
												{/if}
											</div>
											<!--{if $stock <= 1}
												<hr>
												<div class="drop-downs-holder">
													
													<div class="drop-selector">
														<a class="various2 fancybox.iframe" data-width="520" data-height="280" href="email.php?mod=tell&act=me&productID={$productID}"><button class="cusmo-btngreen add-button" type="submit">Request Order</button></a>
													</div>
												</div>
											{/if}-->
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
											<p>{$description}</p><br>
											<h4>Komentar untuk Produk Ini :</h4><br>
											<div class="fb-comments" data-href="http://Anaku.com/product-{$productID}-{$productSeo}.html" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
										</div>
										
										<!--<div id="reviews" class=" tab-pane ">
											<div class="fb-comments" data-href="http://Anaku.com/product-{$productID}-{$productSeo}.html" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
										</div>-->
									</div>
								</div>
								
								<div class="middle-header-holder">
									<div class="middle-header">Produk Terkait</div>
								</div>
								
								<div class="products-holder related-products">
									<div class="row-fluid">
										{section name=dataRelated loop=$dataRelated}
											<div class="span4">
												<form method="POST" action="cart.php?mod=cart&act=input">
												<input type="hidden" name="productID" value="{$dataRelated[dataRelated].productID}">
												<input type="hidden" name="productSeo" value="{$dataRelated[dataRelated].productSeo}">
												<input type="hidden" name="salePrice" value="{$dataRelated[dataRelated].salePrice}">
												<input type="hidden" name="buyPrice" value="{$dataRelated[dataRelated].buyPrice}">
												<input type="hidden" name="discountPrice" value="{$dataRelated[dataRelated].discountPrice}">
												<input id="qty" type="hidden" name="qty" size="2" value="1" />
												<div class="product-item">
													<a href="product-{$dataRelated[dataRelated].productID}-{$dataRelated[dataRelated].productSeo}.html"><img alt="" src="images/products/thumb/small_{$dataRelated[dataRelated].image1}" /></a>
													<h1><a href="product-{$dataRelated[dataRelated].productID}-{$dataRelated[dataRelated].productSeo}.html">{$dataRelated[dataRelated].productName}</a></h1>
													<div class="price">
														{if $sessLevel == '2'}
															Rp. {$dataRelated[dataRelated].resellerPriceRp}
															<input type="hidden" name="salePrice" value="{$dataRelated[dataRelated].resellerPrice}">
														{elseif $sessLevel == '3'}
															<input type="hidden" name="salePrice" value="{$dataRelated[dataRelated].specialPrice}">
															Rp. {$dataRelated[dataRelated].specialPriceRp}
														{else}
															<input type="hidden" name="salePrice" value="{$dataRelated[dataRelated].salePrice}">
															<input type="hidden" name="discountPrice" value="{$dataRelated[dataRelated].discountPrice}">
															{if $dataRelated[dataRelated].discountPrice > 0}
																<s>Rp. {$dataRelated[dataRelated].salePriceRp}</s><br>
																Rp. {$dataRelated[dataRelated].discountPriceRp}
															{else}
																Rp. {$dataRelated[dataRelated].salePriceRp}
															{/if}
														{/if}
													</div>
													<button class="cusmo-btn add-button" type="submit">add to cart</a>
												</div>
												</form>
											</div>
										{/section}
									</div>
								</div>
							</div>
						</div>
					{/if}
				</div>
			</div>
		</section>
	{/if}

{include file="footer.tpl"}