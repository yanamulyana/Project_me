<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 12:36:37
         compiled from ".\templates\myaccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9450593e286589e5f0-10168611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20dc228c92b1f9b6b6d5a55c181bbd9c3e458e36' => 
    array (
      0 => '.\\templates\\myaccount.tpl',
      1 => 1497216666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9450593e286589e5f0-10168611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'msgActive' => 0,
    'firstName' => 0,
    'lastName' => 0,
    'gender' => 0,
    'address' => 0,
    'provinceName' => 0,
    'cityName' => 0,
    'zipCode' => 0,
    'phone' => 0,
    'cellPhone' => 0,
    'email' => 0,
    'dataShipping' => 0,
    'pointTotal' => 0,
    'dataOrder' => 0,
    'msgChanger' => 0,
    'dataPoint' => 0,
    'numsCoupon' => 0,
    'dataCoupon' => 0,
    'sessLoginAccount' => 0,
    'memberID' => 0,
    'dataProvince' => 0,
    'provinceID' => 0,
    'dataCity' => 0,
    'cityID' => 0,
    'msg' => 0,
    'sessMemberID' => 0,
    'password' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e2865f10a81_70585002',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e2865f10a81_70585002')) {function content_593e2865f10a81_70585002($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



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
					<li class="active">Akun Saya</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="section-checkout">
		<div class="container">
			<?php if ($_smarty_tpl->tpl_vars['module']->value=='myaccount'&&$_smarty_tpl->tpl_vars['act']->value=='detail'){?>
				
				<div class="product-tabs" style="margin-top: 5px;">
					<div class="controls-holder nav-tabs">
						<ul class="inline">
							<li <?php if ($_smarty_tpl->tpl_vars['msgActive']->value==''){?>class="active"<?php }?>><a data-toggle="tab" href="#myprofile">My Profile</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='2'){?>class="active"<?php }?>><a data-toggle="tab" href="#shipping">Shipping Address</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='3'){?>class="active"<?php }?>><a data-toggle="tab" href="#poin">Poin Rewards</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='4'){?>class="active"<?php }?>><a data-toggle="tab" href="#changer-poin">Penukaran Poin</a></li>
							<li <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='5'){?>class="active"<?php }?>><a data-toggle="tab" href="#coupon">Kupon</a></li>
						</ul>
					</div>
					
					<div class="tab-content">
						<div id="myprofile" <?php if ($_smarty_tpl->tpl_vars['msgActive']->value==''){?>class="active tab-pane"<?php }else{ ?>class="tab-pane"<?php }?>>
							<div class="row-fluid">
								<div class="span12">
									<p><a href="edit-account.html"><button class="cusmo-btn add-button" type="button">Edit</button></a></p>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Nama Depan</div>
											<?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Nama Belakang</div>
											<?php echo $_smarty_tpl->tpl_vars['lastName']->value;?>
<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Jenis Kelamin</div>
											<?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Alamat</div>
											<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
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
											<div class="form-label" style="width: 120px; float: left;">Kota</div>
											<?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
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
											<div class="form-label" style="width: 120px; float: left;">Handphone</div>
											<?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
<br>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="form-label" style="width: 120px; float: left;">Email</div>
											<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
 [<a href="edit-email.html">Ubah Email</a>]<br>
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
						
						<div id="shipping" <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='2'){?>class="active tab-pane"<?php }else{ ?>class="tab-pane"<?php }?>>
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
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['i'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['receivedName'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['address'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['cityName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['provinceName'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['zipCode'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['phone']!=''){?><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['phone'];?>
 / <?php }?><?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['cellPhone'];?>
</td>
										<td>
											<a href="addshipping.php?mod=shipping&act=edit&shippingID=<?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['shippingID'];?>
" title="Edit">
												<img src="images/icon/edit.png" width="20">
											</a>
											<a href="addshipping.php?mod=shipping&act=delete&shippingID=<?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['shippingID'];?>
" title="Delete" onClick="return confirm('Anda yakin ingin menghapus data penerima <?php echo $_smarty_tpl->tpl_vars['dataShipping']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataShipping']['index']]['receivedName'];?>
?')">
												<img src="images/icon/delete.jpg" width="20">
											</a>
										</td>
									</tr>
									<?php endfor; endif; ?>
								</tbody>
							</table>
						</div>
						
						<div id="poin" <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='3'){?>class="active tab-pane"<?php }else{ ?>class="tab-pane"<?php }?>>
							<div style="border: 1px #CCC solid; padding: 10px;">
								<table class="table" style="margin: 0px;">
										<tr>
											<td class="span8" style="border-top: 0px;">
												<h3>SIGNATURE</h3>
												<h5><?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastName']->value;?>
</h5>
												<p>Belanja terus di Anaku.com untuk meningkatkan jumlah poin Anda!</p>
											</td>
											<td class="span4" style="border-top: 0px; background-color: #8c8c8c; text-align: center; color: #FFF;">
												<h1><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</h1>
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
										<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceDate'];?>
</td>
										<td>Order <?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceID'];?>
 (Rp. <?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['grandtotal'];?>
)</td>
										<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['pointTotal'];?>
</td>
									</tr>
									<?php endfor; endif; ?>
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
									<!--<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataOrder']);
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
										<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceDate'];?>
</td>
										<td>Order <?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['invoiceID'];?>
 (Rp. <?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['grandtotal'];?>
)</td>
										<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['pointTotal'];?>
</td>
									</tr>
									<?php endfor; endif; ?>-->
								</tbody>
							</table>
						</div>
						
						<div id="changer-poin" <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='4'){?>class="active tab-pane"<?php }else{ ?>class="tab-pane"<?php }?>>
							<div style="border: 1px #CCC solid; padding: 10px;">
								<table class="table" style="margin: 0px;">
									<tr>
										<td class="span8" style="border-top: 0px;">
											<h3>SIGNATURE</h3>
											<h5><?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastName']->value;?>
</h5>
											<p>Belanja terus di Anaku.com untuk meningkatkan jumlah poin Anda!</p>
										</td>
										<td class="span4" style="border-top: 0px; background-color: #8c8c8c; text-align: center; color: #FFF;">
											<h1><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</h1>
											<p>Poin</p>
										</td>
									</tr>
								</table>
							</div>
							<p>&nbsp;</p>
							
							<?php if ($_smarty_tpl->tpl_vars['msgChanger']->value=='1'){?>
								<p style="background-color: red; color: #FFF; padding: 10px;">Poin Anda tidak cukup untuk ditukarkan dengan kupon.</p>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['msgChanger']->value=='2'){?>
								<p style="background-color: #30b779; color: #FFF; padding: 10px;">Poin berhasil ditukar dengan kupon.</p>
							<?php }?>
							<h4 style="border-bottom: 4px #30b779 solid;">Tukarkan Poin Anda</h4><br>
							
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['name'] = 'dataPoint';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataPoint']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPoint']['total']);
?>
								<form method="POST" action="myaccount.php?mod=myaccount&act=changerpoint">
								<input type="hidden" name="pointTotal" value="<?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
">
								<input type="hidden" name="minPoint" value="<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['minPoint'];?>
">
								<input type="hidden" name="pointID" value="<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['pointID'];?>
">
								<input type="hidden" name="pointName" value="<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['pointName'];?>
">
								<input type="hidden" name="minTrx" value="<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['minTrx'];?>
">
								<input type="hidden" name="coupon" value="<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['coupon'];?>
">
								<input type="hidden" name="description" value="<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['description'];?>
">
								<div style="border: 1px solid #30b779; padding: 10px; margin: 10px;">
									<table class="table">
										<tbody>
											<tr>
												<td class="span3" style="border: 0px;">
													<h4><?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['pointName'];?>
</h4>
												</td>
												<td class="span4" style="border: 0px;">
													<span style="background-color: #30b779; color: #FFF; padding: 3px 13px; border-radius: 10px;">
														<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['minPoint'];?>
 POIN REWARDS
													</span>
												</td>
												<td class="span2" style="border: 0px;">
													<?php if ($_smarty_tpl->tpl_vars['pointTotal']->value<$_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['minPoint']){?>
														Jumlah: <input id="qty" type="number" name="qty" style="width: 50px;" value="1" DISABLED>
													<?php }else{ ?>
														Jumlah: <input id="qty" type="number" name="qty" style="width: 50px;" value="1" required>
													<?php }?>
												</td>
												<td class="span3" style="border: 0px;">
													<?php if ($_smarty_tpl->tpl_vars['pointTotal']->value<$_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['minPoint']){?>
														<input class="submit cusmo-btn narrow" type="submit" value="TUKAR SEKARANG" style="border-radius: 0px;" DISABLED>
													<?php }else{ ?>
														<input class="submit cusmo-btn narrow" type="submit" value="TUKAR SEKARANG" style="border-radius: 0px;" />
													<?php }?>
												</td>
											</tr>
											<tr>
												<td colspan="4" style="border: 0px;">
													<?php echo $_smarty_tpl->tpl_vars['dataPoint']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPoint']['index']]['description'];?>

												</td>
											</tr>
										</tbody>
									</table>
								</div>
								</form>
							<?php endfor; endif; ?>
						</div>
						<div id="coupon" <?php if ($_smarty_tpl->tpl_vars['msgActive']->value=='5'){?>class="active tab-pane"<?php }else{ ?>class="tab-pane"<?php }?>>
							<?php if ($_smarty_tpl->tpl_vars['numsCoupon']->value=='0'){?>
								<div style="border: 1px dashed #c64a00; padding: 10px;">Anda tidak memiliki kupon</div>
							<?php }?>
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
								<div style="border: 1px solid #30b779; padding: 10px; margin: 10px; background-color: #30b779;">
									<table class="table">
										<tbody>
											<tr>
												<td class="span9" style="border: 0px;">
													<h4><?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['pointName'];?>
</h4>
												</td>
												<td class="span3" style="border: 0px;">
													<h4>x <?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['qty'];?>
</h4>
												</td>
											</tr>
											<tr>
												<td colspan="2" style="border: 0px;">
													<?php echo $_smarty_tpl->tpl_vars['dataCoupon']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCoupon']['index']]['description'];?>

												</td>
											</tr>
										</tbody>
									</table>
								</div>
								</form>
							<?php endfor; endif; ?>
						</div>
					</div>
				</div>
			
			<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='myaccount'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
				
				<?php if ($_smarty_tpl->tpl_vars['sessLoginAccount']->value=='1'){?>
					<div class="row-fluid">
						<div class="span12">
							<div style="background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top , #e5edc4, #d9e4ac) repeat scroll 0 0; padding: 10px; border: 1px solid #b8c97b;">
								Mohon lengkapi data profil Anda terlebih dahulu sebelum melakukan transaksi belanja Anda.
							</div>
						</div>
					</div>
				<?php }?>
				<div class="phase-title current">
					<h1>EDIT PROFILE</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<form action="myaccount.php?mod=myaccount&act=update" method="POST">
							<input type="hidden" name="memberID" value="<?php echo $_smarty_tpl->tpl_vars['memberID']->value;?>
">
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Nama Depan</div>
									<input type="text" id="firstName" style="text-transform: capitalize;" value="<?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
" name="firstName" class="required span12 cusmo-input" required />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Nama Belakang</div>
									<input type="text" id="lastName" style="text-transform: capitalize;" value="<?php echo $_smarty_tpl->tpl_vars['lastName']->value;?>
" name="lastName" class="required span12 cusmo-input" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Jenis Kelamin</div>
									<input type="radio" id="gender" name="gender" value="L" <?php if ($_smarty_tpl->tpl_vars['gender']->value=='L'){?>CHECKED<?php }?> required /> Laki-laki &nbsp;&nbsp;&nbsp;
									<input type="radio" id="gender" name="gender" value="P" <?php if ($_smarty_tpl->tpl_vars['gender']->value=='P'){?>CHECKED<?php }?> /> Perempuan
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Alamat</div>
									<textarea id="address" name="address" style="text-transform: capitalize;" class="required span12 cusmo-input" required /><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Propinsi</div>
									<select id="provinceID" name="provinceID" class="required span12 cusmo-input" required />
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
											<?php if ($_smarty_tpl->tpl_vars['provinceID']->value==$_smarty_tpl->tpl_vars['dataProvince']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProvince']['index']]['provinceID']){?>
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
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Kota</div>
									<select id="cityID" name="cityID" class="required span12 cusmo-input" required />
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
											<?php if ($_smarty_tpl->tpl_vars['cityID']->value==$_smarty_tpl->tpl_vars['dataCity']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCity']['index']]['cityID']){?>
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
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Kode Pos</div>
									<input type="text" id="zipCode" placeholder="Number only" value="<?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
" name="zipCode" class="required span12 cusmo-input" maxlength="5" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Telepon</div>
									<input type="text" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" placeholder="Number only" name="phone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" />
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Handphone</div>
									<input type="text" id="cellPhone" placeholder="Number only" value="<?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
" name="cellPhone" class="required span12 cusmo-input" onkeypress="return isNumberKey(event)" required />
								</div>
							</div>
							<div class="button-holder">
								<center><button class="cusmo-btn narrow" type="submit">SIMPAN</button></center>
							</div>
						</form>
					</div>
				</div>
				
			<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='myaccount'&&$_smarty_tpl->tpl_vars['act']->value=='editemail'){?>
				<div class="phase-title current">
					<h1>EDIT EMAIL</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
							<p style="color: red;">Email lama Anda salah</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
							<p style="color: red;">Email baru dan konfirmasi email baru tidak sama</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
							<p style="color: red;">Password Anda salah</p>
						<?php }?>
						<form action="myaccount.php?mod=myaccount&act=updateemail" method="POST">
							<input type="hidden" name="memberID" value="<?php echo $_smarty_tpl->tpl_vars['sessMemberID']->value;?>
">
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
			
			<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='myaccount'&&$_smarty_tpl->tpl_vars['act']->value=='editpassword'){?>
				<div class="phase-title current">
					<h1>UBAH PASSWORD</h1>
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
							<p style="color: red;">Password lama Anda salah</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
							<p style="color: red;">Password baru dan konfirmasi password baru tidak sama</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
							<p style="color: green;">Password Anda berhasil diubah</p>
						<?php }?>
						<form action="myaccount.php?mod=myaccount&act=updatepassword" method="POST">
							<input type="hidden" name="memberID" value="<?php echo $_smarty_tpl->tpl_vars['sessMemberID']->value;?>
">
							<?php if ($_smarty_tpl->tpl_vars['password']->value==''){?>
								<input type="hidden" name="new" value="1">
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['password']->value!=''){?>
							<div class="control-group">
								<div class="controls">
									<div class="form-label">Password Lama</div>
									<input type="password" id="oldPassword" name="oldPassword" class="required span12 cusmo-input" required />
								</div>
							</div>
							<?php }?>
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
			<?php }?>
		</div>
	</section>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>