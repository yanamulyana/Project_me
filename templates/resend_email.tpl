{include file="header.tpl"}

<div class="wrapper">
	<section class="section-head">
		<div class="container">
			<div class="row-fluid top-row">
				<div class="span4">
					
					{include file="logo.tpl"}
					
				</div>
				
				<div class="span8">
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
					<li class="active">Kirim Ulang Email Aktifasi</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container" style="border: 1px solid #e4e4e4;">
			<div class="phase-title current">
				<h1>Kirim Ulang Email Verifikasi</h1>
			</div>
			
			<div class="row-fluid">
				<div class="span12">
					<div class="form-holder">
						{if $sessResend == '1'}
							<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
								Email Anda berhasil dikirimkan, silahkan cek inbox atau SPAM email Anda.
							</div><br>
								
						{/if}
						{if $sessResend == '2'}
							<div style="background: red; color: white; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
								<b>Email Anda sudah aktif sebelumnya, silahkan login <a href="sign-in.html">disini</a></b>
							</div><br>
							
						{/if}
						{if $sessResend == '3'}
							<div style="background: red; color: white; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
								<b>Kami tidak dapat menemukan email dan password Anda, periksa kembali penulisan email Anda atau klik <a href="sign-up.html">disini</a> jika Anda belum register sebelumnya.</b>
							</div><br>
						{/if}
						<h4>Masukkan Email Anda</h4>
						<form action="resend_email.php?mod=resend&act=verification" method="POST">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Email</div>
									<input type="email" name="email" class="required span12 cusmo-input" required>
								</div>
							</div>
							
							<button class="cusmo-btn narrow pull-right" type="submit">Resend Email</button>
						</form>
					</div>
				</div>
			</div><br>
		</div>
	</section>

	<!--{include file="partner.tpl"}-->

{include file="footer.tpl"}