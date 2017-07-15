<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 05:11:50
         compiled from ".\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18055593dc026d6efe3-46856198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97d060df136bc68287855ad0037b446ebb85b73d' => 
    array (
      0 => '.\\templates\\home.tpl',
      1 => 1427735570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18055593dc026d6efe3-46856198',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sessUsername' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dc026dce912_04596107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dc026dce912_04596107')) {function content_593dc026dce912_04596107($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		<p>
			Welcome <b><?php echo $_smarty_tpl->tpl_vars['sessUsername']->value;?>
</b>, You have entered the administrator page and have the authorization to process the content through menus available.
		</p>
	</section><!-- /.content -->
</aside><!-- /.right-side -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>