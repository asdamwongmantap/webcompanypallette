<?php
include "config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = $_POST['email'];
$pass     = md5($_POST['password']);

// pastikan username dan password adalah berupa huruf atau angka.
//if (!ctype_alnum($username) OR !ctype_alnum($pass)){
 // echo "Sekarang loginnya tidak bisa di injeksi lho.";
//}
//else{
$login=mysql_query("SELECT * FROM kustomer WHERE email='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  
  $_SESSION[namauser]     = $r[email];
  $_SESSION[namauser]     = $r[email];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];


	$sid_lama = session_id();
	
	session_regenerate_id();

	$sid_baru = session_id();
	
	
  //mysql_query("UPDATE kustomer SET id_session='$sid_baru' WHERE username='$username'");
  echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'media.php?hal=home'</script>";
  function isi_keranjang(){
							$isikeranjang = array();
							$sid = session_id();
							$sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
							
							while ($r=mysql_fetch_array($sql)) {
								$isikeranjang[] = $r;
							}
							return $isikeranjang;
						}
	
  // panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
						$isikeranjang = isi_keranjang();
						
						
						// simpan data detail pemesanan  
						// setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
						for ($i = 0; $i < $jml; $i++){
						  
						  mysql_query("DELETE FROM orders_temp
										 WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
						}
  header('location:media.php?hal=home');
  
}
else{
 echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = 'media.php?hal=login'</script>";
}
//}
?>
