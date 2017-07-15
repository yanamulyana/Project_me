{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<script src="../js/jquery-migrate-1.1.1.min.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<link rel="stylesheet" href="js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>

{literal}
	<script>
		$(document).ready(function() {
			
			$('#sInvoiceID').change( function() {
				var sInvoiceID = $("#sInvoiceID").val();
					
				location.href = "adm_sales_transactions.php?mod=sales&act=returadd&invoiceID=" + sInvoiceID;
			});
			
			$('#receivedName').change( function() {
				var receivedName = $("#receivedName").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=receivedName',
					dataType: 'JSON',
					data:{
						receivedName: receivedName
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#address').change( function() {
				var address = $("#address").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=address',
					dataType: 'JSON',
					data:{
						address: address
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#zipCode').change( function() {
				var zipCode = $("#zipCode").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=zipCode',
					dataType: 'JSON',
					data:{
						zipCode: zipCode
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#note').change( function() {
				var note = $("#note").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=note',
					dataType: 'JSON',
					data:{
						note: note
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
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
			
			$('#provinceID').change( function() {
				var provinceID = $("#provinceID").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=provinceID',
					dataType: 'JSON',
					data:{
						provinceID: provinceID
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#cityID').change( function() {
				var cityID = $("#cityID").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=cityID',
					dataType: 'JSON',
					data:{
						cityID: cityID
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#cellPhone').change( function() {
				var cellPhone = $("#cellPhone").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=cellPhone',
					dataType: 'JSON',
					data:{
						cellPhone: cellPhone
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#invoiceDate').change( function() {
				var invoiceDate = $("#invoiceDate").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=invoiceDate',
					dataType: 'JSON',
					data:{
						invoiceDate: invoiceDate
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#shippingType').change( function() {
				var shippingType = $("#shippingType").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=shippingType',
					dataType: 'JSON',
					data:{
						shippingType: shippingType
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#nomorResi').change( function() {
				var nomorResi = $("#nomorResi").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=nomorResi',
					dataType: 'JSON',
					data:{
						nomorResi: nomorResi
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$('#ongkir').change( function() {
				var ongkir = $("#ongkir").val();
					
				$.ajax({
					type: 'POST',
					url: 'create_session.php?mod=session&act=ongkir',
					dataType: 'JSON',
					data:{
						ongkir: ongkir
					},
					success: function(data) {
						location.href = "adm_sales_transactions.php?mod=sales&act=add";
					}
				});
			});
			
			$(".various2").fancybox({
				fitToView: false,
				scrolling: 'no',
				afterLoad: function(){
					this.width = $(this.element).data("width");
					this.height = $(this.element).data("height");
				},
				'afterClose':function () {
					window.location.reload();
				}
			});
			
			$(".various3").fancybox({
				fitToView: false,
				scrolling: 'no',
				afterLoad: function(){
					this.width = $(this.element).data("width");
					this.height = $(this.element).data("height");
				},
				'afterClose':function () {
					window.location.reload();
				}
			});
							
			$( "#invoiceDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: 'c-1:c-0'
			});
			
			$( "#startDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: '2015:c-0'
			});
			
			$( "#endDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: '2015:c-0'
			});
		});
	</script>
{/literal}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'sales' AND $act == 'add'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Tambah Penjualan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=add"><i class="fa fa-dashboard"></i> Transaksi Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			
			<form method="POST" action="adm_sales_transactions.php?mod=sales&act=input" onsubmit="return confirm('Are you sure you want to submit this form?');">
				<input type="hidden" value="{$sessSInvoiceID}" id="invoiceID" name="invoiceID" style="width: 300px;">
				<table>
					<tr>
						<td colspan="3"><h5><b>Identitas Pesanan</b></h5></td>
						<td width="50"></td>
						<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
					</tr>
					<tr>
						<td width="140">Nomor Faktur</td>
						<td width="10">:</td>
						<td><input type="text" class="form-control" value="{$sessSInvoiceID}" id="invoiceID" name="invoiceID" style="width: 300px;" DISABLED></td>
						<td></td>
						<td width="140">Nama Penerima</td>
						<td width="10">:</td>
						<td><input type="text" class="form-control" value="{$sessReceivedName}" id="receivedName" name="receivedName" style="width: 300px;" required></td>
					</tr>
					<tr>
						<td>Tanggal Order</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="{$invoiceDate}" id="invoiceDate" name="invoiceDate" style="width: 300px;" required></td>
						<td></td>
						<td>Alamat</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="{$sessAddress}" id="address" name="address" style="width: 300px;"></td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td><input type="hidden" name="status" id="status" value="6">
							<select class="form-control" id="status" name="status" style="width: 300px;" DISABLED>
								<option value="6">Penjualan Langsung</option>
							</select>
						</td>
						<td></td>
						<td>Kode Pos</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="{$sessZipCode}" id="zipCode" name="zipCode" style="width: 300px;"></td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="{$sessShippingType}" id="shippingType" name="shippingType" style="width: 300px;"></td>
						<td></td>
						<td>Propinsi</td>
						<td>:</td>
						<td><select class="form-control" id="provinceID" name="provinceID" style="width: 300px;">
								<option value=""></option>
								{section name=dataProvince loop=$dataProvince}
									{if $dataProvince[dataProvince].provinceID == $sessProvinceID}
										<option value="{$dataProvince[dataProvince].provinceID}" SELECTED>{$dataProvince[dataProvince].provinceName}</option>
									{else}
										<option value="{$dataProvince[dataProvince].provinceID}">{$dataProvince[dataProvince].provinceName}</option>
									{/if} 
								{/section}
							</select>
						</td>
					</tr>
					<tr>
						<td>Nomor Resi</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="{$sessNomorResi}" id="nomorResi" name="nomorResi" style="width: 300px;"></td>
						<td></td>
						<td>Kota</td>
						<td>:</td>
						<td><select class="form-control" id="cityID" name="cityID" style="width: 300px;">
								<option value=""></option>
								{section name=dataCity loop=$dataCity}
									{if $dataCity[dataCity].cityID == $sessCityID}
										<option value="{$dataCity[dataCity].cityID}" SELECTED>{$dataCity[dataCity].cityName}</option>
									{else}
										<option value="{$dataCity[dataCity].cityID}">{$dataCity[dataCity].cityName}</option>
									{/if} 
								{/section}
							</select>
						</td>
					</tr>
					<tr>
						<td>Total Biaya Kirim</td>
						<td>:</td>
						<td><input type="number" class="form-control" value="{$sessOngkir}" id="ongkir" name="ongkir" style="width: 300px;"></td>
						<td></td>
						<td>Telepon / Handphone</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="{$sessCellPhone}" id="cellPhone" name="cellPhone" style="width: 300px;" required></td>
					</tr>
				</table>
				<br>
				<p><a href="adm_add_sales_transactions.php" data-width="520" data-height="400" class="various3 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="30">No <i class="fa fa-sort"></i></th>
							<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
							<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
							<th width="200">Ukuran <i class="fa fa-sort"></i></th>
							<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
							<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
							<th width="80">Harga Satuan <i class="fa fa-sort"></i></th>
							<th width="50">Qty <i class="fa fa-sort"></i></th>
							<th width="80">Subtotal <i class="fa fa-sort"></i></th>
							<th width="50"></th>
						</tr>
					</thead>
					<tbody>
						{section name=dataOrder loop=$dataOrder}
							<tr>
								<td>{$dataOrder[dataOrder].no}</td>
								<td>{$dataOrder[dataOrder].productCode}</td>
								<td>{$dataOrder[dataOrder].productName}</td>
								<td>{$dataOrder[dataOrder].ukuran}</td>
								<!-- <td>{$dataOrder[dataOrder].volume}</td>
								<td>{$dataOrder[dataOrder].alcohol}</td> -->
								<td align="right">{$dataOrder[dataOrder].price}</td>
								<td align="center">{$dataOrder[dataOrder].qty}</td>
								<td align="right">{$dataOrder[dataOrder].subtotal}</td>
								<td>
									<a href="adm_edit_sales_transactions.php?mod=sales&act=edit&detailID={$dataOrder[dataOrder].detailID}" data-width="520" data-height="400" class="various2 fancybox.iframe" title="Edit">
										<img src="../images/icon/edit.png" width="20">
									</a>
									<a href="adm_sales_transactions.php?mod=sales&act=delete&detailID={$dataOrder[dataOrder].detailID}" title="Delete" onClick="return confirm('Anda yakin ingin menghapus produk ini dari transaksi Anda?')">
										<img src="../images/icon/delete.jpg" width="20">
									</a>
								</td>
							</tr>
						{/section}
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$subtotalRp}</b> <input type="hidden" name="subtotal" value="{$subtotal}"></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>-</b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
								<td align="right" style="background: #CCC;"><b>{$weight} <input type="hidden" name="weight" value="{$weight}"></b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$sessOngkirRp}</b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$grandtotalRp} <input type="hidden" name="grandtotal" value="{$grandtotal}"></b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
					</tbody>
				</table>
				<p><b>Note</b><br>
				<input type="text" class="form-control" name="note" id="note" value="{$sessNote}" placeholder="Catatan">
				</p><br>
				<p>
					<button type="submit" class="btn btn-success">SIMPAN PENJUALAN</button>
				</p>
			</form>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'confirmneworder'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Konfirmasi Pesanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=neworder"><i class="fa fa-dashboard"></i> Pesanan Baru</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $confirm == '1'}
				Anda sudah menerima pesanan ini sebelumnya.
			{else}
				<input type="hidden" name="orderID" value="{$orderID}">
				<input type="hidden" name="orderInvoiceID" value="{$invoiceID}">
				<table>
					<tr>
						<td width="140">Tanggal Order</td>
						<td width="10">:</td>
						<td>{$invoiceDate}</td>
					</tr>
					<tr>
						<td>Invoice ID</td>
						<td>:</td>
						<td>{$invoiceID}</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td>{if $status == '1'}Pesanan Baru{/if}
							{if $status == '2'}Konfirmasi Pengiriman{/if}
							{if $status == '3'}Pesanan Dikirim{/if}
							{if $status == '4'}Transaksi Selesai{/if}
							{if $status == '5'}Pesanan Ditolak{/if}
							{if $status == '6'}Penjualan Langsung{/if}
						</td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td>{$courierName}</td>
					</tr>
					<!--<tr>
						<td>Nama Layanan</td>
						<td>:</td>
						<td>{$serviceName}</td>
					</tr>-->
					<tr>
						<td>Lokasi Pengambilan</td>
						<td>:</td>
						<td>{$locationName}</td>
					</tr>
					<tr>
						<td>Asuransi</td>
						<td>:</td>
						<td>{if $insurance > 0}Ya (Rp. {$insuranceRp}){else}Tidak{/if}</td>
					</tr>
					<!--<tr>
						<td colspan="2"></td>
						<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID={$orderID}&invoiceID={$invoiceID}" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
					</tr>-->
				</table>
				<br>
				<table>
					<tr>
						<td colspan="3"><h5><b>Data Pemesan</b></h5></td>
						<td width="50"></td>
						<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
					</tr>
					<tr>
						<td width="140">Nama Pemesan</td>
						<td width="10">:</td>
						<td width="263">{$memberName}</td>
						<td></td>
						<td width="140">Nama Penerima</td>
						<td width="10">:</td>
						<td>{$receivedName}</td>
					</tr>
					<tr valign="top">
						<td>Alamat</td>
						<td>:</td>
						<td>{$memberAddress}</td>
						<td></td>
						<td>Alamat</td>
						<td>:</td>
						<td>{$address}</td>
					</tr>
					<tr>
						<td>Kota</td>
						<td>:</td>
						<td>{$memberCityName}</td>
						<td></td>
						<td>Kota</td>
						<td>:</td>
						<td>{$cityName}</td>
					</tr>
					<tr>
						<td>Propinsi</td>
						<td>:</td>
						<td>{$memberProvinceName}</td>
						<td></td>
						<td>Propinsi</td>
						<td>:</td>
						<td>{$provinceName}</td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td>{$memberZipCode}</td>
						<td></td>
						<td>Telepon</td>
						<td>:</td>
						<td>{$phone}</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td>{$memberPhone}</td>
						<td></td>
						<td>Handphone</td>
						<td>:</td>
						<td>{$cellPhone}</td>
					</tr>
					<tr>
						<td>Handphone (HP)</td>
						<td>:</td>
						<td>{$memberCellPhone}</td>
						<td></td>
						<td colspan="4"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>{$memberEmail}</td>
						<td colspan="4"></td>
					</tr>
				</table><br>
				<table>
					<tr>
						<td colspan="3"><h5><b>Konfirmasi Pembayaran</b></h5></td>
					</tr>
					<tr>
						<td width="140">Tanggal Pembayaran</td>
						<td width="10">:</td>
						<td>{$transferDate}</td>
					</tr>
					<tr>
						<td>Bank Tujuan</td>
						<td>:</td>
						<td>{$bankTo}</td>
					</tr>
					<tr>
						<td>Jumlah Transfer</td>
						<td>:</td>
						<td>Rp. {$amount}</td>
					</tr>
					<tr>
						<td>Bukti</td>
						<td>:</td>
						<td><a href="../images/confirm/{$image}" target="_blank">Lihat</a></td>
					</tr>
					<tr>
						<td>Note</td>
						<td>:</td>
						<td>{$noteConfirm}</td>
					</tr>
				</table>
				<p>&nbsp;</p>
				<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
				<h5><b>Informasi Tambahan</b></h5>
				<p>{$note}</p>
				<p>&nbsp;</p>
				<h5><b>Rincian Belanja</b></h5>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="30">No <i class="fa fa-sort"></i></th>
							<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
							<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
							<th width="200">Ukuran <i class="fa fa-sort"></i></th>
							<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
							<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
							<th width="80">Harga Satuan <i class="fa fa-sort"></i></th>
							<th width="50">Qty <i class="fa fa-sort"></i></th>
							<th width="80">Subtotal <i class="fa fa-sort"></i></th>
						</tr>
					</thead>
					<tbody>
						{section name=dataDetail loop=$dataDetail}
							<tr>
								<td>{$dataDetail[dataDetail].no}</td>
								<td>{$dataDetail[dataDetail].productCode}</td>
								<td>{$dataDetail[dataDetail].productName}</td>
								<td>{$dataDetail[dataDetail].ukuran}</td>
								<!-- <td>{$dataDetail[dataDetail].volume}</td>
								<td>{$dataDetail[dataDetail].alcohol}</td> -->
								<td align="right">{$dataDetail[dataDetail].unitPrice}</td>
								<td align="center">{$dataDetail[dataDetail].qty}</td>
								<td align="right">{$dataDetail[dataDetail].subtotal}</td>
							</tr>
						{/section}
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
								<td align="right" style="background: #CCC;"><b>{$pointTotal}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
								<td align="right" style="background: #CCC;"><b>{$weightTotal}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
								<td align="right" style="background: #CCC;"><b>{$coupon}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$grandtotalRp}</b></td>
							</tr>
					</tbody>
				</table>
				
				{if $reject == 'on'}
					<form method="POST" action="adm_sales_transactions.php?mod=sales&act=rejectinput">
						<input type="hidden" name="ordID" value="{$orderID}">
						<input type="hidden" name="invID" value="{$invoiceID}">
						<input type="text" class="form-control" name="keterangan" placeholder="Alasan ditolak" style="width: 300px;" required>
						<br>
						<button type="submit" class="btn btn-success" style="float: left; margin-right: 5px;">SIMPAN</button>
					</form>
					<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$orderID}&invoiceID={$invoiceID}"><button type="button" class="btn btn-danger">BATAL</button>
				{else}
					<form method="POST" action="adm_sales_transactions.php?mod=sales&act=accept">
					<input type="hidden" name="orderID" value="{$orderID}">
					<input type="hidden" name="invoiceID" value="{$invoiceID}">
					<input type="hidden" name="grandtotal" value="{$grandtotal}">
					
					<p>
						<button type="submit" class="btn btn-success" style="float: left; margin-right: 5px;">TERIMA PESANAN</button>
					</form>
					<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$orderID}&invoiceID={$invoiceID}&reject=on"><button type="button" class="btn btn-danger">TOLAK PESANAN</button>
					</p>
				{/if}
			{/if}
		</section><!-- /.content -->
	
	{elseif $module == 'sales' AND $act == 'detailconfirm'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Konfirmasi Pengiriman</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=confirm"><i class="fa fa-dashboard"></i> Konfirmasi Pengiriman</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="adm_sales_transactions.php?mod=sales&act=update">
			<input type="hidden" name="orderID" value="{$orderID}">
			<input type="hidden" name="email" value="{$memberEmail}">
			<input type="hidden" name="courierName" value="{$courierName}">
			<input type="hidden" name="invoiceID" value="{$invoiceID}">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td>{$invoiceDate}</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td>{$invoiceID}</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td>{if $status == '1'}Pesanan Baru{/if}
						{if $status == '2'}Konfirmasi Pengiriman{/if}
						{if $status == '3'}Pesanan Dikirim{/if}
						{if $status == '4'}Transaksi Selesai{/if}
						{if $status == '5'}Pesanan Ditolak{/if}
						{if $status == '6'}Penjualan Langsung{/if}
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td>{$courierName}</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td>{$serviceName}</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td>{$locationName}</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>:</td>
					<td>{if $insurance > 0}Ya (Rp. {$insuranceRp}){else}Tidak{/if}</td>
				</tr>
				<!--<tr>
					<td colspan="2"></td>
					<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID={$orderID}&invoiceID={$invoiceID}" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
				</tr>-->
			</table>
			<br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Data Pemesan</b></h5></td>
					<td width="50"></td>
					<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
				</tr>
				<tr>
					<td width="140">Nama Pemesan</td>
					<td width="10">:</td>
					<td width="263">{$memberName}</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td>{$receivedName}</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td>{$memberAddress}</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>{$memberCityName}</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td>{$cityName}</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$memberProvinceName}</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$provinceName}</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>{$memberZipCode}</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td>{$phone}</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>{$memberPhone}</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td>{$cellPhone}</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td>{$memberCellPhone}</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{$memberEmail}</td>
					<td colspan="4"></td>
				</tr>
			</table><br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Konfirmasi Pembayaran</b></h5></td>
				</tr>
				<tr>
					<td width="140">Tanggal Pembayaran</td>
					<td width="10">:</td>
					<td>{$transferDate}</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td>{$bankTo}</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. {$amount}</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/{$image}" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td style="color: red;">{$noteConfirm}</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
			<h5><b>Informasi Tambahan</b></h5>
			<p>{$note}</p>
			<p>&nbsp;</p>
			<h5><b>Rincian Belanja</b></h5>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
						<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="200">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
						<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
						<th width="80">Harga Satuan <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Subtotal <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataDetail loop=$dataDetail}
						<tr>
							<td>{$dataDetail[dataDetail].no}</td>
							<td>{$dataDetail[dataDetail].productCode}</td>
							<td>{$dataDetail[dataDetail].productName}</td>
							<td>{$dataDetail[dataDetail].ukuran}</td>
							<!-- <td>{$dataDetail[dataDetail].volume}</td>
							<td>{$dataDetail[dataDetail].alcohol}</td> -->
							<td align="right">{$dataDetail[dataDetail].unitPrice}</td>
							<td align="center">{$dataDetail[dataDetail].qty}</td>
							<td align="right">{$dataDetail[dataDetail].subtotal}</td>
						</tr>
					{/section}
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b>{$pointTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b>{$weightTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b>{$coupon}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
						</tr>
				</tbody>
			</table>
			<table>
				<tr>
					<td><b>Masukkan Nomor Resi Pengiriman</b></td>
				</tr>
				<tr>
					<td><input type="text" class="form-control" id="consignment" name="consignment" style="width: 300px;" required><br></td>
				</tr>
			</table>
				<p>
					<button type="submit" class="btn btn-success" onClick="return confirm('Are you sure want to submit this consignment?')">SIMPAN</button>
					<a href="print_sent.php?mod=sales&act=printsent&orderID={$orderID}&invoiceID={$invoiceID}" target="_blank"><button type="button" class="btn btn-primary">CETAK LABEL</button></a>
					<a href="invoice.php?mod=sales&act=invoice&orderID={$orderID}&invoiceID={$invoiceID}" title="Cetak Invoice" target="_blank"><button type="button" class="btn btn-danger">CETAK INVOICE</button></a>
				</p>
			</form>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'detailsent'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Dikirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=sent"><i class="fa fa-dashboard"></i> Pesanan Dikirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<input type="hidden" name="orderID" value="{$orderID}">
			<input type="hidden" name="invoiceID" value="{$invoiceID}">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td>{$invoiceDate}</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td>{$invoiceID}</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td>{if $status == '1'}Pesanan Baru{/if}
						{if $status == '2'}Konfirmasi Pengiriman{/if}
						{if $status == '3'}Pesanan Dikirim{/if}
						{if $status == '4'}Transaksi Selesai{/if}
						{if $status == '5'}Pesanan Ditolak{/if}
						{if $status == '6'}Penjualan Langsung{/if}
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td>{$courierName}</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td>{$serviceName}</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td>{$locationName}</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>:</td>
					<td>{if $insurance > 0}Ya (Rp. {$insuranceRp}){else}Tidak{/if}</td>
				</tr>
				<tr>
					<td>Consignment</td>
					<td>:</td>
					<td>{$consignment}</td>
				</tr>
				<!--<tr>
					<td colspan="2"></td>
					<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID={$orderID}&invoiceID={$invoiceID}" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
				</tr>-->
			</table>
			<br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Data Pemesan</b></h5></td>
					<td width="50"></td>
					<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
				</tr>
				<tr>
					<td width="140">Nama Pemesan</td>
					<td width="10">:</td>
					<td width="263">{$memberName}</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td>{$receivedName}</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td>{$memberAddress}</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>{$memberCityName}</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td>{$cityName}</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$memberProvinceName}</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$provinceName}</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>{$memberZipCode}</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td>{$phone}</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>{$memberPhone}</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td>{$cellPhone}</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td>{$memberCellPhone}</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{$memberEmail}</td>
					<td colspan="4"></td>
				</tr>
			</table><br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Konfirmasi Pembayaran</b></h5></td>
				</tr>
				<tr>
					<td width="140">Tanggal Pembayaran</td>
					<td width="10">:</td>
					<td>{$transferDate}</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td>{$bankTo}</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. {$amount}</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/{$image}" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td>{$noteConfirm}</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
			<h5><b>Informasi Tambahan</b></h5>
			<p>{$note}</p>
			<p>&nbsp;</p>
			<h5><b>Rincian Belanja</b></h5>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
						<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="200">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
						<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
						<th width="80">Harga Satuan <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Subtotal <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataDetail loop=$dataDetail}
						<tr>
							<td>{$dataDetail[dataDetail].no}</td>
							<td>{$dataDetail[dataDetail].productCode}</td>
							<td>{$dataDetail[dataDetail].productName}</td>
							<td>{$dataDetail[dataDetail].ukuran}</td>
							<!-- <td>{$dataDetail[dataDetail].volume}</td>
							<td>{$dataDetail[dataDetail].alcohol}</td> -->
							<td align="right">{$dataDetail[dataDetail].unitPrice}</td>
							<td align="center">{$dataDetail[dataDetail].qty}</td>
							<td align="right">{$dataDetail[dataDetail].subtotal}</td>
						</tr>
					{/section}
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b>{$pointTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b>{$weightTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b>{$coupon}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
						</tr>
				</tbody>
			</table>
			
			<p>
				<a href="adm_sales_transactions.php?mod=sales&act=finishorder&orderID={$orderID}&invoiceID={$invoiceID}" onClick="return confirm('Are you sure this order has been completed?')"><button type="button" class="btn btn-success">PESANAN SELESAI</button></a>
			</p>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'detailfinish'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Selesai</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=finish"><i class="fa fa-dashboard"></i> Pesanan Selesai</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<input type="hidden" name="orderID" value="{$orderID}">
			<input type="hidden" name="invoiceID" value="{$invoiceID}">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td>{$invoiceDate}</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td>{$invoiceID}</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td>{if $status == '1'}Pesanan Baru{/if}
						{if $status == '2'}Konfirmasi Pengiriman{/if}
						{if $status == '3'}Pesanan Dikirim{/if}
						{if $status == '4'}Transaksi Selesai{/if}
						{if $status == '5'}Pesanan Ditolak{/if}
						{if $status == '6'}Penjualan Langsung{/if}
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td>{$courierName}</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td>{$serviceName}</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td>{$locationName}</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>:</td>
					<td>{if $insurance > 0}Ya (Rp. {$insuranceRp}){else}Tidak{/if}</td>
				</tr>
				<tr>
					<td>Consignment</td>
					<td>:</td>
					<td>{$consignment}</td>
				</tr>
				<!--<tr>
					<td colspan="2"></td>
					<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID={$orderID}&invoiceID={$invoiceID}" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
				</tr>-->
			</table>
			<br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Data Pemesan</b></h5></td>
					<td width="50"></td>
					<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
				</tr>
				<tr>
					<td width="140">Nama Pemesan</td>
					<td width="10">:</td>
					<td width="263">{$memberName}</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td>{$receivedName}</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td>{$memberAddress}</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>{$memberCityName}</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td>{$cityName}</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$memberProvinceName}</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$provinceName}</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>{$memberZipCode}</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td>{$phone}</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>{$memberPhone}</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td>{$cellPhone}</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td>{$memberCellPhone}</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{$memberEmail}</td>
					<td colspan="4"></td>
				</tr>
			</table><br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Konfirmasi Pembayaran</b></h5></td>
				</tr>
				<tr>
					<td width="140">Tanggal Pembayaran</td>
					<td width="10">:</td>
					<td>{$transferDate}</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td>{$bankTo}</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. {$amount}</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/{$image}" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td>{$noteConfirm}</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
			<h5><b>Informasi Tambahan</b></h5>
			<p>{$note}</p>
			<p>&nbsp;</p>
			<h5><b>Rincian Belanja</b></h5>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
						<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="200">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
						<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
						<th width="80">Harga Satuan <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Subtotal <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataDetail loop=$dataDetail}
						<tr>
							<td>{$dataDetail[dataDetail].no}</td>
							<td>{$dataDetail[dataDetail].productCode}</td>
							<td>{$dataDetail[dataDetail].productName}</td>
							<td>{$dataDetail[dataDetail].ukuran}</td>
							<!-- <td>{$dataDetail[dataDetail].volume}</td>
							<td>{$dataDetail[dataDetail].alcohol}</td> -->
							<td align="right">{$dataDetail[dataDetail].unitPrice}</td>
							<td align="center">{$dataDetail[dataDetail].qty}</td>
							<td align="right">{$dataDetail[dataDetail].subtotal}</td>
						</tr>
					{/section}
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b>{$pointTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b>{$weightTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b>{$coupon}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
						</tr>
				</tbody>
			</table>
			
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'detailbuy'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Detail Rincian Harga Beli</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="report.php"><i class="fa fa-dashboard"></i> Laporan Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td>{$invoiceDate}</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td>{$invoiceID}</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td>{if $status == '1'}Pesanan Baru{/if}
						{if $status == '2'}Konfirmasi Pengiriman{/if}
						{if $status == '3'}Pesanan Dikirim{/if}
						{if $status == '4'}Transaksi Selesai{/if}
						{if $status == '5'}Pesanan Ditolak{/if}
						{if $status == '6'}Penjualan Langsung{/if}
					</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<h5><b>Rincian Belanja</b></h5>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
						<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="200">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
						<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
						<th width="80">Modal <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Subtotal <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataDetail loop=$dataDetail}
						<tr>
							<td>{$dataDetail[dataDetail].no}</td>
							<td>{$dataDetail[dataDetail].productCode}</td>
							<td>{$dataDetail[dataDetail].productName}</td>
							<td>{$dataDetail[dataDetail].ukuran}</td>
							<!-- <td>{$dataDetail[dataDetail].volume}</td>
							<td>{$dataDetail[dataDetail].alcohol}</td> -->
							<td align="right">{$dataDetail[dataDetail].modal}</td>
							<td align="center">{$dataDetail[dataDetail].qty}</td>
							<td align="right">{$dataDetail[dataDetail].subtotalModal}</td>
						</tr>
					{/section}
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
						</tr>
				</tbody>
			</table>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'detailreject'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Ditolak</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=reject"><i class="fa fa-dashboard"></i> Pesanan Ditolak</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td>{$invoiceDate}</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td>{$invoiceID}</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td>{if $status == '1'}Pesanan Baru{/if}
						{if $status == '2'}Konfirmasi Pengiriman{/if}
						{if $status == '3'}Pesanan Dikirim{/if}
						{if $status == '4'}Transaksi Selesai{/if}
						{if $status == '5'}Pesanan Ditolak{/if}
						{if $status == '6'}Penjualan Langsung{/if}
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td>{$courierName}</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td>{$serviceName}</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td>{$locationName}</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Data Pemesan</b></h5></td>
					<td width="50"></td>
					<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
				</tr>
				<tr>
					<td width="140">Nama Pemesan</td>
					<td width="10">:</td>
					<td width="263">{$memberName}</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td>{$receivedName}</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td>{$memberAddress}</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>{$memberCityName}</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td>{$cityName}</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$memberProvinceName}</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$provinceName}</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>{$memberZipCode}</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td>{$phone}</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>{$memberPhone}</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td>{$cellPhone}</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td>{$memberCellPhone}</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{$memberEmail}</td>
					<td colspan="4"></td>
				</tr>
			</table><br>
			<table>
				<tr>
					<td colspan="3"><h5><b>Konfirmasi Pembayaran</b></h5></td>
				</tr>
				<tr>
					<td width="140">Tanggal Pembayaran</td>
					<td width="10">:</td>
					<td>{$transferDate}</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td>{$bankTo}</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. {$amount}</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/{$image}" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td>{$noteConfirm}</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<h5><b>Informasi Tambahan</b></h5>
			<p>{$note}</p>
			<p>&nbsp;</p>
			<h5><b>Rincian Belanja</b></h5>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
						<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="200">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="60">Vol (ML) <i class="fa fa-sort"></i></th>
						<th width="60">Kadar (%) <i class="fa fa-sort"></i></th> -->
						<th width="80">Harga Satuan <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Subtotal <i class="fa fa-sort"></i></th>
					</tr>
				</thead>
				<tbody>
					{section name=dataDetail loop=$dataDetail}
						<tr>
							<td>{$dataDetail[dataDetail].no}</td>
							<td>{$dataDetail[dataDetail].productCode}</td>
							<td>{$dataDetail[dataDetail].productName}</td>
							<td>{$dataDetail[dataDetail].ukuran}</td>
							<!-- <td>{$dataDetail[dataDetail].volume}</td>
							<td>{$dataDetail[dataDetail].alcohol}</td> -->
							<td align="right">{$dataDetail[dataDetail].unitPrice}</td>
							<td align="center">{$dataDetail[dataDetail].qty}</td>
							<td align="right">{$dataDetail[dataDetail].subtotal}</td>
						</tr>
					{/section}
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b>{$pointTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b>{$weightTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b>{$coupon}</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
						</tr>
				</tbody>
			</table>
			<table>
				<tr>
					<td><b>Asalan Ditolak</b><br>
						<p>{$keterangan}</p>
					</td>
				</tr>
			</table>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'neworder'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Baru</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=neworder"><i class="fa fa-dashboard"></i> Pesanan Baru</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Pesanan berhasil dikonfirmasi [TERIMA].</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Pesanan berhasil dikonfirmasi [TOLAK].</p>
			{/if}
			<p>Total pesanan baru : {$numsNewOrder}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="60">Tanggal <i class="fa fa-sort"></i></th>
						<th width="60">Invoice ID <i class="fa fa-sort"></i></th>
						<th width="100">Pemesan <i class="fa fa-sort"></i></th>
						<th width="100">Kurir <i class="fa fa-sort"></i></th>
						<th width="100">Grandtotal <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataNewOrder loop=$dataNewOrder}
						<tr>
							<td>{$dataNewOrder[dataNewOrder].no}</td>
							<td>{$dataNewOrder[dataNewOrder].invoiceDate}</td>
							<td>{$dataNewOrder[dataNewOrder].invoiceID}</td>
							<td>{$dataNewOrder[dataNewOrder].firstName} {$dataNewOrder[dataNewOrder].lastName}</td>
							<td>{$dataNewOrder[dataNewOrder].courierName}</td>
							<td>{$dataNewOrder[dataNewOrder].grandtotal}</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$dataNewOrder[dataNewOrder].orderID}&invoiceID={$dataNewOrder[dataNewOrder].invoiceID}" title="Konfirmasi">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="adm_sales_transactions.php?mod=sales&act=rejectinput&orderID={$dataNewOrder[dataNewOrder].orderID}&invoiceID={$dataNewOrder[dataNewOrder].invoiceID}" title="Tolak Pesanan" onClick="return confirm('Are you sure want to reject this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	
	{elseif $module == 'sales' AND $act == 'confirm'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Konfirmasi Pengiriman</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=confirm"><i class="fa fa-dashboard"></i> Konfirmasi Pengiriman</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '3'}
				<p style="color: #5cb85c;">Pesanan berhasil dikirimkan.</p>
			{/if}
			<p>Total konfirmasi pengiriman : {$numsConfirm}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="60">Tanggal <i class="fa fa-sort"></i></th>
						<th width="60">Invoice ID <i class="fa fa-sort"></i></th>
						<th width="100">Pemesan <i class="fa fa-sort"></i></th>
						<th width="100">Kurir <i class="fa fa-sort"></i></th>
						<th width="100">Grandtotal <i class="fa fa-sort"></i></th>
						<th width="70">Print Label <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataConfirm loop=$dataConfirm}
						<tr>
							<td>{$dataConfirm[dataConfirm].no}</td>
							<td>{$dataConfirm[dataConfirm].invoiceDate}</td>
							<td>{$dataConfirm[dataConfirm].invoiceID}</td>
							<td>{$dataConfirm[dataConfirm].firstName} {$dataConfirm[dataConfirm].lastName}</td>
							<td>{$dataConfirm[dataConfirm].courierName}</td>
							<td>{$dataConfirm[dataConfirm].grandtotal}</td>
							<td>
								{if $dataConfirm[dataConfirm].printed == 'Y'}
									SUDAH PRINT
								{else}
									<span style="color: red; font-weight: bold;">BELUM PRINT</span>
								{/if}
							</td>
							<td>
								{if $sessLevel == '7'}
									<a href="adm_sales_transactions.php?mod=sales&act=detailconfirm&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Konfirmasi Kiriman">
										<img src="../images/icon/edit.png" width="20">
									</a>&nbsp;
									<a href="print_sent.php?mod=sales&act=printsent&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Cetak Label" target="_blank">
										<img src="../images/icon/sent.png" width="20">
									</a>&nbsp;
								{else}
									<a href="adm_sales_transactions.php?mod=sales&act=detailconfirm&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Konfirmasi Kiriman">
										<img src="../images/icon/edit.png" width="20">
									</a>&nbsp;
									<a href="print_sent.php?mod=sales&act=printsent&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Cetak Label" target="_blank">
										<img src="../images/icon/sent.png" width="20">
									</a>&nbsp;
									<a href="invoice.php?mod=sales&act=invoice&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Cetak Invoice" target="_blank">
										<img src="../images/icon/invoice.png" width="20">
									</a>
								{/if}
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'sent'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Dikirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=sent"><i class="fa fa-dashboard"></i> Pesanan Dikirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '4'}
				<p style="color: #5cb85c;">Pesanan selesai.</p>
			{/if}
			<p>Total pesanan dikirim : {$numsSent}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="50">Tanggal <i class="fa fa-sort"></i></th>
						<th width="50">Invoice ID <i class="fa fa-sort"></i></th>
						<th width="100">Pemesan <i class="fa fa-sort"></i></th>
						<th width="80">Kurir <i class="fa fa-sort"></i></th>
						<th width="80">Consignment <i class="fa fa-sort"></i></th>
						<th width="80">Grandtotal <i class="fa fa-sort"></i></th>
						<th width="150">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataSent loop=$dataSent}
						<tr>
							<td>{$dataSent[dataSent].no}</td>
							<td>{$dataSent[dataSent].invoiceDate}</td>
							<td>{$dataSent[dataSent].invoiceID}</td>
							<td>{$dataSent[dataSent].firstName} {$dataSent[dataSent].lastName}</td>
							<td>{$dataSent[dataSent].courierName}</td>
							<td>{$dataSent[dataSent].consignment}</td>
							<td>{$dataSent[dataSent].grandtotal}</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=detailsent&orderID={$dataSent[dataSent].orderID}&invoiceID={$dataSent[dataSent].invoiceID}" title="Detail">
									<button type="button" class="btn btn-primary">DETAIL</button>
								</a>
								<a href="adm_sales_transactions.php?mod=sales&act=finishorder&orderID={$dataSent[dataSent].orderID}&invoiceID={$dataSent[dataSent].invoiceID}" onClick="return confirm('Are you sure this order has been completed?')">
									<button type="button" class="btn btn-success">PESANAN SELESAI</button>
								</a>
								<!--<a href="adm_sales_transactions.php?mod=sales&act=rejectinput&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Tolak Pesanan" onClick="return confirm('Are you sure want to reject this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>-->
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'finish'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Selesai</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=finish"><i class="fa fa-dashboard"></i> Pesanan Selesai</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<p>Total pesanan selesai : {$numsFinish}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="60">Tanggal <i class="fa fa-sort"></i></th>
						<th width="60">Invoice ID <i class="fa fa-sort"></i></th>
						<th width="100">Pemesan <i class="fa fa-sort"></i></th>
						<th width="100">Kurir <i class="fa fa-sort"></i></th>
						<th width="100">Consignment <i class="fa fa-sort"></i></th>
						<th width="100">Grandtotal <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataFinish loop=$dataFinish}
						<tr>
							<td>{$dataFinish[dataFinish].no}</td>
							<td>{$dataFinish[dataFinish].invoiceDate}</td>
							<td>{$dataFinish[dataFinish].invoiceID}</td>
							<td>{$dataFinish[dataFinish].firstName} {$dataFinish[dataFinish].lastName}</td>
							<td>{$dataFinish[dataFinish].courierName}</td>
							<td>{$dataFinish[dataFinish].consignment}</td>
							<td>{$dataFinish[dataFinish].grandtotal}</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=detailfinish&orderID={$dataFinish[dataFinish].orderID}&invoiceID={$dataFinish[dataFinish].invoiceID}" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<!--<a href="adm_sales_transactions.php?mod=sales&act=rejectinput&orderID={$dataConfirm[dataConfirm].orderID}&invoiceID={$dataConfirm[dataConfirm].invoiceID}" title="Tolak Pesanan" onClick="return confirm('Are you sure want to reject this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>-->
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'reject'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pesanan Ditolak</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=reject"><i class="fa fa-dashboard"></i> Pesanan Ditolak</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '5'}
				<p style="color: #5cb85c;">Pesanan dihapus.</p>
			{/if}
			<p>Total pesanan ditolak : {$numsReject}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="60">Tanggal <i class="fa fa-sort"></i></th>
						<th width="60">Invoice ID <i class="fa fa-sort"></i></th>
						<th width="100">Pemesan <i class="fa fa-sort"></i></th>
						<th width="100">Kurir <i class="fa fa-sort"></i></th>
						<th width="100">Grandtotal <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataReject loop=$dataReject}
						<tr>
							<td>{$dataReject[dataReject].no}</td>
							<td>{$dataReject[dataReject].invoiceDate}</td>
							<td>{$dataReject[dataReject].invoiceID}</td>
							<td>{$dataReject[dataReject].firstName} {$dataReject[dataReject].lastName}</td>
							<td>{$dataReject[dataReject].courierName}</td>
							<td>{$dataReject[dataReject].grandtotal}</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=detailreject&orderID={$dataReject[dataReject].orderID}&invoiceID={$dataReject[dataReject].invoiceID}" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="adm_sales_transactions.php?mod=sales&act=deleteorder&orderID={$dataReject[dataReject].orderID}&invoiceID={$dataReject[dataReject].invoiceID}" title="Hapus Pesanan" onClick="return confirm('Are you sure want to delete this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'search'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Transaksi Penjualan
				<small>Pencarian Transaksi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=search"><i class="fa fa-dashboard"></i> Transaksi Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $msg == '1'}
				<p style="color: #5cb85c;">Transaksi penjualan berhasil dihapus.</p>
			{/if}
			<form method="GET" action="adm_sales_transactions.php">
			<input type="hidden" name="mod" value="sales">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Nomor Faktur</td>
					<td width="10">:</td>
					<td><input type="text" value="{$invoiceID}" class="form-control" name="invoiceID" placeholder="Nomor Faktur Penjualan" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Awal</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="startDate" id="startDate" value="{$startDate}" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="endDate" id="endDate" value="{$endDate}" placeholder="Periode Akhir" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" id="status" style="width: 300px;">
							<option value=""></option>
							<option value="1">Baru</option>
							<option value="2">Pesanan Diterima</option>
							<option value="3">Pesanan Dikirim</option>
							<option value="4">Selesai</option>
							<option value="5">Ditolak</option>
						</select>
					</td>
				</tr>
			</table>
			<button type="submit" class="btn btn-primary">Cari Trx</button>
			</form>
			<p>&nbsp;</p>
			{if $invoiceID != "" || $startDate != "" || $endDate != "" || $status != ""}
				<p>Ditemukan : {$numsOrder} data</p>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="30">No <i class="fa fa-sort"></i></th>
							<th width="80">No Faktur<i class="fa fa-sort"></i></th>
							<th width="70">Tanggal <i class="fa fa-sort"></i></th>
							<th width="140">Pemesan <i class="fa fa-sort"></i></th>
							<th width="140">Penerima <i class="fa fa-sort"></i></th>
							<th width="140">Pemilik Trx <i class="fa fa-sort"></i></th>
							<th width="50">Grandtotal <i class="fa fa-sort"></i></th>
							<th width="40">Action <i class="fa fa-sort"></i></th>
						</tr>
					</thead>
					<tbody>
						{section name=dataOrder loop=$dataOrder}
							<tr>
								<td>{$dataOrder[dataOrder].no}</td>
								<td>{$dataOrder[dataOrder].invoiceID}</td>
								<td>{$dataOrder[dataOrder].invoiceDate}</td>
								<td>{$dataOrder[dataOrder].memberName}</td>
								<td>{$dataOrder[dataOrder].receivedName}</td>
								<td>{$dataOrder[dataOrder].owner}</td>
								<td>{$dataOrder[dataOrder].grandtotal}</td>
									<td>
									<a href="adm_sales_transactions.php?mod=sales&act=detail&invoiceID={$dataOrder[dataOrder].orderID}-{$dataOrder[dataOrder].invoiceID}" title="Detail">
										<img src="../images/icon/view.png" width="20">
									</a>
								</td>
							</tr>
						{/section}
					</tbody>
				</table>
			{/if}
		</section><!-- /.content -->
	
	{elseif $module == 'sales' AND $act == 'detail'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Pesanan Konsumen
				<small>Status Pesanan</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=add"><i class="fa fa-dashboard"></i> Transaksi Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<p><a href="print_sent.php?mod=sales&act=printsent&orderID={$orderID}&invoiceID={$invoiceID}" target="_blank"><button type="button" class="btn btn-primary">CETAK LABEL</button></a>
			{if $sessLevel != '7'}
				<a href="invoice.php?mod=sales&act=invoice&orderID={$orderID}&invoiceID={$invoiceID}" title="Cetak Invoice" target="_blank"><button type="button" class="btn btn-danger">CETAK INVOICE</button></a>
			{/if}
			</p>
			<!--<form method="POST" action="adm_sales_transactions.php?mod=sales&act=update" onsubmit="return confirm('Are you sure you want to submit this form?');">
				<input type="hidden" name="orderID" value="{$orderID}">
				<input type="hidden" name="orderInvoiceID" value="{$invoiceID}">-->
				<table>
					<tr>
						<td width="140">Nomor Faktur</td>
						<td width="10">:</td>
						<td>{$invoiceID}</td>
					</tr>
					<tr>
						<td>Tanggal Order</td>
						<td>:</td>
						<td>{$invoiceDate}</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td>{$status}</td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td>{$courierName}</td>
					</tr>
					<tr>
						<td>Nomor Resi</td>
						<td>:</td>
						<td>{$nomorResi}</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID={$orderID}&invoiceID={$invoiceID}" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
					</tr>
				</table>
				<!--<p>
					<button type="submit" class="btn btn-success">UBAH STATUS</button>
				</p>-->
				<br>
				{if $sessLevel != '7'}
					<table>
						<tr>
							<td><h5><b>Tujuan Pengiriman</b></h5></td>
						</tr>
						<tr>
							<td width="140">Nama Penerima</td>
							<td width="10">:</td>
							<td>{$receivedName}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>{$address}</td>
						</tr>
						<tr>
							<td>Propinsi</td>
							<td>:</td>
							<td>{$provinceName}</td>
						</tr>
						<tr>
							<td>Kota</td>
							<td>:</td>
							<td>{$cityName}</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>{$phone}</td>
						</tr>
						<tr>
							<td>Handphone</td>
							<td>:</td>
							<td>{$cellPhone}</td>
						</tr>
					</table>
					<p>&nbsp;</p>
					<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
					<h5><b>Rincian Belanja</b></h5>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">No <i class="fa fa-sort"></i></th>
								<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
								<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
								<th width="200">Ukuran <i class="fa fa-sort"></i></th>
								<!-- <th width="60">Volume <i class="fa fa-sort"></i></th>
								<th width="90">Alkohol (%) <i class="fa fa-sort"></i></th> -->
								<th width="80">Harga <i class="fa fa-sort"></i></th>
								<th width="50">Qty <i class="fa fa-sort"></i></th>
								<th width="80">Subtotal <i class="fa fa-sort"></i></th>
							</tr>
						</thead>
						<tbody>
							{section name=dataDetail loop=$dataDetail}
								<tr>
									<td>{$dataDetail[dataDetail].no}</td>
									<td>{$dataDetail[dataDetail].productCode}</td>
									<td>{$dataDetail[dataDetail].productName}</td>
									<td>{$dataDetail[dataDetail].ukuran}</td>
									<!-- <td>{$dataDetail[dataDetail].volume}</td>
									<td>{$dataDetail[dataDetail].alcohol}</td> -->
									<td align="right">{$dataDetail[dataDetail].price}</td>
									<td align="center">{$dataDetail[dataDetail].qty}</td>
									<td align="right">{$dataDetail[dataDetail].subtotal}</td>
								</tr>
							{/section}
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Biaya Kirim (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b>-</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
									<td align="right" style="background: #CCC;"><b>{$weight}</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
								</tr>
						</tbody>
					</table>
					<p><b>Note</b><br>{$note}</p><br>
				{/if}
				
			<!--</form>-->
		</section><!-- /.content -->
		
	{elseif $module == 'sales' AND $act == 'editresi'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Pesanan Konsumen
				<small>Ubah Nomor Resi</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=add"><i class="fa fa-dashboard"></i> Transaksi Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			{if $sessLevel != '7'}
				<p><a href="print_sent.php?mod=sales&act=printsent&orderID={$orderID}&invoiceID={$invoiceID}" target="_blank"><button type="button" class="btn btn-primary">CETAK LABEL</button></a>
				<a href="invoice.php?mod=sales&act=invoice&orderID={$orderID}&invoiceID={$invoiceID}" title="Cetak Invoice" target="_blank"><button type="button" class="btn btn-danger">CETAK INVOICE</button></a>
				</p>
			{/if}
			<!--<form method="POST" action="adm_sales_transactions.php?mod=sales&act=update" onsubmit="return confirm('Are you sure you want to submit this form?');">
				<input type="hidden" name="orderID" value="{$orderID}">
				<input type="hidden" name="orderInvoiceID" value="{$invoiceID}">-->
				<table>
					<tr>
						<td width="140">Nomor Faktur</td>
						<td width="10">:</td>
						<td>{$invoiceID}</td>
					</tr>
					<tr>
						<td>Tanggal Order</td>
						<td>:</td>
						<td>{$invoiceDate}</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td>{$status}</td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td>{$courierName}</td>
					</tr>
					<tr>
						<td>Nomor Resi</td>
						<td>:</td>
						<td>{$nomorResi}</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID={$orderID}&invoiceID={$invoiceID}" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
					</tr>
				</table>
				<p>
					<button type="submit" class="btn btn-success">UBAH STATUS</button>
				</p>
				<br>
				<table>
					<tr>
						<td><h5><b>Tujuan Pengiriman</b></h5></td>
					</tr>
					<tr>
						<td width="140">Nama Penerima</td>
						<td width="10">:</td>
						<td>{$receivedName}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>{$address}</td>
					</tr>
					<tr>
						<td>Propinsi</td>
						<td>:</td>
						<td>{$provinceName}</td>
					</tr>
					<tr>
						<td>Kota</td>
						<td>:</td>
						<td>{$cityName}</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td>{$phone}</td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td>:</td>
						<td>{$cellPhone}</td>
					</tr>
				</table>
				<p>&nbsp;</p>
				<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
				<h5><b>Rincian Belanja</b></h5>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="30">No <i class="fa fa-sort"></i></th>
							<th width="80">Kode Produk <i class="fa fa-sort"></i></th>
							<th width="200">Nama Produk <i class="fa fa-sort"></i></th>
							<th width="200">Ukuran <i class="fa fa-sort"></i></th>
							<!-- <th width="60">Volume <i class="fa fa-sort"></i></th>
							<th width="90">Alkohol (%) <i class="fa fa-sort"></i></th> -->
							<th width="80">Harga <i class="fa fa-sort"></i></th>
							<th width="50">Qty <i class="fa fa-sort"></i></th>
							<th width="80">Subtotal <i class="fa fa-sort"></i></th>
						</tr>
					</thead>
					<tbody>
						{section name=dataDetail loop=$dataDetail}
							<tr>
								<td>{$dataDetail[dataDetail].no}</td>
								<td>{$dataDetail[dataDetail].productCode}</td>
								<td>{$dataDetail[dataDetail].productName}</td>
								<td>{$dataDetail[dataDetail].ukuran}</td>
								<!-- <td>{$dataDetail[dataDetail].volume}</td>
								<td>{$dataDetail[dataDetail].alcohol}</td> -->
								<td align="right">{$dataDetail[dataDetail].price}</td>
								<td align="center">{$dataDetail[dataDetail].qty}</td>
								<td align="right">{$dataDetail[dataDetail].subtotal}</td>
							</tr>
						{/section}
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$subtotal}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>-</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
								<td align="right" style="background: #CCC;"><b>{$weight}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$shippingTotal}</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>{$grandtotal}</b></td>
							</tr>
					</tbody>
				</table>
				<p><b>Note</b><br>{$note}</p><br>
				
			<!--</form>-->
		</section><!-- /.content -->
	
	{elseif $module == 'sales' AND $act == 'retur'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Retur Penjualan
				<small>Pencarian Retur</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="adm_sales_transactions.php?mod=sales&act=retur"><i class="fa fa-dashboard"></i> Retur Penjualan</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<p><a href="adm_sales_transactions.php?mod=sales&act=returadd"><button type="button" class="btn btn-primary">Tambah Retur</button></a></p><br>
			<form method="GET" action="adm_sales_transactions.php">
			<input type="hidden" name="mod" value="sales">
			<input type="hidden" name="act" value="retur">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" value="{$startDate}" name="startDate" id="startDate" value="{$startDate}" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="{$endDate}" name="endDate" id="endDate" value="{$endDate}" placeholder="Periode Akhir" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari Trx</button>
			</form>
			
			{if $submit != ""}
				<p>&nbsp;<?p>
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="30">No <i class="fa fa-sort"></i></th>
							<th width="80">Nomor Retur <i class="fa fa-sort"></i></th>
							<th width="100">No Faktur Ref <i class="fa fa-sort"></i></th>
							<th width="60">Tanggal <i class="fa fa-sort"></i></th>
							<th width="75">Pemesan <i class="fa fa-sort"></i></th>
							<th width="75">Penerima <i class="fa fa-sort"></i></th>
							<th width="50">Qty <i class="fa fa-sort"></i></th>
							<th width="50">Grandtotal <i class="fa fa-sort"></i></th>
							<th width="50">Action <i class="fa fa-sort"></i></th>
						</tr>
					</thead>
					<tbody>
						{section name=dataRetur loop=$dataRetur}
							<tr>
								<td>{$dataRetur[dataRetur].no}</td>
								<td>{$dataRetur[dataRetur].returNo}</td>
								<td>{$dataRetur[dataRetur].invoiceID}</td>
								<td>{$dataRetur[dataRetur].returDate}</td>
								<td>{$dataRetur[dataRetur].memberName}</td>
								<td>{$dataRetur[dataRetur].receivedName}</td>
								<td align="center">{$dataRetur[dataRetur].qty}</td>
								<td align="right">{$dataRetur[dataRetur].subtotal}</td>
								<td>
									<a href="adm_sales_transactions.php?mod=sales&act=returdetail&returNo={$dataRetur[dataRetur].returNo}">
										<img src="../images/icon/view.png" width="20">
									</a>
									<a href="adm_sales_transactions.php?mod=sales&act=retdelete&returNo={$dataRetur[dataRetur].returNo}&returID={$dataRetur[dataRetur].returID}&startDate={$startDate}&endDate={$endDate}" title="Delete" onClick="return confirm('Apakah Anda yakin ingin menghapus retur ini?')">
										<img src="../images/icon/delete.jpg" width="20">
									</a>
								</td>
							</tr>
						{/section}
					</tbody>
				</table>
			{/if}
		</section>
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}