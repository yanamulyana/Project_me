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
					<li class="active">Login to your account</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			<div class="phase-title current">
				<h1>LOGIN / SIGN IN</h1>
			</div>
			
			<div class="row-fluid">
				<div class="span6">
					<div class="form-holder right-border">
						<center>
						<h4>Login menggunakan facebook</h4>
						<p>
							Gratis, cepat, dan mudah
						</p>
						
						<div class="control-group">
							<div class="controls">
								<a href="#" onclick="connect_fb();"><img src="images/facebook.jpg"></a>
							</div>
						</div>
						</center>
					</div>
				</div>
				<div class="span6">
					<div class="form-holder">
						{if $msg == '1'}
							<p style="color: red;">Kami tidak dapat menemukan email dan password Anda</p>
						{/if}
						{if $msg == '2'}
							<p style="color: red;">Anda belum memverifikasi akun Anda, kirim ulang email verifikasi? Klik <a href="resend-email.html"><b>disini</b></a></p><br>
						{/if}
						<h4>Login Manual</h4>
						<p>
							Masuk menggunakan email dan password.
						</p>
						<form action="sign_in.php?mod=sign_in&act=input" method="POST">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Email</div>
									<input type="email" name="email" class="required span12 cusmo-input" required>
								</div>
							</div>
							
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Password</div>
									<input type="password" name="password" class="required span12 cusmo-input" required />
								</div>
							</div>
							<button class="cusmo-btn narrow pull-right" type="submit">Log in</button>
						</form>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<p>&nbsp;</p>
					<p><center>Lupa password? Klik <a href="forgot-password.html"><b>disini</b></a></center></p>
					<p><center>Ada belum menjadi member Anaku.com? Silahkan sign up <a href="sign-up.html"><b>disini</b></a> dan nikmati beberapa keuntungan lainnya.</center></p>
				</div>
			</div>
		</div>
	</section>

	<!--{include file="partner.tpl"}-->

{include file="footer.tpl"}