<?php
// class paging for user Admin
class PagingUser{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='users.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='users.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='users.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='users.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='users.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='users.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='users.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for live Admin
class PagingLive{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=live&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=live&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=live&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=live&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='adm_sales_transactions.php?mod=sales&act=live&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=live&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=live&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for transfer
class PagingTransfer{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='transfer_banks.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='transfer_banks.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='transfer_banks.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='transfer_banks.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='transfer_banks.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='transfer_banks.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='transfer_banks.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for transfer search
class PagingTransferSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='transfer_banks.php?mod=transfer&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&submit=$_GET[submit]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for user search
class PagingUserSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='users.php?mod=$_GET[mod]&act=$_GET[act]&q=$_GET[q]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for member
class PagingMember{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='members.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='members.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='members.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='members.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='members.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='members.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='members.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for member search
class PagingMemberSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='members.php?mod=member&act=search&t=$_GET[t]&q=$_GET[q]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='members.php?mod=member&act=search&t=$_GET[t]&q=$_GET[q]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='members.php?mod=member&act=search&t=$_GET[t]&q=$_GET[q]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='members.php?mod=member&act=search&q=$_GET[q]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='members.php?mod=member&act=search&t=$_GET[t]&q=$_GET[q]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='members.php?mod=member&act=search&t=$_GET[t]&q=$_GET[q]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='members.php?mod=member&act=search&t=$_GET[t]&q=$_GET[q]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for categories
class PagingCategory{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='categories.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='categories.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='categories.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='categories.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='categories.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='categories.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='categories.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for subcategories
class PagingSubCategory{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='subcategories.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='subcategories.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='subcategories.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='subcategories.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='subcategories.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='subcategories.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='subcategories.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for brand
class PagingBrand{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='brands.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='brands.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='brands.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='brands.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='brands.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='brands.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='brands.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for province
class PagingProvince{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='provinces.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='provinces.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='provinces.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='provinces.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='provinces.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='provinces.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='provinces.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for city
class PagingCity{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='cities.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='cities.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='cities.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='cities.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='cities.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='cities.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='cities.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product
class PagingProduct{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='products.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='products.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='products.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='products.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='products.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='products.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='products.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product search
class PagingProductSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='products.php?mod=$_GET[mod]&act=$_GET[act]&categoryID=$_GET[categoryID]&subCategoryID=$_GET[subCategoryID]&brandID=$_GET[brandID]&q=$_GET[q]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for supplier
class PagingSupplier{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='suppliers.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='suppliers.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='suppliers.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='suppliers.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='suppliers.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='suppliers.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='suppliers.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for fares
class PagingFare{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='fares.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='fares.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='fares.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='fares.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='fares.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='fares.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='fares.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product category
class PagingProductCategory{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='category-$_GET[sort]-1-$_GET[categoryID]-$_GET[title].html'><< First</a></span> 
		                    <span class=prevnext><a href='category-$_GET[sort]-$prev-$_GET[categoryID]-$_GET[title].html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='category-$_GET[sort]-$i-$_GET[categoryID]-$_GET[title].html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='category-$_GET[sort]-$i-$_GET[categoryID]-$_GET[title].html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='category-$_GET[sort]-$jmlhalaman-$_GET[categoryID]-$_GET[title].html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='category-$_GET[sort]-$next-$_GET[categoryID]-$_GET[title].html'>Next ></a></span> 
		                     <span class=prevnext><a href='category-$_GET[sort]-$jmlhalaman-$_GET[categoryID]-$_GET[title].html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product category list
class PagingProductCategoryList{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='categorylist-$_GET[sort]-1-$_GET[categoryID]-$_GET[title].html'><< First</a></span> 
		                    <span class=prevnext><a href='categorylist-$_GET[sort]-$prev-$_GET[categoryID]-$_GET[title].html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='categorylist-$_GET[sort]-$i-$_GET[categoryID]-$_GET[title].html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='categorylist-$_GET[sort]-$i-$_GET[categoryID]-$_GET[title].html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='categorylist-$_GET[sort]-$jmlhalaman-$_GET[categoryID]-$_GET[title].html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='categorylist-$_GET[sort]-$next-$_GET[categoryID]-$_GET[title].html'>Next ></a></span> 
		                     <span class=prevnext><a href='categorylist-$_GET[sort]-$jmlhalaman-$_GET[categoryID]-$_GET[title].html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product sub category
class PagingProductSubCategory{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='subcategory-$_GET[sort]-1-$_GET[subCategoryID]-$_GET[title].html'><< First</a></span> 
		                    <span class=prevnext><a href='subcategory-$_GET[sort]-$prev-$_GET[subCategoryID]-$_GET[title].html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='subcategory-$_GET[sort]-$i-$_GET[subCategoryID]-$_GET[title].html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='subcategory-$_GET[sort]-$i-$_GET[subCategoryID]-$_GET[title].html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='subcategory-$_GET[sort]-$jmlhalaman-$_GET[subCategoryID]-$_GET[title].html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='subcategory-$_GET[sort]-$next-$_GET[subCategoryID]-$_GET[title].html'>Next ></a></span> 
		                     <span class=prevnext><a href='subcategory-$_GET[sort]-$jmlhalaman-$_GET[subCategoryID]-$_GET[title].html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product sub category list
class PagingProductSubCategoryList{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='subcategorylist-$_GET[sort]-1-$_GET[subCategoryID]-$_GET[title].html'><< First</a></span> 
		                    <span class=prevnext><a href='subcategorylist-$_GET[sort]-$prev-$_GET[subCategoryID]-$_GET[title].html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='subcategorylist-$_GET[sort]-$i-$_GET[subCategoryID]-$_GET[title].html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='subcategorylist-$_GET[sort]-$i-$_GET[subCategoryID]-$_GET[title].html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='subcategorylist-$_GET[sort]-$jmlhalaman-$_GET[subCategoryID]-$_GET[title].html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='subcategorylist-$_GET[sort]-$next-$_GET[subCategoryID]-$_GET[title].html'>Next ></a></span> 
		                     <span class=prevnext><a href='subcategorylist-$_GET[sort]-$jmlhalaman-$_GET[subCategoryID]-$_GET[title].html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for brand
class PagingProductBrand{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='brand-$_GET[sort]-1-$_GET[brandID]-$_GET[title].html'><< First</a></span> 
		                    <span class=prevnext><a href='brand-$_GET[sort]-$prev-$_GET[brandID]-$_GET[title].html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='brand-$_GET[sort]-$i-$_GET[brandID]-$_GET[title].html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='brand-$_GET[sort]-$i-$_GET[brandID]-$_GET[title].html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='brand-$_GET[sort]-$jmlhalaman-$_GET[brandID]-$_GET[title].html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='brand-$_GET[sort]-$next-$_GET[brandID]-$_GET[title].html'>Next ></a></span> 
		                     <span class=prevnext><a href='brand-$_GET[sort]-$jmlhalaman-$_GET[brandID]-$_GET[title].html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for brand list
class PagingProductBrandList{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='brandlist-$_GET[sort]-1-$_GET[brandID]-$_GET[title].html'><< First</a></span> 
		                    <span class=prevnext><a href='brandlist-$_GET[sort]-$prev-$_GET[brandID]-$_GET[title].html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='brandlist-$_GET[sort]-$i-$_GET[brandID]-$_GET[title].html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='brandlist-$_GET[sort]-$i-$_GET[brandID]-$_GET[title].html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='brandlist-$_GET[sort]-$jmlhalaman-$_GET[brandID]-$_GET[title].html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='brandlist-$_GET[sort]-$next-$_GET[brandID]-$_GET[title].html'>Next ></a></span> 
		                     <span class=prevnext><a href='brandlist-$_GET[sort]-$jmlhalaman-$_GET[brandID]-$_GET[title].html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for history
class PagingHistory{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='orderhistory-1.html'><< First</a></span> 
		                    <span class=prevnext><a href='orderhistory-$prev.html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='orderhistory-$i.html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='orderhistory-$i.html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='orderhistory-$jmlhalaman.html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='orderhistory-$next.html'>Next ></a></span> 
		                     <span class=prevnext><a href='orderhistory-$jmlhalaman.html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for testimonial
class PagingTestimonial{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='testimonial-1.html'><< First</a></span> 
		                    <span class=prevnext><a href='testimonial-$prev.html'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='testimonial-$i.html'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='testimonial-$i.html'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='testimonial-$jmlhalaman.html'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='testimonial-$next.html'>Next ></a></span> 
		                     <span class=prevnext><a href='testimonial-$jmlhalaman.html'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for admin promo
class PagingAdminPromo{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='promo.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='promo.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='promo.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='promo.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='promo.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='promo.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='promo.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for admin reward
class PagingAdminReward{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='reward.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='reward.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='reward.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='reward.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='reward.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='reward.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='reward.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product search
class PagingSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		$title = $_GET['q'];
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='search.php?mod=search&act=go&sort=$_GET[sort]&q=$title&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for service
class PagingService{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='services.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='services.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='services.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='services.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='services.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='services.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='services.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for location
class PagingLocation{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='locations.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='locations.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='locations.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='locations.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='locations.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='locations.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='locations.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for cost
class PagingCost{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='costs.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='costs.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='costs.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='costs.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='costs.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='costs.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='costs.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for new order
class PagingNewOrder{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=neworder&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=neworder&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=neworder&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=neworder&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='adm_sales_transactions.php?mod=sales&act=neworder&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=neworder&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=neworder&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for confirm
class PagingConfirm{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=confirm&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=confirm&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=confirm&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=confirm&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='adm_sales_transactions.php?mod=sales&act=confirm&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=confirm&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=confirm&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for sent
class PagingSent{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=sent&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=sent&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=sent&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=sent&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='adm_sales_transactions.php?mod=sales&act=sent&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=sent&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=sent&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for finish
class PagingFinish{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=finish&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=finish&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=finish&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=finish&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='adm_sales_transactions.php?mod=sales&act=finish&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=finish&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=finish&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for reject
class PagingReject{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=reject&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=reject&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=reject&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='adm_sales_transactions.php?mod=sales&act=reject&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='adm_sales_transactions.php?mod=sales&act=reject&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=reject&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='adm_sales_transactions.php?mod=sales&act=reject&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for confirm payment
class PagingConfirmPayment{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='confirm.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='confirm.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='confirm.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='confirm.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='confirm.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='confirm.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='confirm.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for confirm payment search
class PagingConfirmPaymentSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='confirm.php?mod=confirm&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for account
class PagingAccount{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='accounts.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='accounts.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='accounts.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='accounts.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='accounts.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='accounts.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='accounts.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for fund search
class PagingFundSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='funds.php?mod=fund&act=search&startDate=$_GET[startDate]&endDate=$_GET[endDate]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for product search
class PagingProductHitSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='products.php?mod=product&act=search&q=$_GET[q]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='products.php?mod=product&act=search&q=$_GET[q]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='products.php?mod=product&act=search&q=$_GET[q]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='products.php?mod=product&act=search&q=$_GET[q]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='products.php?mod=product&act=search&q=$_GET[q]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='products.php?mod=product&act=search&q=$_GET[q]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='products.php?mod=product&act=search&q=$_GET[q]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for reseller
class PagingReseller{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='resellers.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='resellers.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='resellers.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='resellers.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='resellers.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='resellers.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='resellers.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for resellers search
class PagingResellerSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='resellers.php?mod=reseller&act=search&t=$_GET[t]&q=$_GET[q]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for special
class PagingSpecial{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='specials.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='specials.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='specials.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='specials.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='specials.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='specials.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='specials.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for specials search
class PagingSpecialSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='specials.php?mod=special&act=search&t=$_GET[t]&q=$_GET[q]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for request order search
class PagingRequestOrderSearch{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='request_order.php?mod=request&act=search&startDate=$_GET[startDate]&endDate$_GET[endDate]&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for request order
class PagingRequestOrder{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='request_order.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='request_order.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='request_order.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='request_order.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='request_order.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='request_order.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='request_order.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for debt
class PagingDebt{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='debts.php?page=1'><< First</a></span> 
		                    <span class=prevnext><a href='debts.php?page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='debts.php?page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='debts.php?page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='debts.php?page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='debts.php?page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='debts.php?page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for history member
class PagingHistoryMember{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='members.php?mod=member&act=view&memberID=2&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='members.php?mod=member&act=view&memberID=2&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='members.php?mod=member&act=view&memberID=2&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='members.php?mod=member&act=view&memberID=2&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='members.php?mod=member&act=view&memberID=2&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='members.php?mod=member&act=view&memberID=2&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='members.php?mod=member&act=view&memberID=2&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for history reseller
class PagingHistoryReseller{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='resellers.php?mod=reseller&act=view&memberID=2&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='resellers.php?mod=reseller&act=view&memberID=2&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='resellers.php?mod=reseller&act=view&memberID=2&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='resellers.php?mod=reseller&act=view&memberID=2&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='resellers.php?mod=reseller&act=view&memberID=2&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='resellers.php?mod=reseller&act=view&memberID=2&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='resellers.php?mod=reseller&act=view&memberID=2&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}

// class paging for history special
class PagingHistorySpecial{
		
	// Function for check the page and data position
	function cariPosisi($batas){
		if(empty($_GET['page'])){
			$posisi=0;
			$_GET['page']=1;
		}
		else{
			$posisi = ($_GET['page']-1) * $batas;
		}
		return $posisi;
		}
		
		// function for count the page total
		function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
		}
		
		// function for page link 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = ""; 
		
		// link to the first page and previous
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<span class=prevnext><a href='specials.php?mod=special&act=view&memberID=2&page=1'><< First</a></span> 
		                    <span class=prevnext><a href='specials.php?mod=special&act=view&memberID=2&page=$prev'>< Prev</a></span> ";
		}
		else{ 
			$link_halaman .= "<span class=disabled><< First</span> <span class=disabled>< Prev</span>";
		}
		
		// page link 1,2,3, ...
		$angka = ($halaman_aktif > 3 ? " ... " : " "); 
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
		  if ($i < 1)
		  	continue;
			  $angka .= "<a href='specials.php?mod=special&act=view&memberID=2&page=$i'>$i</a>";
		  }
			  $angka .= " <span class=current>$halaman_aktif</span> ";
			  
		    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
		    if($i > $jmlhalaman)
		      break;
			  $angka .= "<a href='specials.php?mod=special&act=view&memberID=2&page=$i'>$i</a>";
		    }
			  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='specials.php?mod=special&act=view&memberID=2&page=$jmlhalaman'>$jmlhalaman</a> " : " ");
		
		$link_halaman .= "$angka";
		
		// link to the next page and the last 
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <span class=prevnext><a href='specials.php?mod=special&act=view&memberID=2&page=$next'>Next ></a></span> 
		                     <span class=prevnext><a href='specials.php?mod=special&act=view&memberID=2&page=$jmlhalaman'>Last >></a></span> ";
		}
		else{
			$link_halaman .= "<span class=disabled>Next ></span><span class=disabled>Last >></span>";
		}
		return $link_halaman;
	}
}
?>