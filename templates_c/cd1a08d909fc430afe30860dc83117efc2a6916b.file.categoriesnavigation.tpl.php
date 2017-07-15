<?php /* Smarty version Smarty-3.1.11, created on 2017-06-16 17:25:40
         compiled from ".\templates\categoriesnavigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19534593db3cb735e46-52865941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd1a08d909fc430afe30860dc83117efc2a6916b' => 
    array (
      0 => '.\\templates\\categoriesnavigation.tpl',
      1 => 1497608715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19534593db3cb735e46-52865941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593db3cb7e6807_82432172',
  'variables' => 
  array (
    'dataNavCategory' => 0,
    'numsNavCategory' => 0,
    'dataNavCategory2' => 0,
    'categoryID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593db3cb7e6807_82432172')) {function content_593db3cb7e6807_82432172($_smarty_tpl) {?><ul class="inline top-cat-menu">
	<li><a href="home"><span >Home</span></a></li>
	
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['name'] = 'dataNavCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNavCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total']);
?>
		<li>
			<a href="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categorySeo'];?>
.html" class="dropdown-toggle" data-hover="dropdown"><?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryName'];?>
</a>
			<?php if ($_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['numsNavSubCategory']>0){?>
				<ul class="dropdown-menu">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['name'] = 'dataNavSubCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['dataNavSubCategory']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavSubCategory']['total']);
?>
						<li style="margin: 0px; box-shadow: none;">
							<a href="subcategory-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['dataNavSubCategory'][$_smarty_tpl->getVariable('smarty')->value['section']['dataNavSubCategory']['index']]['subCategoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['dataNavSubCategory'][$_smarty_tpl->getVariable('smarty')->value['section']['dataNavSubCategory']['index']]['subCategorySeo'];?>
.html">
								<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['dataNavSubCategory'][$_smarty_tpl->getVariable('smarty')->value['section']['dataNavSubCategory']['index']]['subCategoryName'];?>

							</a>
						</li>
					<?php endfor; endif; ?>
				</ul>
			<?php }?>
		</li>
	<?php endfor; endif; ?>
	<?php if ($_smarty_tpl->tpl_vars['numsNavCategory']->value>6){?>
		<li>
			<a class="dropdown-toggle" data-hover="dropdown" href="#">More</a>
			<ul class="dropdown-menu">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['name'] = 'dataNavCategory2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNavCategory2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total']);
?>
					<li style="margin: 0px; box-shadow: none;"><a href="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categorySeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryName'];?>
</a></li>
				<?php endfor; endif; ?>
			</ul>
		</li>
	<?php }?>

	<li><a href="confirm.html" ><span >Konfirmasi Pembayaran</span></a></li>
	<li><a href="cara-berbelanja.html" ><span >Cara Belanja</span></a></li>
	<li><a href="about-us.html" ><span >Profil</span></a></li>
	<li><a href="contact-us.html" ><span >Kontak</span></a><li>

</ul>


<select class="top-cat-menu dropdown">
	<option value="#">- Pilih Kategori Produk -</option>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['name'] = 'dataNavCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNavCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory']['total']);
?>
		<?php if ($_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryID']==$_smarty_tpl->tpl_vars['categoryID']->value){?>
			<option value="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categorySeo'];?>
.html" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryName'];?>
</option>
		<?php }else{ ?>
			<option value="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categorySeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataNavCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory']['index']]['categoryName'];?>
</option>
		<?php }?>
	<?php endfor; endif; ?>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['name'] = 'dataNavCategory2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataNavCategory2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataNavCategory2']['total']);
?>
		<?php if ($_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryID']==$_smarty_tpl->tpl_vars['categoryID']->value){?>
			<option value="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categorySeo'];?>
.html" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryName'];?>
</option>
		<?php }else{ ?>
			<option value="category-0-1-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryID'];?>
-<?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categorySeo'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['dataNavCategory2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataNavCategory2']['index']]['categoryName'];?>
</option>
		<?php }?>
	<?php endfor; endif; ?>
</select><?php }} ?>