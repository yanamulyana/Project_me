<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 09:43:12
         compiled from ".\templates\bank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3869593dffc050f4a3-88148998%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '878e66fcb0a70a47246e09b62072556711c33ac9' => 
    array (
      0 => '.\\templates\\bank.tpl',
      1 => 1449520482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3869593dffc050f4a3-88148998',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'bankID' => 0,
    'bankName' => 0,
    'accountNo' => 0,
    'accountName' => 0,
    'branch' => 0,
    'balance' => 0,
    'endBalance' => 0,
    'display' => 0,
    'status' => 0,
    'msg' => 0,
    'numsBank' => 0,
    'dataBank' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dffc0622530_54633895',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dffc0622530_54633895')) {function content_593dffc0622530_54633895($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='bank'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Bank
				<small>Tambah Bank</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="bank.php"><i class="fa fa-dashboard"></i> Manajemen Bank</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="bank.php?mod=bank&act=input">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Bank</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="bankName" placeholder="Nama bank" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Nomor Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="accountNo" placeholder="Nomor rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemilik Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="accountName" placeholder="Pemilik rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Cabang Bank</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="branch" placeholder="Cabang" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Saldo Awal</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="balance" placeholder="Saldo Awal" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Display?</td>
					<td>:</td>
					<td><select class="form-control" name="display" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" SELECTED>Ya</option>
							<option value="N">Tidak</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" SELECTED>Aktif</option>
							<option value="N">Tidak Aktif</option>
						</select>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='bank'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Bank
				<small>Edit Bank</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="bank.php"><i class="fa fa-dashboard"></i> Manajemen Bank</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="bank.php?mod=bank&act=update">
			<input type="hidden" name="bankID" value="<?php echo $_smarty_tpl->tpl_vars['bankID']->value;?>
">
			<table cellpadding="5" cellspacing="5">
				<tr valign="top">
					<td width="120">Nama Bank</td>
					<td width="10">:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['bankName']->value;?>
" class="form-control" name="bankName" placeholder="Nama bank" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Nomor Rekening</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['accountNo']->value;?>
" name="accountNo" placeholder="Nomor rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemilik Rekening</td>
					<td>:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['accountName']->value;?>
" class="form-control" name="accountName" placeholder="Pemilik rekening" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Cabang Bank</td>
					<td>:</td>
					<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['branch']->value;?>
" name="branch" placeholder="Cabang" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Saldo Awal</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['balance']->value;?>
" class="form-control" name="balance" placeholder="Saldo Awal" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Saldo Akhir</td>
					<td>:</td>
					<td><input type="number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['endBalance']->value;?>
" name="endBalance" placeholder="Saldo Akhir" style="width: 300px;" DISABLED></td>
				</tr>
				<tr>
					<td>Display?</td>
					<td>:</td>
					<td><select class="form-control" name="display" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" <?php if ($_smarty_tpl->tpl_vars['display']->value=='Y'){?>SELECTED<?php }?>>Ya</option>
							<option value="N" <?php if ($_smarty_tpl->tpl_vars['display']->value=='N'){?>SELECTED<?php }?>>Tidak</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" <?php if ($_smarty_tpl->tpl_vars['status']->value=='Y'){?>SELECTED<?php }?>>Aktif</option>
							<option value="N" <?php if ($_smarty_tpl->tpl_vars['status']->value=='N'){?>SELECTED<?php }?>>Tidak Aktif</option>
						</select>
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
	
	<?php }else{ ?>
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Bank
				<small>Daftar Bank</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="bank.php"><i class="fa fa-dashboard"></i> Manajemen Bank</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Bank berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Bank berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Bank berhasil dihapus.</p>
			<?php }?>
			<p><a href="bank.php?mod=bank&act=add"><button class="btn btn-primary">Tambah Bank</button></a></p>
			<p>Total bank : <?php echo $_smarty_tpl->tpl_vars['numsBank']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="30">No <i class="fa fa-sort"></i></th>
						<th width="100">Nama Bank <i class="fa fa-sort"></i></th>
						<th width="100">Nomor Rekening <i class="fa fa-sort"></i></th>
						<th width="150">Nama Pemilik Rekening <i class="fa fa-sort"></i></th>
						<th width="100">Cabang <i class="fa fa-sort"></i></th>
						<th width="100">Saldo Awal <i class="fa fa-sort"></i></th>
						<th width="100">Saldo Akhir <i class="fa fa-sort"></i></th>
						<th width="50">Display <i class="fa fa-sort"></i></th>
						<th width="70">Status <i class="fa fa-sort"></i></th>
						<th width="60">Action</th>
					</tr>
				</thead>
				<tbody>
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
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['bankName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountNo'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['accountName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['branch'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['balance'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['endBalance'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['display'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['status'];?>
</td>
							<td>
								<a href="bank.php?mod=bank&act=edit&bankID=<?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['bankID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="bank.php?mod=bank&act=delete&bankID=<?php echo $_smarty_tpl->tpl_vars['dataBank']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBank']['index']]['bankID'];?>
" title="Delete" onClick="return confirm('Are you sure want to delete this bank?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					<?php endfor; endif; ?>
				</tbody>
			</table>
		</section><!-- /.content -->
	<?php }?>
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>