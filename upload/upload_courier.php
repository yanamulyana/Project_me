<?php
session_start();
$uploaddir = '../images/couriers/';
$md5 = md5(date('ymdhis'));
$file = $uploaddir .$md5."_".date('Ymdhis')."_".basename($_FILES['uploadfile']['name']); 
$file_name = $md5."_".date('Ymdhis')."_".$_FILES['uploadfile']['name']; 

$size = $_FILES['uploadfile']['size'];

if ($size > 102400)
{
	echo "bigger";
}
else
{
	if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
		echo "$file_name"; 
	} 
	else {
		echo "error";
	}
}
?>