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
					<li class="active">Hubungi Kami</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			<div class="phase-title current">
				<h1>Hubungi Kami</h1>
			</div>
			
			<div class="row-fluid">
				<div class="span12">
					{if $msg == '1'}
						<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
							Pesan telah terkirim, kami akan merespon pesan Anda dalam 3 x 24 jam
						</div><br>
					{/if}
					<p><b>Anaku.com</b>, kami bekerja keras dan berusaha untuk memberikan pelayanan yang terbaik dan apapun permintaan Anda,
					Kami akan berusaha melakukan yang terbaik untuk Anda. Jika Anda memerlukan saran produk atau hanya ingin melacak pesanan Anda, sangat
					mudah untuk berhubungan dan berbicara dengan salah satu tim kami. Tanggapan Anda sangat berharga bagi kami, jadi jika Anda memiliki komentar atau
					saran, kami juga akan senang mendengar dari Anda.</p><br>
				</div>
			</div>
			
			<div class="row-fluid">
				<div class="span6">
					<div class="contact-form-holder">
						<h4>leave message</h4>
						<div class="message-box"></div>
						
						<form class="contact-form" method="POST" action="contact.php?mod=contact&act=input">
							<div class="control-group inline-block span6">
								<div class="controls">
									<label class="form-label">Nama</label>
									<input id="name" type="text" name="name" size="25" class="required cusmo-input span12" required>
								</div>
							</div>
							
							<div class="control-group inline-block span6">
								<div class="controls">
									<label class="form-label">Email</label>
									<input id="email" type="email" name="email" class="required cusmo-input span12" required>
								</div>
							</div>
							
							<div class="control-group">
								<div class="controls">
									<label class="form-label">Subjek</label>
									<input id="subject" type="text" name="subject" class="required cusmo-input span12" required>
								</div>
							</div>
							
							<div class="control-group">
								<div class="controls">
									<label class="form-label">Pertanyaan</label>
									<textarea id="inquiry" name="inquiry" rows="5" cols="5" class="required span12 cusmo-input" required></textarea>
								</div>
							</div>
							
							<div class="text-right">
								<input class="submit cusmo-btn narrow" type="submit" value="KIRIM" />
							</div>
						</form>
						<p>&nbsp;</p>
					</div>
				</div>
				
				<div class="span6">
					<div class="contact-info-boxes">
						<h4>contact information</h4>
						<div class="row-fluid contact-info">
							<div class="span6">
								<p>
									{$profileCompanyName}<br>
									{$profileAddress}<br><br>
									<a class="email-link" href="mailto:{$profileEmail}">{$profileEmail}</a>
								</p>
							</div>
							<div class="span6">
								<p>
									<strong>Telp.</strong><br>
									{$profilePhone}
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

{include file="footer.tpl"}