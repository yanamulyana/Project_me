<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:06:06
         compiled from ".\templates\members.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25593e051e065419-52647396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3a13252569ebc2bc9820a43012d018c3dae37b4' => 
    array (
      0 => '.\\templates\\members.tpl',
      1 => 1497221354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25593e051e065419-52647396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'firstName' => 0,
    'lastName' => 0,
    'gender' => 0,
    'address' => 0,
    'cityName' => 0,
    'provinceName' => 0,
    'zipCode' => 0,
    'phone' => 0,
    'cellPhone' => 0,
    'email' => 0,
    'status' => 0,
    'pointTotal' => 0,
    'createdDate' => 0,
    'lastLogin' => 0,
    'requirement' => 0,
    'numsOrder' => 0,
    'dataOrder' => 0,
    'memberID' => 0,
    'pageLink' => 0,
    'invoiceID' => 0,
    'invoiceDate' => 0,
    'courierName' => 0,
    'receivedName' => 0,
    'serviceName' => 0,
    'locationName' => 0,
    'consignment' => 0,
    'note' => 0,
    'dataDetail' => 0,
    'subtotal' => 0,
    'weightTotal' => 0,
    'shippingTotal' => 0,
    'coupon' => 0,
    'grandtotal' => 0,
    't' => 0,
    'q' => 0,
    'numsMember' => 0,
    'dataMember' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e051e2a4487_87418099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e051e2a4487_87418099')) {function content_593e051e2a4487_87418099($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
	<?php if ($_smarty_tpl->tpl_vars['module']->value=='member'&&$_smarty_tpl->tpl_vars['act']->value=='view'){?>
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Depan</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Nama Belakang</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['lastName']->value;?>
</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Hp</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Status</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='Y'){?>Aktif<?php }else{ ?>Tidak Aktif<?php }?></td>
				</tr>
				<tr valign="top">
					<td>Total Poin</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Member Sejak</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['createdDate']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Last Login</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['lastLogin']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Requirement</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['requirement']->value;?>
</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<h4><b>HISTORY BELANJA</b></h4>
			<p>Total Transaksi : <?php echo $_smarty_tpl->tpl_vars['numsOrder']->value;?>
 data</p><br>
			<table class="table">
				<thead>
					<tr>
						<th class="span1">No.</th>
						<th class="span2">No Order</th>
						<th class="span2">Tanggal</th>
						<th class="span2">Jumlah</th>
						<th class="span2">Status</th>
						<th class="span2">Aksi</th>
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
							<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['grandtotal'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['status'];?>
</td>
							<td><a href="members.php?mod=member&act=detailhistory&memberID=<?php echo $_smarty_tpl->tpl_vars['memberID']->value;?>
&orderID=<?php echo $_smarty_tpl->tpl_vars['dataOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataOrder']['index']]['orderID'];?>
"><img src="../images/icon/view.png" width="20" title="Lihat detil"></a></td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section>
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='member'&&$_smarty_tpl->tpl_vars['act']->value=='detailhistory'){?>
		
		<section class="content">
			<h4>STATUS PESANAN</h4>
			<table class="table">
				<tbody>
					<tr>
						<td class="span2">No Order</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2" style="background: #efefef;">Tanggal</td>
						<td class="span10" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['invoiceDate']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2">Status Pesanan</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</td>
					</tr>
					<!--<tr>
						<td class="span2" style="background: #efefef;">Kurir</td>
						<td class="span10" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
					</tr>-->
				</tbody>
			</table>
			
			<h4>TUJUAN PENGIRIMAN</h4>
			<table class="table">
				<tbody>
					<tr>
						<td class="span2">Nama Penerima</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['receivedName']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2" style="background: #efefef;">Alamat</td>
						<td class="span10" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2">Kota</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2" style="background: #efefef;">Propinsi</td>
						<td class="span10" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2">Kode Pos</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2" style="background: #efefef;">Telepon</td>
						<td class="span10" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2">Hp</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
					</tr>
				</tbody>
			</table>
			
			<h4>EKSPEDISI PENGIRIMAN</h4>
			<table class="table">
				<tbody>
					<tr>
						<td class="span2">Nama Ekspedisi</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['courierName']->value;?>
</td>
					</tr>
					<!--<tr>
						<td class="span2" style="background: #efefef;">Nama Layanan</td>
						<td class="span10" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['serviceName']->value;?>
</td>
					</tr>-->
					<tr>
						<td class="span2">Lokasi Pengambilan</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['locationName']->value;?>
</td>
					</tr>
					<tr>
						<td class="span2">Nomor Resi</td>
						<td class="span10"><?php echo $_smarty_tpl->tpl_vars['consignment']->value;?>
</td>
					</tr>
				</tbody>
			</table>
			
			<h4>INFORMASI TAMBAHAN</h4>
			<table class="table">
				<tbody>
					<tr>
						<td class="span12" style="background: #efefef;"><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</td>
					</tr>
				</tbody>
			</table>
			
			<h4>RINCIAN BELANJA</h4>
			<table class="table">
				<thead>
					<tr>
						<th class="span1">No</th>
						<th class="span1">Kode Produk</th>
						<th class="span5">Nama Produk</th>
						<th class="span5">Ukuran</th>
						<!-- <th class="span1">Vol (ML)</th>
						<th class="span1">Kadar (%)</th -->>
						<th class="span1" style="text-align: right;">Harga</th>
						<th class="span1" style="text-align: center;">Qty</th>
						<th class="span1" style="text-align: right;">Subtotal</th>
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
						<tr valign="top">
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
							<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['price'];?>
</td>
							<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
							<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
						</tr>
					<?php endfor; endif; ?>
					<tr>
						<td colspan="7" style="text-align: right;">Subtotal (Rp)</td>
						<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="7" style="text-align: right;">Total Poin</td>
						<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="7" style="text-align: right;">Total Berat (Kg)</td>
						<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['weightTotal']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="7" style="text-align: right;">Total Biaya Kirim (Rp)</td>
						<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['shippingTotal']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="7" style="text-align: right;">Kupon Diskon (-)</td>
						<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['coupon']->value;?>
</td>
					</tr>
					<tr>
						<td colspan="7" style="text-align: right;">Grandtotal (Rp)</td>
						<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</td>
					</tr>
				</tbody>	
			</table>
		</section>
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='member'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Edit Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="members.php?mod=member&act=update">
			<input type="hidden" name="memberID" value="<?php echo $_smarty_tpl->tpl_vars['memberID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr>
					<td width="150">Nama Depan</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Nama Belakang</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['lastName']->value;?>
</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</td>
				</tr>
				<tr>
					<td>Kota</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cityName']->value;?>
</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['provinceName']->value;?>
</td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['zipCode']->value;?>
</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Hp</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['cellPhone']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Total Poin</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['pointTotal']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Member Sejak</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['createdDate']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Last Login</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['lastLogin']->value;?>
</td>
				</tr>
				<tr valign="top">
					<td>Status</td>
					<td>:</td>
					<td>
						<select class="form-control" name="status" required>
							<option value=""></option>
							<option value="Y" <?php if ($_smarty_tpl->tpl_vars['status']->value=='Y'){?>SELECTED<?php }?>>Y (Aktif)</option>
							<option value="N" <?php if ($_smarty_tpl->tpl_vars['status']->value=='N'){?>SELECTED<?php }?>>N (Tidak Aktif)</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Requirement</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['requirement']->value;?>
" class="form-control" name="requirement" placeholder="Requirement" style="width: 300px;" required></td>
				</tr>
			</table>
			<button type="submit" class="btn btn-success">SIMPAN</button>
			<button type="reset" class="btn btn-default">RESET</button>
			</form>
		</section>
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='member'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="members.php">
				<input type="hidden" name="mod" value="member">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="140">Temukan Member :</td>
						<td>
							<select class="form-control" name="t" style="width: 300px;" required>
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['t']->value=='1'){?>SELECTED<?php }?>>Nama Depan</option>
								<option value="2" <?php if ($_smarty_tpl->tpl_vars['t']->value=='2'){?>SELECTED<?php }?>>Nama Belakang</option>
								<option value="3" <?php if ($_smarty_tpl->tpl_vars['t']->value=='3'){?>SELECTED<?php }?>>Email</option>
								<option value="4" <?php if ($_smarty_tpl->tpl_vars['t']->value=='4'){?>SELECTED<?php }?>>Nomor Handphone</option>
							</select>
						</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Keyword" style="width: 300px;" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<p>Hasil pencarian <i><?php echo $_smarty_tpl->tpl_vars['q']->value;?>
</i> : <?php echo $_smarty_tpl->tpl_vars['numsMember']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Depan <i class="fa fa-sort"></i></th>
						<th>Nama Belakang <i class="fa fa-sort"></i></th>
						<th>Gender <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Email <i class="fa fa-sort"></i></th>
						<th>Hp <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['name'] = 'dataMember';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataMember']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['firstName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['gender'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['status'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['cellPhone'];?>
</td>
							<td>
								<a href="members.php?mod=member&act=view&memberID=<?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['memberID'];?>
" title="View">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="members.php?mod=member&act=edit&memberID=<?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['memberID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
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
	
	<?php }else{ ?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Daftar Member
			</h1>
			<ol class="breadcrumb">
				<li><a href="members.php"><i class="fa fa-dashboard"></i> Member</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form metho="GET" action="members.php">
				<input type="hidden" name="mod" value="member">
				<input type="hidden" name="act" value="search">
				<table>
					<tr>
						<td width="140">Temukan Member :</td>
						<td>
							<select class="form-control" name="t" style="width: 300px;" required>
								<option value="1">Nama Depan</option>
								<option value="2">Nama Belakang</option>
								<option value="3">Email</option>
								<option value="4">Nomor Handphone</option>
							</select>
						</td>
						<td>
							<input type="text" class="form-control" name="q" placeholder="Keyword" style="width: 300px;" required>
						</td>
						<td>
							<button type="submit" class="btn btn-success">GO</button>
						</td>
					</tr>
				</table>
			</form>
			<br>
			<p>Hasil pencarian <i><?php echo $_smarty_tpl->tpl_vars['q']->value;?>
</i> : <?php echo $_smarty_tpl->tpl_vars['numsMember']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No <i class="fa fa-sort"></i></th>
						<th>Nama Depan <i class="fa fa-sort"></i></th>
						<th>Nama Belakang <i class="fa fa-sort"></i></th>
						<th>Gender <i class="fa fa-sort"></i></th>
						<th>Status <i class="fa fa-sort"></i></th>
						<th>Email <i class="fa fa-sort"></i></th>
						<th>Hp <i class="fa fa-sort"></i></th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['name'] = 'dataMember';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataMember']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataMember']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['firstName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['lastName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['gender'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['status'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['cellPhone'];?>
</td>
							<td>
								<a href="members.php?mod=member&act=view&memberID=<?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['memberID'];?>
" title="View">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="members.php?mod=member&act=edit&memberID=<?php echo $_smarty_tpl->tpl_vars['dataMember']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataMember']['index']]['memberID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
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