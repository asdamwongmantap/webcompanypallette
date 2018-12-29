<?php

 include "config/koneksi.php";
 include "phpqrcode/qrlib.php";
	
	$detail1=mysql_query("select id_produk from produk where id_produk='$_GET[id]'");
	$d1=mysql_fetch_array($detail1);

	
	Qrcode::png('http://cobashop.hol.es/media.php?hal=detail&id='.$d1['id_produk'].'');
	
	?>