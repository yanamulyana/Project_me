{include file="header.tpl"}

<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>

<!--<style>
	#popup{
		display: none;
	}
</style>
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
{if $msgNewsletter == '1'}
	{literal}
		<script>alert('Email Anda berhasil tersimpan dalam newsletter');</script>
	{/literal}
{/if}

<div class="container">


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
	</section>
	
	<section id="home" class="home-slider">
		<div class="container">
			<div class="flexslider">
				
				{include file="slider.tpl"}
				
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
						{section name=dataNewProduct loop=$dataNewProduct}
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="{$dataNewProduct[dataNewProduct].productID}">
							<input type="hidden" name="productSeo" value="{$dataNewProduct[dataNewProduct].productSeo}">
							<input type="hidden" name="buyPrice" value="{$dataNewProduct[dataNewProduct].buyPrice}">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div {if $dataNewProduct[dataNewProduct].qty < 1}class="product-item2"{else}class="product-item"{/if}>
								{if $dataNewProduct[dataNewProduct].qty < 1}
									<div class="dot-badge dark">
										EMPTY 
									</div>
								{elseif $dataNewProduct[dataNewProduct].qty == '1'}
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK 
									</div>
								{/if}
								<a href="product-{$dataNewProduct[dataNewProduct].productID}-{$dataNewProduct[dataNewProduct].productSeo}.html">
									<img alt="" src="images/products/thumb/small_{$dataNewProduct[dataNewProduct].image1}" />
									<h1>{$dataNewProduct[dataNewProduct].productName}</h1>
								</a>
								<div class="price">
									{if $sessLevel == '2'}
										Rp. {$dataNewProduct[dataNewProduct].resellerPriceRp}
										<input type="hidden" name="salePrice" value="{$dataNewProduct[dataNewProduct].resellerPrice}">
									{elseif $sessLevel == '3'}
										<input type="hidden" name="salePrice" value="{$dataNewProduct[dataNewProduct].specialPrice}">
										Rp. {$dataNewProduct[dataNewProduct].specialPriceRp}
									{else}
										<input type="hidden" name="salePrice" value="{$dataNewProduct[dataNewProduct].salePrice}">
										<input type="hidden" name="discountPrice" value="{$dataNewProduct[dataNewProduct].discountPrice}">
										{if $dataNewProduct[dataNewProduct].discountPrice > 0}
											<s>Rp. {$dataNewProduct[dataNewProduct].salePriceRp}</s><br>
											Rp. {$dataNewProduct[dataNewProduct].discountPriceRp}
										{else}
											Rp. {$dataNewProduct[dataNewProduct].salePriceRp}
										{/if}
									{/if}
								</div>
								{if $dataNewProduct[dataNewProduct].qty >= 1}
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								{else}
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								{/if}
							</div>
							</form>
						</div>
						{/section}
					</div>
					<div class="row-fluid">
						{section name=dataNewProduct2 loop=$dataNewProduct2}
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="{$dataNewProduct2[dataNewProduct2].productID}">
							<input type="hidden" name="productSeo" value="{$dataNewProduct2[dataNewProduct2].productSeo}">
							<input type="hidden" name="buyPrice" value="{$dataNewProduct2[dataNewProduct2].buyPrice}">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div {if $dataNewProduct2[dataNewProduct2].qty < 1}class="product-item2"{else}class="product-item"{/if}>
								{if $dataNewProduct2[dataNewProduct2].qty < 1}
									<div class="dot-badge dark">
										EMPTY 
									</div>
								{elseif $dataNewProduct2[dataNewProduct2].qty == '1'}
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK 
									</div>
								{/if}
								<a href="product-{$dataNewProduct2[dataNewProduct2].productID}-{$dataNewProduct2[dataNewProduct2].productSeo}.html">
									<img alt="" src="images/products/thumb/small_{$dataNewProduct2[dataNewProduct2].image1}" />
									<h1>{$dataNewProduct2[dataNewProduct2].productName}</h1>
								</a>
								<div class="price">
									{if $sessLevel == '2'}
										Rp. {$dataNewProduct2[dataNewProduct2].resellerPriceRp}
										<input type="hidden" name="salePrice" value="{$dataNewProduct2[dataNewProduct2].resellerPrice}">
									{elseif $sessLevel == '3'}
										<input type="hidden" name="salePrice" value="{$dataNewProduct2[dataNewProduct2].specialPrice}">
										Rp. {$dataNewProduct2[dataNewProduct2].specialPriceRp}
									{else}
										<input type="hidden" name="salePrice" value="{$dataNewProduct2[dataNewProduct2].salePrice}">
										<input type="hidden" name="discountPrice" value="{$dataNewProduct2[dataNewProduct2].discountPrice}">
										{if $dataNewProduct2[dataNewProduct2].discountPrice > 0}
											<s>Rp. {$dataNewProduct2[dataNewProduct2].salePriceRp}</s><br>
											Rp. {$dataNewProduct2[dataNewProduct2].discountPriceRp}
										{else}
											Rp. {$dataNewProduct2[dataNewProduct2].salePriceRp}
										{/if}
									{/if}
								</div>
								{if $dataNewProduct2[dataNewProduct2].qty >= 1}
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								{else}
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								{/if}
							</div>
							</form>
						</div>
						{/section}
					</div>
				</div>
			</div>
			
			<div id="best-sellers" class="products-holder tab-pane">
				<div class="row-fluid">
					{section name=dataBestProduct loop=$dataBestProduct}
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="{$dataBestProduct[dataBestProduct].productID}">
							<input type="hidden" name="productSeo" value="{$dataBestProduct[dataBestProduct].productSeo}">
							<input type="hidden" name="buyPrice" value="{$dataBestProduct[dataBestProduct].buyPrice}">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div {if $dataBestProduct[dataBestProduct].qty < 1}class="product-item2"{else}class="product-item"{/if}>
								{if $dataBestProduct[dataBestProduct].qty < 1}
									<div class="dot-badge dark">
										EMPTY 
									</div>
								{elseif $dataBestProduct[dataBestProduct].qty == '1'}
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK
									</div>
								{/if}
								<a href="product-{$dataBestProduct[dataBestProduct].productID}-{$dataBestProduct[dataBestProduct].productSeo}.html">
									<img alt="" src="images/products/thumb/small_{$dataBestProduct[dataBestProduct].image1}" />
									<h1>{$dataBestProduct[dataBestProduct].productName}</h1>
								</a>
								<div class="price">
									{if $sessLevel == '2'}
										Rp. {$dataBestProduct[dataBestProduct].resellerPriceRp}
										<input type="hidden" name="salePrice" value="{$dataBestProduct[dataBestProduct].resellerPrice}">
									{elseif $sessLevel == '3'}
										<input type="hidden" name="salePrice" value="{$dataBestProduct[dataBestProduct].specialPrice}">
										Rp. {$dataBestProduct[dataBestProduct].specialPriceRp}
									{else}
										<input type="hidden" name="salePrice" value="{$dataBestProduct[dataBestProduct].salePrice}">
										<input type="hidden" name="discountPrice" value="{$dataBestProduct[dataBestProduct].discountPrice}">
										{if $dataBestProduct[dataBestProduct].discountPrice > 0}
											<s>Rp. {$dataBestProduct[dataBestProduct].salePriceRp}</s><br>
											Rp. {$dataBestProduct[dataBestProduct].discountPriceRp}
										{else}
											Rp. {$dataBestProduct[dataBestProduct].salePriceRp}
										{/if}
									{/if}
								</div>
								{if $dataBestProduct[dataBestProduct].qty >= 1}
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								{else}
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								{/if}
							</div>
							</form>
						</div>
					{/section}
				</div>
				<div class="row-fluid">
					{section name=dataBestProduct2 loop=$dataBestProduct2}
						<div class="span3">
							<form method="POST" action="cart.php?mod=cart&act=input">
							<input type="hidden" name="productID" value="{$dataBestProduct2[dataBestProduct2].productID}">
							<input type="hidden" name="productSeo" value="{$dataBestProduct2[dataBestProduct2].productSeo}">
							<input type="hidden" name="buyPrice" value="{$dataBestProduct2[dataBestProduct2].buyPrice}">
							<input id="qty" type="hidden" name="qty" size="2" value="1" />
							<div {if $dataBestProduct2[dataBestProduct2].qty < 1}class="product-item2"{else}class="product-item"{/if}>
								{if $dataBestProduct2[dataBestProduct2].qty < 1}
									<div class="dot-badge dark">
										EMPTY 
									</div>
								{elseif $dataBestProduct2[dataBestProduct2].qty == '2'}
									<div class="dot-badge red" style="width: 70px;">
										LAST STOCK
									</div>
								{/if}
								<a href="product-{$dataBestProduct2[dataBestProduct2].productID}-{$dataBestProduct2[dataBestProduct2].productSeo}.html">
									<img alt="" src="images/products/thumb/small_{$dataBestProduct2[dataBestProduct2].image1}" />
									<h1>{$dataBestProduct2[dataBestProduct2].productName}</h1>
								</a>
								<div class="price">
									{if $sessLevel == '2'}
										Rp. {$dataBestProduct2[dataBestProduct2].resellerPriceRp}
										<input type="hidden" name="salePrice" value="{$dataBestProduct2[dataBestProduct2].resellerPrice}">
									{elseif $sessLevel == '3'}
										<input type="hidden" name="salePrice" value="{$dataBestProduct2[dataBestProduct2].specialPrice}">
										Rp. {$dataBestProduct2[dataBestProduct2].specialPriceRp}
									{else}
										<input type="hidden" name="salePrice" value="{$dataBestProduct2[dataBestProduct2].salePrice}">
										<input type="hidden" name="discountPrice" value="{$dataBestProduct2[dataBestProduct2].discountPrice}">
										{if $dataBestProduct2[dataBestProduct2].discountPrice > 0}
											<s>Rp. {$dataBestProduct2[dataBestProduct2].salePriceRp}</s><br>
											Rp. {$dataBestProduct2[dataBestProduct2].discountPriceRp}
										{else}
											Rp. {$dataBestProduct2[dataBestProduct2].salePriceRp}
										{/if}
									{/if}
								</div>
								{if $dataBestProduct2[dataBestProduct2].qty >= 1}
									<button class="cusmo-btn add-button" type="submit">add to cart</a>
								{else}
									<div class="cusmo-btn2 add-button">EMPTY STOCK</div>
								{/if}
							</div>
							</form>
						</div>
					{/section}
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

{include file="footer.tpl"}