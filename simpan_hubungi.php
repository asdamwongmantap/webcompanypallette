<?php
include "config/koneksi.php";
include "config/library.php";
$nama=trim($_POST['nama']);
$email=trim($_POST['email']);
$subjek=trim($_POST['subjek']);
$pesan=trim($_POST['pesan']);


if (empty($nama)){
  echo "<script>alert('Anda Belum Mengisi Nama'); window.location = 'media.php?hal=contact'</script>";
}
elseif (empty($email)){
  echo "<script>alert('Anda Belum Mengisi Email'); window.location = 'media.php?hal=contact'</script>";
}
elseif (empty($subjek)){
  echo "<script>alert('Anda Belum Mengisi Subjek'); window.location = 'media.php?hal=contact'</script>";
}
elseif (empty($pesan)){
  echo "<script>alert('Anda Belum Mengisi Pesan'); window.location = 'media.php?hal=contact'</script>";
}
else{
	
  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<script>alert('Terima kasih sudah menghubungi kami, kami akan segera membalas pesan anda'); window.location = 'index.php?hal=contact'</script>";
}
?>