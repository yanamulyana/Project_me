			<section class="section-footer">
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
									{$profileCompanyName}<br>
									{$profileAddress}<br>
									Telp. {$profilePhone}
								</p>
								<ul class="inline social-icons">
									{if $profileFacebook != ""}
										<li><a href="{$profileFacebook}" class="icon-facebook" target="_blank"></a></li>
									{/if}
									{if $profileTwitter != ""}
										<li><a href="{$profileTwitter}" class="icon-twitter" target="_blank"></a></li>
									{/if}
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
</html>