<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_GET['p']=='home')
{ 
include "home.php";
}
else
if ($_GET['p']=='carabeli')
{ 
include "modul/carabeli/carabeli.php";
}
else
if ($_GET['p']=='gantipassword')
{ 
include "modul/gantipassword/gantipass.php";
}
else
if ($_GET['p']=='produk')
{ 
include "modul/produk/produk.php";
}
else
if ($_GET['p']=='subproduk')
{ 
include "modul/subproduk/subproduk.php";
}
else
if ($_GET['p']=='kategori')
{ 
include "modul/kategori/kategori.php";
}
else
if ($_GET['p']=='jasakirim')
{ 
include "modul/jasakirim/jasakirim.php";
}
else
if ($_GET['p']=='ongkoskirim')
{ 
include "modul/ongkoskirim/ongkoskirim.php";
}
else
if ($_GET['p']=='komentar')
{ 
include "modul/komentar/komentar.php";
}
else
if ($_GET['p']=='pesan')
{ 
include "modul/komentar/pesan.php";
}
else
if ($_GET['p']=='order')
{ 
include "modul/order/order.php";
}
else
if ($_GET['p']=='profil')
{ 
include "modul/profil/profil.php";
}
else
if ($_GET['p']=='laptransaksi')
{ 
include "modul/laporan/laporantransaksi.php";
}
else
{
include "not_found.php";	
}
?>
</body>
</html>