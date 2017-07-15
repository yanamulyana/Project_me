{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

{literal}
	<script>
		$(document).ready(function(){
			$("#courierID").change(function(){
				var courierID = $("#courierID").val();
				$.ajax({
					url: "../get_services.php",
					data: "courierID="+courierID,
					cache: false,
					success: function(msg){
						$("#serviceID").html(msg);
					}
				});
			});
		});
	</script>
{/literal}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'cost' AND $act == 'add'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Biaya Kirim
				<small>Tambah Biaya Kirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="costs.php"><i class="fa fa-dashboard"></i> Manajemen Biaya Kirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="100">Origin</td>
					<td width="10">:</td>
					<td>Bandung</td>
				</tr>
				<tr>
					<td colspan="3"><b>Tujuan Pengiriman</b></td>
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
			</table><p>&nbsp;</p>
			
			<form method="POST" action="costs.php?mod=cost&act=input">
			<input type="hidden" name="provinceID" value="{$provinceID}">
			<input type="hidden" name="cityID" value="{$cityID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" id="courierID" name="courierID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCourier loop=$dataCourier}
								<option value="{$dataCourier[dataCourier].courierID}">{$dataCourier[dataCourier].courierName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Layanan Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="serviceID" id="serviceID" style="width: 300px;" required>
							<option value=""></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Estimasi (Hari)</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="estimateDay" placeholder="Estimasi Pengiriman" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Biaya Kirim</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="weightCostStart[]" placeholder="Kg" style="width: 50px; float: left; margin: 5px;" required>
						<input type="text" class="form-control" name="weightCostEnd[]" placeholder="kg" style="width: 50px; float: left; margin: 5px;" required>
						<input type="text" class="form-control" name="shippingCost[]" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;" required>
						<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;" required>
							<option value="K">Per Kg</option>
							<option value="B">Borongan / Global</option>
						</select><br>
						
						
						<input type="text" class="form-control" name="weightCostStart[]" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="weightCostEnd[]" placeholder="kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="shippingCost[]" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;">
						<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;">
							<option value="K">Per Kg</option>
							<option value="B">Borongan / Global</option>
						</select>
						<br>
						
						<input type="text" class="form-control" name="weightCostStart[]" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="weightCostEnd[]" placeholder="kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="shippingCost[]" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;">
						<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;">
							<option value="K">Per Kg</option>
							<option value="B">Borongan / Global</option>
						</select>
						<br>
						
						<input type="text" class="form-control" name="weightCostStart[]" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="weightCostEnd[]" placeholder="kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="shippingCost[]" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;">
						<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;">
							<option value="K">Per Kg</option>
							<option value="B">Borongan / Global</option>
						</select>
						<br>
						
						<input type="text" class="form-control" name="weightCostStart[]" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="weightCostEnd[]" placeholder="kg" style="width: 50px; float: left; margin: 5px;">
						<input type="text" class="form-control" name="shippingCost[]" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;">
						<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;">
							<option value="K">Per Kg</option>
							<option value="B">Borongan / Global</option>
						</select>
						<br>
						<p>Cara penginputan :</p>
						<p><b>Tarif Global, misalnya : Herona, Lega, Pahala, Travel</b></p>
						<p> 0 - 2 = 30000 (Berat 0 s/d 2 kg, total tarif = 30000)<br>
							3 - 3 = 28000 (Berat 3 kg, total tarif = 28000)<br>
							4 - 5 = 27000 (Berat 4 s/d 5 kg, total tarif = 27000)<br>
							6 - 0 = 1500 (Kg selanjutnya, setelah 5 Kg, tarif = 1500)</p>
						<p><b>Tarif Dasar Per Kg, misalnya ESL :</b></p>
						<p> 1 - 1 = 9000 (Tarif per kg = 9000)</p>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">SIMPAN</button>
						<button type="reset" class="btn btn-default">RESET</button>
					</td>
				</tr>
			</table>	
			</form>
		</section>
		
	{elseif $module == 'cost' AND $act == 'edit'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Biaya Kirim
				<small>Edit Biaya Kirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="costs.php"><i class="fa fa-dashboard"></i> Manajemen Biaya Kirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="100">Origin</td>
					<td width="10">:</td>
					<td>Bandung</td>
				</tr>
				<tr>
					<td colspan="3"><b>Tujuan Pengiriman</b></td>
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
			</table><p>&nbsp;</p>
			<form method="POST" action="costs.php?mod=cost&act=update">
			<input type="hidden" name="costID" value="{$costID}">
			<input type="hidden" name="provinceID" value="{$provinceID}">
			<input type="hidden" name="cityID" value="{$cityID}">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" id="courierID" name="courierID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCourier loop=$dataCourier}
								{if $dataCourier[dataCourier].courierID == $courierID}
									<option value="{$dataCourier[dataCourier].courierID}" SELECTED>{$dataCourier[dataCourier].courierName}</option>
								{else}
									<option value="{$dataCourier[dataCourier].courierID}">{$dataCourier[dataCourier].courierName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Layanan Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="serviceID" id="serviceID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataService loop=$dataService}
								{if $dataService[dataService].serviceID == $serviceID}
									<option value="{$dataService[dataService].serviceID}" SELECTED>{$dataService[dataService].serviceName}</option>
								{else}
									<option value="{$dataService[dataService].serviceID}">{$dataService[dataService].serviceName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Estimasi (Hari)</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="estimateDay" value="{$estimateDay}" placeholder="Estimasi Pengiriman" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Biaya Kirim</td>
					<td>:</td>
					<td>
						{section name=dataWeightCost loop=$dataWeightCost}
							<input type="hidden" class="form-control" name="weightCostID[]" value="{$dataWeightCost[dataWeightCost].weightCostID}" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
							<input type="text" class="form-control" name="weightCostStart[]" value="{$dataWeightCost[dataWeightCost].weightFrom}" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
							<input type="text" class="form-control" name="weightCostEnd[]" value="{$dataWeightCost[dataWeightCost].weightTo}" placeholder="kg" style="width: 50px; float: left; margin: 5px;">
							<input type="text" class="form-control" name="shippingCost[]" value="{$dataWeightCost[dataWeightCost].shippingCost}" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;">
							<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;">
								<option value="K" {if $dataWeightCost[dataWeightCost].shippingStatus == 'K'}SELECTED{/if}>Per Kg</option>
								<option value="B" {if $dataWeightCost[dataWeightCost].shippingStatus == 'B'}SELECTED{/if}>Borongan / Global</option>
							</select>
							<br>
						{/section}
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">SIMPAN</button>
						<button type="reset" class="btn btn-default">RESET</button>
					</td>
				</tr>
			</table>	
			</form>
		</section>
	
	{elseif $module == 'cost' AND $act == 'view'}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Biaya Kirim
				<small>Daftar Biaya Kirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="costs.php"><i class="fa fa-dashboard"></i> Manajemen Biaya Kirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="100">Origin</td>
					<td width="10">:</td>
					<td>Bandung</td>
				</tr>
				<tr>
					<td colspan="3"><b>Tujuan Pengiriman</b></td>
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
			</table><p>&nbsp;</p>
			<p><a href="costs.php?mod=cost&act=add&provinceID={$provinceID}&cityID={$cityID}"><button class="btn btn-primary">Tambah Biaya Kirim</button></a></p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Layanan <i class="fa fa-sort"></i></th>
						<th>Biaya Kirim <i class="fa fa-sort"></i></th>
						<th>Estimasi <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCost loop=$dataCost}
						<tr>
							<td>{$dataCost[dataCost].no}</td>
							<td>{$dataCost[dataCost].courierName}</td>
							<td>{$dataCost[dataCost].serviceName}</td>
							<td>
								{section name=dataWeightCost loop=$dataCost[dataCost].dataWeightCost}
									&bull; {$dataCost[dataCost].dataWeightCost[dataWeightCost].weightFrom} - {$dataCost[dataCost].dataWeightCost[dataWeightCost].weightTo} Kg : Rp. {$dataCost[dataCost].dataWeightCost[dataWeightCost].shippingCost} ({$dataCost[dataCost].dataWeightCost[dataWeightCost].shippingStatus})<br>
								{/section}
							</td>
							<td>{$dataCost[dataCost].estimateDay}</td>
							<td>
								<a href="costs.php?mod=cost&act=edit&costID={$dataCost[dataCost].costID}&provinceID={$dataCost[dataCost].provinceID}&cityID={$dataCost[dataCost].cityID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="costs.php?mod=cost&act=delete&costID={$dataCost[dataCost].costID}&provinceID={$dataCost[dataCost].provinceID}&cityID={$dataCost[dataCost].cityID}" title="Delete" onClick="return confirm('Anda yakin ingin menghapus biaya kirim ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
		</section><!-- /.content -->
		
	{elseif $module == 'cost' AND $act == 'search'}
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Biaya Kirim
				<small>Daftar Biaya Kirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="costs.php"><i class="fa fa-dashboard"></i> Manajemen Biaya Kirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="costs.php">
			<input type="hidden" name="mod" value="cost">
			<input type="hidden" name="act" value="search">
			<p>
				<table>
					<tr>
						<td>Cari kota : </td>
						<td><input type="text" class="form-control" name="q" placeholder="Nama kota" value="{$q}" style="width: 300px;" required></td>
						<td><button type="submit" class="btn btn-success">Cari</button></td>
					</tr>
				</table>
			</p>
			</form>
			
			<p>Total kota : {$numsCost}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Propinsi <i class="fa fa-sort"></i></th>
						<th>Kota <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCost loop=$dataCost}
						<tr>
							<td>{$dataCost[dataCost].no}</td>
							<td>{$dataCost[dataCost].provinceName}</td>
							<td>{$dataCost[dataCost].cityName}</td>
							<td>
								{section name=dataCourier loop=$dataCost[dataCost].dataShippingCost}
									{$dataCost[dataCost].dataShippingCost[dataCourier].courierName}, 
								{/section}
							</td>	
							<td>
								<a href="costs.php?mod=cost&act=view&provinceID={$dataCost[dataCost].provinceID}&cityID={$dataCost[dataCost].cityID}" title="Lihat detail">
									<img src="../images/icon/view.png" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
		</section><!-- /.content -->
		
	{else}
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Biaya Kirim
				<small>Daftar Biaya Kirim</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="costs.php"><i class="fa fa-dashboard"></i> Manajemen Biaya Kirim</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="costs.php">
			<input type="hidden" name="mod" value="cost">
			<input type="hidden" name="act" value="search">
			<p>
				<table>
					<tr>
						<td>Cari kota : </td>
						<td><input type="text" class="form-control" name="q" placeholder="Nama kota" value="{$q}" style="width: 300px;" required></td>
						<td><button type="submit" class="btn btn-success">Cari</button></td>
					</tr>
				</table>
			</p>
			</form>
			
			<p>Total kota : {$numsCost}</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Propinsi <i class="fa fa-sort"></i></th>
						<th>Kota <i class="fa fa-sort"></i></th>
						<th>Ekspedisi <i class="fa fa-sort"></i></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{section name=dataCost loop=$dataCost}
						<tr>
							<td>{$dataCost[dataCost].no}</td>
							<td>{$dataCost[dataCost].provinceName}</td>
							<td>{$dataCost[dataCost].cityName}</td>
							<td>
								{section name=dataCourier loop=$dataCost[dataCost].dataShippingCost}
									{$dataCost[dataCost].dataShippingCost[dataCourier].courierName}, 
								{/section}
							</td>	
							<td>
								<a href="costs.php?mod=cost&act=view&provinceID={$dataCost[dataCost].provinceID}&cityID={$dataCost[dataCost].cityID}" title="Lihat detail">
									<img src="../images/icon/view.png" width="20">
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