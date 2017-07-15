<?php /* Smarty version Smarty-3.1.11, created on 2017-06-17 17:51:00
         compiled from ".\templates\sign_up.tpl" */ ?>
<?php /*%%SmartyHeaderCode:814559450994846f18-31497426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84e60871505b643430d854551b684099820e1eb3' => 
    array (
      0 => '.\\templates\\sign_up.tpl',
      1 => 1497216731,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '814559450994846f18-31497426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'msg' => 0,
    'sessSignEmail' => 0,
    'sessSignCellPhone' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_594509949012c8_64557073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_594509949012c8_64557073')) {function content_594509949012c8_64557073($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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


<div class="wrapper">
	<section class="section-head">
		<div class="container">
			<div class="row-fluid top-row">
				<div class="span5">
					
					<?php echo $_smarty_tpl->getSubTemplate ("logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					
				</div>
				
				<div class="span7">
					<?php echo $_smarty_tpl->getSubTemplate ("topnavigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			</div>
		</div>
		
		<div class="top-categories">
			<div class="container">
				<div class="row-fluid">
					<div class="span9">
						<?php echo $_smarty_tpl->getSubTemplate ("categoriesnavigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			<?php if ($_smarty_tpl->tpl_vars['module']->value=='sign_up'&&$_smarty_tpl->tpl_vars['act']->value=='verification'){?>
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
			<?php }else{ ?>
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
						
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
							<p style="color: red;">Password dan Konfirmasi Password harus sama.</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
							<p style="color: red;">Cek kembali email Anda, email sudah terdaftar di database kami.</p>
						<?php }?>
						<form action="sign_up.php?mod=sign_up&act=input" method="POST">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Email</div>
									<input type="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['sessSignEmail']->value;?>
" name="email" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Handphone</div>
									<input type="text" id="cellPhone" value="<?php echo $_smarty_tpl->tpl_vars['sessSignCellPhone']->value;?>
" name="cellPhone" placeholder="Number only" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" required />
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
			<?php }?>
		</div>
	</section>

	<!--<?php echo $_smarty_tpl->getSubTemplate ("partner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
-->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>