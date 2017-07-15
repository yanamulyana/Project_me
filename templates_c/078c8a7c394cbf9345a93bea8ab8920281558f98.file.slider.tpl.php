<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 04:19:07
         compiled from ".\templates\slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29039593db3cb8088d5-22440896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '078c8a7c394cbf9345a93bea8ab8920281558f98' => 
    array (
      0 => '.\\templates\\slider.tpl',
      1 => 1432755158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29039593db3cb8088d5-22440896',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dataPromo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593db3cb826318_38181381',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593db3cb826318_38181381')) {function content_593db3cb826318_38181381($_smarty_tpl) {?><ul class="slides">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['name'] = 'dataPromo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataPromo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataPromo']['total']);
?>
		<li class="slide">
			<img alt="" src="images/promo/<?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['image'];?>
" style="padding: 20px;" />
			<div class="flex-caption">
				<h2 style="width: 50%;"><br><?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['title'];?>
</h2>
				<div class="small">
					<br><span><?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['description'];?>
</span>
				</div>
				<div>
					<span><a class="cusmo-btn" href="<?php echo $_smarty_tpl->tpl_vars['dataPromo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataPromo']['index']]['url'];?>
">Lihat Detail</a></span>
				</div>
			</div>
		</li>
	<?php endfor; endif; ?>
</ul><?php }} ?>