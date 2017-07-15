<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 10:13:06
         compiled from ".\templates\confirm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8250593e06c2f06348-93009079%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6e942c8ef6cbfaa6de2568125f7dc759fb8e4c3' => 
    array (
      0 => '.\\templates\\confirm.tpl',
      1 => 1470128966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8250593e06c2f06348-93009079',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'orderID' => 0,
    'invoiceID' => 0,
    'bankTo' => 0,
    'transferDate' => 0,
    'amount' => 0,
    'image' => 0,
    'note' => 0,
    'startDate' => 0,
    'endDate' => 0,
    'numsConfirm' => 0,
    'dataConfirm' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593e06c30ea721_32190772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593e06c30ea721_32190772')) {function content_593e06c30ea721_32190772($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='confirm'&&$_smarty_tpl->tpl_vars['act']->value=='detail'){?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Konfirmasi Pembayaran
			</h1>
			<ol class="breadcrumb">
				<li><a href="confirm.php"><i class="fa fa-dashboard"></i> Konfirmasi Pembayaran</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">No Order</td>
					<td width="10">:</td>
					<td><a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['orderID']->value;?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['invoiceID']->value;?>
</a></td>
				</tr>
				<tr>
					<td>Bank Tujuan</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['bankTo']->value;?>
</td>
				</tr>
				<tr>
					<td>Tanggal Transfer</td>
					<td>:</td>
					<td><?php echo $_smarty_tpl->tpl_vars['transferDate']->value;?>
</td>
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td>:</td>
					<td>Rp. <?php echo $_smarty_tpl->tpl_vars['amount']->value;?>
</td>
				</tr>
				<tr>
					<td>Bukti Pembayaran</td>
					<td>:</td>
					<td><a href="../images/confirms/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" target="_blank">Klik Disini</a></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td>:</td>
					<td style="font-size: red;"><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</td>
				</tr>
			</table>
		</section>
	
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='confirm'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Konfirmasi Pembayaran
			</h1>
			<ol class="breadcrumb">
				<li><a href="confirm.php"><i class="fa fa-dashboard"></i> Konfirmasi Pembayaran</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="confirm.php">
			<input type="hidden" name="mod" value="confirm">
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
			<p>Total konfirmasi pembayaran : <?php echo $_smarty_tpl->tpl_vars['numsConfirm']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="70">No Order <i class="fa fa-sort"></i></th>
						<th width="150">Bank Tujuan <i class="fa fa-sort"></i></th>
						<th width="100">Jumlah <i class="fa fa-sort"></i></th>
						<th width="100">Tgl Transfer <i class="fa fa-sort"></i></th>
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
							<td><a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['bankTo'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['amount'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['transferDate'];?>
</td>
							<td>
								<a href="confirm.php?mod=confirm&act=detail&confirmID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['confirmID'];?>
" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="../images/confirms/<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['image'];?>
" title="Bukti Pembayaran" target="_blank">
									<img src="../images/icon/bank.png" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
			
			<!--<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>
</div>-->
			<a href="print_confirm.php?mod=report&act=pdf&startDate=<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
&endDate=<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" target="_blank"><button type="button" name="button" class="btn btn-success">Cetak PDF</button></a>
		</section><!-- /.content -->
	
	<?php }else{ ?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Konfirmasi Pembayaran
			</h1>
			<ol class="breadcrumb">
				<li><a href="confirm.php"><i class="fa fa-dashboard"></i> Konfirmasi Pembayaran</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="confirm.php">
			<input type="hidden" name="mod" value="confirm">
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
			<p>Total konfirmasi pembayaran : <?php echo $_smarty_tpl->tpl_vars['numsConfirm']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="70">No Order <i class="fa fa-sort"></i></th>
						<th width="150">Bank Tujuan <i class="fa fa-sort"></i></th>
						<th width="100">Jumlah <i class="fa fa-sort"></i></th>
						<th width="100">Tgl Transfer <i class="fa fa-sort"></i></th>
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
							<td><a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['invoiceID'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['bankTo'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['amount'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['transferDate'];?>
</td>
							<td>
								<a href="confirm.php?mod=confirm&act=detail&confirmID=<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['confirmID'];?>
" title="Detail">
									<img src="../images/icon/view.png" width="20">
								</a>
								<a href="../images/confirms/<?php echo $_smarty_tpl->tpl_vars['dataConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataConfirm']['index']]['image'];?>
" title="Bukti Pembayaran" target="_blank">
									<img src="../images/icon/bank.png" width="20">
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