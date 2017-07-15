{include file="header.tpl"}

{literal}
	<script>
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
		}
		
		$(document).ready(function(){
			$("#provinceID").change(function(){
				var provinceID = $("#provinceID").val();
				$.ajax({
					url: "get_cities.php",
					data: "provinceID="+provinceID,
					cache: false,
					success: function(msg){
						$("#cityID").html(msg);
					}
				});
			});
		});
	</script>
{/literal}

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
					<li class="active">Daftar / Register / Sign Up</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			{if $module == 'sign_up' AND $act == 'verification'}
				<div class="phase-title current">
					<h1>DAFTAR / REGISTER</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="form-holder">
							<h4>Registrasi Berhasil</h4>
							<p>Terima kasih atas kepercayaan Anda bergabung sebagai member di Anaku.com<br>Akun Anda belum aktif, Silahkan cek inbox (kotak masuk) atau SPAM email Anda untuk melakukan aktivasi akun Anda</p>
							<p><a href="home">Kembali ke halaman utama</a></p>
						</div>
					</div>
				</div>
			{else}
				<div class="phase-title current">
					<h1>DAFTAR / REGISTER</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="form-holder">
						<p style="text-align: center;">
							Untuk mempermudah pendaftaran ataupun proses sign in, Anda juga bisa menggunakan akun Facebook Anda.<br>
							<a href="#" onclick="connect_fb();"><img src="images/facebook.png" width="200"></a>
						</p>
						
						{if $msg == '1'}
							<p style="color: red;">Password dan Konfirmasi Password harus sama.</p>
						{/if}
						{if $msg == '2'}
							<p style="color: red;">Cek kembali email Anda, email sudah terdaftar di database kami.</p>
						{/if}
						<form action="sign_up.php?mod=sign_up&act=input" method="POST">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Email</div>
									<input type="email" id="email" value="{$sessSignEmail}" name="email" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Handphone</div>
									<input type="text" id="cellPhone" value="{$sessSignCellPhone}" name="cellPhone" placeholder="Number only" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Password</div>
									<input id="password" type="password" name="password" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Konfirmasi Password</div>
									<input id="confirmPassword" type="password" name="confirmPassword" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">SUBMIT</button></center>
							</div>
						</form>
					</div>
				</div>
			{/if}
		</div>
	</section>

	<!--{include file="partner.tpl"}-->

{include file="footer.tpl"}