<?php
  session_start();
  session_destroy();
  echo "<script>alert('Logout Berhasil'); window.location = 'media.php?hal=home'</script>";
?>
