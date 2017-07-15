<?php
function pembulatan($uang) // 678.125
{
	$ribuan = substr($uang, -4); // 8.125
	$nominal = 10000;
	$hasilKurang = $nominal - $ribuan; // 1.875
	
	if ($ribuan != '0000')
	{
		$bulat = $uang + $hasilKurang;
	}
	else
	{
		$bulat = $uang;
	}
	
	return $bulat;
}
?>