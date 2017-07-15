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
					<li>Shipping Address</li>
					<li class="active">Penerima Baru</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
		
			{if $module == 'shipping' AND $act == 'edit'}
				<div class="phase-title current">
					<h1>UBAH PENERIMA</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<form action="addshipping.php?mod=shipping&act=update" method="POST">
							<input type="hidden" name="shippingID" value="{$shippingID}">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Nama Penerima</div>
									<input type="text" id="receivedName" value="{$receivedName}" style="text-transform: capitalize;" name="receivedName" class="required span12 cusmo-input" required />
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
									<input type="text" id="zipCode" value="{$zipCode}" name="zipCode" class="required span12 cusmo-input" maxlength="5" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Telepon</div>
									<input type="text" id="phone" value="{$phone}" name="phone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Handphone</div>
									<input type="text" id="cellPhone" value="{$cellPhone}" name="cellPhone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">SIMPAN</button></center>
							</div>
						</form>
					</div>
				</div>
			{else}
				
				<div class="phase-title current">
					<h1>TAMBAH PENERIMA</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<form action="addshipping.php?mod=shipping&act=input" method="POST">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Nama Penerima</div>
									<input type="text" id="receivedName" name="receivedName" style="text-transform: capitalize;" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Jenis Kelamin</div>
									<input type="radio" id="gender" name="gender" value="L" required /> Laki-laki &nbsp;&nbsp;&nbsp;
									<input type="radio" id="gender" name="gender" value="P" /> Perempuan
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Alamat</div>
									<textarea id="address" name="address" style="text-transform: capitalize;" class="required span12 cusmo-input" required /></textarea>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Propinsi</div>
									<select id="provinceID" name="provinceID" class="required span12 cusmo-input" required />
										<option value=""></option>
										{section name=dataProvince loop=$dataProvince}
											<option value="{$dataProvince[dataProvince].provinceID}">{$dataProvince[dataProvince].provinceName}</option>
										{/section}
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Kota</div>
									<select id="cityID" name="cityID" class="required span12 cusmo-input" required />
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Kode Pos</div>
									<input type="text" id="zipCode" name="zipCode" class="required span12 cusmo-input" maxlength="5" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Telepon</div>
									<input type="text" id="phone" name="phone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Handphone</div>
									<input type="text" id="cellPhone" name="cellPhone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">SIMPAN</button></center>
							</div>
						</form>
					</div>
				</div>
			{/if}
		</div>
	</section>

{include file="footer.tpl"}