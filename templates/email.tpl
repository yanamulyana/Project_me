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
				
				if (productID != '' && email != ''){
				
					$.ajax({
						type: 'POST',
						url: 'save_email.php',
						dataType: 'JSON',
						data:{
							productID: productID,
							email: email
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
				
{if $module == 'tell' AND $act == 'me'}
	<h3 style="font-family: Arial;">Masukkan Email Anda :</h3>
		
	<form id="yourEmail" name="yourEmail" method="POST" action="#">
		<input type="hidden" id="productID" name="productID" value="{$productID}">
		<input type="email" id="email" value="{$sessEmail}" name="email" placeholder="Email Anda" style="display: block; width: 100%; height: 40px; padding: 6px 12px; font-size: 14px; line-height: 1.428571429; color: #555; background-color: #fff; border: 1px solid #ccc; border-radius: 4px;" required></td>
		<button id="send" class="btn btn-primary">SUBMIT</button>
	</form>
	<p>&nbsp;</p>
{/if}
</body>