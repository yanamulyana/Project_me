<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:14:03
         compiled from ".\templates\request_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30432593e06fb05c0e4-78689787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2071e01fff73161e9a255f8f0c529f0cdc523dcb' => 
    array (
      0 => '.\\templates\\request_order.tpl',
      1 => 1497218606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30432593e06fb05c0e4-78689787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'requestID' => 0,
    'email' => 0,
    'hp' => 0,
    'productID' => 0,
    'productSeo' => 0,
    'productCode' => 0,
    'productName' => 0,
    'qty' => 0,
    'status' => 0,
    'startDate' => 0,
    'endDate' => 0,
    'numsConfirm' => 0,
    'dataRequest' => 0,
    'pageLink' => 0,
    'msg' => 0,
    'numsRequest' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e06fb1c0c32_05855626',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e06fb1c0c32_05855626')) {function content_593e06fb1c0c32_05855626($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script src="../js/jquery-migrate-1.1.1.min.js"></script>
<link rel="stylesheet" href="js/development-bundle/themes/base/jquery.ui.all.css" type="text/css">
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/development-bundle/ui/jquery.ui.widget.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="js/fancybox/jquery.fancybox.css">


	<script>
		$(document).ready(function() {
		
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

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='request'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Form Konfirmasi Request Qty
			</h1>
			<ol class="breadcrumb">
				<li><a href="request_order.php"><i class="fa fa-dashboard"></i> Request Qty</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="request_order.php?mod=request&act=confirm">
			<input type="hidden" name="requestID" value="<?php echo $_smarty_tpl->tpl_vars['requestID']->value;?>
">
			<input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
			<input type="hidden" name="hp" value="<?php echo $_smarty_tpl->tpl_vars['hp']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Request ID</td>
					<td width="10">:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['requestID']->value;?>
</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</td>
				</tr>
				<tr>
					<td>Nomor HP</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['hp']->value;?>
</td>
				</tr>
				<tr>
					<td>Nama Produk</td>
					<td>:</td>
					<td><a href="../product-<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['productSeo']->value;?>
.html" target="_blank"><?php echo $_smarty_tpl->tpl_vars['productCode']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['productName']->value;?>
</td>
				</tr>
				<tr>
					<td>Qty</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><?php if ($_smarty_tpl->tpl_vars['status']->value=='N'){?>Belum Dibalas<?php }else{ ?>Sudah Dibalas<?php }?></td>
				</tr>
				<tr valign="top">
					<td>Subjek</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="subject" placeholder="Subjek" value="TELAH TERSEDIA KEMBALI!! <?php echo $_smarty_tpl->tpl_vars['productName']->value;?>
" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Body</td>
					<td>:</td>
					<td><textarea name="message" class="form-control" placeholder="Body" style="width: 100%; height: 150px;">
Untuk pemesanan silahkan buka link berikut :
http://www.Anaku.com/product-<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['productSeo']->value;?>
.html
							
Terima kasih
www.Anaku.com
					</textarea></td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">SIMPAN & KIRIM KONFIRMASI</button>
						<button type="reset" class="btn btn-default">RESET</button>
					</td>
				</tr>
			</table>
			</form>
		</section>
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='request'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Request Qty
			</h1>
			<ol class="breadcrumb">
				<li><a href="request_order.php"><i class="fa fa-dashboard"></i> Request Qty</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="request_order.php">
			<input type="hidden" name="mod" value="request">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="startDate" id="startDate" placeholder="Periode Awal" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="endDate" id="endDate" placeholder="Periode Akhir" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
			<br>
			<p>Total request qty : <?php echo $_smarty_tpl->tpl_vars['numsConfirm']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="150">Email <i class="fa fa-sort"></i></th>
						<th width="80">No HP <i class="fa fa-sort"></i></th>
						<th width="150">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['name'] = 'dataRequest';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataRequest']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['hp'];?>
</td>
							<td><a href="../product-<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productSeo'];?>
.html" target="_blank"><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productCode'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productName'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['qty'];?>
</td>
							<td><?php if ($_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['status']=='N'){?>Belum Dibalas<?php }else{ ?>Sudah Dibalas<?php }?></td>
							<td>
								<a href="request_order.php?mod=request&act=edit&requestID=<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['requestID'];?>
" title="Konfirmasi">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="request_order.php?mod=request&act=delete&requestID=<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['requestID'];?>
" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus request qty ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
	
	<?php }else{ ?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Request Qty
			</h1>
			<ol class="breadcrumb">
				<li><a href="request_order.php"><i class="fa fa-dashboard"></i> Request Qty</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
		
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Request Qty berhasil dikonfimasi.</p>
			<?php }?>
			<form method="GET" action="request_order.php">
			<input type="hidden" name="mod" value="request">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="100">Periode Awal</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" name="startDate" id="startDate" placeholder="Periode Awal" style="width: 300px;"></td>
				</tr>
				<tr>
					<td>Periode Akhir</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" name="endDate" id="endDate" placeholder="Periode Akhir" style="width: 300px;"></td>
				</tr>
			</table>
			<button type="submit" name="submit" value="submit" class="btn btn-success">Cari</button>
			</form>
			<br>
			<p>Total request qty : <?php echo $_smarty_tpl->tpl_vars['numsRequest']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="150">Email <i class="fa fa-sort"></i></th>
						<th width="80">No HP <i class="fa fa-sort"></i></th>
						<th width="150">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="50">Qty <i class="fa fa-sort"></i></th>
						<th width="80">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['name'] = 'dataRequest';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataRequest']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataRequest']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['hp'];?>
</td>
							<td><a href="../product-<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productSeo'];?>
.html" target="_blank"><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productCode'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['productName'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['qty'];?>
</td>
							<td><?php if ($_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['status']=='N'){?>Belum Dibalas<?php }else{ ?>Sudah Dibalas<?php }?></td>
							<td>
								<a href="request_order.php?mod=request&act=edit&requestID=<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['requestID'];?>
" title="Konfirmasi">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="request_order.php?mod=request&act=delete&requestID=<?php echo $_smarty_tpl->tpl_vars['dataRequest']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataRequest']['index']]['requestID'];?>
" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus request qty ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>
		</section><!-- /.content -->
	<?php }?>
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>