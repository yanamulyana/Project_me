<?php
session_start();
$uploaddir = '../images/products/';
$md5 = md5(date('ymdhis'));
$file = $uploaddir .$md5."_".date('Ymdhis')."_".basename($_FILES['uploadfile6']['name']); 
$file_name = $md5."_".date('Ymdhis')."_".$_FILES['uploadfile6']['name']; 

$size = $_FILES['uploadfile6']['size'];

if ($size > 512000)
{
	echo "bigger";
}
else
{
	if (move_uploaded_file($_FILES['uploadfile6']['tmp_name'], $file)) {
		echo "$file_name"; 
	} 
	else {
		echo "error";
	}
}
?>