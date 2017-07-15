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
					<li class="active">Verifikasi Akun</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			{if $module == 'verification' AND $act == 'success'}
				<div class="phase-title current">
					<h1>VERIFIKASI BERHASIL</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="form-holder">
							<p>Terima kasih atas kepercayaan Anda bergabung sebagai member di Anaku.com<br>Saat ini akun Anda telah aktif dan dapat dipergunakan untuk login sebagai member.</p>
							<p><b><a href="sign-in.html">Mulai Login</a></b></p>
						</div>
					</div>
				</div>
			{elseif $module == 'verification' AND $act == 'failed'}
				<div class="phase-title current">
					<h1>VERIFIKASI GAGAL</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="form-holder">
							<p>Verifikasi Anda gagal, mungkin akun Anda sudah aktif atau akun Anda tidak ditemukan.</p>
							<p style="background: #ffbb00; color: #000; padding: 5px;">
								Anda memiliki pertanyaan? Ingin melakukan pemesanan melalui telepon? Customer Service Winespiritshoes.com senang membantu Anda.<br>
								Hubungi kami di {$profilePhone} atau email ke <a href="mailto: {$profileEmail}">{$profileEmail}</a>.
							</p>
						</div>
					</div>
				</div>
			{/if}
		</div>
	</section>

	{include file="partner.tpl"}

{include file="footer.tpl"}