<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:13:04
         compiled from ".\templates\adm_sales_transactions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21206593e06c0404883-86385647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b08d9096f032c3358bb36467663330a98667f93' => 
    array (
      0 => '.\\templates\\adm_sales_transactions.tpl',
      1 => 1497220294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21206593e06c0404883-86385647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'sessSInvoiceID' => 0,
    'sessReceivedName' => 0,
    'invoiceDate' => 0,
    'sessAddress' => 0,
    'sessZipCode' => 0,
    'sessShippingType' => 0,
    'dataProvince' => 0,
    'sessProvinceID' => 0,
    'sessNomorResi' => 0,
    'dataCity' => 0,
    'sessCityID' => 0,
    'sessOngkir' => 0,
    'sessCellPhone' => 0,
    'dataOrder' => 0,
    'subtotalRp' => 0,
    'subtotal' => 0,
    'weight' => 0,
    'sessOngkirRp' => 0,
    'grandtotalRp' => 0,
    'grandtotal' => 0,
    'sessNote' => 0,
    'confirm' => 0,
    'orderID' => 0,
    'invoiceID' => 0,
    'status' => 0,
    'courierName' => 0,
    'serviceName' => 0,
    'locationName' => 0,
    'insurance' => 0,
    'insuranceRp' => 0,
    'memberName' => 0,
    'receivedName' => 0,
    'memberAddress' => 0,
    'address' => 0,
    'memberCityName' => 0,
    'cityName' => 0,
    'memberProvinceName' => 0,
    'provinceName' => 0,
    'memberZipCode' => 0,
    'phone' => 0,
    'memberPhone' => 0,
    'cellPhone' => 0,
    'memberCellPhone' => 0,
    'memberEmail' => 0,
    'transferDate' => 0,
    'bankTo' => 0,
    'amount' => 0,
    'image' => 0,
    'noteConfirm' => 0,
    'note' => 0,
    'dataDetail' => 0,
    'pointTotal' => 0,
    'weightTotal' => 0,
    'shippingTotal' => 0,
    'coupon' => 0,
    'reject' => 0,
    'consignment' => 0,
    'keterangan' => 0,
    'msg' => 0,
    'numsNewOrder' => 0,
    'dataNewOrder' => 0,
    'pageLink' => 0,
    'numsConfirm' => 0,
    'dataConfirm' => 0,
    'sessLevel' => 0,
    'numsSent' => 0,
    'dataSent' => 0,
    'numsFinish' => 0,
    'dataFinish' => 0,
    'numsReject' => 0,
    'dataReject' => 0,
    'startDate' => 0,
    'endDate' => 0,
    'numsOrder' => 0,
    'nomorResi' => 0,
    'submit' => 0,
    'dataRetur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e06c0d16cb6_76730479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e06c0d16cb6_76730479')) {function content_593e06c0d16cb6_76730479($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script src="../js/jquery-migrate-1.1.1.min.js"></script>
<script type='text/javascript' src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<link rel="stylesheet" href="js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js?v=2.0.6"></script>


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


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
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
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['sessSInvoiceID']->value;?>
" id="invoiceID" name="invoiceID" style="width: 300px;">
				<table>
					<tr>
						<td colspan="3"><h5><b>Identitas Pesanan</b></h5></td>
						<td width="50"></td>
						<td colspan="3"><h5><b>Tujuan Pengiriman</b></h5></td>
					</tr>
					<tr>
						<td width="140">Nomor Faktur</td>
						<td width="10">:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessSInvoiceID']->value;?>
" id="invoiceID" name="invoiceID" style="width: 300px;" DISABLED></td>
						<td></td>
						<td width="140">Nama Penerima</td>
						<td width="10">:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessReceivedName']->value;?>
" id="receivedName" name="receivedName" style="width: 300px;" required></td>
					</tr>
					<tr>
						<td>Tanggal Order</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
" id="invoiceDate" name="invoiceDate" style="width: 300px;" required></td>
						<td></td>
						<td>Alamat</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessAddress']->value;?>
" id="address" name="address" style="width: 300px;"></td>
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
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessZipCode']->value;?>
" id="zipCode" name="zipCode" style="width: 300px;"></td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessShippingType']->value;?>
" id="shippingType" name="shippingType" style="width: 300px;"></td>
						<td></td>
						<td>Propinsi</td>
						<td>:</td>
						<td><select class="form-control" id="provinceID" name="provinceID" style="width: 300px;">
								<option value=""></option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['name'] = 'dataProvince';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProvince']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProvince']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID']==$_smarty_tpl->tpl_vars['sessProvinceID']->value){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceName'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceName'];?>
</option>
									<?php }?> 
								<?php endfor; endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nomor Resi</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessNomorResi']->value;?>
" id="nomorResi" name="nomorResi" style="width: 300px;"></td>
						<td></td>
						<td>Kota</td>
						<td>:</td>
						<td><select class="form-control" id="cityID" name="cityID" style="width: 300px;">
								<option value=""></option>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['name'] = 'dataCity';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCity']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCity']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID']==$_smarty_tpl->tpl_vars['sessCityID']->value){?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityName'];?>
</option>
									<?php }else{ ?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityName'];?>
</option>
									<?php }?> 
								<?php endfor; endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Total Biaya Kirim</td>
						<td>:</td>
						<td><input type="number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessOngkir']->value;?>
" id="ongkir" name="ongkir" style="width: 300px;"></td>
						<td></td>
						<td>Telepon / Handphone</td>
						<td>:</td>
						<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sessCellPhone']->value;?>
" id="cellPhone" name="cellPhone" style="width: 300px;" required></td>
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
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['name'] = 'dataOrder';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataOrder']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total']);
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['no'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['productCode'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['productName'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['ukuran'];?>
</td>
								<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['volume'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['alcohol'];?>
</td> -->
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['price'];?>
</td>
								<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['qty'];?>
</td>
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['subtotal'];?>
</td>
								<td>
									<a href="adm_edit_sales_transactions.php?mod=sales&act=edit&detailID=<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['detailID'];?>
" data-width="520" data-height="400" class="various2 fancybox.iframe" title="Edit">
										<img src="../images/icon/edit.png" width="20">
									</a>
									<a href="adm_sales_transactions.php?mod=sales&act=delete&detailID=<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['detailID'];?>
" title="Delete" onClick="return confirm('Anda yakin ingin menghapus produk ini dari transaksi Anda?')">
										<img src="../images/icon/delete.jpg" width="20">
									</a>
								</td>
							</tr>
						<?php endfor; endif; ?>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotalRp']->value;?>
</b> <input type="hidden" name="subtotal" value="<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
"></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>-</b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
 <input type="hidden" name="weight" value="<?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
"></b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['sessOngkirRp']->value;?>
</b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotalRp']->value;?>
 <input type="hidden" name="grandtotal" value="<?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
"></b></td>
								<td align="right" style="background: #CCC;"></td>
							</tr>
					</tbody>
				</table>
				<p><b>Note</b><br>
				<input type="text" class="form-control" name="note" id="note" value="<?php echo $_smarty_tpl->tpl_vars['sessNote']->value;?>
" placeholder="Catatan">
				</p><br>
				<p>
					<button type="submit" class="btn btn-success">SIMPAN PENJUALAN</button>
				</p>
			</form>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='confirmneworder'){?>
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
			<?php if ($_smarty_tpl->tpl_vars['confirm']->value=='1'){?>
				Anda sudah menerima pesanan ini sebelumnya.
			<?php }else{ ?>
				<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
				<input type="hidden" name="orderInvoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">
				<table>
					<tr>
						<td width="140">Tanggal Order</td>
						<td width="10">:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
					</tr>
					<tr>
						<td>Invoice ID</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>Pesanan Baru<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>Konfirmasi Pengiriman<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>Pesanan Dikirim<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['status']->value=='4'){?>Transaksi Selesai<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>Pesanan Ditolak<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['status']->value=='6'){?>Penjualan Langsung<?php }?>
						</td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
					</tr>
					<!--<tr>
						<td>Nama Layanan</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
</td>
					</tr>-->
					<tr>
						<td>Lokasi Pengambilan</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
</td>
					</tr>
					<tr>
						<td>Asuransi</td>
						<td>:</td>
						<td><?php if ($_smarty_tpl->tpl_vars['insurance']->value>0){?>Ya (Rp. <?php echo $_smarty_tpl->tpl_vars['insuranceRp']->value;?>
)<?php }else{ ?>Tidak<?php }?></td>
					</tr>
					<!--<tr>
						<td colspan="2"></td>
						<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
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
						<td width="263"><?php echo $_smarty_tpl->tpl_vars['memberName']->value;?>
</td>
						<td></td>
						<td width="140">Nama Penerima</td>
						<td width="10">:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
					</tr>
					<tr valign="top">
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberAddress']->value;?>
</td>
						<td></td>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
					</tr>
					<tr>
						<td>Kota</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberCityName']->value;?>
</td>
						<td></td>
						<td>Kota</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
					</tr>
					<tr>
						<td>Propinsi</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberProvinceName']->value;?>
</td>
						<td></td>
						<td>Propinsi</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberZipCode']->value;?>
</td>
						<td></td>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberPhone']->value;?>
</td>
						<td></td>
						<td>Handphone</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
					</tr>
					<tr>
						<td>Handphone (HP)</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberCellPhone']->value;?>
</td>
						<td></td>
						<td colspan="4"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['memberEmail']->value;?>
</td>
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
						<td><?php echo $_smarty_tpl->tpl_vars['transferDate']->value;?>
</td>
					</tr>
					<tr>
						<td>Bank Tujuan</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['bankTo']->value;?>
</td>
					</tr>
					<tr>
						<td>Jumlah Transfer</td>
						<td>:</td>
						<td>Rp. <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
					</tr>
					<tr>
						<td>Bukti</td>
						<td>:</td>
						<td><a href="../images/confirm/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank">Lihat</a></td>
					</tr>
					<tr>
						<td>Note</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['noteConfirm']->value;?>
</td>
					</tr>
				</table>
				<p>&nbsp;</p>
				<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
				<h5><b>Informasi Tambahan</b></h5>
				<p><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p>
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
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
								<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['unitPrice'];?>
</td>
								<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
							</tr>
						<?php endfor; endif; ?>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weightTotal']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotalRp']->value;?>
</b></td>
							</tr>
					</tbody>
				</table>
				
				<?php if ($_smarty_tpl->tpl_vars['reject']->value=='on'){?>
					<form method="POST" action="adm_sales_transactions.php?mod=sales&act=rejectinput">
						<input type="hidden" name="ordID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
						<input type="hidden" name="invID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">
						<input type="text" class="form-control" name="keterangan" placeholder="Alasan ditolak" style="width: 300px;" required>
						<br>
						<button type="submit" class="btn btn-success" style="float: left; margin-right: 5px;">SIMPAN</button>
					</form>
					<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
"><button type="button" class="btn btn-danger">BATAL</button>
				<?php }else{ ?>
					<form method="POST" action="adm_sales_transactions.php?mod=sales&act=accept">
					<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
					<input type="hidden" name="invoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">
					<input type="hidden" name="grandtotal" value="<?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
">
					
					<p>
						<button type="submit" class="btn btn-success" style="float: left; margin-right: 5px;">TERIMA PESANAN</button>
					</form>
					<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
&reject=on"><button type="button" class="btn btn-danger">TOLAK PESANAN</button>
					</p>
				<?php }?>
			<?php }?>
		</section><!-- /.content -->
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='detailconfirm'){?>
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
			<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
			<input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['memberEmail']->value;?>
">
			<input type="hidden" name="courierName" value="<?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
">
			<input type="hidden" name="invoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>Pesanan Baru<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>Konfirmasi Pengiriman<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>Pesanan Dikirim<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='4'){?>Transaksi Selesai<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>Pesanan Ditolak<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='6'){?>Penjualan Langsung<?php }?>
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['insurance']->value>0){?>Ya (Rp. <?php echo $_smarty_tpl->tpl_vars['insuranceRp']->value;?>
)<?php }else{ ?>Tidak<?php }?></td>
				</tr>
				<!--<tr>
					<td colspan="2"></td>
					<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
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
					<td width="263"><?php echo $_smarty_tpl->tpl_vars['memberName']->value;?>
</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberAddress']->value;?>
</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCityName']->value;?>
</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberProvinceName']->value;?>
</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberZipCode']->value;?>
</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberPhone']->value;?>
</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCellPhone']->value;?>
</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberEmail']->value;?>
</td>
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
					<td><?php echo $_smarty_tpl->tpl_vars['transferDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['bankTo']->value;?>
</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td style="color: red;"><?php echo $_smarty_tpl->tpl_vars['noteConfirm']->value;?>
</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
			<h5><b>Informasi Tambahan</b></h5>
			<p><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['unitPrice'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
						</tr>
					<?php endfor; endif; ?>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weightTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
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
					<a href="print_sent.php?mod=sales&act=printsent&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" target="_blank"><button type="button" class="btn btn-primary">CETAK LABEL</button></a>
					<a href="invoice.php?mod=sales&act=invoice&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" title="Cetak Invoice" target="_blank"><button type="button" class="btn btn-danger">CETAK INVOICE</button></a>
				</p>
			</form>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='detailsent'){?>
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
			<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
			<input type="hidden" name="invoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>Pesanan Baru<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>Konfirmasi Pengiriman<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>Pesanan Dikirim<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='4'){?>Transaksi Selesai<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>Pesanan Ditolak<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='6'){?>Penjualan Langsung<?php }?>
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['insurance']->value>0){?>Ya (Rp. <?php echo $_smarty_tpl->tpl_vars['insuranceRp']->value;?>
)<?php }else{ ?>Tidak<?php }?></td>
				</tr>
				<tr>
					<td>Consignment</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['consignment']->value;?>
</td>
				</tr>
				<!--<tr>
					<td colspan="2"></td>
					<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
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
					<td width="263"><?php echo $_smarty_tpl->tpl_vars['memberName']->value;?>
</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberAddress']->value;?>
</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCityName']->value;?>
</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberProvinceName']->value;?>
</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberZipCode']->value;?>
</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberPhone']->value;?>
</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCellPhone']->value;?>
</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberEmail']->value;?>
</td>
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
					<td><?php echo $_smarty_tpl->tpl_vars['transferDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['bankTo']->value;?>
</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['noteConfirm']->value;?>
</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
			<h5><b>Informasi Tambahan</b></h5>
			<p><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['unitPrice'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
						</tr>
					<?php endfor; endif; ?>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weightTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
						</tr>
				</tbody>
			</table>
			
			<p>
				<a href="adm_sales_transactions.php?mod=sales&act=finishorder&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" onClick="return confirm('Are you sure this order has been completed?')"><button type="button" class="btn btn-success">PESANAN SELESAI</button></a>
			</p>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='detailfinish'){?>
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
			<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
			<input type="hidden" name="invoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">
			<table>
				<tr>
					<td width="140">Tanggal Order</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>Pesanan Baru<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>Konfirmasi Pengiriman<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>Pesanan Dikirim<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='4'){?>Transaksi Selesai<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>Pesanan Ditolak<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='6'){?>Penjualan Langsung<?php }?>
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['insurance']->value>0){?>Ya (Rp. <?php echo $_smarty_tpl->tpl_vars['insuranceRp']->value;?>
)<?php }else{ ?>Tidak<?php }?></td>
				</tr>
				<tr>
					<td>Consignment</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['consignment']->value;?>
</td>
				</tr>
				<!--<tr>
					<td colspan="2"></td>
					<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
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
					<td width="263"><?php echo $_smarty_tpl->tpl_vars['memberName']->value;?>
</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberAddress']->value;?>
</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCityName']->value;?>
</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberProvinceName']->value;?>
</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberZipCode']->value;?>
</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberPhone']->value;?>
</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCellPhone']->value;?>
</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberEmail']->value;?>
</td>
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
					<td><?php echo $_smarty_tpl->tpl_vars['transferDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['bankTo']->value;?>
</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['noteConfirm']->value;?>
</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<!--<p><a href="adm_add_buy_transactions.php" data-width="520" data-height="400" class="various2 fancybox.iframe"><button class="btn btn-primary">Tambah Item</button></a></p>-->
			<h5><b>Informasi Tambahan</b></h5>
			<p><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['unitPrice'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
						</tr>
					<?php endfor; endif; ?>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weightTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
						</tr>
				</tbody>
			</table>
			
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='detailbuy'){?>
		
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
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>Pesanan Baru<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>Konfirmasi Pengiriman<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>Pesanan Dikirim<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='4'){?>Transaksi Selesai<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>Pesanan Ditolak<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='6'){?>Penjualan Langsung<?php }?>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['modal'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotalModal'];?>
</td>
						</tr>
					<?php endfor; endif; ?>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
						</tr>
				</tbody>
			</table>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='detailreject'){?>
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
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Invoice ID</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
				</tr>
				<tr>
					<td>Status Pesanan</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>Pesanan Baru<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>Konfirmasi Pengiriman<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>Pesanan Dikirim<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='4'){?>Transaksi Selesai<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='5'){?>Pesanan Ditolak<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['status']->value=='6'){?>Penjualan Langsung<?php }?>
					</td>
				</tr>
				<tr>
					<td>Kurir</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
				</tr>
				<!--<tr>
					<td>Nama Layanan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
</td>
				</tr>-->
				<tr>
					<td>Lokasi Pengambilan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
</td>
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
					<td width="263"><?php echo $_smarty_tpl->tpl_vars['memberName']->value;?>
</td>
					<td></td>
					<td width="140">Nama Penerima</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberAddress']->value;?>
</td>
					<td></td>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCityName']->value;?>
</td>
					<td></td>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberProvinceName']->value;?>
</td>
					<td></td>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberZipCode']->value;?>
</td>
					<td></td>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberPhone']->value;?>
</td>
					<td></td>
					<td>Handphone</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
				</tr>
				<tr>
					<td>Handphone (HP)</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberCellPhone']->value;?>
</td>
					<td></td>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['memberEmail']->value;?>
</td>
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
					<td><?php echo $_smarty_tpl->tpl_vars['transferDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['bankTo']->value;?>
</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
				</tr>
				<tr>
					<td>Bukti</td>
					<td>:</td>
					<td><a href="../images/confirm/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank">Lihat</a></td>
				</tr>
				<tr>
					<td>Note</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['noteConfirm']->value;?>
</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<h5><b>Informasi Tambahan</b></h5>
			<p><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['unitPrice'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
						</tr>
					<?php endfor; endif; ?>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Poin</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weightTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Coupon (Rp) - </b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</b></td>
						</tr>
						<tr>
							<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
							<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
						</tr>
				</tbody>
			</table>
			<table>
				<tr>
					<td><b>Asalan Ditolak</b><br>
						<p><?php echo $_smarty_tpl->tpl_vars['keterangan']->value;?>
</p>
					</td>
				</tr>
			</table>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='neworder'){?>
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
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Pesanan berhasil dikonfirmasi [TERIMA].</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Pesanan berhasil dikonfirmasi [TOLAK].</p>
			<?php }?>
			<p>Total pesanan baru : <?php echo $_smarty_tpl->tpl_vars['numsNewOrder']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['name'] = 'dataNewOrder';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNewOrder']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNewOrder']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['invoiceDate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['invoiceID'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['grandtotal'];?>
</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['invoiceID'];?>
" title="Konfirmasi">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="adm_sales_transactions.php?mod=sales&act=rejectinput&orderID=<?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNewOrder']['index']]['invoiceID'];?>
" title="Tolak Pesanan" onClick="return confirm('Are you sure want to reject this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<br>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='confirm'){?>
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
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Pesanan berhasil dikirimkan.</p>
			<?php }?>
			<p>Total konfirmasi pengiriman : <?php echo $_smarty_tpl->tpl_vars['numsConfirm']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['name'] = 'dataConfirm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataConfirm']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataConfirm']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceDate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['grandtotal'];?>
</td>
							<td>
								<?php if ($_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['printed']=='Y'){?>
									SUDAH PRINT
								<?php }else{ ?>
									<span style="color: red; font-weight: bold;">BELUM PRINT</span>
								<?php }?>
							</td>
							<td>
								<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value=='7'){?>
									<a href="adm_sales_transactions.php?mod=sales&act=detailconfirm&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Konfirmasi Kiriman">
										<img src="../images/icon/edit.png" width="20">
									</a>&nbsp;
									<a href="print_sent.php?mod=sales&act=printsent&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Cetak Label" target="_blank">
										<img src="../images/icon/sent.png" width="20">
									</a>&nbsp;
								<?php }else{ ?>
									<a href="adm_sales_transactions.php?mod=sales&act=detailconfirm&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Konfirmasi Kiriman">
										<img src="../images/icon/edit.png" width="20">
									</a>&nbsp;
									<a href="print_sent.php?mod=sales&act=printsent&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Cetak Label" target="_blank">
										<img src="../images/icon/sent.png" width="20">
									</a>&nbsp;
									<a href="invoice.php?mod=sales&act=invoice&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Cetak Invoice" target="_blank">
										<img src="../images/icon/invoice.png" width="20">
									</a>
								<?php }?>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<br>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='sent'){?>
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
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='4'){?>
				<p style="color: #5cb85c;">Pesanan selesai.</p>
			<?php }?>
			<p>Total pesanan dikirim : <?php echo $_smarty_tpl->tpl_vars['numsSent']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['name'] = 'dataSent';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSent']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSent']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['invoiceDate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['invoiceID'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['consignment'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['grandtotal'];?>
</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=detailsent&orderID=<?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['invoiceID'];?>
" title="Detail">
									<button type="button" class="btn btn-primary">DETAIL</button>
								</a>
								<a href="adm_sales_transactions.php?mod=sales&act=finishorder&orderID=<?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataSent']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSent']['index']]['invoiceID'];?>
" onClick="return confirm('Are you sure this order has been completed?')">
									<button type="button" class="btn btn-success">PESANAN SELESAI</button>
								</a>
								<!--<a href="adm_sales_transactions.php?mod=sales&act=rejectinput&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Tolak Pesanan" onClick="return confirm('Are you sure want to reject this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>-->
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<br>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='finish'){?>
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
			<p>Total pesanan selesai : <?php echo $_smarty_tpl->tpl_vars['numsFinish']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['name'] = 'dataFinish';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataFinish']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataFinish']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['invoiceDate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['invoiceID'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['consignment'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['grandtotal'];?>
</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=detailfinish&orderID=<?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataFinish']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataFinish']['index']]['invoiceID'];?>
" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<!--<a href="adm_sales_transactions.php?mod=sales&act=rejectinput&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
" title="Tolak Pesanan" onClick="return confirm('Are you sure want to reject this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>-->
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<br>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='reject'){?>
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
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='5'){?>
				<p style="color: #5cb85c;">Pesanan dihapus.</p>
			<?php }?>
			<p>Total pesanan ditolak : <?php echo $_smarty_tpl->tpl_vars['numsReject']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['name'] = 'dataReject';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataReject']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataReject']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['invoiceDate'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['invoiceID'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['grandtotal'];?>
</td>
							<td>
								<a href="adm_sales_transactions.php?mod=sales&act=detailreject&orderID=<?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['invoiceID'];?>
" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="adm_sales_transactions.php?mod=sales&act=deleteorder&orderID=<?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataReject']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataReject']['index']]['invoiceID'];?>
" title="Hapus Pesanan" onClick="return confirm('Are you sure want to delete this order?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<br>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
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
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Transaksi penjualan berhasil dihapus.</p>
			<?php }?>
			<form method="GET" action="adm_sales_transactions.php">
			<input type="hidden" name="mod" value="sales">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Nomor Faktur</td>
					<td width="10">:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" class="form-control" name="invoiceID" placeholder="Nomor Faktur Penjualan" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Awal</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="startDate" id="startDate" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="endDate" id="endDate" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" placeholder="Periode Akhir" style="width: 300px;"></td>
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
			<?php if ($_smarty_tpl->tpl_vars['invoiceID']->value!=''||$_smarty_tpl->tpl_vars['startDate']->value!=''||$_smarty_tpl->tpl_vars['endDate']->value!=''||$_smarty_tpl->tpl_vars['status']->value!=''){?>
				<p>Ditemukan : <?php echo $_smarty_tpl->tpl_vars['numsOrder']->value;?>
 data</p>
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
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['name'] = 'dataOrder';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataOrder']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']['total']);
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['no'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceID'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceDate'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['memberName'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['receivedName'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['owner'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['grandtotal'];?>
</td>
									<td>
									<a href="adm_sales_transactions.php?mod=sales&act=detail&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['orderID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceID'];?>
" title="Detail">
										<img src="../images/icon/view.png" width="20">
									</a>
								</td>
							</tr>
						<?php endfor; endif; ?>
					</tbody>
				</table>
			<?php }?>
		</section><!-- /.content -->
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='detail'){?>
		
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
			<p><a href="print_sent.php?mod=sales&act=printsent&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" target="_blank"><button type="button" class="btn btn-primary">CETAK LABEL</button></a>
			<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value!='7'){?>
				<a href="invoice.php?mod=sales&act=invoice&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" title="Cetak Invoice" target="_blank"><button type="button" class="btn btn-danger">CETAK INVOICE</button></a>
			<?php }?>
			</p>
			<!--<form method="POST" action="adm_sales_transactions.php?mod=sales&act=update" onsubmit="return confirm('Are you sure you want to submit this form?');">
				<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
				<input type="hidden" name="orderInvoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">-->
				<table>
					<tr>
						<td width="140">Nomor Faktur</td>
						<td width="10">:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
					</tr>
					<tr>
						<td>Tanggal Order</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
					</tr>
					<tr>
						<td>Nomor Resi</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['nomorResi']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
					</tr>
				</table>
				<!--<p>
					<button type="submit" class="btn btn-success">UBAH STATUS</button>
				</p>-->
				<br>
				<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value!='7'){?>
					<table>
						<tr>
							<td><h5><b>Tujuan Pengiriman</b></h5></td>
						</tr>
						<tr>
							<td width="140">Nama Penerima</td>
							<td width="10">:</td>
							<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
						</tr>
						<tr>
							<td>Propinsi</td>
							<td>:</td>
							<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
						</tr>
						<tr>
							<td>Kota</td>
							<td>:</td>
							<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
						</tr>
						<tr>
							<td>Handphone</td>
							<td>:</td>
							<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
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
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
									<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
									<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['price'];?>
</td>
									<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
									<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
								</tr>
							<?php endfor; endif; ?>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Biaya Kirim (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b>-</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
									<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
								</tr>
								<tr>
									<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
									<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
								</tr>
						</tbody>
					</table>
					<p><b>Note</b><br><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p><br>
				<?php }?>
				
			<!--</form>-->
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='editresi'){?>
		
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
			<?php if ($_smarty_tpl->tpl_vars['sessLevel']->value!='7'){?>
				<p><a href="print_sent.php?mod=sales&act=printsent&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" target="_blank"><button type="button" class="btn btn-primary">CETAK LABEL</button></a>
				<a href="invoice.php?mod=sales&act=invoice&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" title="Cetak Invoice" target="_blank"><button type="button" class="btn btn-danger">CETAK INVOICE</button></a>
				</p>
			<?php }?>
			<!--<form method="POST" action="adm_sales_transactions.php?mod=sales&act=update" onsubmit="return confirm('Are you sure you want to submit this form?');">
				<input type="hidden" name="orderID" value="<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
">
				<input type="hidden" name="orderInvoiceID" value="<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
">-->
				<table>
					<tr>
						<td width="140">Nomor Faktur</td>
						<td width="10">:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
					</tr>
					<tr>
						<td>Tanggal Order</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
					</tr>
					<tr>
						<td>Status Pesanan</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
					</tr>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
					</tr>
					<tr>
						<td>Nomor Resi</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['nomorResi']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><a href="edit_kurir.php?mod=kurir&act=edit&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
" data-width="520" data-height="400" class="various2 fancybox.iframe">[Edit Kurir / Nomor Resi]</a></td>
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
						<td><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
					</tr>
					<tr>
						<td>Propinsi</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
					</tr>
					<tr>
						<td>Kota</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
					</tr>
					<tr>
						<td>Handphone</td>
						<td>:</td>
						<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
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
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productCode'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['ukuran'];?>
</td>
								<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['volume'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['alcohol'];?>
</td> -->
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['price'];?>
</td>
								<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
							</tr>
						<?php endfor; endif; ?>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Subtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b>-</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Berat (Kg)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Total Biaya Kirim (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</b></td>
							</tr>
							<tr>
								<td colspan="7" align="right" style="background: #CCC;"><b>Grandtotal (Rp)</b></td>
								<td align="right" style="background: #CCC;"><b><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</b></td>
							</tr>
					</tbody>
				</table>
				<p><b>Note</b><br><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</p><br>
				
			<!--</form>-->
		</section><!-- /.content -->
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='sales'&&$_smarty_tpl->tpl_vars['act']->value=='retur'){?>
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
					<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" name="startDate" id="startDate" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" name="endDate" id="endDate" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" placeholder="Periode Akhir" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari Trx</button>
			</form>
			
			<?php if ($_smarty_tpl->tpl_vars['submit']->value!=''){?>
				<p>&nbsp;<<?php ?>?p>
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
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['name'] = 'dataRetur';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataRetur']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRetur']['total']);
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['no'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['returNo'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['invoiceID'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['returDate'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['memberName'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['receivedName'];?>
</td>
								<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['qty'];?>
</td>
								<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['subtotal'];?>
</td>
								<td>
									<a href="adm_sales_transactions.php?mod=sales&act=returdetail&returNo=<?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['returNo'];?>
">
										<img src="../images/icon/view.png" width="20">
									</a>
									<a href="adm_sales_transactions.php?mod=sales&act=retdelete&returNo=<?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['returNo'];?>
&returID=<?php echo $_smarty_tpl->tpl_vars['dataRetur']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRetur']['index']]['returID'];?>
&startDate=<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
&endDate=<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" title="Delete" onClick="return confirm('Apakah Anda yakin ingin menghapus retur ini?')">
										<img src="../images/icon/delete.jpg" width="20">
									</a>
								</td>
							</tr>
						<?php endfor; endif; ?>
					</tbody>
				</table>
			<?php }?>
		</section>
	<?php }?>
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>