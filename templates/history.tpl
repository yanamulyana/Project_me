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
			{if $module == 'history' AND $act == 'show'}
				<div class="phase-title current">
					<h1>HISTORY BELANJA</h1>
				</div>
				<p>&nbsp;</p>
				
				{if $sessHistoryFinish == '1'}
					<p style="color: green;">
						Anda telah mengkonfirmasi pesanan Anda <b>#{$sessHistoryInvoice}</b>, dengan ini, pemesanan Anda dianggap telah selesai, terima kasih telah berbelanja di Anaku.com, kami tunggu pesanan Anda selanjutnya.
					</p>
				{/if}
				{if $sessHistoryFinish == '2'}
					<p style="color: red;">
						Oopss, sepertinya ada yang salah dalam mengkonfirmasi pesanan Anda, pesanan Anda tidak ditemukan.
					</p>
				{/if}
				<p>Total Transaksi : {$numsOrder} data</p><br>
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
				<div class="pagination">{$pageLink}</div>
			
			{elseif $module == 'history' AND $act == 'view'}
				<div class="phase-title current">
					<h1>HISTORY BELANJA</h1>
				</div>
				<p>&nbsp;</p>
				<div class="row-fluid">
					<div class="span12">
						{if $numsTestimonial == '0' AND $statusori == '4'}
							<p><a href="add-testimonial-{$orderID}.html"><button type="button" class="cusmo-btn narrow">Tambah Testimonial</button></a></p>
						{else}
							<h4>TESTIMONIAL</h4>
							<table class="table">
								<tbody>
									<tr>
										<td class="span2">Tanggal</td>
										<td class="span10">{$createdDate}</td>
									</tr>
									<tr>
										<td class="span2" style="background: #efefef;">Testimonial</td>
										<td class="span10" style="background: #efefef;">{$testimonial}</td>
									</tr>
								</tbody>
							</table>
						{/if}
						<p>Anda diperkenankan mengisi testimonial ketika status transaksi "SELESAI"</p><br>
						<h4>STATUS PESANAN</h4>
						<table class="table">
							<tbody>
								<tr>
									<td class="span2">No Order</td>
									<td class="span10">{$invoiceID}</td>
								</tr>
								<tr>
									<td class="span2" style="background: #efefef;">Tanggal</td>
									<td class="span10" style="background: #efefef;">{$invoiceDate}</td>
								</tr>
								<tr>
									<td class="span2">Status Pesanan</td>
									<td class="span10">{$status}</td>
								</tr>
								{if $statusori == '5'}
									<tr>
										<td class="span2">Keterangan</td>
										<td class="span10">{$keterangan}</td>
									</tr>
								{/if}
								<!--<tr>
									<td class="span2" style="background: #efefef;">Kurir</td>
									<td class="span10" style="background: #efefef;">{$courierName}</td>
								</tr>-->
							</tbody>
						</table>
						
						<h4>TUJUAN PENGIRIMAN</h4>
						<table class="table">
							<tbody>
								<tr>
									<td class="span2">Nama Penerima</td>
									<td class="span10">{$receivedName}</td>
								</tr>
								<tr>
									<td class="span2" style="background: #efefef;">Alamat</td>
									<td class="span10" style="background: #efefef;">{$address}</td>
								</tr>
								<tr>
									<td class="span2">Kota</td>
									<td class="span10">{$cityName}</td>
								</tr>
								<tr>
									<td class="span2" style="background: #efefef;">Propinsi</td>
									<td class="span10" style="background: #efefef;">{$provinceName}</td>
								</tr>
								<tr>
									<td class="span2">Kode Pos</td>
									<td class="span10">{$zipCode}</td>
								</tr>
								<tr>
									<td class="span2" style="background: #efefef;">Telepon</td>
									<td class="span10" style="background: #efefef;">{$phone}</td>
								</tr>
								<tr>
									<td class="span2">Hp</td>
									<td class="span10">{$cellPhone}</td>
								</tr>
							</tbody>
						</table>
						
						<h4>EKSPEDISI PENGIRIMAN</h4>
						<table class="table">
							<tbody>
								<tr>
									<td class="span2">Nama Ekspedisi</td>
									<td class="span10">{$courierName}</td>
								</tr>
								<!--<tr>
									<td class="span2" style="background: #efefef;">Nama Layanan</td>
									<td class="span10" style="background: #efefef;">{$serviceName}</td>
								</tr>-->
								<tr>
									<td class="span2">Lokasi Pengambilan</td>
									<td class="span10">{$locationName}</td>
								</tr>
								<tr>
									<td class="span2">Nomor Resi</td>
									<td class="span10">{$consignment}</td>
								</tr>
							</tbody>
						</table>
						
						<h4>INFORMASI TAMBAHAN</h4>
						<table class="table">
							<tbody>
								<tr>
									<td class="span12" style="background: #efefef;">{$note}</td>
								</tr>
							</tbody>
						</table>
						
						<h4>RINCIAN BELANJA</h4>
						<table class="table">
							<thead>
								<tr>
									<th class="span1">No</th>
									<th class="span1">Kode Produk</th>
									<th class="span5">Nama Produk</th>
									<th class="span1">Ukuran (SMLXXL</th>
									<!-- <th class="span1">Vol (ML)</th>
									<th class="span1">Kadar (%)</th> -->
									<th class="span1" style="text-align: right;">Harga</th>
									<th class="span1" style="text-align: center;">Qty</th>
									<th class="span1" style="text-align: right;">Subtotal</th>
								</tr>
							</thead>
							<tbody>
								{section name=dataDetail loop=$dataDetail}
									<tr valign="top">
										<td>{$dataDetail[dataDetail].no}</td>
										<td>{$dataDetail[dataDetail].productCode}</td>
										<td>{$dataDetail[dataDetail].productName}</td>
										<td>{$dataDetail[dataDetail].ukuran}</td>
										<!-- <td>{$dataDetail[dataDetail].volume}</td>
										<td>{$dataDetail[dataDetail].alcohol}</td> -->
										<td style="text-align: right;">{$dataDetail[dataDetail].price}</td>
										<td style="text-align: center;">{$dataDetail[dataDetail].qty}</td>
										<td style="text-align: right;">{$dataDetail[dataDetail].subtotal}</td>
									</tr>
								{/section}
								<tr>
									<td colspan="7" style="text-align: right;">Subtotal (Rp)</td>
									<td style="text-align: right;">{$subtotal}</td>
								</tr>
								<tr>
									<td colspan="7" style="text-align: right;">Total Poin</td>
									<td style="text-align: right;">{$pointTotal}</td>
								</tr>
								<tr>
									<td colspan="7" style="text-align: right;">Total Berat (Kg)</td>
									<td style="text-align: right;">{$weightTotal}</td>
								</tr>
								<tr>
									<td colspan="7" style="text-align: right;">Total Biaya Kirim (Rp)</td>
									<td style="text-align: right;">{$shippingTotal}</td>
								</tr>
								<tr>
									<td colspan="7" style="text-align: right;">Kupon Diskon (-)</td>
									<td style="text-align: right;">{$coupon}</td>
								</tr>
								<tr>
									<td colspan="7" style="text-align: right;">Grandtotal (Rp)</td>
									<td style="text-align: right;">{$grandtotal}</td>
								</tr>
							</tbody>	
						</table>
					</div>
				</div>
			
			{/if}
		</div>
	</section>

{include file="footer.tpl"}