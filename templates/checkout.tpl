{include file="header.tpl"}

<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>

<style>
	#popup{
		display: none;
	}
	
	a.tooltip2 {
		outline:none; 
	}
	a.tooltip2 strong {
		line-height:30px;
	}
	a.tooltip2:hover {
		text-decoration:none;
	} 
	a.tooltip2 span {
	    z-index:10;
	    display:none; 
	    padding:14px 20px;
	    margin-top:0px; 
	    margin-left:10px;
	    width:223px; 
	    line-height:16px;
	}
	a.tooltip2:hover span{
	    display:inline; 
	    position:absolute; 
	    color:#111;
	    border:1px solid #DCA; 
	    background:#fffAF0;
	}
	.callout {
		z-index:20;position:absolute;top:0px;border:0;left:-12px;
	}
	    
	/*CSS3 extras*/
	a.tooltip2 span
	{
	    border-radius:4px;
	    box-shadow: 5px 5px 8px #CCC;
	}
</style>

{literal}
	<script>
		function toRp(angka){
			var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
			var rev2    = '';
			for(var i = 0; i < rev.length; i++){
				rev2  += rev[i];
				if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
					rev2 += '.';
				}
			}
			return 'Rp. ' + rev2.split('').reverse().join('');
		}
		
		$(document).ready(function() {
			
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
			
			$("select[name='qty[]']").on('change', function(){
				
				var a = this.value;
				var myarr = a.split("|");
				
				var qty = myarr[0];
				var productID = myarr[1];
				var cartID = myarr[2];
				var price = myarr[3];
				 
				$.ajax({
					type: 'POST',
					url: 'update_qty_cart.php',
					dataType: 'JSON',
					data:{
						qty: qty,
						productID: productID,
						cartID: cartID,
						price: price
					},
					success: function(data) {
						window.location.href = "checkout.html";
					}
				});
			});
			
			$('#shippingID').change( function() {
				var shippingID = $("#shippingID").val();
			
				$.ajax({
					type: 'POST',
					url: 'session_shipping_id.php',
					dataType: 'JSON',
					data:{
						shippingID: shippingID
					},
					success: function(data) {
						location.href = "checkout-2.html"
					}
				});
			});
			
			//$("#courierID").change(function(){
			//	var courierID = $("#courierID").val();
			//	$.ajax({
			//		url: "get_service_methods.php",
			//		data: "courierID="+courierID,
			//		cache: false,
			//		success: function(msg){
			//			$("#serviceID").html(msg);
			//		}
			//	});
			//});
			
			$("#courierID").change(function(){
				var courierID = $("#courierID").val();
				$.ajax({
					url: "get_locations.php",
					data: "courierID="+courierID,
					cache: false,
					success: function(msg){
						$("#locationID").html(msg);
					}
				});
			});
			
			$("#courierID").change(function(){
				var courierID = $("#courierID").val();
				document.getElementById("totalCost").value = "0";
				$("input:checkbox").attr("checked", false);
				
				$.ajax({
					type: 'GET',
					url: "get_add_cost.php",
					dataType: 'JSON',
					data:{
						courierID: courierID
					},
					cache: false,
					success: function(msg){
						var myarr = msg.split("-");
						document.getElementById("totalCost").value = myarr[1];
						$("#addCost").html(myarr[0]);
						var a = toRp(myarr[1]);
						$("#totalCostDiv").html(a);
					}
				});
			});
			
			$("#courierID").change(function(){
				var courierID = $("#courierID").val();
				var subtotaladdress = $("#subtotaladdress").val();
				$.ajax({
					type: 'GET',
					url: "get_insurance.php",
					dataType: 'JSON',
					data:{
						courierID: courierID,
						subtotaladdress: subtotaladdress
					},
					cache: false,
					success: function(msg){
						var myarr = msg.split("-");
						document.getElementById("totalInsurance").value = myarr[0];
						var a = "Rp. " + myarr[1];
						$("#insurance").html(a);
					}
				});
			});
			
			$("#courierID").change(function(){
				var courierID = $("#courierID").val();
				$.ajax({
					url: "get_costs.php",
					data: "courierID="+courierID,
					cache: false,
					success: function(msg){
						$("#costID").html(msg);
					}
				});
			});
			
			$("#insuranceid").click(function(){
				var insuranceid = $("#insuranceid").val();
				var totalCost = parseInt($("#totalCost").val());
				var totalInsurance = parseInt($("#totalInsurance").val());
	
				if ($(this).is(':checked'))
				{
					var totCost = parseInt(totalCost + totalInsurance);
					document.getElementById("totalCost").value = totCost;
					var a = toRp(totCost);
					$("#totalCostDiv").html(a);
				}
				else
				{
					var totCost = parseInt(totalCost - totalInsurance);
					document.getElementById("totalCost").value = totCost;
					var a = toRp(totCost);
					$("#totalCostDiv").html(a);
				}			
			});
			
			$("#serviceID").change(function(){
				var serviceID = $("#serviceID").val();
				$.ajax({
					url: "get_costs.php",
					data: "costID="+serviceID,
					cache: false,
					success: function(msg){
						$("#costID").html(msg);
					}
				});
			});
			
			$("#serviceID").change(function(){
				var serviceID = $("#serviceID").val();
				$.ajax({
					url: "get_estimate_day.php",
					data: "costID="+serviceID,
					cache: false,
					success: function(msg){
						$("#estimateDay").html(msg);
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
					<li class="active">History Belanja</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			
			{if $sessMemberID == "" AND $sessEmail == ""}
				<div class="phase-title current">
					<h1>Keranjang Belanja</h1>
				</div>
				
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
				<div class="disabled-phases">
					<div class="phase-title">
						<h1><a href="#">Shipping Address</a></h1>
					</div>
					<div class="phase-title">
						<h1><a href="#">Shipping Method</a></h1>
					</div>
					<div class="phase-title">
							<h1><a href="#">Informasi Kupon Diskon</a></h1>
						</div>
					<div class="phase-title">
						<h1><a href="#">Konfirmasi Pesanan</a></h1>
					</div>
				</div>
			{else}
				{if $module == 'checkout' AND $act == 'shippingmethod'}
					<div class="phase-title passed">
						<h1><a href="checkout.html">Keranjang Belanja</a></h1>
					</div>
					<div class="phase-title passed">
						<h1><a href="checkout-2.html">Shipping Address</a></h1>
					</div>
					
					<div class="phase-title current">
						<h1>Shipping Method</h1>
					</div>
					
					<p>Silahkan pilih jasa ekspedisi / kurir yang disediakan, pemilihan ekspedisi dan kurir ditentukan oleh sistem sesuai dengan alamat pengiriman, tidak semua kota dijangkau oleh jasa kurir / ekspedisi tertentu, oleh karena itu kami hanya 
					menampilkan daftar kurir / ekspedisi yang tersedia dikota Anda.</p><br>
					
					<form method="POST" action="nextconfirm.php">
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Ekspedisi / Kurir</div>
							<select id="courierID" name="courierID" required />
								<option value="">- Pilih ekspedisi / kurir -</option>
								{section name=dataCourier loop=$dataCourier}
									{if $sessCourierID == $dataCourier[dataCourier].courierID}
										<option value="{$dataCourier[dataCourier].courierID}|{$dataCourier[dataCourier].serviceID}|{$dataCourier[dataCourier].costID}" SELECTED>{$dataCourier[dataCourier].courierName} - {$dataCourier[dataCourier].serviceName} - Est. Day {$dataCourier[dataCourier].estimateDay}</option>
									{else}
										<option value="{$dataCourier[dataCourier].courierID}|{$dataCourier[dataCourier].serviceID}|{$dataCourier[dataCourier].costID}">{$dataCourier[dataCourier].courierName} - {$dataCourier[dataCourier].serviceName} - Est. Day {$dataCourier[dataCourier].estimateDay}</option>
									{/if}
								{/section}
							</select>
						</div>
					</div>
					<!--<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Tarif Layanan</div>
							<select id="serviceID" name="serviceID" required />
								<option value="">- Pilih tarif layanan -</option>
								{section name=dataService loop=$dataService}
									{if $sessServiceID == $dataService[dataService].costID}
										<option value="{$dataService[dataService].serviceID}|{$dataService[dataService].costID}" SELECTED>{$dataService[dataService].serviceName}</option>
									{else}
										<option value="{$dataService[dataService].serviceID}|{$dataService[dataService].costID}">{$dataService[dataService].serviceName}</option>
									{/if}
								{/section}
							</select>
						</div>
					</div>-->
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Lokasi Agen</div>
							<select id="locationID" name="locationID" required />
								{if $sessLocationID != "" AND $numsLocation == '0'}
									<option value="0">-</option>
								{else}
									<option value="">- Lokasi agen -</option>
								{/if}
								{section name=dataLocation loop=$dataLocation}
									{if $sessLocationID == $dataLocation[dataLocation].locationID}
										<option value="{$dataLocation[dataLocation].locationID}" SELECTED>{$dataLocation[dataLocation].locationName}</option>
									{else}
										<option value="{$dataLocation[dataLocation].locationID}">{$dataLocation[dataLocation].locationName}</option>
									{/if}
								{/section}
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Informasi Biaya Kirim</div>
							<div id="costID">
								{section name=dataInfo loop=$dataInfo}
									{$dataInfo[dataInfo].info}<br>
								{/section}<br>
							</div><br>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Biaya Tambahan</div>
							<div id="addCost">{$addCost}</div>
						</div><br><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Berat Paket</div>
							{$subWeight} Kg
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Gunakan Asuransi
								<a href="#" class="tooltip2"><img src="images/icon/help.png">
									<span>
								        <img class="callout" src="images/icon/callout.gif" />
								        <strong>
								        	<div id="insurance">{$insurance}</div>
								        </strong>
								    </span></a>
								</p>
							</div>
							<input type="hidden" name="subtotaladdress" id="subtotaladdress" value="{$subtotal}">
							<input type="hidden" name="totalCost" id="totalCost" value="0">
							<input type="hidden" name="totalInsurance" id="totalInsurance" value="0">
							<input type="checkbox" name="insuranceid" id="insuranceid" value="1"><br><br>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Total Biaya Kirim</div>
							<div id="totalCostDiv">Rp. -</div>
						</div><br>
					</div>
					<!--<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Estimasi Hari</div>
							<div id="estimateDay">{$estimateDay}</div>
							<p>&nbsp;</p>
						</div>
					</div>-->
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Note / Catatan</div>
							<textarea name="note" style="width: 90%;" placeholder="Tulis catatan, jika Anda ingin memberikan informasi kepada kurir yang mengantarkan paket">{$sessNote}</textarea>
						</div>
					</div>
					<button class="cusmo-btn" type="submit">Lanjutkan ke Konfirmasi Pesanan</button>
					</form>
					<p>&nbsp;</p>
					
					<div class="disabled-phases">
						<div class="phase-title">
							<h1><a href="#">Informasi Kupon Diskon</a></h1>
						</div>
						
						<div class="phase-title">
							<h1><a href="#">Konfirmasi Pesanan</a></h1>
						</div>
					</div>
					
				{elseif $module == 'checkout' AND $act == 'shippingaddress'}
					<div class="phase-title passed">
						<h1><a href="checkout.html">Keranjang Belanja</a></h1>
					</div>
					
					<div class="phase-title current">
						<h1>Shipping Address</h1>
					</div>
					<form method="POST" action="nextorder.php">
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Nama Penerima</div>
							<select name="shippingID" id="shippingID">
								<option value="+" SELECTED>{$mainName}</option>
								{section name=dataShipping loop=$dataShipping}
									{if $sessShippingID == $dataShipping[dataShipping].shippingID}
										<option value="{$dataShipping[dataShipping].shippingID}" SELECTED>{$dataShipping[dataShipping].receivedName}</option>
									{else}
										<option value="{$dataShipping[dataShipping].shippingID}">{$dataShipping[dataShipping].receivedName}</option>
									{/if}
								{/section}
							</select> 
							&nbsp;&nbsp;&nbsp;
							<a href="ch-new-shipping.html" data-width="100%" data-height="400" class="various2 fancybox.iframe" style="color: red;"><b>Tambah Penerima Baru</b></a>
						</div>
					</div>
					
					{if $sessShippingID == "" || $sessShippingID == '+'}
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Alamat</div>
								{$address}<br>
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
								<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
								{$provinceName}<br>
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
								<div class="form-label" style="width: 120px; float: left;">HP</div>
								{$cellPhone}<br>
							</div>
						</div>
					{else}
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Alamat</div>
								{$shipAddress}<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Kota</div>
								{$shipCityName}<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
								{$shipProvinceName}<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Kode Pos</div>
								{$shipZipCode}<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Telepon</div>
								{$shipPhone}<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Hp</div>
								{$shipCellPhone}<br>
							</div>
						</div>
						<br>
					{/if}
					<br>
					<div class="phase-title current">
						<h1>Shipping Method</h1>
					</div>
					
					<p>Silahkan pilih jasa ekspedisi / kurir yang disediakan, pemilihan ekspedisi dan kurir ditentukan oleh sistem sesuai dengan alamat pengiriman, tidak semua kota dijangkau oleh jasa kurir / ekspedisi tertentu, oleh karena itu kami hanya 
					menampilkan daftar kurir / ekspedisi yang tersedia dikota Anda.</p><br>
					
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Ekspedisi / Kurir</div>
							<select id="courierID" name="courierID" required />
								<option value="">- Pilih ekspedisi / kurir -</option>
								{section name=dataCourier loop=$dataCourier}
									{if $sessFull == $dataCourier[dataCourier].full}
										<option value="{$dataCourier[dataCourier].courierID}|{$dataCourier[dataCourier].serviceID}|{$dataCourier[dataCourier].costID}" SELECTED>{$dataCourier[dataCourier].courierName} - {$dataCourier[dataCourier].serviceName} - Est. Day {$dataCourier[dataCourier].estimateDay}</option>
									{else}
										<option value="{$dataCourier[dataCourier].courierID}|{$dataCourier[dataCourier].serviceID}|{$dataCourier[dataCourier].costID}">{$dataCourier[dataCourier].courierName} - {$dataCourier[dataCourier].serviceName} - Est. Day {$dataCourier[dataCourier].estimateDay}</option>
									{/if}
								{/section}
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Lokasi Agen</div>
							<select id="locationID" name="locationID" />
								<option value="">-</option>
								{section name=dataLocation loop=$dataLocation}
									{if $sessLocationID == $dataLocation[dataLocation].locationID}
										<option value="{$dataLocation[dataLocation].locationID}" SELECTED>{$dataLocation[dataLocation].locationName}</option>
									{else}
										<option value="{$dataLocation[dataLocation].locationID}">{$dataLocation[dataLocation].locationName}</option>
									{/if}
								{/section}
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px; height: 80px;">Informasi Biaya Kirim</div>
							
							<div id="costID" style="height: 80px;">
								{section name=dataInfo loop=$dataInfo}
									{$dataInfo[dataInfo].info}<br>
								{/section}
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Biaya Tambahan</div>
							<div id="addCost">{$addCost}</div>
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Berat Paket</div>
							{$subWeight} Kg
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Gunakan Asuransi
								<a href="#" class="tooltip2"><img src="images/icon/help.png">
									<span>
								        <img class="callout" src="images/icon/callout.gif" />
								        <strong>
								        	<div id="insurance">{$insurance}</div>
								        </strong>
								        Dengan menggunakan asuransi, segala kehilangan / kerusakan ditanggung oleh WSS
								    </span>
								</a>
								</p>
							</div>
							<input type="hidden" name="subtotaladdress" id="subtotaladdress" value="{$subtotal}">
							<input type="hidden" name="totalCost" id="totalCost" value="{$totalCost}">
							<input type="hidden" name="totalInsurance" id="totalInsurance" value="{$totalInsurance}">
							<input type="checkbox" name="insuranceid" id="insuranceid" value="1" {if $sessInsuranceID == '1'}CHECKED{/if}><br><br>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Total Biaya Kirim</div>
							<div id="totalCostDiv">Rp. {$total}</div>
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Note / Catatan</div>
							<textarea name="note" style="width: 90%;" placeholder="Tulis catatan, jika Anda ingin memberikan informasi kepada kurir yang mengantarkan paket">{$sessNote}</textarea>
						</div>
					</div>
					
					<div class="phase-title current">
						<h1>Informasi Kupon Diskon</h1>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Gunakan Kupon</div>
							<select id="couponID" name="couponID" />
								{if $numsCoupon == '0'}
									<option value="">Kupon Tidak Tersedia</option>
								{else}
									{section name=dataCoupon loop=$dataCoupon}
										{if $sessCouponID = $dataCoupon[dataCoupon].couponID}
											<option value="{$dataCoupon[dataCoupon].couponID}|{$dataCoupon[dataCoupon].pointID}" SELECTED>{$dataCoupon[dataCoupon].pointName}</option>
										{else}
											<option value="{$dataCoupon[dataCoupon].couponID}|{$dataCoupon[dataCoupon].pointID}">{$dataCoupon[dataCoupon].pointName}</option>
										{/if}
									{/section}
								{/if}
							</select>
						</div>
					</div>
					<br>
					<button class="cusmo-btn" type="submit">Lanjutkan ke Konfirmasi Pesanan</button>
					</form>
					
					<div class="disabled-phases">
						<!--<div class="phase-title">
							<h1><a href="#">Shipping Method</a></h1>
						</div>
						<div class="phase-title">
							<h1><a href="#">Informasi Kupon Diskon</a></h1>
						</div>-->
						<div class="phase-title">
							<h1><a href="#">Konfirmasi Pesanan</a></h1>
						</div>
					</div>
				
				{elseif $module == 'checkout' AND $act == 'confirm'}
					<div class="phase-title passed">
						<h1><a href="checkout.html">Keranjang Belanja</a></h1>
					</div>
					<div class="phase-title passed">
						<h1><a href="checkout-2.html">Shipping Address</a></h1>
					</div>
					<!--<div class="phase-title passed">
						<h1><a href="shipping-method.html">Shipping Method</a></h1>
					</div>
					
					<div class="phase-title passed">
						<h1><a href="coupon-info.html">Informasi Kupon Diskon</a></h1>
					</div>-->
					
					<div class="phase-title current">
						<h1>Konfirmasi Pesanan</h1>
					</div>
					{if $hitung > 0}
						<p style="color: red;">Mohon maaf, stok produk yang ingin Anda pesan tidak mencukupi persediaan kami, mungkin produk berikut sudah didahului/dipesan oleh member lainnya.</p>
						<p style="color: red;">
							{section name=emptyStock loop=$emptyStock}
								&bull; {$emptyStock[emptyStock].productCode} - {$emptyStock[emptyStock].productName} - {$emptyStock[emptyStock].ukuran}  (<span style="color: #000;">Tersisa : <b>{$emptyStock[emptyStock].qty}</b> pcs</span>)<br>
							{/section}
						</p>
						<p><b>Silahkan ubah kuantiti (qty) belanja Anda, dan jangan sampai didahului lagi oleh member lainnya!.</b></p><br>
					{/if}
					<p>No Order : <b>{$invoice}</b></p>
					<form method="POST" action="checkout.php?mod=checkout&act=finish">
					<table class="table">
						<thead>
							<tr>
								<th class="span1">No.</th>
								<th class="span1"></th>
								<th class="span4">Nama Produk</th>
								<th class="span1" style="text-align: center;">Ukuran(SMLXXXL)</th>
								<!-- <th class="span1" style="text-align: center;">Vol(Ml)</th> -->
								<th class="span1" style="text-align: center;">Poin</th>
								<th class="span1" style="text-align: center;">Berat (Kg)</th>
								<th class="span1" style="text-align: right;">Harga</th>
								<th class="span1" style="text-align: center;">Qty</th>
								<th class="span1" style="text-align: right;">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							{section name=dataCart loop=$dataCart}
								<tr>
									<td>{$dataCart[dataCart].no}</td>
									<td style="text-align: center;"><img src="images/products/thumb/small_{$dataCart[dataCart].image}" width="50"></td>
									<td><a href="product-{$dataCart[dataCart].productID}-{$dataCart[dataCart].productSeo}.html">{$dataCart[dataCart].productName}</a></td>
									<td style="text-align: center;">{$dataCart[dataCart].ukuran}</td>
									<!-- <td style="text-align: center;">{$dataCart[dataCart].volume}</td> -->
									<td style="text-align: center;">{$dataCart[dataCart].point}</td>
									<td style="text-align: center;">{$dataCart[dataCart].weight}</td>
									<td style="text-align: right;">{$dataCart[dataCart].priceRp}</td>
									<td style="text-align: center;">{$dataCart[dataCart].qty}</td>
									<td style="text-align: right;">{$dataCart[dataCart].subtotalRp}</td>
								</tr>
							{/section}
								<tr>
									<td colspan="4" style="text-align: right;"><b>Total</b></td>
									<td style="text-align: center;"><b>{$point}</b> <input type="hidden" name="pointTotal" value="{$point}"></td>
									<td style="text-align: center;"><b>{$weight}</b> <input type="hidden" name="weight" value="{$weight}"></td>
									<td style="text-align: center;"></td>
									<td style="text-align: center;"><b>{$subQty}</b></td>
									<td style="text-align: right;"><b>{$subtotalRp}</b> <input type="hidden" name="subtotal" value="{$subtotal}"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: right;"><b>Total Biaya Kirim</b></td>
									<td style="text-align: right;">{$totalSendCostRp} <input type="hidden" name="totalShipping" value="{$totalSendCost}"></td>
								</tr>
								<!--<tr>
									<td colspan="8" style="text-align: right;"><b>Asuransi</b></td>
									<td style="text-align: right;">{$totalInsurance} <input type="hidden" name="totalShipping" value="{$totalCost}"></td>
								</tr>-->
								<tr>
									<td colspan="8" style="text-align: right;"><b>Kupon Diskon (-)</b></td>
									<td style="text-align: right;">{$couponRp} <input type="hidden" name="couponID" value="{$couponID}"><input type="hidden" name="pointID" value="{$pointID}"><input type="hidden" name="coupon" value="{$coupon}"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: right;"><b>Kode Unik</b></td>
									<td style="text-align: right;">{$uniqueCode} <input type="hidden" name="uniqueCode" value="{$uniqueCode}"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: right;"><b>Grandtotal</b></td>
									<td style="text-align: right;">{$grandtotalRp} <input type="hidden" name="grandtotal" value="{$grandtotal}"></td>
								</tr>
						</tbody>
					</table>
					<h5>Tujuan Pengiriman</h5><br>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Nama Penerima</div>
							{$receivedName}<br>
							<input type="hidden" name="receivedName" value="{$receivedName}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Alamat</div>
							{$address}<br>
							<input type="hidden" name="address" value="{$address}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Kota</div>
							{$cityName}<br>
							<input type="hidden" name="cityName" value="{$cityName}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
							{$provinceName}<br>
							<input type="hidden" name="provinceName" value="{$provinceName}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Kode Pos</div>
							{$zipCode}<br>
							<input type="hidden" name="zipCode" value="{$zipCode}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Telepon</div>
							{$phone}<br>
							<input type="hidden" name="phone" value="{$phone}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Hp</div>
							{$cellPhone}<br>
							<input type="hidden" name="cellPhone" value="{$cellPhone}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Note / Catatan</div>
							{$sessNote}<br>
							<input type="hidden" name="note" value="{$sessNote}"><br>
						</div>
					</div>
					
					<h5>Ekspedisi Pengiriman</h5><br>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Nama Ekspedisi</div>
							{$courierName}<br>
							<input type="hidden" name="courierName" value="{$courierName}">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Lokasi Agen</div>
							{$locationName}<br>
							<input type="hidden" name="locationName" value="{$locationName}">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12" style="text-align: center;"><button type="submit" class="cusmo-btn">Kirim Pesanan</button></a></div>
					</div>
					</form>
					
				{elseif $module == 'checkout' AND $act == 'done'}
					<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
						Pesanan Anda berhasil diproses dengan nomor order <b>{$explodematch1}</b>, Total yang harus ditransfer Rp. <b>{$explodematch2}</b> (Jangan Dibulatkan), silahkan lakukan pembayaran melalui rekening berikut :<br><br>
					{section name=dataBank loop=$dataBank}
						<p>{$dataBank[dataBank].no}. <b>{$dataBank[dataBank].bankName}</b> Cabang <b>{$dataBank[dataBank].branch}</b><br>
						{$dataBank[dataBank].accountNo} a/n {$dataBank[dataBank].accountName}</p>
					{/section}
					</div><br>
					<p>Setelah melakukan pembayaran, "Konfirmasi Pembayaran" dapat dilakukan melalui salah satu media berikut : (dengan menyertakan nomor order dan rekening tujuan).</p>
					<p>Konfirmasi pembayaran sebelum Pkl. 12:00 PM akan dikirim dihari yang sama.</p>
					<a href="http://line.me/ti/p/%40Anaku"><img src="images/icon/line.png" width="50" title="Add Friend"></a>
					<a href="confirm.html"><button type="button" class="cusmo-btn">Konfirmasi Pembayaran</button></a>
					
				{elseif $module == 'checkout' AND $act == 'coupon'}
					<div class="phase-title passed">
						<h1><a href="checkout.html">Keranjang Belanja</a></h1>
					</div>
					<div class="phase-title passed">
						<h1><a href="checkout-2.html">Shipping Address</a></h1>
					</div>
					<div class="phase-title passed">
						<h1><a href="shipping-method.html">Shipping Method</a></h1>
					</div>
					
					<div class="phase-title current">
						<h1>Informasi Kupon Diskon</h1>
					</div>
					<br>
					{if $msg == '3'}
						<p style="color: green;">Anda telah memperbaharui data belanja Anda.</p>
					{/if}
					<table class="table">
						<thead>
							<tr>
								<th class="span6" style="background-color: #e5e5e5;">Nama Kupon</th>
								<th class="span4" style="background-color: #e5e5e5;">Diskon</th>
								<th class="span2" style="background-color: #e5e5e5;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							{section name=dataCoupon loop=$dataCoupon}
								<form method="POST" action="checkout.php?mod=checkout&act=insertcoupon">
								<input type="hidden" name="pointID" value="{$dataCoupon[dataCoupon].pointID}">
								<input type="hidden" name="couponID" value="{$dataCoupon[dataCoupon].couponID}">
								<tr>
									<td style="background-color: #eff3fc;">{$dataCoupon[dataCoupon].pointName}</td>
									<td style="background-color: #eff3fc;">{$dataCoupon[dataCoupon].couponRp}</td>
									<td style="background-color: #eff3fc;">
										<input class="submit cusmo-btn narrow" type="submit" value="GUNAKAN KUPON" style="border-radius: 0px;">
									</td>
								</tr>
								</form>
							{/section}
						</tbody>
					</table>
					<div class="row-fluid">
						<div class="span12" style="text-align: center;"><a href="checkout.php?mod=checkout&act=ignorecoupon"><button type="button" class="cusmo-btn">ABAIKAN KUPON</button></a></div>
					</div>
					
					<div class="disabled-phases">
						<div class="phase-title">
							<h1><a href="#">Konfirmasi Pesanan</a></h1>
						</div>
					</div>
					
				{else}
					<div class="phase-title current">
						<h1>Keranjang Belanja</h1>
					</div>
					<br>
					{if $sessCart == '3'}
						<p style="color: green;">Anda telah memperbaharui data belanja Anda.</p>
					{/if}
					<p>No Order : <b>{$invoice}</b></p>
					<p>Total Point Reward : <b>{$point}</b></p>
					<table class="table">
						<thead>
							<tr>
								<th class="span1">No.</th>
								<th class="span1"></th>
								<th class="span3">Nama Produk</th>
								<th class="span1" style="text-align: center;">Ukuran (SMLXXL)</th>
								<!-- <th class="span1" style="text-align: center;">Vol(Ml)</th>
								<th class="span1" style="text-align: center;">Kadar(%)</th> -->
								<th class="span1" style="text-align: center;">Berat</th>
								<th class="span1" style="text-align: right;">Harga</th>
								<th class="span1" style="text-align: center;">Qty</th>
								<th class="span1" style="text-align: right;">Subtotal</th>
								<th class="span1">Aksi</th>
							</tr>
						</thead>
						<tbody>
							{section name=dataCart loop=$dataCart}
								<tr>
									<td>{$dataCart[dataCart].no}</td>
									<td style="text-align: center;"><img src="images/products/thumb/small_{$dataCart[dataCart].image}" width="50"></td>
									<td><a href="product-{$dataCart[dataCart].productID}-{$dataCart[dataCart].productSeo}.html">{$dataCart[dataCart].productName}</a></td>
									<td style="text-align: center;">{$dataCart[dataCart].ukuran}</td>
									<!-- <td style="text-align: center;">{$dataCart[dataCart].volume}</td>
									<td style="text-align: center;">{$dataCart[dataCart].alcohol}</td> -->
									<td style="text-align: center;">{$dataCart[dataCart].weight}</td>
									<td style="text-align: right;">{$dataCart[dataCart].priceRp}</td>
									<td style="text-align: center;">
										<select name="qty[]" style="width: 60px;" id="qty">
										{section name=stock loop=$dataCart[dataCart].stock}
											{if $dataCart[dataCart].qty == $dataCart[dataCart].stock[stock]}
												<option value="{$dataCart[dataCart].stock[stock]}|{$dataCart[dataCart].productID}|{$dataCart[dataCart].cartID}|{$dataCart[dataCart].price}" SELECTED>{$dataCart[dataCart].stock[stock]}</option>
											{else}
												<option value="{$dataCart[dataCart].stock[stock]}|{$dataCart[dataCart].productID}|{$dataCart[dataCart].cartID}|{$dataCart[dataCart].price}">{$dataCart[dataCart].stock[stock]}</option>
											{/if}
										{/section}
										</select>
									</td>
									<td style="text-align: right;">{$dataCart[dataCart].subtotalRp}</td>
									<td>
										<a href="cart.php?mod=cart&act=delete&cartID={$dataCart[dataCart].cartID}" title="Delete" onClick="return confirm('Hapus item ini dari keranjang belanja?')"><img src="images/icon/delete.jpg" width="20" title="Lihat detil"></a>
									</td>
								</tr>
							{/section}
						</tbody>
					</table>
					<div class="row-fluid">
						<div class="span12"><p><a href="home"><button type="button" class="cusmo-btn gray">Lanjutkan Belanja</button></a></p>
						<p>
							{if $sessLevel == '1'}
								<a href="checkout-2.html"><button type="button" class="cusmo-btn">LANJUTKAN PEMBAYARAN</button></a>
							{else}
								{if $subQty >= $sessRequirement}
									<a href="checkout-2.html"><button type="button" class="cusmo-btn">LANJUTKAN PEMBAYARAN</button></a>
								{else}
									<p style="color: red;">Anda adalah {if $sessLevel == '2'}Reseller, <br>minimum kuantiti pembelian adalah {$sessRequirement}<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah {$subQty}, <br>silahkan tambah kuantiti pembelian.{elseif $sessLevel == '3'}Member Khusus (Spesial), <br>minimum kuantiti pembelian adalah {$sessRequirement}<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah {$subQty}, <br>silahkan tambah kuantiti pembelian.{/if}</p>
								{/if}
							{/if}
						</p>
						</div>
						<!--<div class="span6" style="text-align: right;">
							{if $sessLevel == '1'}
								<a href="checkout-2.html"><button type="button" class="cusmo-btn">CHECKOUT</button></a>
							{else}
								{if $subQty >= $sessRequirement}
									<a href="checkout-2.html"><button type="button" class="cusmo-btn">CHECKOUT</button></a>
								{else}
									<p style="color: red;">Anda adalah {if $sessLevel == '2'}Reseller, <br>minimum kuantiti pembelian adalah {$sessRequirement}<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah {$subQty}, <br>silahkan tambah kuantiti pembelian.{elseif $sessLevel == '3'}Member Khusus (Spesial), <br>minimum kuantiti pembelian adalah {$sessRequirement}<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah {$subQty}, <br>silahkan tambah kuantiti pembelian.{/if}</p>
								{/if}
							{/if}
						</div>-->
					</div>
					
					<div class="disabled-phases">
						<div class="phase-title">
							<h1><a href="#">Shipping Address</a></h1>
						</div>
						<div class="phase-title">
							<h1><a href="#">Shipping Method</a></h1>
						</div>
						<div class="phase-title">
							<h1><a href="#">Informasi Kupon Diskon</a></h1>
						</div>
						<div class="phase-title">
							<h1><a href="#">Konfirmasi Pesanan</a></h1>
						</div>
					</div>
				{/if}
			{/if}
		</div>
	</section>

{include file="footer.tpl"}