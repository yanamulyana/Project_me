<?php
function randomcode($len="10") {
	$code = NULL;
	for($i=0;$i<$len;$i++) {
		$char = chr(rand(48,122));
		while(!ereg("[a-zA-Z0-9]", $char)) {
			if($char == $lchar) { continue; }
			$char = chr(rand(48,90));
		}
		$pass .= $char;
		$lchar = $char;
	}
	return $pass;
} // END randomcode() FUNCTION
?>