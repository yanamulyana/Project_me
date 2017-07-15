<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 05:11:50
         compiled from ".\templates\top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14813593dc026dffa75-99584541%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b648a63498e5dc36aac3ed77201fdb5c3993c5f' => 
    array (
      0 => '.\\templates\\top.tpl',
      1 => 1470130422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14813593dc026dffa75-99584541',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'numsNavConfirm' => 0,
    'dataNavConfirm' => 0,
    'numsNoticeNewOrder' => 0,
    'dataNoticeNewOrder' => 0,
    'sessFullName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dc026e508e2_55395426',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dc026e508e2_55395426')) {function content_593dc026e508e2_55395426($_smarty_tpl) {?><!-- header logo: style can be found in header.less -->
<header class="header">
	<a href="home.php" class="logo">ASFA SOLUTION</a>
	
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				
				<!--<li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="label label-success">4</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 4 messages</li>
						<li>
							<ul class="menu">
								<li>
									<a href="#">
										<div class="pull-left">
										</div>
										<h4>
											Support Team
											<small><i class="fa fa-clock-o"></i> 5 mins</small>
										</h4>
										<p>Why not buy a new awesome theme?</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">See All Messages</a></li>
					</ul>
				</li>-->
				
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-money"></i>
						<span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['numsNavConfirm']->value;?>
</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">Anda mempunyai <?php echo $_smarty_tpl->tpl_vars['numsNavConfirm']->value;?>
 konfirmasi pembayaran</li>
						<li>
							<ul class="menu">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['name'] = 'dataNavConfirm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNavConfirm']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavConfirm']['total']);
?>
									<li>
										<a href="confirm.php?mod=confirm&act=detail&confirmID=<?php echo $_smarty_tpl->tpl_vars['dataNavConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavConfirm']['index']]['confirmID'];?>
">
											<i class="ion ion-ios7-people info"></i> 
											<?php echo $_smarty_tpl->tpl_vars['dataNavConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavConfirm']['index']]['invoiceID'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataNavConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavConfirm']['index']]['amount'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataNavConfirm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavConfirm']['index']]['bankTo'];?>

										</a>
									</li>
								<?php endfor; endif; ?>
							</ul>
						</li>
					</ul>
				</li>
				
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-warning"></i>
						<span class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['numsNoticeNewOrder']->value;?>
</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">Anda mempunyai <?php echo $_smarty_tpl->tpl_vars['numsNoticeNewOrder']->value;?>
 pesanan baru</li>
						<li>
							<ul class="menu">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['name'] = 'dataNoticeNewOrder';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNoticeNewOrder']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNoticeNewOrder']['total']);
?>
									<li>
										<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID=<?php echo $_smarty_tpl->tpl_vars['dataNoticeNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNoticeNewOrder']['index']]['orderID'];?>
&invoiceID=<?php echo $_smarty_tpl->tpl_vars['dataNoticeNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNoticeNewOrder']['index']]['invoiceID'];?>
">
											<i class="ion ion-ios7-people info"></i> 
											<?php echo $_smarty_tpl->tpl_vars['dataNoticeNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNoticeNewOrder']['index']]['invoiceID'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataNoticeNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNoticeNewOrder']['index']]['memberName'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataNoticeNewOrder']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNoticeNewOrder']['index']]['grandtotal'];?>

										</a>
									</li>
								<?php endfor; endif; ?>
							</ul>
						</li>
					</ul>
				</li>
				
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span><?php echo $_smarty_tpl->tpl_vars['sessFullName']->value;?>
 </span>
					</a>
					
				</li>
			</ul>
		</div>
	</nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left"><?php }} ?>