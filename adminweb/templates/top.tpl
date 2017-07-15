<!-- header logo: style can be found in header.less -->
<header class="header">
	<a href="home.php" class="logo">ASFA SOLUTION</a>
	
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				
				<!--<li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-envelope"></i>
						<span class="label label-success">4</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">You have 4 messages</li>
						<li>
							<ul class="menu">
								<li>
									<a href="#">
										<div class="pull-left">
										</div>
										<h4>
											Support Team
											<small><i class="fa fa-clock-o"></i> 5 mins</small>
										</h4>
										<p>Why not buy a new awesome theme?</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="footer"><a href="#">See All Messages</a></li>
					</ul>
				</li>-->
				
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-money"></i>
						<span class="label label-warning">{$numsNavConfirm}</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">Anda mempunyai {$numsNavConfirm} konfirmasi pembayaran</li>
						<li>
							<ul class="menu">
								{section name=dataNavConfirm loop=$dataNavConfirm}
									<li>
										<a href="confirm.php?mod=confirm&act=detail&confirmID={$dataNavConfirm[dataNavConfirm].confirmID}">
											<i class="ion ion-ios7-people info"></i> 
											{$dataNavConfirm[dataNavConfirm].invoiceID} - {$dataNavConfirm[dataNavConfirm].amount} - {$dataNavConfirm[dataNavConfirm].bankTo}
										</a>
									</li>
								{/section}
							</ul>
						</li>
					</ul>
				</li>
				
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-warning"></i>
						<span class="label label-warning">{$numsNoticeNewOrder}</span>
					</a>
					<ul class="dropdown-menu">
						<li class="header">Anda mempunyai {$numsNoticeNewOrder} pesanan baru</li>
						<li>
							<ul class="menu">
								{section name=dataNoticeNewOrder loop=$dataNoticeNewOrder}
									<li>
										<a href="adm_sales_transactions.php?mod=sales&act=confirmneworder&orderID={$dataNoticeNewOrder[dataNoticeNewOrder].orderID}&invoiceID={$dataNoticeNewOrder[dataNoticeNewOrder].invoiceID}">
											<i class="ion ion-ios7-people info"></i> 
											{$dataNoticeNewOrder[dataNoticeNewOrder].invoiceID} - {$dataNoticeNewOrder[dataNoticeNewOrder].memberName} - {$dataNoticeNewOrder[dataNoticeNewOrder].grandtotal}
										</a>
									</li>
								{/section}
							</ul>
						</li>
					</ul>
				</li>
				
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="glyphicon glyphicon-user"></i>
						<span>{$sessFullName} </span>
					</a>
					
				</li>
			</ul>
		</div>
	</nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">