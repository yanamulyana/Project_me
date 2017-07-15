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
					{if $module == 'password' AND $act == 'reset'}
						<li class="active">Reset Password</li>
					{else}
						<li class="active">Lupa Password</li>
					{/if}
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		{if $module == 'password' AND $act == 'success'}
			<div class="container" style="border: 1px solid #e4e4e4;">
				<div class="phase-title current">
					<h1>Reset Password Berhasil</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
							Password berhasil diubah.<br>
							<a href="sign-in.html"><input class="submit cusmo-btn narrow" type="button" value="SIGN IN" /></a>
						</div><br>
						<p><center>Harap perhatikan kerahasiaan password ini untuk menghindari penyalahgunaan.</center></p>
					</div>
				</div>
			</div>
		
		{elseif $module == 'password' AND $act == 'reset'}
			{if $numsMember == '0'}
				<div class="container" style="border: 1px solid #e4e4e4;">
					<div class="phase-title current">
						<h1>Password Expired</h1>
					</div>
					
					<div class="row-fluid">
						<div class="span12">
							{if $msg == '1'}
								<div style="background: red; color: white; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
									<b>Email tidak ditemukan.</b>
								</div><br>
							{/if}
							{if $msg == '2'}
								<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
									Reset password telah dikirimkan ke email Anda. Silahkan cek email Anda, dan klik tautan link yang telah dikirimkan untuk mereset password Anda.
								</div><br>
							{/if}
							<p><center>Link ini telah expire, silahkan lakukan reset password kembali melalui halaman <a href="forgot-password.html">Lupa Password</a>.</center></p>
						</div>
					</div>
				</div>
			{else}
				<div class="container" style="border: 1px solid #e4e4e4;">
					<div class="phase-title current">
						<h1>Reset Password</h1>
					</div>
					
					<div class="row-fluid">
						<div class="span12">
							{if $msg == '1'}
								<div style="background: red; color: white; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
									<b>Link expire, silahkan lakukan reset password kembali melalui halaman lupa password.</b>
								</div><br>
							{/if}
							{if $msg == '2'}
								<div style="background: red; color: white; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
									<b>Password baru dan konfirmasi password tidak sama.</b>
								</div><br>
							{/if}
							{if $msg == '3'}
								<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
									Password berhasil diubah.<br>
									<a href="sign-in.html"><input class="submit cusmo-btn narrow" type="button" value="SIGN IN" /></a>
								</div><br>
							{/if}
							<p><center>Harap perhatikan kerahasiaan password ini untuk menghindari penyalahgunaan.</center></p>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span12">
							<div class="contact-form-holder">
								<center>
									<form class="contact-form" method="POST" action="password.php?mod=password&act=update">
										<input type="hidden" name="email" value="{$email}">
										<input type="hidden" name="code" value="{$code}">
										<div class="control-group">
											<div class="controls">
												<label class="form-label">Password Baru</label>
												<input id="password" type="password" name="newPassword" style="width: 300px;" class="required cusmo-input span12" required>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<label class="form-label">Confirm Password Baru</label>
												<input id="password" type="password" name="confirmPassword" style="width: 300px;" class="required cusmo-input span12" required>
											</div>
										</div>
										<input class="submit cusmo-btn narrow" type="submit" value="UBAH PASSWORD" />
									</form>
								</center>
								<p>&nbsp;</p>
							</div>
						</div>
					</div>
				</div>
			{/if}
		{else}
			<div class="container" style="border: 1px solid #e4e4e4;">
				<div class="phase-title current">
					<h1>Pengiriman Ulang Password</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						{if $msg == '1'}
							<div style="background: red; color: white; text-align: center; padding: 10px; border: 1px solid #b8c97b;">
								<b>Email tidak ditemukan.</b>
							</div><br>
						{/if}
						{if $msg == '2'}
							<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
								Reset password telah dikirimkan ke email Anda. Silahkan cek email Anda, dan klik tautan link yang telah dikirimkan untuk mereset password Anda.
							</div><br>
						{/if}
						<p><center>Password akan dikirimkan ke email Anda. Harap perhatikan kerahasiaan password ini untuk menghindari penyalahgunaan.</center></p><br>
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="contact-form-holder">
							<center>
								<form class="contact-form" method="POST" action="password.php?mod=password&act=input">
									<div class="control-group">
										<div class="controls">
											Email : <input id="email" type="email" name="email" style="width: 300px;" class="required cusmo-input span12" required>
										</div>
									</div>
									<input class="submit cusmo-btn narrow" type="submit" value="RESET PASSWORD" />
								</form>
							</center>
							<p>&nbsp;</p>
						</div>
					</div>
				</div>
			</div>
		{/if}
	</section>

	<!--{include file="partner.tpl"}-->

{include file="footer.tpl"}