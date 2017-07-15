{include file="header.tpl"}

{include file="top.tpl"}

{include file="navigation.tpl"}

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
			Welcome <b>{$sessUsername}</b>, You have entered the administrator page and have the authorization to process the content through menus available.
		</p>
	</section><!-- /.content -->
</aside><!-- /.right-side -->

{include file="footer.tpl"}