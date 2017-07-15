{if $sessCart == '1' || $sessCart == '2'}
	{literal}
	<script>
	$(function() {
	    // setTimeout() function will be fired after page is loaded
	    // it will wait for 5 sec. and then will fire
	    // $("#successMessage").hide() function
	    setTimeout(function() {
	        $("#successMessage").hide('blind', {}, 500)
	    }, 3000);
	});
	</script>
	{/literal}
	
{/if}

<div class="top-menu cart-menu">
	<ul class="inline">
		{if $sessMemberID != "" AND $sessEmail != ""}
			
			<li>Welcome, {$sessFirstName} {$sessLastName}</li>
		
			<li><a href="myaccount.html">Akun Saya</a></li>
			<li>
				<a href="orderhistory-1.html">History Belanja</a>
			</li>
			

			<li><a href="logout.php">Logout</a></li>
		{else}
			<li><a href="sign-in.html">login</a></li>
			<li><a href="sign-up.html">register</a></li>
		{/if}
		<li>
			<div class="basket">
				<div class="basket-item-count">
					{if $numsSum == ""}
						0
					{else}
						{$numsSum}
					{/if}
				</div>
				<div class="total-price-basket">
					{if $navGrandtotal > 0}
						{$navGrandtotalRp}
					{else}
						0
					{/if}
				</div>
				
				{if $sessCart == '2' || $sessCart == '1'}
					<div class="dropdown open">
				{else}
					<div class="dropdown">
				{/if}
					<a class="dropdown-toggle" data-hover="dropdown" href="#">
						<img alt="basket" src="images/icon-basket.png" />
					</a>
					<ul class="dropdown-menu">
						{if $sessCart == '1'}
							<div id="successMessage" style="text-align: center; color: red;">Kuantiti produk gagal ditambahkan, stok produk tidak cukup</div>
						{elseif $sessCart == '2'}
							<div id="successMessage" style="text-align: center; color: red;">Produk berhasil ditambahkan!</div>
						{/if}
						{section name=dataNavCart loop=$dataNavCart}
						<li>
							<div class="basket-item">
								<div class="row-fluid">
									<div class="span4">
										<div class="thumb">
											<img alt="" src="images/products/thumb/small_{$dataNavCart[dataNavCart].image}" />
										</div>
									</div>
									<div class="span8">
										<div class="title">{$dataNavCart[dataNavCart].productName}</div>
										<div class="price">Rp. {$dataNavCart[dataNavCart].priceRp} x {$dataNavCart[dataNavCart].qty}</div>
									</div>
								</div>
								<!--<a class="close-btn" href="#"></a>-->
							</div>
						</li>
						{/section}
						<li class="checkout">
							<a href="checkout.html" class="cusmo-btn">checkout</a>
						</li>
					</ul>
				</div>
			</div>
		</li>
	</ul>
</div>