<?php
include ("konfig/koneksi.php");

$s=mysql_query("delete from alternatif where id_alternatif='$_GET[id]' ");

if($s){
	echo "<script>window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
}

?>