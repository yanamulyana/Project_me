<?php /* Smarty version Smarty-3.1.11, created on 2017-06-16 13:05:51
         compiled from ".\templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20092593db3cb839370-77770771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1497593032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20092593db3cb839370-77770771',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_593db3cb856626_63718379',
  'variables' => 
  array (
    'profileCompanyName' => 0,
    'profileAddress' => 0,
    'profilePhone' => 0,
    'profileFacebook' => 0,
    'profileTwitter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_593db3cb856626_63718379')) {function content_593db3cb856626_63718379($_smarty_tpl) {?>			<section class="section-footer">
				<div class="container">
					<div class="row-fluid">
						<div class="span3">
							<div class="footer-links-holder">
								<h2>Info Anaku.Com</h2>
								<ul>
									<li><a href="about-us.html">Tentang Anaku.Com</a></li>
									<li><a href="cara-berbelanja.html">Cara Belanja?</a></li>
									<li><a href="ketentuan-layanan.html">Ketentuan dan Layanan</a></li>
									<li><a href="faq.html">FAQ</a></li>
									<li><a href="testimonial-1.html">Testimonial</a></li>
								</ul>
							</div>
						</div>
						<div class="span3">
							<div class="footer-links-holder">
								<h2>Layanan Pelanggan</h2>
								<ul>
									<li><a href="contact-us.html">Hubungi Kami</a></li>
									<li><a href="voucher.html">Voucher</a></li>
									<li><a href="reward.html">Reward</a></li>
									<li><a href="confirm.html">Konfirmasi Pembayaran</a></li>
								</ul>
							</div>
						</div>
						<div class="span3">
							<div class="footer-links-holder">
								<h2>Newsletter</h2>
								<form method="POST" action="newsletter.php?mod=newsletter&act=input">
								<div style="border: 1px solid #c5c1c2; padding: 0px 10px 10px 10px; background-color: #fff;">
									<p>Daftar sekarang untuk menerima informasi produk terkini, promosi, dan tawaran menarik lainnya.</p>
									<input type="email" name="email" placeholder="masukkan email disini" style="width: 185px;" required><br>
									<center><button type="submit" name="submit" style="background: #ffbb00; color: #FFF; padding: 10px; border: medium none; width: 100%;">DAFTAR</button></center>
								</div>
								</form>
							</div>
						</div>
						<div class="span3">
							<div class="footer-links-holder">
								<h2>Contact Us</h2>
								<p>
									<?php echo $_smarty_tpl->tpl_vars['profileCompanyName']->value;?>
<br>
									<?php echo $_smarty_tpl->tpl_vars['profileAddress']->value;?>
<br>
									Telp. <?php echo $_smarty_tpl->tpl_vars['profilePhone']->value;?>

								</p>
								<ul class="inline social-icons">
									<?php if ($_smarty_tpl->tpl_vars['profileFacebook']->value!=''){?>
										<li><a href="<?php echo $_smarty_tpl->tpl_vars['profileFacebook']->value;?>
" class="icon-facebook" target="_blank"></a></li>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['profileTwitter']->value!=''){?>
										<li><a href="<?php echo $_smarty_tpl->tpl_vars['profileTwitter']->value;?>
" class="icon-twitter" target="_blank"></a></li>
									<?php }?>
									<!--<li><a href="#" class="icon-rss" ></a></li>
									<li><a href="#" class="icon-linkedin" ></a></li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section-copyright">
				<div class="container">
					<div class="copyright pull-left">
						<p>
							<strong>© Anaku.COM 2015</strong>. All rights reserved.<br>
						</p>
					</div>
					<!-- <div class="copyright-links pull-right">
						Developed by <a href="http://Anaku.co.id" target="_blank">Commtech Indonesia, Best Solution for Your Business</a>
					</div> -->
				</div>
			</section>
		</div>
	</body>
</html><?php }} ?>