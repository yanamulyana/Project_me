<?php
include "header.php";

$queryEmail = "SELECT * FROM as_product_email WHERE status = 'N'";
$sqlEmail = mysqli_query($connect, $queryEmail);
while ($dtEmail = mysqli_fetch_array($sqlEmail))
{
	$queryProduct = "SELECT qty, productName, productSeo FROM as_products WHERE productID = '$dtEmail[productID]'";
	$sqlProduct = mysqli_query($connect, $queryProduct);
	$dataProduct = mysqli_fetch_array($sqlProduct);
	
	if ($dataProduct['qty'] > 0)
	{
		$subject = "Anaku.com : $dataProduct[productName] telah tersedia kembali!";
		$server = "http://Anaku.com";
		$html = "
				<p>Kepada Customer Yth,</p>
				<p>Terima kasih atas ketersediaan Anda menunggu tersedianya kembali produk $dataProduct[productName]<br>Email ini memberitahukan bahwa $dataProduct[productName] telah tersedia kembali di toko kami.</p>
				<p>Klik tombol dibawah untuk melakukan proses pemesanan produk :</p>
				<p>
					<a href='$server/product-$dataProduct[productID]-$dataProduct[productSeo].html'>
						<input type='button' value='BELI PRODUK' style='background: #d45c93; border: medium none; box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25); color: #fff; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s ease-in-out 0s; padding: 10px;'>
					</a>
				</p>
				<p>Atau klik <a href='$server' target='_blank'>disini</a> untuk menelusuri produk-produk kami lainnya.</p>
				<p><b>Selamat berbelanja!</b><br>
					Anaku.com
				</p>";
				
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'From: no-reply (Anaku.com) <no-reply@Anaku.com>' . "\r\n";

		$sent = mail($dtEmail['email'], $subject, $html, $headers);
		
		if ($sent)
		{
			$queryUpdate = "UPDATE as_product_email SET status = 'Y' WHERE emailID = '$dtEmail[emailID]'";
			mysqli_query($connect, $queryUpdate);
		}
	}
}
?>