<?php
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

function format_hits($hits){
  $hits=number_format($hits,0,',',',');
  return $hits;
}
?>