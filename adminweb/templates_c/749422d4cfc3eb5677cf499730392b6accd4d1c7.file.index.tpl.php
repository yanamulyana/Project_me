<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 01:04:19
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25332593db4278c63e5-32073586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1497218651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25332593db4278c63e5-32073586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593db4279029f3_45167411',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593db4279029f3_45167411')) {function content_593db4279029f3_45167411($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Login Administrator Anaku.com</title>
	
	<link href="css/login/style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div class="body"></div>
	
	<div class="grad"></div>
	<div class="header">
		<div>A<span>n</span><span>a</span><span>k</span><span>u</span>.Com</a></div>
		<!-- <p style="margin-left: 5px;">http://www.Anaku.com</p> -->
	</div>
	<br>
	<div class="login">
		<p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
		<form method="POST" action="index.php?mod=login&act=submit">
			<input type="text" placeholder="username" name="username" required><br>
			<input type="password" placeholder="password" name="password" required><br>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html><?php }} ?>