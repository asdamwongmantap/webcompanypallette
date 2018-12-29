<?php
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  //include "config/class_paging.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "hapus_orderfiktif.php";?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bel's Souvenir</title>
</head>

<body>
<?php

$kar1=strstr($_POST[email], "@");
$kar2=strstr($_POST[email], ".");

// Cek email kustomer di database
$cek_email=mysql_num_rows(mysql_query("SELECT email FROM kustomer WHERE email='$_POST[email]'"));
// Kalau email sudah ada yang pakai

if (empty($_POST[password])){
  echo "<script>window.alert('Masukkan Password Baru Anda')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=lupapassword'>";
}

$email = $_POST['email'];
$password=md5($_POST['password']);

// simpan data kustomer 
mysql_query("UPDATE kustomer SET password='$password' where email='$email'");
			 
			 
 echo "<script>window.alert('Password Berhasil Di Ganti, Klik OK untuk melanjutkan')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php?hal=daftar'>";

?>

</body>
</html>