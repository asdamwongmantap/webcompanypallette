<script>
function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;
  else
  return true;
}
</script> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOKO ARRIZAL</title>
</head>

<body>
 <center>
      <div role="main" class="container products grid">     
        <div class="row">    
         
		
          <div class="span12">
		  
            <ul class="row-fluid clearfix rr grid-display">
			
            <?php
			$email = $_SESSION['namauser'];
						$password = md5($_POST['password']);
						
						
						//$sql = "SELECT * FROM	kustomer WHERE email='$email' AND password='$password'";
						$sql = "SELECT * FROM	kustomer WHERE email='$_SESSION[namauser]'";
						$hasil = mysql_query($sql);
						$r = mysql_fetch_array($hasil);
						
						if(mysql_num_rows($hasil) == 0){
						
						  echo "<script>alert('Email atau password anda salah, atau anda belum login'); window.location = 'media.php?hal=login'</script>";
						// fungsi untuk mendapatkan isi keranjang belanja
						

						}
						else{
	       $sid = session_id();
		$sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
		$ketemu=mysql_num_rows($sql);
		$no=1;
		   while($r=mysql_fetch_array($sql))
		{
		if($ketemu < 1){
	
		echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
			window.location=('media.php?hal=home')</script>";
		}
		else{ 
		 echo "<form method=post action=aksi.php?module=keranjang&act=update>";
         echo"<li class='span5' style='border:0px solid black;'>
                <div class='prod-wrapper'>";
		 
		
		    $disc        = ($r[diskon]/100)*$r[harga];
			$hargadisc   = number_format(($r[harga]-$disc),0,",",".");
			$subtotal    = ($r[harga]-$disc) * $r[jumlah];
			$total       = $total + $subtotal;  
			$vat         = $total*0.1;
			$vat_rp      = format_rupiah($vat);
			$ttl_rp      = $total+$vat;
			$subtotal_rp = format_rupiah($subtotal);
			$subtotal_rp    = number_format(($subtotal),0,",",".");
			$total_rp    = format_rupiah($ttl_rp);

			$harga       = format_rupiah($r[harga]);
			$harga    = number_format(($r[harga]),0,",",".");
			echo "
			<table border='0' style='width:100%;text-align:left;'><tr><td rowspan='6' width='30%'>
               
			   <img src='foto_produk/$r[gambar]' alt=''/>
				
		
              </td><td style='width:8%;'>Nama</td><td>:</td><td>$r[nama_produk]</td></tr>
		 <tr><td>Qty</td><td>:</td><td height='20px'><input type=text name='jml[$no]' value=$r[jumlah] size=1 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\" style='height:100%;margin-top:5%;width:100%'><br>
		 <input type=hidden name=id[$no] value=$r[id_orders_temp]>
		 </td></tr>
		 <tr><td>Diskon</td><td>:</td><td>$r[diskon] %</td></tr>
		 <tr><td>Harga</td><td>:</td><td>Rp.$hargadisc</td></tr>
		 <tr><td>Sub Total</td><td>:</td><td>Rp.$subtotal_rp</td></tr>
		 <tr><td><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]' style='text-align:center;'><img src='img/cart_delete.png' style='width:40%;height:10%;'></td><td colspan='2'><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]' style='text-align:left;'>HAPUS</a></td></tr>
		 </table>   
                  
                </div>
              </li>";
			 } 
			}
			}
			?>
            </ul>   
			<div class="totalsemua" style="margin-top:30px;border:0px solid black;">
            <table style="width:50%;float:left;"><tr><td width="20%">PPN 10%</td><td><?php echo "Rp. $vat_rp" ?></td></tr>
		 <tr><td>Total</td><td><?php echo "Rp. $total_rp" ?> </td></tr>
		 <tr><td><a href="?hal=simpantransaksi" class="btn">Selesai</a></td>
            <td><a href="?hal=home" class="btn">Tambah</a></td></table>
			</div>		 
          </div>
		  
		          
          
        </div>
      </div>
	  
	  
	    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
	  
</body>
</html>