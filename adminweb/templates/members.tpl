{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
	{if $module == 'member' AND $act == 'view'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Depan</td>
					<td width="10">:</td>
					<td>{$firstName}</td>
				</tr>
				<tr valign="top">
					<td>Nama Belakang</td>
					<td>:</td>
					<td>{$lastName}</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td>{$gender}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>{$cityName}</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$provinceName}</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>{$zipCode}</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>{$phone}</td>
				</tr>
				<tr valign="top">
					<td>Hp</td>
					<td>:</td>
					<td>{$cellPhone}</td>
				</tr>
				<tr valign="top">
					<td>Email</td>
					<td>:</td>
					<td>{$email}</td>
				</tr>
				<tr valign="top">
					<td>Status</td>
					<td>:</td>
					<td>{if $status == 'Y'}Aktif{else}Tidak Aktif{/if}</td>
				</tr>
				<tr valign="top">
					<td>Total Poin</td>
					<td>:</td>
					<td>{$pointTotal}</td>
				</tr>
				<tr valign="top">
					<td>Member Sejak</td>
					<td>:</td>
					<td>{$createdDate}</td>
				</tr>
				<tr valign="top">
					<td>Last Login</td>
					<td>:</td>
					<td>{$lastLogin}</td>
				</tr>
				<tr valign="top">
					<td>Requirement</td>
					<td>:</td>
					<td>{$requirement}</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<h4><b>HISTORY BELANJA</b></h4>
			<p>Total Transaksi : {$numsOrder} data</p><br>
			<table class="table">
				<thead>
					<tr>
						<th class="span1">No.</th>
						<th class="span2">No Order</th>
						<th class="span2">Tanggal</th>
						<th class="span2">Jumlah</th>
						<th class="span2">Status</th>
						<th class="span2">Aksi</th>
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
							<td><a href="members.php?mod=member&act=detailhistory&memberID={$memberID}&orderID={$dataOrder[dataOrder].orderID}"><img src="../images/icon/view.png" width="20" title="Lihat detil"></a></td>
						</tr>
					{/section}
				</tbody>
			</table>
			<div class="pagination">{$pageLink}</div>
		</section>
	
	{elseif $module == 'member' AND $act == 'detailhistory'}
		
		<section class="content">
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
						<th class="span5">Ukuran</th>
						<!-- <th class="span1">Vol (ML)</th>
						<th class="span1">Kadar (%)</th -->>
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
		</section>
	
	{elseif $module == 'member' AND $act == 'edit'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Edit Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="members.php?mod=member&act=update">
			<input type="hidden" name="memberID" value="{$memberID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Depan</td>
					<td width="10">:</td>
					<td>{$firstName}</td>
				</tr>
				<tr valign="top">
					<td>Nama Belakang</td>
					<td>:</td>
					<td>{$lastName}</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td>{$gender}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>{$address}</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td>{$cityName}</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td>{$provinceName}</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td>{$zipCode}</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>{$phone}</td>
				</tr>
				<tr valign="top">
					<td>Hp</td>
					<td>:</td>
					<td>{$cellPhone}</td>
				</tr>
				<tr valign="top">
					<td>Email</td>
					<td>:</td>
					<td>{$email}</td>
				</tr>
				<tr valign="top">
					<td>Total Poin</td>
					<td>:</td>
					<td>{$pointTotal}</td>
				</tr>
				<tr valign="top">
					<td>Member Sejak</td>
					<td>:</td>
					<td>{$createdDate}</td>
				</tr>
				<tr valign="top">
					<td>Last Login</td>
					<td>:</td>
					<td>{$lastLogin}</td>
				</tr>
				<tr valign="top">
					<td>Status</td>
					<td>:</td>
					<td>
						<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="Y" {if $status == 'Y'}SELECTED{/if}>Y (Aktif)</option>
							<option value="N" {if $status == 'N'}SELECTED{/if}>N (Tidak Aktif)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Requirement</td>
					<td>:</td>
					<td><input type="number" value="{$requirement}" class="form-control" name="requirement" placeholder="Requirement" style="width: 300px;" required></td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success">SIMPAN</button>
			<button type="reset" class="btn btn-default">RESET</button>
			</form>
		</section>
	
	{elseif $module == 'member' AND $act == 'search'}
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="members.php">
				<input type="hidden" name="mod" value="member">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="140">Temukan Member :</td>
						<td>
							<select class="form-control" name="t" style="width: 300px;" required>
								<option value="1" {if $t == '1'}SELECTED{/if}>Nama Depan</option>
								<option value="2" {if $t == '2'}SELECTED{/if}>Nama Belakang</option>
								<option value="3" {if $t == '3'}SELECTED{/if}>Email</option>
								<option value="4" {if $t == '4'}SELECTED{/if}>Nomor Handphone</option>
							</select>
						</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Keyword" style="width: 300px;" value="{$q}" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<p>Hasil pencarian <i>{$q}</i> : {$numsMember}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Depan <i class="fa fa-sort"></i></th>
						<th>Nama Belakang <i class="fa fa-sort"></i></th>
						<th>Gender <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Email <i class="fa fa-sort"></i></th>
						<th>Hp <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataMember loop=$dataMember}
						<tr>
							<td>{$dataMember[dataMember].no}</td>
							<td>{$dataMember[dataMember].firstName}</td>
							<td>{$dataMember[dataMember].lastName}</td>
							<td>{$dataMember[dataMember].gender}</td>
							<td>{$dataMember[dataMember].status}</td>
							<td>{$dataMember[dataMember].email}</td>
							<td>{$dataMember[dataMember].cellPhone}</td>
							<td>
								<a href="members.php?mod=member&act=view&memberID={$dataMember[dataMember].memberID}" title="View">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="members.php?mod=member&act=edit&memberID={$dataMember[dataMember].memberID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="members.php">
				<input type="hidden" name="mod" value="member">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="140">Temukan Member :</td>
						<td>
							<select class="form-control" name="t" style="width: 300px;" required>
								<option value="1">Nama Depan</option>
								<option value="2">Nama Belakang</option>
								<option value="3">Email</option>
								<option value="4">Nomor Handphone</option>
							</select>
						</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Keyword" style="width: 300px;" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<p>Hasil pencarian <i>{$q}</i> : {$numsMember}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Depan <i class="fa fa-sort"></i></th>
						<th>Nama Belakang <i class="fa fa-sort"></i></th>
						<th>Gender <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Email <i class="fa fa-sort"></i></th>
						<th>Hp <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataMember loop=$dataMember}
						<tr>
							<td>{$dataMember[dataMember].no}</td>
							<td>{$dataMember[dataMember].firstName}</td>
							<td>{$dataMember[dataMember].lastName}</td>
							<td>{$dataMember[dataMember].gender}</td>
							<td>{$dataMember[dataMember].status}</td>
							<td>{$dataMember[dataMember].email}</td>
							<td>{$dataMember[dataMember].cellPhone}</td>
							<td>
								<a href="members.php?mod=member&act=view&memberID={$dataMember[dataMember].memberID}" title="View">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="members.php?mod=member&act=edit&memberID={$dataMember[dataMember].memberID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	{/if}
</aside><!-- /.right-side -->

{include file="footer.tpl"}