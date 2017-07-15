<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<body style='background-color: #FFF; color: #000;'>
{literal}
	<script>
		$(document).ready(function() {
			
			$("#yourEmail").submit(function() { return false; });
	
			$("#send").on("click", function(){
				var email = $("#email").val();
				var productID = $("#productID").val();
				var qty = $("#qty").val();
				var hp = $("#hp").val();
				
				if (productID != '' && email != '' && qty != '' && hp != ''){
				
					$.ajax({
						type: 'POST',
						url: 'save_request_order.php',
						dataType: 'JSON',
						data:{
							productID: productID,
							email: email,
							qty: qty,
							hp: hp
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
				
{if $module == 'request' AND $act == 'order'}
	<p><b>Request Qty</b> membantu Anda untuk memperoleh produk dan qty yang Anda inginkan, jika Anda menginginkan produk ini dengan qty tertentu, silahkan isi form dibawah, kami akan memberitahukan kepada Anda ketika produk sudah tersedia.</p>
	<form id="yourEmail" name="yourEmail" method="POST" action="#">
		<input type="hidden" id="productID" name="productID" value="{$productID}">
		<h4 style="font-family: Arial;">Masukkan Email Anda :</h4>
		<input type="email" id="email" value="{$sessEmail}" name="email" placeholder="Email Anda" style="display: block; width: 100%; height: 40px; padding: 6px 12px; font-size: 14px; line-height: 1.428571429; color: #555; background-color: #fff; border: 1px solid #ccc; border-radius: 4px;" required>
		<h4 style="font-family: Arial;">Masukkan Nomor Handphone (HP) Anda :</h4>
		<input type="text" id="hp" name="hp" placeholder="Nomor HP Anda" maxlength="20" style="display: block; width: 100%; height: 40px; padding: 6px 12px; font-size: 14px; line-height: 1.428571429; color: #555; background-color: #fff; border: 1px solid #ccc; border-radius: 4px;" required>
		<h4 style="font-family: Arial;">Masukkan Request Qty :</h4>
		<input type="number" id="qty" value="1" name="qty" placeholder="Request qty" style="display: block; width: 100%; height: 40px; padding: 6px 12px; font-size: 14px; line-height: 1.428571429; color: #555; background-color: #fff; border: 1px solid #ccc; border-radius: 4px;" required><br>
		<button id="send" class="btn btn-primary">SUBMIT</button>
	</form>
	<p>&nbsp;</p>
{/if}
</body>