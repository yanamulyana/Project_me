{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

<link rel="stylesheet" href="../css/jquery-ui.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>-->
<script src="../js/jquery-ui.min.js"></script>

{if $act == 'add' || $act == 'edit'}
	<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Ajaxfile-upload.css">
	<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
	
	<style>
		li{
			list-style: none;
		}
	</style>
	{literal}
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
	{/literal}

{else}
	{literal}
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
	{/literal}
{/if}

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">

	{if $module == 'product' AND $act == 'add'}
		
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
							{section name=dataCategory loop=$dataCategory}
								<option value="{$dataCategory[dataCategory].categoryID}">{$dataCategory[dataCategory].categoryName}</option>
							{/section}
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
							{section name=dataSupplier loop=$dataSupplier}
								<option value="{$dataSupplier[dataSupplier].supplierID}">{$dataSupplier[dataSupplier].supplierName}</option>
							{/section}
						</select>
					</td>
				</tr>
				<!--<tr>
					<td>Brand</td>
					<td>:</td>
					<td><select class="form-control" id="brandID" name="brandID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataBrand loop=$dataBrand}
								<option value="{$dataBrand[dataBrand].brandID}">{$dataBrand[dataBrand].brandName}</option>
							{/section}
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
		
	{elseif $module == 'product' AND $act == 'import'}
		
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
			{if $msg == '1'}
				<p style="color: green;">Import file berhasil, produk berhasil diubah</p>
			{/if}
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
		
	{elseif $module == 'product' AND $act == 'edit'}
		
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
			<input type="hidden" name="productID" value="{$productID}">
			<input type="hidden" name="oldfile1" value="{$image1}">
			<input type="hidden" name="oldfile2" value="{$image2}">
			<input type="hidden" name="oldfile3" value="{$image3}">
			<input type="hidden" name="oldfile4" value="{$image4}">
			<input type="hidden" name="oldfile5" value="{$image5}">
			<input type="hidden" name="oldfile6" value="{$image6}">
			<table cellpadding="5" cellspacing="5" style="width: 100%;">
				<tr valign="top">
					<td width="150">Kode Produk</td>
					<td width="10">:</td>
					<td><input type="text" value="{$productCode}" class="form-control" name="productCode" placeholder="Kode produk" style="width: 300px;" DISABLED></td>
				</tr>
				<tr valign="top">
					<td>Nama Produk</td>
					<td>:</td>
					<td><input type="text" value="{$productName}" class="form-control" name="productName" placeholder="Nama produk" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>:</td>
					<td><select class="form-control" name="categoryID" id="categoryID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataCategory loop=$dataCategory}
								{if $dataCategory[dataCategory].categoryID == $categoryID}
									<option value="{$dataCategory[dataCategory].categoryID}" SELECTED>{$dataCategory[dataCategory].categoryName}</option>
								{else}
									<option value="{$dataCategory[dataCategory].categoryID}">{$dataCategory[dataCategory].categoryName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Sub Kategori</td>
					<td>:</td>
					<td><select class="form-control" id="subCategoryID" name="subCategoryID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataSubCategory loop=$dataSubCategory}
								{if $dataSubCategory[dataSubCategory].subCategoryID == $subCategoryID}
									<option value="{$dataSubCategory[dataSubCategory].subCategoryID}" SELECTED>{$dataSubCategory[dataSubCategory].subCategoryName}</option>
								{else}
									<option value="{$dataSubCategory[dataSubCategory].subCategoryID}">{$dataSubCategory[dataSubCategory].subCategoryName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<tr>
					<td>Supplier</td>
					<td>:</td>
					<td><select class="form-control" id="supplierID" name="supplierID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataSupplier loop=$dataSupplier}
								{if $dataSupplier[dataSupplier].supplierID == $supplierID}
									<option value="{$dataSupplier[dataSupplier].supplierID}" SELECTED>{$dataSupplier[dataSupplier].supplierName}</option>
								{else}
									<option value="{$dataSupplier[dataSupplier].supplierID}">{$dataSupplier[dataSupplier].supplierName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>
				<!--<tr>
					<td>Brand</td>
					<td>:</td>
					<td><select class="form-control" id="brandID" name="brandID" style="width: 300px;" required>
							<option value=""></option>
							{section name=dataBrand loop=$dataBrand}
								{if $dataBrand[dataBrand].brandID == $brandID}
									<option value="{$dataBrand[dataBrand].brandID}" SELECTED>{$dataBrand[dataBrand].brandName}</option>
								{else}
									<option value="{$dataBrand[dataBrand].brandID}">{$dataBrand[dataBrand].brandName}</option>
								{/if}
							{/section}
						</select>
					</td>
				</tr>-->
				<tr valign="top">
					<td>Berat</td>
					<td>:</td>
					<td><input type="text" value="{$weight}" class="form-control" name="weight" placeholder="Berat (dalam Kg)" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Ukuran</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="weight" placeholder="Ukuran (S, M, L, X, XXL)" style="width: 300px;" required></td>
				</tr>
				<!-- <tr valign="top">
					<td>Volume</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="volume" value="{$volume}" placeholder="Volume (dalam ML)" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Kadar Alkohol</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="alcohol" value="{$alcohol}" placeholder="Kadar alkohol (dalam %)" style="width: 300px;" required></td>
				</tr> -->
				<tr valign="top">
					<td>Vintage</td>
					<td>:</td>
					<td><input value="{$vintage}" type="text" class="form-control" name="vintage" placeholder="Tahun pembuatan" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Country</td>
					<td>:</td>
					<td><input value="{$country}" type="text" class="form-control" name="country" placeholder="Negara pembuat" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Qty (Stok)</td>
					<td>:</td>
					<td><input type="number" class="form-control" name="qty" value="{$qty}" placeholder="Stok" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Requirement Stok</td>
					<td>:</td>
					<td><input type="number" value="{$requirementQty}" class="form-control" name="requirementQty" placeholder="Requirement stok" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Manajemen Harga Jual</td>
					<td>:</td>
					<td>
						<select class="form-control" name="salePriceManagement" id="salePriceManagement" style="width: 300px;" required>
							<option value=""></option>
							<option value="1" {if $salePriceManagement == '1'}SELECTED{/if}>Normal</option>
							<option value="2" {if $salePriceManagement == '2'}SELECTED{/if}>Tambah</option>
							<option value="3" {if $salePriceManagement == '3'}SELECTED{/if}>Persen</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<td>Harga Beli</td>
					<td>:</td>
					<td><input type="number" value="{$buyPrice}" class="form-control" name="buyPrice" placeholder="Harga beli" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Harga Jual</td>
					<td>:</td>
					<td><input type="number" value="{$salePrice}" class="form-control" name="salePrice" placeholder="Harga jual" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Harga Diskon</td>
					<td>:</td>
					<td><input type="number" value="{$discountPrice}" class="form-control" name="discountPrice" placeholder="Harga diskon" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Pemberian Poin untuk Produk ini</td>
					<td>:</td>
					<td><input type="number" value="{$point}" class="form-control" name="point" placeholder="Jumlah poin" style="width: 300px;" required></td>
				</tr>
				<tr valign="top">
					<td>Penukaran Poin untuk Produk ini</td>
					<td>:</td>
					<td><input type="number" value="{$point2}" class="form-control" name="point2" placeholder="Jumlah penukaran poin" style="width: 300px;" required></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><select class="form-control" name="status" style="width: 300px;" required>
							<option value=""></option>
							<option value="Y" {if $status == 'Y'}SELECTED{/if}>Active</option>
							<option value="N" {if $status == 'N'}SELECTED{/if}>Not Active</option>
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
												{if $image1 != ""}
													<img src="../images/products/thumb/small_{$image1}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=1&pid={$productID}&file={$image1}" onClick="return confirm('Anda yakin ingin menghapus gambar 1?')">Hapus</a>
												{/if}
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
												{if $image2 != ""}
													<img src="../images/products/thumb/small_{$image2}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=2&pid={$productID}&file={$image2}" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 2?')">Hapus</a>
												{/if}
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
												{if $image3 != ""}
													<img src="../images/products/thumb/small_{$image3}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=3&pid={$productID}&file={$image3}" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 3?')">Hapus</a>
												{/if}
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
												{if $image4 != ""}
													<img src="../images/products/thumb/small_{$image4}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=4&pid={$productID}&file={$image4}" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 4?')">Hapus</a>
												{/if}
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
												{if $image5 != ""}
													<img src="../images/products/thumb/small_{$image5}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=5&pid={$productID}&file={$image5}" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 5?')">Hapus</a>
												{/if}
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
												{if $image6 != ""}
													<img src="../images/products/thumb/small_{$image6}" width="70" height="70" style="border-radius: 10px; margin-left: -3px; margin-top:-75px; border: 3px solid #ccc"><br>
													<a href="../upload/delete_image.php?mod=product&act=delimage&no=6&pid={$productID}&file={$image6}" style="font-size: 14px;" onClick="return confirm('Anda yakin ingin menghapus gambar 6?')">Hapus</a>
												{/if}
											</li>
								        </div>
									</div>
									<span id="mestatus6"></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				{if $image1 != "" || $image2 != "" || $image3 != "" || $image4 != "" || $image5 != "" || $image6 != ""}
					<tr>
						<td colspan="3"><p>&nbsp;</p></td>
					</tr>
				{/if}
				<tr valign="top">
					<td>Keterangan / Deskripsi</td>
					<td>:</td>
					<td><textarea id="description" name="description">{$description}</textarea></td>
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
		
	{elseif $module == 'product' AND $act == 'search'}
		
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
							<option value="*" {if $categoryID == '*'}SELECTED{/if}>*</option>
							{section name=dataSearchCategory loop=$dataSearchCategory}
								{if $dataSearchCategory[dataSearchCategory].categoryID == $categoryID}
									<option value="{$dataSearchCategory[dataSearchCategory].categoryID}" SELECTED>{$dataSearchCategory[dataSearchCategory].categoryName}</option>
								{else}
									<option value="{$dataSearchCategory[dataSearchCategory].categoryID}">{$dataSearchCategory[dataSearchCategory].categoryName}</option>
								{/if}
							{/section}
						</select>
					</td>
					<td>
						<select class="form-control" id="searchSubCategoryID" name="subCategoryID" required>
							<option value="">Sub Kategori</option>
							<option value="*" {if $subCategoryID == '*'}SELECTED{/if}>*</option>
							{section name=dataSubCategory loop=$dataSubCategory}
								{if $dataSubCategory[dataSubCategory].subCategoryID == $subCategoryID}
									<option value="{$dataSubCategory[dataSubCategory].subCategoryID}" SELECTED>{$dataSubCategory[dataSubCategory].subCategoryName}</option>
								{else}
									<option value="{$dataSubCategory[dataSubCategory].subCategoryID}">{$dataSubCategory[dataSubCategory].subCategoryName}</option>
								{/if}
							{/section}
						</select>
					</td>
					<!--<td>
						<select class="form-control" name="brandID" required>
							<option value="">Brand</option>
							<option value="*" {if $brandID == '*'}SELECTED{/if}>*</option>
							{section name=dataBrand loop=$dataBrand}
								{if $dataBrand[dataBrand].brandID == $brandID}
									<option value="{$dataBrand[dataBrand].brandID}" SELECTED>{$dataBrand[dataBrand].brandName}</option>
								{else}
									<option value="{$dataBrand[dataBrand].brandID}">{$dataBrand[dataBrand].brandName}</option>
								{/if}
							{/section}
						</select>
					</td>-->
					<td>
						<input type="text" class="form-control" name="q" value="{$q}" placeholder="Keyword [kode / nama produk]" style="width: 300px;">	
					</td>
					<td><button type="submit" class="btn btn-primary">Cari</button></td>
				</tr>
			</table>
			</form>
			<br>
			<p>Ditemukan : {$numsProduct} data</p>
			<p style="color: red;">{$notice}</p>
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
					{section name=dataProduct loop=$dataProduct}
						<tr>
							<td>{$dataProduct[dataProduct].no}</td>
							<td>{$dataProduct[dataProduct].productCode} - {$dataProduct[dataProduct].productName}</td>
							<td>{$dataProduct[dataProduct].ukuran}</td>
							<!-- <td>{$dataProduct[dataProduct].volume}</td>
							<td>{$dataProduct[dataProduct].alcohol}</td> -->
							<td>{$dataProduct[dataProduct].salePriceManagement}</td>
							<td align="right">{$dataProduct[dataProduct].buyPrice}</td>
							<td align="right">{$dataProduct[dataProduct].salePrice}</td>
							<td align="right">{$dataProduct[dataProduct].discountPrice}</td>
							<td align="center">{$dataProduct[dataProduct].stock}</td>
							<td align="center">{$dataProduct[dataProduct].requirementQty}</td>
							<td>{$dataProduct[dataProduct].status}</td>
							<td>
								<a href="products.php?mod=product&act=edit&productID={$dataProduct[dataProduct].productID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="products.php?mod=product&act=delete&productID={$dataProduct[dataProduct].productID}&file1={$dataProduct[dataProduct].image1}&file2={$dataProduct[dataProduct].image2}&file3={$dataProduct[dataProduct].image3}&file4={$dataProduct[dataProduct].image4}&file5={$dataProduct[dataProduct].image5}&file6={$dataProduct[dataProduct].image6}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus produk ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	
	{else}
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
			{if $msg == '1'}
				<p style="color: #5cb85c;">Produk berhasil disimpan.</p>
			{/if}
			{if $msg == '2'}
				<p style="color: #5cb85c;">Produk berhasil diubah.</p>
			{/if}
			{if $msg == '3'}
				<p style="color: #5cb85c;">Produk berhasil dihapus.</p>
			{/if}
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
							{section name=dataSearchCategory loop=$dataSearchCategory}
								<option value="{$dataSearchCategory[dataSearchCategory].categoryID}">{$dataSearchCategory[dataSearchCategory].categoryName}</option>
							{/section}
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
							{section name=dataBrand loop=$dataBrand}
								<option value="{$dataBrand[dataBrand].brandID}">{$dataBrand[dataBrand].brandName}</option>
							{/section}
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
			<p>Total produk : {$numsProduct}</p>
			<p style="color: red;">{$notice}</p>
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
					{section name=dataProduct loop=$dataProduct}
						<tr>
							<td>{$dataProduct[dataProduct].no}</td>
							<td>{$dataProduct[dataProduct].productCode} - {$dataProduct[dataProduct].productName}</td>
							<td>{$dataProduct[dataProduct].ukuran}</td>
							<!-- <td>{$dataProduct[dataProduct].volume}</td>
							<td>{$dataProduct[dataProduct].alcohol}</td> -->
							<td>{$dataProduct[dataProduct].salePriceManagement}</td>
							<td align="right">{$dataProduct[dataProduct].buyPrice}</td>
							<td align="right">{$dataProduct[dataProduct].salePrice}</td>
							<td align="right">{$dataProduct[dataProduct].discountPrice}</td>
							<td align="center">{$dataProduct[dataProduct].stock}</td>
							<td align="center">{$dataProduct[dataProduct].requirementQty}</td>
							<td>{$dataProduct[dataProduct].status}</td>
							<td>
								<a href="products.php?mod=product&act=edit&productID={$dataProduct[dataProduct].productID}" title="Edit">
									<img src="../images/icon/edit.png" width="20">
								</a>
								<a href="products.php?mod=product&act=delete&productID={$dataProduct[dataProduct].productID}&file1={$dataProduct[dataProduct].image1}&file2={$dataProduct[dataProduct].image2}&file3={$dataProduct[dataProduct].image3}&file4={$dataProduct[dataProduct].image4}&file5={$dataProduct[dataProduct].image5}&file6={$dataProduct[dataProduct].image6}" title="Hapus" onClick="return confirm('Anda yakin ingin menghapus produk ini?')">
									<img src="../images/icon/delete.jpg" width="20">
								</a>
							</td>
						</tr>
					{/section}
				</tbody>
			</table>
			
			<br>
			<div class="pagination">{$pageLink}</div>
		</section><!-- /.content -->
	{/if}
</aside><!-- /.right-side -->

{if $act == 'add' || $act == 'edit'}
	{literal}
	<script>
		CKEDITOR.replace( 'description' );
	</script>
	{/literal}
{/if}

{include file="footer.tpl"}