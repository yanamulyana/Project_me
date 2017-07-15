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
					<li class="active">History Belanja</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			
			{if $module == 'testimonial' AND $act == 'add'}
				<div class="phase-title current">
					<h1>HISTORY BELANJA</h1>
				</div>
				<p>&nbsp;</p>
				<div class="row-fluid">
					<div class="span12">
						<h4>TESTIMONIAL</h4>
						<form method="POST" action="testimonial.php?mod=testimonial&act=input">
						<input type="hidden" name="fullName" value="{$fullName}">
						<input type="hidden" name="orderID" value="{$orderID}">
						<table class="table">
							<tbody>
								<tr>
									<td class="span2">Tanggal</td>
									<td class="span10">{$createdDate}</td>
								</tr>
								<tr>
									<td class="span2">Invoice</td>
									<td class="span10">{$invoiceID}</td>
								</tr>
								<tr>
									<td class="span2" style="background: #efefef;">Testimonial</td>
									<td class="span10" style="background: #efefef;"><textarea id="testimonial" name="testimonial" rows="5" cols="5" placeholder="Masukkan testimonial disini" class="required span12" required></textarea></td>
								</tr>
							</tbody>
						</table>
						<center><input class="submit cusmo-btn narrow" type="submit" value="SIMPAN" /></center>
						</form>
					</div>
				</div>
			
			{elseif $module == 'testimonial' AND $act == 'show'}
				<div class="phase-title current">
					<h1>TESTIMONIAL</h1>
				</div>
				<p>&nbsp;</p>
				<div class="row-fluid">
					<div class="span12">
						{section name=dataTestimonial loop=$dataTestimonial}
							<p style="border-bottom: 1px solid #CCC;">
								<b>{$dataTestimonial[dataTestimonial].fullName}</b> - {$dataTestimonial[dataTestimonial].createdDate}<br>
								{$dataTestimonial[dataTestimonial].testimonial}
							</p>
						{/section}
						<br>
						<div class="pagination">{$pageLink}</div>
					</div>
				</div>
			{/if}
		</div>
	</section>

{include file="footer.tpl"}