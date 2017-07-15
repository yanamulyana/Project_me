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
					<li class="active">Akun Saya</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			{if $module == 'myaccount' AND $act == 'detail'}
				
				<div class="product-tabs" style="margin-top: 5px;">
					<div class="controls-holder nav-tabs">
						<ul class="inline">
							<li {if $msgActive == ''}class="active"{/if}><a data-toggle="tab" href="#myprofile">My Profile</a></li>
							<li {if $msgActive == '2'}class="active"{/if}><a data-toggle="tab" href="#shipping">Shipping Address</a></li>
							<li {if $msgActive == '3'}class="active"{/if}><a data-toggle="tab" href="#poin">Poin Rewards</a></li>
							<li {if $msgActive == '4'}class="active"{/if}><a data-toggle="tab" href="#changer-poin">Penukaran Poin</a></li>
							<li {if $msgActive == '5'}class="active"{/if}><a data-toggle="tab" href="#coupon">Kupon</a></li>
						</ul>
					</div>
					
					<div class="tab-content">
						<div id="myprofile" {if $msgActive == ''}class="active tab-pane"{else}class="tab-pane"{/if}>
							<div class="row-fluid">
								<div class="span12">
									<p><a href="edit-account.html"><button class="cusmo-btn add-button" type="button">Edit</button></a></p>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Nama Depan</div>
											{$firstName}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Nama Belakang</div>
											{$lastName}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Jenis Kelamin</div>
											{$gender}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Alamat</div>
											{$address}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
											{$provinceName}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Kota</div>
											{$cityName}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Kode Pos</div>
											{$zipCode}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Telepon</div>
											{$phone}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Handphone</div>
											{$cellPhone}<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Email</div>
											{$email} [<a href="edit-email.html">Ubah Email</a>]<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Password</div>
											***** [<a href="change-password.html">Ubah Password</a>]
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div id="shipping" {if $msgActive == '2'}class="active tab-pane"{else}class="tab-pane"{/if}>
							<p><a href="new-shipping.html"><button class="cusmo-btn add-button" type="button">Tambah Penerima</button></a></p><br>
							<table class="table">
								<thead>
									<tr>
										<th class="span1">No.</th>
										<th class="span4">Nama</th>
										<th class="span6">Alamat</th>
										<th class="span3">Telp/Hp</th>
										<th class="span2">Aksi</th>
									</tr>
								</thead>
								<tbody>
									{section name=dataShipping loop=$dataShipping}
									<tr>
										<td>{$dataShipping[dataShipping].i}</td>
										<td>{$dataShipping[dataShipping].receivedName}</td>
										<td>{$dataShipping[dataShipping].address} {$dataShipping[dataShipping].cityName} {$dataShipping[dataShipping].provinceName} {$dataShipping[dataShipping].zipCode}</td>
										<td>{if $dataShipping[dataShipping].phone != ""}{$dataShipping[dataShipping].phone} / {/if}{$dataShipping[dataShipping].cellPhone}</td>
										<td>
											<a href="addshipping.php?mod=shipping&act=edit&shippingID={$dataShipping[dataShipping].shippingID}" title="Edit">
												<img src="images/icon/edit.png" width="20">
											</a>
											<a href="addshipping.php?mod=shipping&act=delete&shippingID={$dataShipping[dataShipping].shippingID}" title="Delete" onClick="return confirm('Anda yakin ingin menghapus data penerima {$dataShipping[dataShipping].receivedName}?')">
												<img src="images/icon/delete.jpg" width="20">
											</a>
										</td>
									</tr>
									{/section}
								</tbody>
							</table>
						</div>
						
						<div id="poin" {if $msgActive == '3'}class="active tab-pane"{else}class="tab-pane"{/if}>
							<div style="border: 1px #CCC solid; padding: 10px;">
								<table class="table" style="margin: 0px;">
										<tr>
											<td class="span8" style="border-top: 0px;">
												<h3>SIGNATURE</h3>
												<h5>{$firstName} {$lastName}</h5>
												<p>Belanja terus di Anaku.com untuk meningkatkan jumlah poin Anda!</p>
											</td>
											<td class="span4" style="border-top: 0px; background-color: #8c8c8c; text-align: center; color: #FFF;">
												<h1>{$pointTotal}</h1>
												<p>Poin</p>
											</td>
										</tr>
								</table>
							</div>
							<p>&nbsp;</p>
							<h4 style="border-bottom: 4px #30b779 solid;">Perolehan Poin</h4><br>
							<table class="table">
								<thead>
									<tr>
										<th class="span2">Tanggal</th>
										<th class="span7">Transaksi Belanja</th>
										<th class="span3">Poin</th>
									</tr>
								</thead>
								<tbody>
									{section name=dataOrder loop=$dataOrder}
									<tr>
										<td>{$dataOrder[dataOrder].invoiceDate}</td>
										<td>Order {$dataOrder[dataOrder].invoiceID} (Rp. {$dataOrder[dataOrder].grandtotal})</td>
										<td>{$dataOrder[dataOrder].pointTotal}</td>
									</tr>
									{/section}
								</tbody>
							</table>
							
							<p>&nbsp;</p>
							<h4 style="border-bottom: 4px #da0000 solid;">Penukaran Poin</h4><br>
							<table class="table">
								<thead>
									<tr>
										<th class="span2">Tanggal</th>
										<th class="span7">Transaksi Belanja</th>
										<th class="span3">Poin</th>
									</tr>
								</thead>
								<tbody>
									<!--{section name=dataOrder loop=$dataOrder}
									<tr>
										<td>{$dataOrder[dataOrder].invoiceDate}</td>
										<td>Order {$dataOrder[dataOrder].invoiceID} (Rp. {$dataOrder[dataOrder].grandtotal})</td>
										<td>{$dataOrder[dataOrder].pointTotal}</td>
									</tr>
									{/section}-->
								</tbody>
							</table>
						</div>
						
						<div id="changer-poin" {if $msgActive == '4'}class="active tab-pane"{else}class="tab-pane"{/if}>
							<div style="border: 1px #CCC solid; padding: 10px;">
								<table class="table" style="margin: 0px;">
									<tr>
										<td class="span8" style="border-top: 0px;">
											<h3>SIGNATURE</h3>
											<h5>{$firstName} {$lastName}</h5>
											<p>Belanja terus di Anaku.com untuk meningkatkan jumlah poin Anda!</p>
										</td>
										<td class="span4" style="border-top: 0px; background-color: #8c8c8c; text-align: center; color: #FFF;">
											<h1>{$pointTotal}</h1>
											<p>Poin</p>
										</td>
									</tr>
								</table>
							</div>
							<p>&nbsp;</p>
							
							{if $msgChanger == '1'}
								<p style="background-color: red; color: #FFF; padding: 10px;">Poin Anda tidak cukup untuk ditukarkan dengan kupon.</p>
							{/if}
							{if $msgChanger == '2'}
								<p style="background-color: #30b779; color: #FFF; padding: 10px;">Poin berhasil ditukar dengan kupon.</p>
							{/if}
							<h4 style="border-bottom: 4px #30b779 solid;">Tukarkan Poin Anda</h4><br>
							
							{section name=dataPoint loop=$dataPoint}
								<form method="POST" action="myaccount.php?mod=myaccount&act=changerpoint">
								<input type="hidden" name="pointTotal" value="{$pointTotal}">
								<input type="hidden" name="minPoint" value="{$dataPoint[dataPoint].minPoint}">
								<input type="hidden" name="pointID" value="{$dataPoint[dataPoint].pointID}">
								<input type="hidden" name="pointName" value="{$dataPoint[dataPoint].pointName}">
								<input type="hidden" name="minTrx" value="{$dataPoint[dataPoint].minTrx}">
								<input type="hidden" name="coupon" value="{$dataPoint[dataPoint].coupon}">
								<input type="hidden" name="description" value="{$dataPoint[dataPoint].description}">
								<div style="border: 1px solid #30b779; padding: 10px; margin: 10px;">
									<table class="table">
										<tbody>
											<tr>
												<td class="span3" style="border: 0px;">
													<h4>{$dataPoint[dataPoint].pointName}</h4>
												</td>
												<td class="span4" style="border: 0px;">
													<span style="background-color: #30b779; color: #FFF; padding: 3px 13px; border-radius: 10px;">
														{$dataPoint[dataPoint].minPoint} POIN REWARDS
													</span>
												</td>
												<td class="span2" style="border: 0px;">
													{if $pointTotal < $dataPoint[dataPoint].minPoint}
														Jumlah: <input id="qty" type="number" name="qty" style="width: 50px;" value="1" DISABLED>
													{else}
														Jumlah: <input id="qty" type="number" name="qty" style="width: 50px;" value="1" required>
													{/if}
												</td>
												<td class="span3" style="border: 0px;">
													{if $pointTotal < $dataPoint[dataPoint].minPoint}
														<input class="submit cusmo-btn narrow" type="submit" value="TUKAR SEKARANG" style="border-radius: 0px;" DISABLED>
													{else}
														<input class="submit cusmo-btn narrow" type="submit" value="TUKAR SEKARANG" style="border-radius: 0px;" />
													{/if}
												</td>
											</tr>
											<tr>
												<td colspan="4" style="border: 0px;">
													{$dataPoint[dataPoint].description}
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								</form>
							{/section}
						</div>
						<div id="coupon" {if $msgActive == '5'}class="active tab-pane"{else}class="tab-pane"{/if}>
							{if $numsCoupon == '0'}
								<div style="border: 1px dashed #c64a00; padding: 10px;">Anda tidak memiliki kupon</div>
							{/if}
							{section name=dataCoupon loop=$dataCoupon}
								<div style="border: 1px solid #30b779; padding: 10px; margin: 10px; background-color: #30b779;">
									<table class="table">
										<tbody>
											<tr>
												<td class="span9" style="border: 0px;">
													<h4>{$dataCoupon[dataCoupon].pointName}</h4>
												</td>
												<td class="span3" style="border: 0px;">
													<h4>x {$dataCoupon[dataCoupon].qty}</h4>
												</td>
											</tr>
											<tr>
												<td colspan="2" style="border: 0px;">
													{$dataCoupon[dataCoupon].description}
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								</form>
							{/section}
						</div>
					</div>
				</div>
			
			{elseif $module == 'myaccount' AND $act == 'edit'}
				
				{if $sessLoginAccount == '1'}
					<div class="row-fluid">
						<div class="span12">
							<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
								Mohon lengkapi data profil Anda terlebih dahulu sebelum melakukan transaksi belanja Anda.
							</div>
						</div>
					</div>
				{/if}
				<div class="phase-title current">
					<h1>EDIT PROFILE</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<form action="myaccount.php?mod=myaccount&act=update" method="POST">
							<input type="hidden" name="memberID" value="{$memberID}">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Nama Depan</div>
									<input type="text" id="firstName" style="text-transform: capitalize;" value="{$firstName}" name="firstName" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Nama Belakang</div>
									<input type="text" id="lastName" style="text-transform: capitalize;" value="{$lastName}" name="lastName" class="required span12 cusmo-input" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Jenis Kelamin</div>
									<input type="radio" id="gender" name="gender" value="L" {if $gender == 'L'}CHECKED{/if} required /> Laki-laki &nbsp;&nbsp;&nbsp;
									<input type="radio" id="gender" name="gender" value="P" {if $gender == 'P'}CHECKED{/if} /> Perempuan
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Alamat</div>
									<textarea id="address" name="address" style="text-transform: capitalize;" class="required span12 cusmo-input" required />{$address}</textarea>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Propinsi</div>
									<select id="provinceID" name="provinceID" class="required span12 cusmo-input" required />
										<option value=""></option>
										{section name=dataProvince loop=$dataProvince}
											{if $provinceID == $dataProvince[dataProvince].provinceID}
												<option value="{$dataProvince[dataProvince].provinceID}" SELECTED>{$dataProvince[dataProvince].provinceName}</option>
											{else}
												<option value="{$dataProvince[dataProvince].provinceID}">{$dataProvince[dataProvince].provinceName}</option>
											{/if}
										{/section}
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Kota</div>
									<select id="cityID" name="cityID" class="required span12 cusmo-input" required />
										{section name=dataCity loop=$dataCity}
											{if $cityID == $dataCity[dataCity].cityID}
												<option value="{$dataCity[dataCity].cityID}" SELECTED>{$dataCity[dataCity].cityName}</option>
											{else}
												<option value="{$dataCity[dataCity].cityID}">{$dataCity[dataCity].cityName}</option>
											{/if}
										{/section}
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Kode Pos</div>
									<input type="text" id="zipCode" placeholder="Number only" value="{$zipCode}" name="zipCode" class="required span12 cusmo-input" maxlength="5" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Telepon</div>
									<input type="text" id="phone" value="{$phone}" placeholder="Number only" name="phone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Handphone</div>
									<input type="text" id="cellPhone" placeholder="Number only" value="{$cellPhone}" name="cellPhone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">SIMPAN</button></center>
							</div>
						</form>
					</div>
				</div>
				
			{elseif $module == 'myaccount' AND $act == 'editemail'}
				<div class="phase-title current">
					<h1>EDIT EMAIL</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						{if $msg == '1'}
							<p style="color: red;">Email lama Anda salah</p>
						{/if}
						{if $msg == '2'}
							<p style="color: red;">Email baru dan konfirmasi email baru tidak sama</p>
						{/if}
						{if $msg == '3'}
							<p style="color: red;">Password Anda salah</p>
						{/if}
						<form action="myaccount.php?mod=myaccount&act=updateemail" method="POST">
							<input type="hidden" name="memberID" value="{$sessMemberID}">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Email Lama</div>
									<input type="email" id="oldEmail" name="oldEmail" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Email Baru</div>
									<input type="email" id="newEmail" name="newEmail" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Konfirmasi Email</div>
									<input type="email" id="confirmEmail" name="confirmEmail" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Password Anda</div>
									<input type="password" id="password" name="password" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">SIMPAN</button></center>
							</div>
						</form>
					</div>
				</div>
			
			{elseif $module == 'myaccount' AND $act == 'editpassword'}
				<div class="phase-title current">
					<h1>UBAH PASSWORD</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						{if $msg == '1'}
							<p style="color: red;">Password lama Anda salah</p>
						{/if}
						{if $msg == '2'}
							<p style="color: red;">Password baru dan konfirmasi password baru tidak sama</p>
						{/if}
						{if $msg == '3'}
							<p style="color: green;">Password Anda berhasil diubah</p>
						{/if}
						<form action="myaccount.php?mod=myaccount&act=updatepassword" method="POST">
							<input type="hidden" name="memberID" value="{$sessMemberID}">
							{if $password == ""}
								<input type="hidden" name="new" value="1">
							{/if}
							{if $password != ""}
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Password Lama</div>
									<input type="password" id="oldPassword" name="oldPassword" class="required span12 cusmo-input" required />
								</div>
							</div>
							{/if}
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Password Baru</div>
									<input type="password" id="newPassword" name="newPassword" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Konfirmasi Password</div>
									<input type="password" id="confirmPassword" name="confirmPassword" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">UBAH PASSWORD</button></center>
							</div>
						</form>
					</div>
				</div>
			{/if}
		</div>
	</section>

{include file="footer.tpl"}