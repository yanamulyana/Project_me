<?php /* Smarty version Smarty-3.1.11, created on 2017-06-16 13:01:10
         compiled from ".\templates\confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:756459437426f06ab5-99038563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6e942c8ef6cbfaa6de2568125f7dc759fb8e4c3' => 
    array (
      0 => '.\\templates\\confirm.tpl',
      1 => 1497216559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '756459437426f06ab5-99038563',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessMemberID' => 0,
    'sessEmail' => 0,
    'dataOrder' => 0,
    'msg' => 0,
    'dataInvoice' => 0,
    'dataBank' => 0,
    'default' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59437427115fa8_72907405',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59437427115fa8_72907405')) {function content_59437427115fa8_72907405($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link rel="stylesheet" href="adminweb/js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">


	<script>
		$(document).ready(function() {
			$( "#transferDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: 'c-1:c-0'
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
					<li class="active">Hubungi Kami</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
		
			<?php if ($_smarty_tpl->tpl_vars['sessMemberID']->value!=''&&$_smarty_tpl->tpl_vars['sessEmail']->value!=''){?>
		
				<div class="phase-title current">
					<h1>History Belanja</h1>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th class="span1">No.</th>
							<th class="span2">No Order</th>
							<th class="span2">Tanggal</th>
							<th class="span1">Jumlah</th>
							<th class="span2">Status</th>
							<th class="span1">Aksi</th>
							<th class="span2">Konfirmasi</th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['name'] = 'dataOrder';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataOrder']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total']);
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['no'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceID'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceDate'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['grandtotal'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['status'];?>
</td>
								<td><a href="history-<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['orderID'];?>
.html"><img src="images/icon/view.png" width="20" title="Lihat detil"></a></td>
								<td>
									<?php if ($_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['statusori']=='1'){?>
										<a href="confirm.html"><button style="background: #ffbb00; color: #FFF; padding: 5px; border: medium none; width: 100%;" type="button">Konfirmasi Pembayaran</button></a>
									<?php }elseif($_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['statusori']=='2'){?>
										Konfirmasi Berhasil
									<?php }elseif($_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['statusori']=='3'){?>
										<a href="finish.php?module=order&act=finish&orderID=<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceID'];?>
" onClick="return confirm('Anda yakin ingin konfirmasi pesanan selesai terhadap transaksi ini?')"><button style="background: green; color: #FFF; padding: 5px; border: medium none; width: 100%;" type="button">Pesanan Selesai</button></a>
									<?php }elseif($_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['statusori']=='4'){?>
										<?php if ($_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['numsTestimonial']=='0'){?>
											<a href="add-testimonial-<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['orderID'];?>
.html"><button style="background: #ffbb00; color: #FFF; padding: 5px; border: medium none; width: 100%;" type="button">Tambah Testimonial</button></a>
										<?php }?>
									<?php }?>
								</td>
							</tr>
						<?php endfor; endif; ?>
					</tbody>
				</table>
		
				<div class="phase-title current">
					<h1>Konfirmasi Pembayaran</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
							<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
								Konfirmasi pembayaran telah dikirim, kami akan segera merespon dan memproses pesanan Anda.
							</div><br>
						<?php }?>
						<p>Untuk memproses pemesanan selanjutnya, mohon konfirmasi pembayaran Anda dengan mengisi form konfirmasi pembayaran ini. Semua isian yang tersedia wajib diisi.
						Proses konfirmasi akan memakan waktu maksimal 1 hari kerja. <br>
						Untuk informasi lebih lanjut, silahkan kunjungi layanan konsumen kami <a href="contact-us.html"><u>www.Anaku.com/contact-us.html</u></a></p><br>
					</div>
				</div>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['sessMemberID']->value==''&&$_smarty_tpl->tpl_vars['sessEmail']->value==''){?>
				
				<center><p><b>Untuk melakukan / mengakses konfirmasi pembayaran, harap melakukan login terlebih dahulu!</b></p></center>
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
						<p><center>Ada belum menjadi member Anaku? Silahkan sign up <a href="sign-up.html"><b>disini</b></a> dan nikmati beberapa keuntungan lainnya.</center></p>
					</div>
				</div>
			
			<?php }else{ ?>
			
				<div class="row-fluid">
					<div class="span12">
						<div class="contact-form-holder">
							<div class="message-box"></div>
							
							<form method="POST" action="confirm.php?mod=confirm&act=input" enctype="multipart/form-data">
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">No Order</label>
										<select id="invoiceID" name="invoiceID" class="required cusmo-input span12" required>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['name'] = 'dataInvoice';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataInvoice']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInvoice']['total']);
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['dataInvoice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInvoice']['index']]['invoiceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataInvoice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInvoice']['index']]['grand'];?>
">Invoice: <?php echo $_smarty_tpl->tpl_vars['dataInvoice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInvoice']['index']]['invoiceID'];?>
 - Total: Rp. <?php echo $_smarty_tpl->tpl_vars['dataInvoice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInvoice']['index']]['grandtotal'];?>
 - Qty:  <?php echo $_smarty_tpl->tpl_vars['dataInvoice']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInvoice']['index']]['qty'];?>
</option>
											<?php endfor; endif; ?>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Bank Tujuan</label>
										<select id="bankTo" name="bankTo" class="required cusmo-input span12" required>
											<option value="">- Pilih Bank -</option>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['name'] = 'dataBank';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBank']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total']);
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['bankName'];?>
 No. Rek <?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountNo'];?>
 a/n <?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountName'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['bankName'];?>
 No. Rek <?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountNo'];?>
 a/n <?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountName'];?>
</option>
											<?php endfor; endif; ?>
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Tanggal Transfer</label>
										<input id="transferDate" type="text" name="transferDate" value="<?php echo $_smarty_tpl->tpl_vars['default']->value;?>
" class="required cusmo-input span12" required>
									</div>
								</div>
								<input id="amount" type="hidden" name="amount" class="required cusmo-input span12" required>
								<!--
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Jumlah Transfer</label>
										<input id="amount" type="text" name="amount" class="required cusmo-input span12" required>
									</div>
								</div>-->
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Upload Bukti Pembayaran (Optional)</label>
										<input id="filename" type="file" name="filename">
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Catatan</label>
										<textarea id="note" name="note" rows="5" cols="5" class="required span12 cusmo-input"></textarea>
									</div>
								</div>
								
								<div class="text-right">
									<input class="submit cusmo-btn narrow" type="submit" value="KIRIM" />
								</div>
							</form>
							<p>&nbsp;</p>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</section>

	<!--<?php echo $_smarty_tpl->getSubTemplate ("partner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
-->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>