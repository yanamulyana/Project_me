<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>

{literal}
	<script>
		$(document).ready(function() {
			$("#trx").submit(function() { return false; });
			
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
	
			$("#send").on("click", function(){
				var receivedName = $("#receivedName").val();
				var address = $("#address").val();
				var gender = $("#gender").val();
				var provinceID = $("#provinceID").val();
				var cityID = $("#cityID").val();
				var zipCode = $("#zipCode").val();
				var phone = $("#phone").val();
				var cellPhone = $("#cellPhone").val();
				
				if (receivedName != '' && address != '' && cityID != '' && gender != "" && provinceID != "" && cellPhone != ''){
				
					$.ajax({
						type: 'POST',
						url: 'save_ch_add_shipping.php',
						dataType: 'JSON',
						data:{
							receivedName: receivedName,
							address: address,
							gender: gender,
							provinceID: provinceID,
							cityID: cityID,
							zipCode: zipCode,
							phone: phone,
							cellPhone: cellPhone
						},
						beforeSend: function (data) {
							$('#send').hide();
						},
						success: function(data) {
							parent.jQuery.fancybox.close();
						}
					});
				}
			});
		});
	</script>
{/literal}

<div class="wrapper">
	<section class="section-checkout">
		<div class="container">
			<h4>Tambah Daftar Pengiriman</h4>
		
			<form id="trx" name="trx" method="POST" action="#">
				<div class="control-group">
					<div class="controls">
						<div class="form-label">Nama Penerima</div>
						<input type="text" id="receivedName" name="receivedName" placeholder="Nama penerima" class="required span12 cusmo-input" style="height: 30px;" required />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="form-label">Gender</div>
						<input type="radio" id="gender" name="gender" value="L" required /> Laki-laki &nbsp;&nbsp;&nbsp;
						<input type="radio" id="gender" name="gender" value="P" /> Perempuan
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="form-label">Alamat</div>
						<textarea id="address" name="address" placeholder="Alamat" class="required span12 cusmo-input" required /></textarea>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="form-label">Propinsi</div>
						<select id="provinceID" name="provinceID" class="required span12 cusmo-input" required />
							<option value="">- Pilih nama propinsi -</option>
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
							<option value="">- Pilih kecamatan / kota -</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="form-label">Kode Pos</div>
						<input type="text" id="zipCode" name="zipCode" placeholder="Kode pos" class="required span12 cusmo-input" style="height: 30px;" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="form-label">Telepon</div>
						<input type="text" id="phone" name="phone" placeholder="Telepon" class="required span12 cusmo-input" style="height: 30px;" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<div class="form-label">HP</div>
						<input type="text" id="cellPhone" name="cellPhone" placeholder="Nomor handphone" class="required span12 cusmo-input" style="height: 30px;" required />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" id="send" class="cusmo-btn"><span style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;">SIMPAN</span></button>
					</div>
				</div>
				<p>&nbsp;</p>
			</form>
		</div>
	</section>
</div>