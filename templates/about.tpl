{include file="header.tpl"}

<div class="wrapper">
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
				<h1>{$pageTitle}</h1>
			</div>
			
			<div class="row-fluid">
				<div class="span12" style="text-align: justify;">
					<center><p style="padding: 10px;">{if $image != ''}<img src="images/profile/{$image}">{/if}</p></center>
					{$description}
					<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</section>

	{include file="partner.tpl"}

{include file="footer.tpl"}