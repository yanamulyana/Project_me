<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:08:03
         compiled from ".\templates\checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123593e0593028876-44725793%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bef75e3162388f0facac4d055b4457c1c531c61' => 
    array (
      0 => '.\\templates\\checkout.tpl',
      1 => 1497224249,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123593e0593028876-44725793',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessMemberID' => 0,
    'sessEmail' => 0,
    'module' => 0,
    'act' => 0,
    'dataCourier' => 0,
    'sessCourierID' => 0,
    'dataService' => 0,
    'sessServiceID' => 0,
    'sessLocationID' => 0,
    'numsLocation' => 0,
    'dataLocation' => 0,
    'dataInfo' => 0,
    'addCost' => 0,
    'subWeight' => 0,
    'insurance' => 0,
    'subtotal' => 0,
    'estimateDay' => 0,
    'sessNote' => 0,
    'mainName' => 0,
    'dataShipping' => 0,
    'sessShippingID' => 0,
    'address' => 0,
    'cityName' => 0,
    'provinceName' => 0,
    'zipCode' => 0,
    'phone' => 0,
    'cellPhone' => 0,
    'shipAddress' => 0,
    'shipCityName' => 0,
    'shipProvinceName' => 0,
    'shipZipCode' => 0,
    'shipPhone' => 0,
    'shipCellPhone' => 0,
    'sessFull' => 0,
    'totalCost' => 0,
    'totalInsurance' => 0,
    'sessInsuranceID' => 0,
    'total' => 0,
    'numsCoupon' => 0,
    'dataCoupon' => 0,
    'hitung' => 0,
    'emptyStock' => 0,
    'invoice' => 0,
    'dataCart' => 0,
    'point' => 0,
    'weight' => 0,
    'subQty' => 0,
    'subtotalRp' => 0,
    'totalSendCostRp' => 0,
    'totalSendCost' => 0,
    'couponRp' => 0,
    'couponID' => 0,
    'pointID' => 0,
    'coupon' => 0,
    'uniqueCode' => 0,
    'grandtotalRp' => 0,
    'grandtotal' => 0,
    'receivedName' => 0,
    'courierName' => 0,
    'locationName' => 0,
    'explodematch1' => 0,
    'explodematch2' => 0,
    'dataBank' => 0,
    'msg' => 0,
    'sessCart' => 0,
    'sessLevel' => 0,
    'sessRequirement' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e05934a0f09_10017575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e05934a0f09_10017575')) {function content_593e05934a0f09_10017575($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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


<div class="wrapper">
	<section class="section-head">
		<div class="container">
			<div class="row-fluid top-row">
				<div class="span5">
					
					<?php echo $_smarty_tpl->getSubTemplate ("logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					
				</div>
				
				<div class="span7">
					<?php echo $_smarty_tpl->getSubTemplate ("topnavigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			</div>
		</div>
		
		<div class="top-categories">
			<div class="container">
				<div class="row-fluid">
					<div class="span9">
						<?php echo $_smarty_tpl->getSubTemplate ("categoriesnavigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
			
			<?php if ($_smarty_tpl->tpl_vars['sessMemberID']->value==''&&$_smarty_tpl->tpl_vars['sessEmail']->value==''){?>
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
			<?php }else{ ?>
				<?php if ($_smarty_tpl->tpl_vars['module']->value=='checkout'&&$_smarty_tpl->tpl_vars['act']->value=='shippingmethod'){?>
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
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['name'] = 'dataCourier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCourier']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['sessCourierID']->value==$_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID']){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['costID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceName'];?>
 - Est. Day <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['estimateDay'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['costID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceName'];?>
 - Est. Day <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['estimateDay'];?>
</option>
									<?php }?>
								<?php endfor; endif; ?>
							</select>
						</div>
					</div>
					<!--<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Tarif Layanan</div>
							<select id="serviceID" name="serviceID" required />
								<option value="">- Pilih tarif layanan -</option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['name'] = 'dataService';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataService']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataService']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['sessServiceID']->value==$_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['costID']){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['costID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceName'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['costID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceName'];?>
</option>
									<?php }?>
								<?php endfor; endif; ?>
							</select>
						</div>
					</div>-->
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Lokasi Agen</div>
							<select id="locationID" name="locationID" required />
								<?php if ($_smarty_tpl->tpl_vars['sessLocationID']->value!=''&&$_smarty_tpl->tpl_vars['numsLocation']->value=='0'){?>
									<option value="0">-</option>
								<?php }else{ ?>
									<option value="">- Lokasi agen -</option>
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['name'] = 'dataLocation';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataLocation']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['sessLocationID']->value==$_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID']){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationName'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationName'];?>
</option>
									<?php }?>
								<?php endfor; endif; ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Informasi Biaya Kirim</div>
							<div id="costID">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['name'] = 'dataInfo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataInfo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total']);
?>
									<?php echo $_smarty_tpl->tpl_vars['dataInfo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInfo']['index']]['info'];?>
<br>
								<?php endfor; endif; ?><br>
							</div><br>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Biaya Tambahan</div>
							<div id="addCost"><?php echo $_smarty_tpl->tpl_vars['addCost']->value;?>
</div>
						</div><br><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Berat Paket</div>
							<?php echo $_smarty_tpl->tpl_vars['subWeight']->value;?>
 Kg
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Gunakan Asuransi
								<a href="#" class="tooltip2"><img src="images/icon/help.png">
									<span>
								        <img class="callout" src="images/icon/callout.gif" />
								        <strong>
								        	<div id="insurance"><?php echo $_smarty_tpl->tpl_vars['insurance']->value;?>
</div>
								        </strong>
								    </span></a>
								</p>
							</div>
							<input type="hidden" name="subtotaladdress" id="subtotaladdress" value="<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
">
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
							<div id="estimateDay"><?php echo $_smarty_tpl->tpl_vars['estimateDay']->value;?>
</div>
							<p>&nbsp;</p>
						</div>
					</div>-->
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Note / Catatan</div>
							<textarea name="note" style="width: 90%;" placeholder="Tulis catatan, jika Anda ingin memberikan informasi kepada kurir yang mengantarkan paket"><?php echo $_smarty_tpl->tpl_vars['sessNote']->value;?>
</textarea>
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
					
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='checkout'&&$_smarty_tpl->tpl_vars['act']->value=='shippingaddress'){?>
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
								<option value="+" SELECTED><?php echo $_smarty_tpl->tpl_vars['mainName']->value;?>
</option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['name'] = 'dataShipping';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataShipping']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataShipping']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['sessShippingID']->value==$_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['shippingID']){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['shippingID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['receivedName'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['shippingID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['receivedName'];?>
</option>
									<?php }?>
								<?php endfor; endif; ?>
							</select> 
							&nbsp;&nbsp;&nbsp;
							<a href="ch-new-shipping.html" data-width="100%" data-height="400" class="various2 fancybox.iframe" style="color: red;"><b>Tambah Penerima Baru</b></a>
						</div>
					</div>
					
					<?php if ($_smarty_tpl->tpl_vars['sessShippingID']->value==''||$_smarty_tpl->tpl_vars['sessShippingID']->value=='+'){?>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Alamat</div>
								<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Kota</div>
								<?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
								<?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Kode Pos</div>
								<?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Telepon</div>
								<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">HP</div>
								<?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
<br>
							</div>
						</div>
					<?php }else{ ?>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Alamat</div>
								<?php echo $_smarty_tpl->tpl_vars['shipAddress']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Kota</div>
								<?php echo $_smarty_tpl->tpl_vars['shipCityName']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
								<?php echo $_smarty_tpl->tpl_vars['shipProvinceName']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Kode Pos</div>
								<?php echo $_smarty_tpl->tpl_vars['shipZipCode']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Telepon</div>
								<?php echo $_smarty_tpl->tpl_vars['shipPhone']->value;?>
<br>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="form-label" style="width: 120px; float: left;">Hp</div>
								<?php echo $_smarty_tpl->tpl_vars['shipCellPhone']->value;?>
<br>
							</div>
						</div>
						<br>
					<?php }?>
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
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['name'] = 'dataCourier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCourier']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['sessFull']->value==$_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['full']){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['costID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceName'];?>
 - Est. Day <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['estimateDay'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['costID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['serviceName'];?>
 - Est. Day <?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['estimateDay'];?>
</option>
									<?php }?>
								<?php endfor; endif; ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Lokasi Agen</div>
							<select id="locationID" name="locationID" />
								<option value="">-</option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['name'] = 'dataLocation';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataLocation']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataLocation']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['sessLocationID']->value==$_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID']){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationName'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataLocation']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataLocation']['index']]['locationName'];?>
</option>
									<?php }?>
								<?php endfor; endif; ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px; height: 80px;">Informasi Biaya Kirim</div>
							
							<div id="costID" style="height: 80px;">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['name'] = 'dataInfo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataInfo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataInfo']['total']);
?>
									<?php echo $_smarty_tpl->tpl_vars['dataInfo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataInfo']['index']]['info'];?>
<br>
								<?php endfor; endif; ?>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Biaya Tambahan</div>
							<div id="addCost"><?php echo $_smarty_tpl->tpl_vars['addCost']->value;?>
</div>
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Berat Paket</div>
							<?php echo $_smarty_tpl->tpl_vars['subWeight']->value;?>
 Kg
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Gunakan Asuransi
								<a href="#" class="tooltip2"><img src="images/icon/help.png">
									<span>
								        <img class="callout" src="images/icon/callout.gif" />
								        <strong>
								        	<div id="insurance"><?php echo $_smarty_tpl->tpl_vars['insurance']->value;?>
</div>
								        </strong>
								        Dengan menggunakan asuransi, segala kehilangan / kerusakan ditanggung oleh WSS
								    </span>
								</a>
								</p>
							</div>
							<input type="hidden" name="subtotaladdress" id="subtotaladdress" value="<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
">
							<input type="hidden" name="totalCost" id="totalCost" value="<?php echo $_smarty_tpl->tpl_vars['totalCost']->value;?>
">
							<input type="hidden" name="totalInsurance" id="totalInsurance" value="<?php echo $_smarty_tpl->tpl_vars['totalInsurance']->value;?>
">
							<input type="checkbox" name="insuranceid" id="insuranceid" value="1" <?php if ($_smarty_tpl->tpl_vars['sessInsuranceID']->value=='1'){?>CHECKED<?php }?>><br><br>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Total Biaya Kirim</div>
							<div id="totalCostDiv">Rp. <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</div>
						</div><br>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Note / Catatan</div>
							<textarea name="note" style="width: 90%;" placeholder="Tulis catatan, jika Anda ingin memberikan informasi kepada kurir yang mengantarkan paket"><?php echo $_smarty_tpl->tpl_vars['sessNote']->value;?>
</textarea>
						</div>
					</div>
					
					<div class="phase-title current">
						<h1>Informasi Kupon Diskon</h1>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="float: left; width: 150px;">Gunakan Kupon</div>
							<select id="couponID" name="couponID" />
								<?php if ($_smarty_tpl->tpl_vars['numsCoupon']->value=='0'){?>
									<option value="">Kupon Tidak Tersedia</option>
								<?php }else{ ?>
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['name'] = 'dataCoupon';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCoupon']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total']);
?>
										<?php if (!isset($_smarty_tpl->tpl_vars['sessCouponID'])) $_smarty_tpl->tpl_vars['sessCouponID'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['sessCouponID']->value = $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['couponID']){?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['couponID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointName'];?>
</option>
										<?php }else{ ?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['couponID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointName'];?>
</option>
										<?php }?>
									<?php endfor; endif; ?>
								<?php }?>
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
				
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='checkout'&&$_smarty_tpl->tpl_vars['act']->value=='confirm'){?>
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
					<?php if ($_smarty_tpl->tpl_vars['hitung']->value>0){?>
						<p style="color: red;">Mohon maaf, stok produk yang ingin Anda pesan tidak mencukupi persediaan kami, mungkin produk berikut sudah didahului/dipesan oleh member lainnya.</p>
						<p style="color: red;">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['name'] = 'emptyStock';
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['emptyStock']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['emptyStock']['total']);
?>
								&bull; <?php echo $_smarty_tpl->tpl_vars['emptyStock']->value[$_smarty_tpl->getVariable('smarty')->value['section']['emptyStock']['index']]['productCode'];?>
 - <?php echo $_smarty_tpl->tpl_vars['emptyStock']->value[$_smarty_tpl->getVariable('smarty')->value['section']['emptyStock']['index']]['productName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['emptyStock']->value[$_smarty_tpl->getVariable('smarty')->value['section']['emptyStock']['index']]['ukuran'];?>
  (<span style="color: #000;">Tersisa : <b><?php echo $_smarty_tpl->tpl_vars['emptyStock']->value[$_smarty_tpl->getVariable('smarty')->value['section']['emptyStock']['index']]['qty'];?>
</b> pcs</span>)<br>
							<?php endfor; endif; ?>
						</p>
						<p><b>Silahkan ubah kuantiti (qty) belanja Anda, dan jangan sampai didahului lagi oleh member lainnya!.</b></p><br>
					<?php }?>
					<p>No Order : <b><?php echo $_smarty_tpl->tpl_vars['invoice']->value;?>
</b></p>
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
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['name'] = 'dataCart';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCart']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['no'];?>
</td>
									<td style="text-align: center;"><img src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['image'];?>
" width="50"></td>
									<td><a href="product-<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productSeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productName'];?>
</a></td>
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['ukuran'];?>
</td>
									<!-- <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['volume'];?>
</td> -->
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['point'];?>
</td>
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['weight'];?>
</td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['priceRp'];?>
</td>
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['qty'];?>
</td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['subtotalRp'];?>
</td>
								</tr>
							<?php endfor; endif; ?>
								<tr>
									<td colspan="4" style="text-align: right;"><b>Total</b></td>
									<td style="text-align: center;"><b><?php echo $_smarty_tpl->tpl_vars['point']->value;?>
</b> <input type="hidden" name="pointTotal" value="<?php echo $_smarty_tpl->tpl_vars['point']->value;?>
"></td>
									<td style="text-align: center;"><b><?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
</b> <input type="hidden" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
"></td>
									<td style="text-align: center;"></td>
									<td style="text-align: center;"><b><?php echo $_smarty_tpl->tpl_vars['subQty']->value;?>
</b></td>
									<td style="text-align: right;"><b><?php echo $_smarty_tpl->tpl_vars['subtotalRp']->value;?>
</b> <input type="hidden" name="subtotal" value="<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: right;"><b>Total Biaya Kirim</b></td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['totalSendCostRp']->value;?>
 <input type="hidden" name="totalShipping" value="<?php echo $_smarty_tpl->tpl_vars['totalSendCost']->value;?>
"></td>
								</tr>
								<!--<tr>
									<td colspan="8" style="text-align: right;"><b>Asuransi</b></td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['totalInsurance']->value;?>
 <input type="hidden" name="totalShipping" value="<?php echo $_smarty_tpl->tpl_vars['totalCost']->value;?>
"></td>
								</tr>-->
								<tr>
									<td colspan="8" style="text-align: right;"><b>Kupon Diskon (-)</b></td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['couponRp']->value;?>
 <input type="hidden" name="couponID" value="<?php echo $_smarty_tpl->tpl_vars['couponID']->value;?>
"><input type="hidden" name="pointID" value="<?php echo $_smarty_tpl->tpl_vars['pointID']->value;?>
"><input type="hidden" name="coupon" value="<?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: right;"><b>Kode Unik</b></td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['uniqueCode']->value;?>
 <input type="hidden" name="uniqueCode" value="<?php echo $_smarty_tpl->tpl_vars['uniqueCode']->value;?>
"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: right;"><b>Grandtotal</b></td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['grandtotalRp']->value;?>
 <input type="hidden" name="grandtotal" value="<?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
"></td>
								</tr>
						</tbody>
					</table>
					<h5>Tujuan Pengiriman</h5><br>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Nama Penerima</div>
							<?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
<br>
							<input type="hidden" name="receivedName" value="<?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Alamat</div>
							<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
<br>
							<input type="hidden" name="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Kota</div>
							<?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
<br>
							<input type="hidden" name="cityName" value="<?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Propinsi</div>
							<?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
<br>
							<input type="hidden" name="provinceName" value="<?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Kode Pos</div>
							<?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
<br>
							<input type="hidden" name="zipCode" value="<?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Telepon</div>
							<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
<br>
							<input type="hidden" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Hp</div>
							<?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
<br>
							<input type="hidden" name="cellPhone" value="<?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Note / Catatan</div>
							<?php echo $_smarty_tpl->tpl_vars['sessNote']->value;?>
<br>
							<input type="hidden" name="note" value="<?php echo $_smarty_tpl->tpl_vars['sessNote']->value;?>
"><br>
						</div>
					</div>
					
					<h5>Ekspedisi Pengiriman</h5><br>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Nama Ekspedisi</div>
							<?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
<br>
							<input type="hidden" name="courierName" value="<?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<div class="form-label" style="width: 120px; float: left;">Lokasi Agen</div>
							<?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
<br>
							<input type="hidden" name="locationName" value="<?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
">
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12" style="text-align: center;"><button type="submit" class="cusmo-btn">Kirim Pesanan</button></a></div>
					</div>
					</form>
					
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='checkout'&&$_smarty_tpl->tpl_vars['act']->value=='done'){?>
					<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
						Pesanan Anda berhasil diproses dengan nomor order <b><?php echo $_smarty_tpl->tpl_vars['explodematch1']->value;?>
</b>, Total yang harus ditransfer Rp. <b><?php echo $_smarty_tpl->tpl_vars['explodematch2']->value;?>
</b> (Jangan Dibulatkan), silahkan lakukan pembayaran melalui rekening berikut :<br><br>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['name'] = 'dataBank';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBank']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBank']['total']);
?>
						<p><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['no'];?>
. <b><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['bankName'];?>
</b> Cabang <b><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['branch'];?>
</b><br>
						<?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountNo'];?>
 a/n <?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountName'];?>
</p>
					<?php endfor; endif; ?>
					</div><br>
					<p>Setelah melakukan pembayaran, "Konfirmasi Pembayaran" dapat dilakukan melalui salah satu media berikut : (dengan menyertakan nomor order dan rekening tujuan).</p>
					<p>Konfirmasi pembayaran sebelum Pkl. 12:00 PM akan dikirim dihari yang sama.</p>
					<a href="http://line.me/ti/p/%40Anaku"><img src="images/icon/line.png" width="50" title="Add Friend"></a>
					<a href="confirm.html"><button type="button" class="cusmo-btn">Konfirmasi Pembayaran</button></a>
					
				<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='checkout'&&$_smarty_tpl->tpl_vars['act']->value=='coupon'){?>
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
					<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
						<p style="color: green;">Anda telah memperbaharui data belanja Anda.</p>
					<?php }?>
					<table class="table">
						<thead>
							<tr>
								<th class="span6" style="background-color: #e5e5e5;">Nama Kupon</th>
								<th class="span4" style="background-color: #e5e5e5;">Diskon</th>
								<th class="span2" style="background-color: #e5e5e5;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['name'] = 'dataCoupon';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCoupon']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCoupon']['total']);
?>
								<form method="POST" action="checkout.php?mod=checkout&act=insertcoupon">
								<input type="hidden" name="pointID" value="<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointID'];?>
">
								<input type="hidden" name="couponID" value="<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['couponID'];?>
">
								<tr>
									<td style="background-color: #eff3fc;"><?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointName'];?>
</td>
									<td style="background-color: #eff3fc;"><?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['couponRp'];?>
</td>
									<td style="background-color: #eff3fc;">
										<input class="submit cusmo-btn narrow" type="submit" value="GUNAKAN KUPON" style="border-radius: 0px;">
									</td>
								</tr>
								</form>
							<?php endfor; endif; ?>
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
					
				<?php }else{ ?>
					<div class="phase-title current">
						<h1>Keranjang Belanja</h1>
					</div>
					<br>
					<?php if ($_smarty_tpl->tpl_vars['sessCart']->value=='3'){?>
						<p style="color: green;">Anda telah memperbaharui data belanja Anda.</p>
					<?php }?>
					<p>No Order : <b><?php echo $_smarty_tpl->tpl_vars['invoice']->value;?>
</b></p>
					<p>Total Point Reward : <b><?php echo $_smarty_tpl->tpl_vars['point']->value;?>
</b></p>
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
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['name'] = 'dataCart';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCart']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCart']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['no'];?>
</td>
									<td style="text-align: center;"><img src="images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['image'];?>
" width="50"></td>
									<td><a href="product-<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productSeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productName'];?>
</a></td>
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['ukuran'];?>
</td>
									<!-- <td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['volume'];?>
</td>
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['alcohol'];?>
</td> -->
									<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['weight'];?>
</td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['priceRp'];?>
</td>
									<td style="text-align: center;">
										<select name="qty[]" style="width: 60px;" id="qty">
										<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['stock'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['name'] = 'stock';
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['stock']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['stock']['total']);
?>
											<?php if ($_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['qty']==$_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['stock']['index']]){?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['stock']['index']];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['cartID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['price'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['stock']['index']];?>
</option>
											<?php }else{ ?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['stock']['index']];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['productID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['cartID'];?>
|<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['stock'][$_smarty_tpl->getVariable('smarty')->value['section']['stock']['index']];?>
</option>
											<?php }?>
										<?php endfor; endif; ?>
										</select>
									</td>
									<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['subtotalRp'];?>
</td>
									<td>
										<a href="cart.php?mod=cart&act=delete&cartID=<?php echo $_smarty_tpl->tpl_vars['dataCart']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCart']['index']]['cartID'];?>
" title="Delete" onClick="return confirm('Hapus item ini dari keranjang belanja?')"><img src="images/icon/delete.jpg" width="20" title="Lihat detil"></a>
									</td>
								</tr>
							<?php endfor; endif; ?>
						</tbody>
					</table>
					<div class="row-fluid">
						<div class="span12"><p><a href="home"><button type="button" class="cusmo-btn gray">Lanjutkan Belanja</button></a></p>
						<p>
							<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='1'){?>
								<a href="checkout-2.html"><button type="button" class="cusmo-btn">LANJUTKAN PEMBAYARAN</button></a>
							<?php }else{ ?>
								<?php if ($_smarty_tpl->tpl_vars['subQty']->value>=$_smarty_tpl->tpl_vars['sessRequirement']->value){?>
									<a href="checkout-2.html"><button type="button" class="cusmo-btn">LANJUTKAN PEMBAYARAN</button></a>
								<?php }else{ ?>
									<p style="color: red;">Anda adalah <?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>Reseller, <br>minimum kuantiti pembelian adalah <?php echo $_smarty_tpl->tpl_vars['sessRequirement']->value;?>
<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah <?php echo $_smarty_tpl->tpl_vars['subQty']->value;?>
, <br>silahkan tambah kuantiti pembelian.<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>Member Khusus (Spesial), <br>minimum kuantiti pembelian adalah <?php echo $_smarty_tpl->tpl_vars['sessRequirement']->value;?>
<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah <?php echo $_smarty_tpl->tpl_vars['subQty']->value;?>
, <br>silahkan tambah kuantiti pembelian.<?php }?></p>
								<?php }?>
							<?php }?>
						</p>
						</div>
						<!--<div class="span6" style="text-align: right;">
							<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='1'){?>
								<a href="checkout-2.html"><button type="button" class="cusmo-btn">CHECKOUT</button></a>
							<?php }else{ ?>
								<?php if ($_smarty_tpl->tpl_vars['subQty']->value>=$_smarty_tpl->tpl_vars['sessRequirement']->value){?>
									<a href="checkout-2.html"><button type="button" class="cusmo-btn">CHECKOUT</button></a>
								<?php }else{ ?>
									<p style="color: red;">Anda adalah <?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='2'){?>Reseller, <br>minimum kuantiti pembelian adalah <?php echo $_smarty_tpl->tpl_vars['sessRequirement']->value;?>
<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah <?php echo $_smarty_tpl->tpl_vars['subQty']->value;?>
, <br>silahkan tambah kuantiti pembelian.<?php }elseif($_smarty_tpl->tpl_vars['sessLevel']->value=='3'){?>Member Khusus (Spesial), <br>minimum kuantiti pembelian adalah <?php echo $_smarty_tpl->tpl_vars['sessRequirement']->value;?>
<br>Anda belum bisa melanjutkan proses, karena total kuantiti Anda adalah <?php echo $_smarty_tpl->tpl_vars['subQty']->value;?>
, <br>silahkan tambah kuantiti pembelian.<?php }?></p>
								<?php }?>
							<?php }?>
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
				<?php }?>
			<?php }?>
		</div>
	</section>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>