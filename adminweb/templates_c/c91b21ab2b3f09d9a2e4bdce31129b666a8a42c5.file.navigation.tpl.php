<?php /* Smarty version Smarty-3.1.11, created on 2017-06-12 05:11:50
         compiled from ".\templates\navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10578593dc026e68af2-14547667%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91b21ab2b3f09d9a2e4bdce31129b666a8a42c5' => 
    array (
      0 => '.\\templates\\navigation.tpl',
      1 => 1481802796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10578593dc026e68af2-14547667',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593dc026e6dbd6_30413363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593dc026e6dbd6_30413363')) {function content_593dc026e6dbd6_30413363($_smarty_tpl) {?><!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
		
			<li class="active">
				<a href="home.php">
					<span>Home</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Setting Profiles</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="profile.php"><i class="fa fa-angle-double-right"></i> Tentang Kami</a></li>
					<li><a href="bank.php"><i class="fa fa-angle-double-right"></i> Data Bank</a></li>
					<li><a href="howtobuy.php"><i class="fa fa-angle-double-right"></i> Cara Pembelian</a></li>
					<li><a href="policy.php"><i class="fa fa-angle-double-right"></i> Ketentuan Layanan</a></li>
					<li><a href="faq.php"><i class="fa fa-angle-double-right"></i> FAQ</a></li>
					<li><a href="rewards.php"><i class="fa fa-angle-double-right"></i> Reward</a></li>
					<li><a href="voucher.php"><i class="fa fa-angle-double-right"></i> Voucher</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Manajemen User</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="users.php"><i class="fa fa-angle-double-right"></i> User</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Member</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="members.php"><i class="fa fa-angle-double-right"></i> Member</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Master Data</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="categories.php"><i class="fa fa-angle-double-right"></i> Kategori</a></li>
					<li><a href="subcategories.php"><i class="fa fa-angle-double-right"></i> Sub Kategori</a></li>
					<li><a href="suppliers.php"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Master Biaya Pengiriman</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="provinces.php"><i class="fa fa-angle-double-right"></i> Propinsi</a></li>
					<li><a href="cities.php"><i class="fa fa-angle-double-right"></i> Kota</a></li>
					<li><a href="ekspedisi.php"><i class="fa fa-angle-double-right"></i> Jasa Ekspedisi</a></li>
					<li><a href="services.php"><i class="fa fa-angle-double-right"></i> Layanan Ekspedisi</a></li>
					<li><a href="locations.php"><i class="fa fa-angle-double-right"></i> Lokasi Pengambilan</a></li>
					<li><a href="costs.php"><i class="fa fa-angle-double-right"></i> Biaya Kirim</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Manajemen Produk</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="products.php"><i class="fa fa-angle-double-right"></i> Produk</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Promosi & Reward</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="promo.php"><i class="fa fa-angle-double-right"></i> Manajemen Promosi</a></li>
					<li><a href="reward.php"><i class="fa fa-angle-double-right"></i> Manajemen Reward</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Transaksi Penjualan</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="adm_sales_transactions.php?mod=sales&act=neworder"><i class="fa fa-angle-double-right"></i> Pesanan Baru</a></li>
					<li><a href="adm_sales_transactions.php?mod=sales&act=confirm"><i class="fa fa-angle-double-right"></i> Konfirmasi Pengiriman</a></li>
					<li><a href="adm_sales_transactions.php?mod=sales&act=sent"><i class="fa fa-angle-double-right"></i> Pesanan Dikirim</a></li>
					<li><a href="adm_sales_transactions.php?mod=sales&act=finish"><i class="fa fa-angle-double-right"></i> Pesanan Selesai</a></li>
					<li><a href="adm_sales_transactions.php?mod=sales&act=reject"><i class="fa fa-angle-double-right"></i> Pesanan Ditolak</a></li>
				</ul>
			</li>
			<li class="active">
				<a href="confirm.php">
					<span>Konfirmasi Pembayaran</span>
				</a>
			</li>
			<li class="active">
				<a href="request_order.php">
					<span>Request Qty</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<span>Laporan</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="report.php"><i class="fa fa-angle-double-right"></i> Laporan Penjualan</a></li>
					<li><a href="report_best_seller.php"><i class="fa fa-angle-double-right"></i> Laporan Best Seller</a></li>
					<li><a href="report_buyer.php"><i class="fa fa-angle-double-right"></i> Laporan Pembeli Terbanyak</a></li>
					<li><a href="report_empty_stock.php"><i class="fa fa-angle-double-right"></i> Laporan Stok Kosong</a></li>
				</ul>
			</li>
			<li>
				<a href="change_password.php">
					<span>Ubah Password</span>
				</a>
			</li>
			<li>
				<a href="logout.php">
					<span>Logout</span>
				</a>
			</li>
			
		</ul>
	</section>
	<!-- /.sidebar -->
</aside><?php }} ?>