<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:11:18
         compiled from ".\templates\costs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32753593e0656574bb9-93571130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8eabfabba019f99f41fcda704a69610d5fc0ca7' => 
    array (
      0 => '.\\templates\\costs.tpl',
      1 => 1452072894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32753593e0656574bb9-93571130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'provinceName' => 0,
    'cityName' => 0,
    'provinceID' => 0,
    'cityID' => 0,
    'dataCourier' => 0,
    'costID' => 0,
    'courierID' => 0,
    'dataService' => 0,
    'serviceID' => 0,
    'estimateDay' => 0,
    'dataWeightCost' => 0,
    'dataCost' => 0,
    'q' => 0,
    'numsCost' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e065676a742_50998498',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e065676a742_50998498')) {function content_593e065676a742_50998498($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='cost'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
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
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
			</table><p>&nbsp;</p>
			
			<form method="POST" action="costs.php?mod=cost&act=input">
			<input type="hidden" name="provinceID" value="<?php echo $_smarty_tpl->tpl_vars['provinceID']->value;?>
">
			<input type="hidden" name="cityID" value="<?php echo $_smarty_tpl->tpl_vars['cityID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" id="courierID" name="courierID" style="width: 300px;" required>
							<option value=""></option>
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
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</option>
							<?php endfor; endif; ?>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='cost'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
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
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
			</table><p>&nbsp;</p>
			<form method="POST" action="costs.php?mod=cost&act=update">
			<input type="hidden" name="costID" value="<?php echo $_smarty_tpl->tpl_vars['costID']->value;?>
">
			<input type="hidden" name="provinceID" value="<?php echo $_smarty_tpl->tpl_vars['provinceID']->value;?>
">
			<input type="hidden" name="cityID" value="<?php echo $_smarty_tpl->tpl_vars['cityID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="120">Ekspedisi</td>
					<td width="10">:</td>
					<td><select class="form-control" id="courierID" name="courierID" style="width: 300px;" required>
							<option value=""></option>
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
								<?php if ($_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID']==$_smarty_tpl->tpl_vars['courierID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCourier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Layanan Ekspedisi</td>
					<td>:</td>
					<td><select class="form-control" name="serviceID" id="serviceID" style="width: 300px;" required>
							<option value=""></option>
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
								<?php if ($_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID']==$_smarty_tpl->tpl_vars['serviceID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataService']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataService']['index']]['serviceName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Estimasi (Hari)</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="estimateDay" value="<?php echo $_smarty_tpl->tpl_vars['estimateDay']->value;?>
" placeholder="Estimasi Pengiriman" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Biaya Kirim</td>
					<td>:</td>
					<td>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['name'] = 'dataWeightCost';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataWeightCost']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total']);
?>
							<input type="hidden" class="form-control" name="weightCostID[]" value="<?php echo $_smarty_tpl->tpl_vars['dataWeightCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['weightCostID'];?>
" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
							<input type="text" class="form-control" name="weightCostStart[]" value="<?php echo $_smarty_tpl->tpl_vars['dataWeightCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['weightFrom'];?>
" placeholder="Kg" style="width: 50px; float: left; margin: 5px;">
							<input type="text" class="form-control" name="weightCostEnd[]" value="<?php echo $_smarty_tpl->tpl_vars['dataWeightCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['weightTo'];?>
" placeholder="kg" style="width: 50px; float: left; margin: 5px;">
							<input type="text" class="form-control" name="shippingCost[]" value="<?php echo $_smarty_tpl->tpl_vars['dataWeightCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['shippingCost'];?>
" placeholder="Biaya Kirim" style="width: 300px; float: left; margin: 5px;">
							<select class="form-control" name="shippingStatus[]" style="width: 100px; float: left; margin: 5px;">
								<option value="K" <?php if ($_smarty_tpl->tpl_vars['dataWeightCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['shippingStatus']=='K'){?>SELECTED<?php }?>>Per Kg</option>
								<option value="B" <?php if ($_smarty_tpl->tpl_vars['dataWeightCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['shippingStatus']=='B'){?>SELECTED<?php }?>>Borongan / Global</option>
							</select>
							<br>
						<?php endfor; endif; ?>
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
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='cost'&&$_smarty_tpl->tpl_vars['act']->value=='view'){?>
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
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
			</table><p>&nbsp;</p>
			<p><a href="costs.php?mod=cost&act=add&provinceID=<?php echo $_smarty_tpl->tpl_vars['provinceID']->value;?>
&cityID=<?php echo $_smarty_tpl->tpl_vars['cityID']->value;?>
"><button class="btn btn-primary">Tambah Biaya Kirim</button></a></p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['name'] = 'dataCost';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCost']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['courierName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['serviceName'];?>
</td>
							<td>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['name'] = 'dataWeightCost';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataWeightCost']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataWeightCost']['total']);
?>
									&bull; <?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataWeightCost'][$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['weightFrom'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataWeightCost'][$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['weightTo'];?>
 Kg : Rp. <?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataWeightCost'][$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['shippingCost'];?>
 (<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataWeightCost'][$_smarty_tpl->getVariable('smarty')->value['section']['dataWeightCost']['index']]['shippingStatus'];?>
)<br>
								<?php endfor; endif; ?>
							</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['estimateDay'];?>
</td>
							<td>
								<a href="costs.php?mod=cost&act=edit&costID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['costID'];?>
&provinceID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['provinceID'];?>
&cityID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['cityID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="costs.php?mod=cost&act=delete&costID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['costID'];?>
&provinceID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['provinceID'];?>
&cityID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['cityID'];?>
" title="Delete" onClick="return confirm('Anda yakin ingin menghapus biaya kirim ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</section><!-- /.content -->
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='cost'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
		
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
						<td><input type="text" class="form-control" name="q" placeholder="Nama kota" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" style="width: 300px;" required></td>
						<td><button type="submit" class="btn btn-success">Cari</button></td>
					</tr>
				</table>
			</p>
			</form>
			
			<p>Total kota : <?php echo $_smarty_tpl->tpl_vars['numsCost']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['name'] = 'dataCost';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCost']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['provinceName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['cityName'];?>
</td>
							<td>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['name'] = 'dataCourier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataShippingCost']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataShippingCost'][$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
, 
								<?php endfor; endif; ?>
							</td>	
							<td>
								<a href="costs.php?mod=cost&act=view&provinceID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['provinceID'];?>
&cityID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['cityID'];?>
" title="Lihat detail">
									<img src="../images/icon/view.png" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</section><!-- /.content -->
		
	<?php }else{ ?>
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
						<td><input type="text" class="form-control" name="q" placeholder="Nama kota" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" style="width: 300px;" required></td>
						<td><button type="submit" class="btn btn-success">Cari</button></td>
					</tr>
				</table>
			</p>
			</form>
			
			<p>Total kota : <?php echo $_smarty_tpl->tpl_vars['numsCost']->value;?>
</p>
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
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['name'] = 'dataCost';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCost']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCost']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['provinceName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['cityName'];?>
</td>
							<td>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['name'] = 'dataCourier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCourier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataShippingCost']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['dataShippingCost'][$_smarty_tpl->getVariable('smarty')->value['section']['dataCourier']['index']]['courierName'];?>
, 
								<?php endfor; endif; ?>
							</td>	
							<td>
								<a href="costs.php?mod=cost&act=view&provinceID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['provinceID'];?>
&cityID=<?php echo $_smarty_tpl->tpl_vars['dataCost']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCost']['index']]['cityID'];?>
" title="Lihat detail">
									<img src="../images/icon/view.png" width="20">
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
	<?php }?>
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>