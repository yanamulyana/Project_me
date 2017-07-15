{include file="header.tpl"}

<link rel="stylesheet" href="adminweb/js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">

{literal}
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
					<li class="active">Hubungi Kami</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
		
			{if $sessMemberID != "" AND $sessEmail != ""}
		
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
						{section name=dataOrder loop=$dataOrder}
							<tr>
								<td>{$dataOrder[dataOrder].no}</td>
								<td>{$dataOrder[dataOrder].invoiceID}</td>
								<td>{$dataOrder[dataOrder].invoiceDate}</td>
								<td>{$dataOrder[dataOrder].grandtotal}</td>
								<td>{$dataOrder[dataOrder].status}</td>
								<td><a href="history-{$dataOrder[dataOrder].orderID}.html"><img src="images/icon/view.png" width="20" title="Lihat detil"></a></td>
								<td>
									{if $dataOrder[dataOrder].statusori == '1'}
										<a href="confirm.html"><button style="background: #ffbb00; color: #FFF; padding: 5px; border: medium none; width: 100%;" type="button">Konfirmasi Pembayaran</button></a>
									{elseif $dataOrder[dataOrder].statusori == '2'}
										Konfirmasi Berhasil
									{elseif $dataOrder[dataOrder].statusori == '3'}
										<a href="finish.php?module=order&act=finish&orderID={$dataOrder[dataOrder].orderID}&invoiceID={$dataOrder[dataOrder].invoiceID}" onClick="return confirm('Anda yakin ingin konfirmasi pesanan selesai terhadap transaksi ini?')"><button style="background: green; color: #FFF; padding: 5px; border: medium none; width: 100%;" type="button">Pesanan Selesai</button></a>
									{elseif $dataOrder[dataOrder].statusori == '4'}
										{if $dataOrder[dataOrder].numsTestimonial == '0'}
											<a href="add-testimonial-{$dataOrder[dataOrder].orderID}.html"><button style="background: #ffbb00; color: #FFF; padding: 5px; border: medium none; width: 100%;" type="button">Tambah Testimonial</button></a>
										{/if}
									{/if}
								</td>
							</tr>
						{/section}
					</tbody>
				</table>
		
				<div class="phase-title current">
					<h1>Konfirmasi Pembayaran</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						{if $msg == '1'}
							<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
								Konfirmasi pembayaran telah dikirim, kami akan segera merespon dan memproses pesanan Anda.
							</div><br>
						{/if}
						<p>Untuk memproses pemesanan selanjutnya, mohon konfirmasi pembayaran Anda dengan mengisi form konfirmasi pembayaran ini. Semua isian yang tersedia wajib diisi.
						Proses konfirmasi akan memakan waktu maksimal 1 hari kerja. <br>
						Untuk informasi lebih lanjut, silahkan kunjungi layanan konsumen kami <a href="contact-us.html"><u>www.Anaku.com/contact-us.html</u></a></p><br>
					</div>
				</div>
			{/if}
			
			{if $sessMemberID == "" AND $sessEmail == ""}
				
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
			
			{else}
			
				<div class="row-fluid">
					<div class="span12">
						<div class="contact-form-holder">
							<div class="message-box"></div>
							
							<form method="POST" action="confirm.php?mod=confirm&act=input" enctype="multipart/form-data">
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">No Order</label>
										<select id="invoiceID" name="invoiceID" class="required cusmo-input span12" required>
											{section name=dataInvoice loop=$dataInvoice}
												<option value="{$dataInvoice[dataInvoice].invoiceID}|{$dataInvoice[dataInvoice].grand}">Invoice: {$dataInvoice[dataInvoice].invoiceID} - Total: Rp. {$dataInvoice[dataInvoice].grandtotal} - Qty:  {$dataInvoice[dataInvoice].qty}</option>
											{/section}
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Bank Tujuan</label>
										<select id="bankTo" name="bankTo" class="required cusmo-input span12" required>
											<option value="">- Pilih Bank -</option>
											{section name=dataBank loop=$dataBank}
												<option value="{$dataBank[dataBank].bankName} No. Rek {$dataBank[dataBank].accountNo} a/n {$dataBank[dataBank].accountName}">{$dataBank[dataBank].bankName} No. Rek {$dataBank[dataBank].accountNo} a/n {$dataBank[dataBank].accountName}</option>
											{/section}
										</select>
									</div>
								</div>
								
								<div class="control-group">
									<div class="controls">
										<label class="form-label">Tanggal Transfer</label>
										<input id="transferDate" type="text" name="transferDate" value="{$default}" class="required cusmo-input span12" required>
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
			{/if}
		</div>
	</section>

	<!--{include file="partner.tpl"}-->

{include file="footer.tpl"}