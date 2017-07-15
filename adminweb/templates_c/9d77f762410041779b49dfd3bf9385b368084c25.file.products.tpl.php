<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 06:54:55
         compiled from ".\templates\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5849593dd84fc42793-17597608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d77f762410041779b49dfd3bf9385b368084c25' => 
    array (
      0 => '.\\templates\\products.tpl',
      1 => 1497221918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5849593dd84fc42793-17597608',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'act' => 0,
    'module' => 0,
    'dataCategory' => 0,
    'dataSupplier' => 0,
    'dataBrand' => 0,
    'msg' => 0,
    'productID' => 0,
    'image1' => 0,
    'image2' => 0,
    'image3' => 0,
    'image4' => 0,
    'image5' => 0,
    'image6' => 0,
    'productCode' => 0,
    'productName' => 0,
    'categoryID' => 0,
    'dataSubCategory' => 0,
    'subCategoryID' => 0,
    'supplierID' => 0,
    'brandID' => 0,
    'weight' => 0,
    'volume' => 0,
    'alcohol' => 0,
    'vintage' => 0,
    'country' => 0,
    'qty' => 0,
    'requirementQty' => 0,
    'salePriceManagement' => 0,
    'buyPrice' => 0,
    'salePrice' => 0,
    'discountPrice' => 0,
    'point' => 0,
    'point2' => 0,
    'status' => 0,
    'description' => 0,
    'dataSearchCategory' => 0,
    'q' => 0,
    'numsProduct' => 0,
    'notice' => 0,
    'dataProduct' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dd8500a5055_54645315',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dd8500a5055_54645315')) {function content_593dd8500a5055_54645315($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<link rel="stylesheet" href="../css/jquery-ui.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
<script src="../js/jquery-ui.min.js"></script>

<?php if ($_smarty_tpl->tpl_vars['act']->value=='add'||$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
	<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Ajaxfile-upload.css">
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	
	<style>
		li{
			list-style: none;
		}
	</style>
	
	<script>
	
		function validasi_input(form){
			var salePriceManagement = $("#salePriceManagement").val();
			var buyPrice = parseInt(form.buyPrice.value);
			var salePrice = parseInt(form.salePrice.value);
			var discountPrice = parseInt(form.discountPrice.value);
			
			if (salePriceManagement == '1'){
				if (salePrice <= buyPrice){
					alert("Harga normal (jual) tidak boleh lebih murah dari Harga beli");
					form.salePrice.focus();
					return (false);
				}
				else if (salePrice <= discountPrice){
					alert("Harga normal (jual) tidak boleh lebih murah dari Harga diskon");
					form.salePrice.focus();
					return (false);
				}
				else if (discountPrice <= buyPrice){
					alert("Harga diskon tidak boleh lebih murah dari Harga beli");
					form.discountPrice.focus();
					return (false);
				}
				
				
				return (true);
			}
		}
		
		$(document).ready(function(){
		
			$("#categoryID").change(function(){
				var category = $("#categoryID").val();
				$.ajax({
					url: "../getdata/get_sub_categories.php",
					data: "category="+category,
					cache: false,
					success: function(msg){
						$("#subCategoryID").html(msg);
					}
				});
			});
			
			var btnUpload1=$('#me1');
			var mestatus1=$('#mestatus1');
			var files1=$('#files1');
			new AjaxUpload(btnUpload1, {
				action: '../upload/upload_image1.php',
				name: 'uploadfile1',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus1.text('Only JPG file are allowed');
						return false;
					}
					mestatus1.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus1.text('');
					//On completion clear the status
					files1.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files1').html('<img src="../images/products/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"/><br />').addClass('success1');
							$('<li></li>').appendTo('#product1').html('<input type="hidden" name="filename1" value="'+response+'">').addClass('nameupload1');
							
						} else{
							$('<li></li>').appendTo('#files1').text(file).addClass('error1');
						}
					}
				}
			});
			
			var btnUpload2=$('#me2');
			var mestatus2=$('#mestatus2');
			var files2=$('#files2');
			new AjaxUpload(btnUpload2, {
				action: '../upload/upload_image2.php',
				name: 'uploadfile2',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus2.text('Only JPG file are allowed');
						return false;
					}
					mestatus2.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus2.text('');
					//On completion clear the status
					files2.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files2').html('<img src="../images/products/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"/><br />').addClass('success2');
							$('<li></li>').appendTo('#product2').html('<input type="hidden" name="filename2" value="'+response+'">').addClass('nameupload2');
							
						} else{
							$('<li></li>').appendTo('#files2').text(file).addClass('error2');
						}
					}
				}
			});
			
			var btnUpload3=$('#me3');
			var mestatus3=$('#mestatus3');
			var files3=$('#files3');
			new AjaxUpload(btnUpload3, {
				action: '../upload/upload_image3.php',
				name: 'uploadfile3',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus3.text('Only JPG file are allowed');
						return false;
					}
					mestatus3.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus3.text('');
					//On completion clear the status
					files3.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files3').html('<img src="../images/products/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"/><br />').addClass('success3');
							$('<li></li>').appendTo('#product3').html('<input type="hidden" name="filename3" value="'+response+'">').addClass('nameupload3');
							
						} else{
							$('<li></li>').appendTo('#files3').text(file).addClass('error3');
						}
					}
				}
			});
			
			var btnUpload4=$('#me4');
			var mestatus4=$('#mestatus4');
			var files4=$('#files4');
			new AjaxUpload(btnUpload4, {
				action: '../upload/upload_image4.php',
				name: 'uploadfile4',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus4.text('Only JPG file are allowed');
						return false;
					}
					mestatus4.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus4.text('');
					//On completion clear the status
					files4.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files4').html('<img src="../images/products/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"/><br />').addClass('success4');
							$('<li></li>').appendTo('#product4').html('<input type="hidden" name="filename4" value="'+response+'">').addClass('nameupload4');
							
						} else{
							$('<li></li>').appendTo('#files4').text(file).addClass('error4');
						}
					}
				}
			});
			
			var btnUpload5=$('#me5');
			var mestatus5=$('#mestatus5');
			var files5=$('#files5');
			new AjaxUpload(btnUpload5, {
				action: '../upload/upload_image5.php',
				name: 'uploadfile5',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus5.text('Only JPG file are allowed');
						return false;
					}
					mestatus5.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus5.text('');
					//On completion clear the status
					files5.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files5').html('<img src="../images/products/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"/><br />').addClass('success5');
							$('<li></li>').appendTo('#product5').html('<input type="hidden" name="filename5" value="'+response+'">').addClass('nameupload5');
							
						} else{
							$('<li></li>').appendTo('#files5').text(file).addClass('error5');
						}
					}
				}
			});
			
			var btnUpload6=$('#me6');
			var mestatus6=$('#mestatus6');
			var files6=$('#files6');
			new AjaxUpload(btnUpload6, {
				action: '../upload/upload_image6.php',
				name: 'uploadfile6',
				onSubmit: function(file, ext){
					 if (! (ext && /^(jpg|jpeg)$/.test(ext))){ 
		                // extension is not allowed 
						mestatus6.text('Only JPG file are allowed');
						return false;
					}
					mestatus6.html('<img src="../images/ajax-loader.gif" height="16" width="16">');
				},
				onComplete: function(file, response){
					//On completion clear the status
					mestatus6.text('');
					//On completion clear the status
					files6.html('');
					//Add uploaded file to list
					if(response == 'bigger'){
						alert('The file size should not exceed 500kb');
						return false;
					}
					else
					{
						if(response!=="error"){
							$('<li></li>').appendTo('#files6').html('<img src="../images/products/'+response+'" alt="" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"/><br />').addClass('success6');
							$('<li></li>').appendTo('#product6').html('<input type="hidden" name="filename6" value="'+response+'">').addClass('nameupload6');
							
						} else{
							$('<li></li>').appendTo('#files6').text(file).addClass('error6');
						}
					}
				}
			});
		});
	</script>
	

<?php }else{ ?>
	
	<script>
		$(document).ready(function(){
		
			$("#searchCategoryID").change(function(){
				var searchcategory = $("#searchCategoryID").val();
				$.ajax({
					url: "../getdata/get_search_sub_categories.php",
					data: "category="+searchcategory,
					cache: false,
					success: function(msg){
						$("#searchSubCategoryID").html(msg);
					}
				});
			});
		});
	</script>
	
<?php }?>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	<?php if ($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Produk
				<small>Tambah Produk</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="products.php"><i class="fa fa-dashboard"></i> Manajemen Produk</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="products.php?mod=product&act=input" onsubmit="return validasi_input(this)">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="150">Nama Produk</td>
					<td width="10">:</td>
					<td><input type="text" class="form-control" name="productName" placeholder="Nama produk" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>:</td>
					<td><select class="form-control" name="categoryID" id="categoryID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['name'] = 'dataCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total']);
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Sub Kategori</td>
					<td>:</td>
					<td><select class="form-control" id="subCategoryID" name="subCategoryID" style="width: 300px;" required>
							<option value=""></option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Supplier</td>
					<td>:</td>
					<td><select class="form-control" id="supplierID" name="supplierID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['name'] = 'dataSupplier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSupplier']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total']);
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<!--<tr>
					<td>Brand</td>
					<td>:</td>
					<td><select class="form-control" id="brandID" name="brandID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['name'] = 'dataBrand';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBrand']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total']);
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>-->
				<tr valign="top">
					<td>Berat</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="weight" placeholder="Berat (dalam Kg)" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Ukuran</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="weight" placeholder="Ukuran (S, M, L, X, XXL)" style="width: 300px;" required></td>
				</tr>
				<!-- <tr valign="top">
					<td>Volume</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="volume" placeholder="Volume (dalam ML)" style="width: 300px;" required></td>
				</tr>s
				<tr valign="top">
					<td>Kadar Alkohol</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="alcohol" placeholder="Kadar alkohol (dalam %)" style="width: 300px;" required></td>
				</tr> -->
				<tr valign="top">
					<td>Vintage</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="vintage" placeholder="Tahun pembuatan" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Country</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="country" placeholder="Negara pembuat" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Qty (Stok)</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="qty" placeholder="Stok" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Requirement Stok</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="requirementQty" placeholder="Requirement stok" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Manajemen Harga Jual</td>
					<td>:</td>
					<td>
						<select class="form-control" name="salePriceManagement" id="salePriceManagement" style="width: 300px;" required>
							<option value=""></option>
							<option value="1" SELECTED>Normal</option>
							<option value="2">Tambah</option>
							<option value="3">Persen</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Harga Beli</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="buyPrice" placeholder="Harga beli" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Harga Jual</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="salePrice" placeholder="Harga jual" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Harga Diskon</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="discountPrice" placeholder="Harga diskon" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemberian Poin untuk Produk ini</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="point" placeholder="Jumlah poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Penukaran Poin untuk Produk ini</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="point2" placeholder="Jumlah penukaran poin" style="width: 300px;" required></td>
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
				<tr valign="top">
					<td>Upload Gambar</td>
					<td>:</td>
					<td>
						<table>
							<tr>
								<td colspan="6"><p>File size should not exceed uploaded 500 KB and only JPG/JPEG allowed.</p></td>
							</tr>
							<tr>
								<td>
									<div id="me1" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product1">
											<li class="nameupload1"></li>
										</div>
										<div id="files1">
											<li class="success1"></li>
								        </div>
									</div>
									<span id="mestatus1"></span>
								</td>
								<td>
									<div id="me2" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product2">
											<li class="nameupload2"></li>
										</div>
										<div id="files2">
											<li class="success2"></li>
								        </div>
									</div>
									<span id="mestatus2"></span>
								</td>
								<td>
									<div id="me3" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product3">
											<li class="nameupload3"></li>
										</div>
										<div id="files3">
											<li class="success3"></li>
								        </div>
									</div>
									<span id="mestatus3"></span>
								</td>
								<td>
									<div id="me4" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product4">
											<li class="nameupload4"></li>
										</div>
										<div id="files4">
											<li class="success4"></li>
								        </div>
									</div>
									<span id="mestatus4"></span>
								</td>
								<td>
									<div id="me5" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product5">
											<li class="nameupload5"></li>
										</div>
										<div id="files5">
											<li class="success5"></li>
								        </div>
									</div>
									<span id="mestatus5"></span>
								</td>
								<td>
									<div id="me6" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product6">
											<li class="nameupload6"></li>
										</div>
										<div id="files6">
											<li class="success6"></li>
								        </div>
									</div>
									<span id="mestatus6"></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr valign="top">
					<td>Keterangan / Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description"></textarea></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='import'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Import Produk
				<small>Export dulu, masukkan data melalui excel, lalu import melalui halaman ini.</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="products.php"><i class="fa fa-dashboard"></i> Manajemen Produk</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: green;">Import file berhasil, produk berhasil diubah</p>
			<?php }?>
			<form method="POST" action="import_products.php?mod=product&act=import" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="120">Export Produk</td>
					<td width="10">:</td>
					<td><a href="export_products.php?mod=product&act=export">Export Produk</a></td>
				</tr>
				<tr valign="top">
					<td width="120">File Import</td>
					<td width="10">:</td>
					<td><input type="file" name="filename" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td colspan="3">
						<button type="submit" class="btn btn-success">IMPORT</button>
					</td>
				</tr>
			</table>	
			</form>
		</section>
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Manajemen Produk
				<small>Edit Produk</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="products.php"><i class="fa fa-dashboard"></i> Manajemen Produk</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="POST" action="products.php?mod=product&act=update" onsubmit="return validasi_input(this)">
			<input type="hidden" name="productID" value="<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
">
			<input type="hidden" name="oldfile1" value="<?php echo $_smarty_tpl->tpl_vars['image1']->value;?>
">
			<input type="hidden" name="oldfile2" value="<?php echo $_smarty_tpl->tpl_vars['image2']->value;?>
">
			<input type="hidden" name="oldfile3" value="<?php echo $_smarty_tpl->tpl_vars['image3']->value;?>
">
			<input type="hidden" name="oldfile4" value="<?php echo $_smarty_tpl->tpl_vars['image4']->value;?>
">
			<input type="hidden" name="oldfile5" value="<?php echo $_smarty_tpl->tpl_vars['image5']->value;?>
">
			<input type="hidden" name="oldfile6" value="<?php echo $_smarty_tpl->tpl_vars['image6']->value;?>
">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="150">Kode Produk</td>
					<td width="10">:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['productCode']->value;?>
" class="form-control" name="productCode" placeholder="Kode produk" style="width: 300px;" DISABLED></td>
				</tr>
				<tr valign="top">
					<td>Nama Produk</td>
					<td>:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['productName']->value;?>
" class="form-control" name="productName" placeholder="Nama produk" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>:</td>
					<td><select class="form-control" name="categoryID" id="categoryID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['name'] = 'dataCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCategory']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryID']==$_smarty_tpl->tpl_vars['categoryID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCategory']['index']]['categoryName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Sub Kategori</td>
					<td>:</td>
					<td><select class="form-control" id="subCategoryID" name="subCategoryID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['name'] = 'dataSubCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSubCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryID']==$_smarty_tpl->tpl_vars['subCategoryID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Supplier</td>
					<td>:</td>
					<td><select class="form-control" id="supplierID" name="supplierID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['name'] = 'dataSupplier';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSupplier']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSupplier']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierID']==$_smarty_tpl->tpl_vars['supplierID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataSupplier']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSupplier']['index']]['supplierName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<!--<tr>
					<td>Brand</td>
					<td>:</td>
					<td><select class="form-control" id="brandID" name="brandID" style="width: 300px;" required>
							<option value=""></option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['name'] = 'dataBrand';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBrand']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID']==$_smarty_tpl->tpl_vars['brandID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>-->
				<tr valign="top">
					<td>Berat</td>
					<td>:</td>
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['weight']->value;?>
" class="form-control" name="weight" placeholder="Berat (dalam Kg)" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Ukuran</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="weight" placeholder="Ukuran (S, M, L, X, XXL)" style="width: 300px;" required></td>
				</tr>
				<!-- <tr valign="top">
					<td>Volume</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="volume" value="<?php echo $_smarty_tpl->tpl_vars['volume']->value;?>
" placeholder="Volume (dalam ML)" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Kadar Alkohol</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="alcohol" value="<?php echo $_smarty_tpl->tpl_vars['alcohol']->value;?>
" placeholder="Kadar alkohol (dalam %)" style="width: 300px;" required></td>
				</tr> -->
				<tr valign="top">
					<td>Vintage</td>
					<td>:</td>
					<td><input value="<?php echo $_smarty_tpl->tpl_vars['vintage']->value;?>
" type="text" class="form-control" name="vintage" placeholder="Tahun pembuatan" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Country</td>
					<td>:</td>
					<td><input value="<?php echo $_smarty_tpl->tpl_vars['country']->value;?>
" type="text" class="form-control" name="country" placeholder="Negara pembuat" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Qty (Stok)</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="qty" value="<?php echo $_smarty_tpl->tpl_vars['qty']->value;?>
" placeholder="Stok" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Requirement Stok</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['requirementQty']->value;?>
" class="form-control" name="requirementQty" placeholder="Requirement stok" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Manajemen Harga Jual</td>
					<td>:</td>
					<td>
						<select class="form-control" name="salePriceManagement" id="salePriceManagement" style="width: 300px;" required>
							<option value=""></option>
							<option value="1" <?php if ($_smarty_tpl->tpl_vars['salePriceManagement']->value=='1'){?>SELECTED<?php }?>>Normal</option>
							<option value="2" <?php if ($_smarty_tpl->tpl_vars['salePriceManagement']->value=='2'){?>SELECTED<?php }?>>Tambah</option>
							<option value="3" <?php if ($_smarty_tpl->tpl_vars['salePriceManagement']->value=='3'){?>SELECTED<?php }?>>Persen</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Harga Beli</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['buyPrice']->value;?>
" class="form-control" name="buyPrice" placeholder="Harga beli" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Harga Jual</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['salePrice']->value;?>
" class="form-control" name="salePrice" placeholder="Harga jual" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Harga Diskon</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['discountPrice']->value;?>
" class="form-control" name="discountPrice" placeholder="Harga diskon" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemberian Poin untuk Produk ini</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['point']->value;?>
" class="form-control" name="point" placeholder="Jumlah poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Penukaran Poin untuk Produk ini</td>
					<td>:</td>
					<td><input type="number" value="<?php echo $_smarty_tpl->tpl_vars['point2']->value;?>
" class="form-control" name="point2" placeholder="Jumlah penukaran poin" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" <?php if ($_smarty_tpl->tpl_vars['status']->value=='Y'){?>SELECTED<?php }?>>Active</option>
							<option value="N" <?php if ($_smarty_tpl->tpl_vars['status']->value=='N'){?>SELECTED<?php }?>>Not Active</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Upload Gambar</td>
					<td>:</td>
					<td>
						<table>
							<tr>
								<td colspan="6"><p>File size should not exceed uploaded 500 KB and only JPG/JPEG allowed.</p></td>
							</tr>
							<tr>
								<td>
									<div id="me1" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product1">
											<li class="nameupload1"></li>
										</div>
										<div id="files1">
											<li class="success1">
												<?php if ($_smarty_tpl->tpl_vars['image1']->value!=''){?>
													<img src="../images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image1']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=1&pid=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image1']->value;?>
" onClick="return confirm('Anda yakin ingin menghapus gambar 1?')">Hapus</a>
												<?php }?>
											</li>
								        </div>
									</div>
									<span id="mestatus1"></span>
								</td>
								<td>
									<div id="me2" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product2">
											<li class="nameupload2"></li>
										</div>
										<div id="files2">
											<li class="success2">
												<?php if ($_smarty_tpl->tpl_vars['image2']->value!=''){?>
													<img src="../images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image2']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=2&pid=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image2']->value;?>
" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 2?')">Hapus</a>
												<?php }?>
											</li>
								        </div>
									</div>
									<span id="mestatus2"></span>
								</td>
								<td>
									<div id="me3" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product3">
											<li class="nameupload3"></li>
										</div>
										<div id="files3">
											<li class="success3">
												<?php if ($_smarty_tpl->tpl_vars['image3']->value!=''){?>
													<img src="../images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image3']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=3&pid=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image3']->value;?>
" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 3?')">Hapus</a>
												<?php }?>
											</li>
								        </div>
									</div>
									<span id="mestatus3"></span>
								</td>
								<td>
									<div id="me4" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product4">
											<li class="nameupload4"></li>
										</div>
										<div id="files4">
											<li class="success4">
												<?php if ($_smarty_tpl->tpl_vars['image4']->value!=''){?>
													<img src="../images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image4']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=4&pid=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image4']->value;?>
" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 4?')">Hapus</a>
												<?php }?>
											</li>
								        </div>
									</div>
									<span id="mestatus4"></span>
								</td>
								<td>
									<div id="me5" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product5">
											<li class="nameupload5"></li>
										</div>
										<div id="files5">
											<li class="success5">
												<?php if ($_smarty_tpl->tpl_vars['image5']->value!=''){?>
													<img src="../images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image5']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=5&pid=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image5']->value;?>
" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 5?')">Hapus</a>
												<?php }?>
											</li>
								        </div>
									</div>
									<span id="mestatus5"></span>
								</td>
								<td>
									<div id="me6" style="cursor:pointer; height: 70px; width: 75px;">
										<button class="button_profile"><img src="../images/add.png" width="50"></button>
											
										<div id="product6">
											<li class="nameupload6"></li>
										</div>
										<div id="files6">
											<li class="success6">
												<?php if ($_smarty_tpl->tpl_vars['image6']->value!=''){?>
													<img src="../images/products/thumb/small_<?php echo $_smarty_tpl->tpl_vars['image6']->value;?>
" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=6&pid=<?php echo $_smarty_tpl->tpl_vars['productID']->value;?>
&file=<?php echo $_smarty_tpl->tpl_vars['image6']->value;?>
" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 6?')">Hapus</a>
												<?php }?>
											</li>
								        </div>
									</div>
									<span id="mestatus6"></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['image1']->value!=''||$_smarty_tpl->tpl_vars['image2']->value!=''||$_smarty_tpl->tpl_vars['image3']->value!=''||$_smarty_tpl->tpl_vars['image4']->value!=''||$_smarty_tpl->tpl_vars['image5']->value!=''||$_smarty_tpl->tpl_vars['image6']->value!=''){?>
					<tr>
						<td colspan="3"><p>&nbsp;</p></td>
					</tr>
				<?php }?>
				<tr valign="top">
					<td>Keterangan / Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea></td>
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
		
	<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='product'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
		
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Pencarian Produk
				<small>Daftar Pencarian Produk</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="products.php"><i class="fa fa-dashboard"></i> Manajemen Produk</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<form method="GET" action="products.php">
			<input type="hidden" name="mod" value="product">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="130">Pencarian produk : </td>
					<td>
						<select class="form-control" id="searchCategoryID" name="categoryID" required>
							<option value="">Kategori</option>
							<option value="*" <?php if ($_smarty_tpl->tpl_vars['categoryID']->value=='*'){?>SELECTED<?php }?>>*</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['name'] = 'dataSearchCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSearchCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryID']==$_smarty_tpl->tpl_vars['categoryID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
					<td>
						<select class="form-control" id="searchSubCategoryID" name="subCategoryID" required>
							<option value="">Sub Kategori</option>
							<option value="*" <?php if ($_smarty_tpl->tpl_vars['subCategoryID']->value=='*'){?>SELECTED<?php }?>>*</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['name'] = 'dataSubCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSubCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSubCategory']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryID']==$_smarty_tpl->tpl_vars['subCategoryID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataSubCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSubCategory']['index']]['subCategoryName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>
					<!--<td>
						<select class="form-control" name="brandID" required>
							<option value="">Brand</option>
							<option value="*" <?php if ($_smarty_tpl->tpl_vars['brandID']->value=='*'){?>SELECTED<?php }?>>*</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['name'] = 'dataBrand';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBrand']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID']==$_smarty_tpl->tpl_vars['brandID']->value){?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandName'];?>
</option>
								<?php }else{ ?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandName'];?>
</option>
								<?php }?>
							<?php endfor; endif; ?>
						</select>
					</td>-->
					<td>
						<input type="text" class="form-control" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" placeholder="Keyword [kode / nama produk]" style="width: 300px;">	
					</td>
					<td><button type="submit" class="btn btn-primary">Cari</button></td>
				</tr>
			</table>
			</form>
			<br>
			<p>Ditemukan : <?php echo $_smarty_tpl->tpl_vars['numsProduct']->value;?>
 data</p>
			<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="40">No <i class="fa fa-sort"></i></th>
						<th width="250">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="250">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="70">Volume <i class="fa fa-sort"></i></th>
						<th width="70">Alkohol <i class="fa fa-sort"></i></th> -->
						<th width="70">Manajemen Harga Jual <i class="fa fa-sort"></i></th>
						<th width="80">Hrg Beli <i class="fa fa-sort"></i></th>
						<th width="80">Hrg Jual <i class="fa fa-sort"></i></th>
						<th width="80">Hrg Disc <i class="fa fa-sort"></i></th>
						<th width="60">Stok<i class="fa fa-sort"></i></th>
						<th width="60">Req. Qty<i class="fa fa-sort"></i></th>
						<th width="60">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productCode'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['alcohol'];?>
</td> -->
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceManagement'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['stock'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['requirementQty'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['status'];?>
</td>
							<td>
								<a href="products.php?mod=product&act=edit&productID=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="products.php?mod=product&act=delete&productID=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
&file1=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image1'];?>
&file2=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image2'];?>
&file3=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image3'];?>
&file4=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image4'];?>
&file5=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image5'];?>
&file6=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image6'];?>
" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus produk ini?')">
									<img src="../images/icon/delete.jpg" width="20">
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
				Manajemen Produk
				<small>Daftar Produk</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="products.php"><i class="fa fa-dashboard"></i> Manajemen Produk</a></li>
			</ol>
		</section>
		
		<!-- Main content -->
		<section class="content">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='1'){?>
				<p style="color: #5cb85c;">Produk berhasil disimpan.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='2'){?>
				<p style="color: #5cb85c;">Produk berhasil diubah.</p>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value=='3'){?>
				<p style="color: #5cb85c;">Produk berhasil dihapus.</p>
			<?php }?>
			<p><a href="products.php?mod=product&act=add"><button class="btn btn-primary">Tambah Produk</button></a>
				<a href="export_products.php?mod=product&act=export"><button class="btn btn-success">Export to Excel</button></a>
				<a href="products.php?mod=product&act=import"><button class="btn btn-primary">Import</button></a>
			</p>
			
			<form method="GET" action="products.php">
			<input type="hidden" name="mod" value="product">
			<input type="hidden" name="act" value="search">
			<table>
				<tr>
					<td width="130">Pencarian produk : </td>
					<td>
						<select class="form-control" id="searchCategoryID" name="categoryID" required>
							<option value="">Kategori</option>
							<option value="*" SELECTED>*</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['name'] = 'dataSearchCategory';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSearchCategory']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSearchCategory']['total']);
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataSearchCategory']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSearchCategory']['index']]['categoryName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>
					<td>
						<select class="form-control" id="searchSubCategoryID" name="subCategoryID" required>
							<option value="">Sub Kategori</option>
							<option value="*" SELECTED>*</option>
						</select>
					</td>
					<!--<td>
						<select class="form-control" name="brandID" required>
							<option value="">Brand</option>
							<option value="*">*</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['name'] = 'dataBrand';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataBrand']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataBrand']['total']);
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataBrand']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataBrand']['index']]['brandName'];?>
</option>
							<?php endfor; endif; ?>
						</select>
					</td>-->
					<td>
						<input type="text" class="form-control" name="q" placeholder="Keyword [kode / nama produk]" style="width: 300px;">	
					</td>
					<td><button type="submit" class="btn btn-primary">Cari</button></td>
				</tr>
			</table>
			</form>
			<br>
			<p>Total produk : <?php echo $_smarty_tpl->tpl_vars['numsProduct']->value;?>
</p>
			<p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
</p>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="40">No <i class="fa fa-sort"></i></th>
						<th width="250">Nama Produk <i class="fa fa-sort"></i></th>
						<th width="250">Ukuran <i class="fa fa-sort"></i></th>
						<!-- <th width="70">Volume <i class="fa fa-sort"></i></th>
						<th width="70">Alkohol <i class="fa fa-sort"></i></th> -->
						<th width="70">Manajemen Harga Jual <i class="fa fa-sort"></i></th>
						<th width="80">Hrg Beli <i class="fa fa-sort"></i></th>
						<th width="80">Hrg Jual <i class="fa fa-sort"></i></th>
						<th width="80">Hrg Disc <i class="fa fa-sort"></i></th>
						<th width="60">Stok<i class="fa fa-sort"></i></th>
						<th width="60">Req. Qty<i class="fa fa-sort"></i></th>
						<th width="60">Status <i class="fa fa-sort"></i></th>
						<th width="80">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['name'] = 'dataProduct';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataProduct']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataProduct']['total']);
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['no'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productCode'];?>
 - <?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productName'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['ukuran'];?>
</td>
							<!-- <td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['volume'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['alcohol'];?>
</td> -->
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePriceManagement'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['buyPrice'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['salePrice'];?>
</td>
							<td align="right"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['discountPrice'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['stock'];?>
</td>
							<td align="center"><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['requirementQty'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['status'];?>
</td>
							<td>
								<a href="products.php?mod=product&act=edit&productID=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="products.php?mod=product&act=delete&productID=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['productID'];?>
&file1=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image1'];?>
&file2=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image2'];?>
&file3=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image3'];?>
&file4=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image4'];?>
&file5=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image5'];?>
&file6=<?php echo $_smarty_tpl->tpl_vars['dataProduct']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataProduct']['index']]['image6'];?>
" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus produk ini?')">
									<img src="../images/icon/delete.jpg" width="20">
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

<?php if ($_smarty_tpl->tpl_vars['act']->value=='add'||$_smarty_tpl->tpl_vars['act']->value=='edit'){?>
	
	<script>
		CKEDITOR.replace( 'description' );
	</script>
	
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>