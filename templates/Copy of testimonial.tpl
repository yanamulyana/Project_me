{include file="header.tpl"}

{include file="top.tpl"}

<style>
	a:hover{
		color: #D45C93;
	}
</style>

<div id="container">
	<div id="column-left">
		{include file="left.tpl"}
		
		<div id="content">
			
			{if $module == 'testimonial' AND $act == 'show'}
				<!--Breadcrumb Part Start-->
				<div class="breadcrumb"> <a href="home">Home</a> &raquo; <a href="testimonial-1.html">Testimonial</a> </div>
				<!--Breadcrumb Part End-->
				<h1>Testimonial</h1>
				
				{section name=dataTestimonial loop=$dataTestimonial}
					<p style="border-bottom: 1px solid #CCC;">
						<b>{$dataTestimonial[dataTestimonial].fullName}</b>, {$dataTestimonial[dataTestimonial].createdDate}<br>
						{$dataTestimonial[dataTestimonial].testimonial}
					</p>
				{/section}
				
				<div class="pagination">{$pageLink}</div>
			
			{elseif $module == 'testimonial' AND $act == 'add'}
				<!--Breadcrumb Part Start-->
				<div class="breadcrumb"> <a href="home">Home</a> &raquo; <a href="add-testimonial-1.html">Tambah Testimonial</a> </div>
				<!--Breadcrumb Part End-->
				<h1>Tambah Testimonial</h1>
				
				<form method="POST" action="testimonial.php?mod=testimonial&act=input">
				<input type="hidden" name="orderID" value="{$orderID}">
				<p><b>Nama Lengkap : <span style="color: red;">*</span></b><br>
					<input class="form-control" type="text" placeholder="Nama lengkap" value="{$sessFirstName} {$sessLastName}" name="fullName" style="width: 90%;" DISABLED>
					<input type="hidden" name="fullName" value="{$sessFirstName} {$sessLastName}">
				</p>
				
				<p><b>Komentar : <span style="color: red;">*</span></b><br>
					<textarea class="form-control" placeholder="Masukkan komentar Anda disini" name="testimonial" style="width: 90%;" required></textarea>
				</p>
				
				<p>
					<input type="submit" value="SIMPAN" class="button" name="submit">
				</p>
				</form>
			{/if}
		</div>
	</div>
</div>

{include file="footer.tpl"}