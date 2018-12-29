<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOKO ARRIZAL</title>
</head>

<body>
 <center>
      <div role="main" class="container products list">        
        <div class="row">                 
          <div class="span8" style="height:600px;">
            
           
            
  <ul class="row clearfix rr list-display product">
		<?php
		$p1     = new PagingProduk;
		$batas  = 3;
		$posisi = $p1->cariPosisi($batas);
		$produk=mysql_query("SELECT * FROM produk ORDER BY id_produk ASC LIMIT $posisi, $batas");
		$no = $posisi+1;
		
		while ($p=mysql_fetch_array($produk))
		{ 
		//$harga    = number_format(($p[harga]),0,",",".");
		$pothar   = $p['diskon'];
		
		$stok=$p['stok'];
		$tombolbeli="<a href='aksi.php?module=keranjang&act=tambah&id=$p[id_produk]' class='add-to-cart'>
                          <span class='icon ir'>Cart</span>
                          <span class='text'>Beli</span>
                     </a>";
		$tombolhabis="<span style='color:#da251c;font-size:1.5em;'>Stok habis</span>";
		if ($stok!= "0"){
		$tombol=$tombolbeli;
		}else{
		$tombol=$tombolhabis;
		} 
		
		$disisi="<span class=badge corner-badges>$p[diskon]</span>";
		$diskosong="";
		
		if ($pothar!="0")
		{
		 $divdiskon=$disisi;
		}
		
		
		//penrhitungan harga
		$harga = format_rupiah($p[harga]);
		$disc     = ($p[diskon]/100)*$p[harga];
		$hargadisc     = number_format(($p[harga]-$disc),0,",",".");
		$d=$p['diskon'];
		$htetap=" <span class='currency' style='font-size:12px'>Rp. </span><span class='value'>$harga</span>";
		$hdiskon=" <span class='currency' style='font-size:11px'>Rp. </span><span class='value'  style='text-decoration:line-through;font-size:16px'>$harga</span><br>
				   <span class='currency' style='font-size:13px'>Rp. </span><span class='value'>$hargadisc</span>";
					  
		if ($d!= "0"){
		$divharga=$hdiskon;
		}else{
		$divharga=$htetap;
		}
		
        echo"<li class='span9'>
                <div class='row' >
                  <div class='span3 photo-wrapper'>";
				  if ($pothar!="0")
					{
                   echo"<span class='badge corner-badges'>$p[diskon]% <br>Off</span>";
					}
					else
					{
					  echo "<span class='badge corner-badge hot ir hidden'>Hot</span>";	
					}
                   echo" <a href='?hal=detail&id=$p[id_produk]'>
                      <img src='foto_produk/$p[gambar]' alt=''/>
                    </a>
                  </div>
                  <div class='span6 info clearfix'>
                    <h2>$p[nama_produk]</h2>
                    <p style='text-align:justify'>";
					$desk = htmlentities(strip_tags($p['deskripsi'])); // membuat paragraf pada isi berita dan mengabaikan tag html
    				$deskripsi = substr($desk,0,250); // ambil sebanyak 220 karakter
    			 	$deskripsi = substr($desk,0,strrpos($deskripsi," ")); // potong per spasi kalimat
                 echo"$deskripsi...
                    </p>
                    <hr/>
                    <div class='row price-wrapper'>
                      <div class='span2 clearfix'>
						$tombol
                      </div>";
                  echo"<div class='span2'>
                        <span class='price'>
                           $divharga
                        </span>
                      </div>
                    </div>
                    <hr/>
                    
                  </div>
                </div>
              </li>";
			  $no++;
		  }
       		 ?>      
            </ul>
            
            <div class="products-view-nav row bottom">
                          
              <div class="span6">
                <ul class="navigation rr">
                <?php
				  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
				  $jmlhalaman  = $p1->jumlahHalaman($jmldata, $batas);
				  $linkHalaman = $p1->navHalaman($_GET[halproduk], $jmlhalaman);
                  echo "<div class='halaman'><li><a href='#'>$linkHalaman</a></li></div>";
				  ?>
                </ul>
              </div>
              
            </div>
            
          </div>
		  
		  <div class="span3" style="float:right; border:0px solid black;margin-top:11px;">

  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">PENCARIAN</li>
 <li>
	<table style='width:100%;'><tr><td><form name='formcari' method='POST' action='?hal=search' style="margin-top:10px;width:100%;"/><input type='input-text' name='title' type='text' placeholder='Pencarian'/>
					<input type='submit' name='input' value='Cari' style="color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #363636;
  *background-color: #222222;
  background-image: -moz-linear-gradient(top, #444444, #222222);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#444444), to(#222222));
  background-image: -webkit-linear-gradient(top, #444444, #222222);
  background-image: -o-linear-gradient(top, #444444, #222222);
  background-image: linear-gradient(to bottom, #444444, #222222);
  background-repeat: repeat-x;
  border-color: #222222 #222222 #000000;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff444444', endColorstr='#ff222222', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);width:18%;
  text-align:left;"/></td></tr></table>
  </li>
  
	</ul>
  </div>
</div>
		  
		   <div class="span3" style="float:right; border:0px solid black;margin-top:11px;">
<?php
$jumDatacate = mysql_query("SELECT A.id_kategori, B.nama_kategori, COUNT(A.id_kategori) AS jumDatacate FROM produk A, kategori B where A.id_kategori=B.id_kategori group by A.id_kategori");
?>
  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">KATEGORI</li>
 <li>
	<?php 
while ($rowdata =mysql_fetch_array($jumDatacate)){
?>
<a href="?hal=produk-lists-kategori&id=<?php echo $rowdata['id_kategori'] ?>"><?php echo $rowdata['nama_kategori'];?> &nbsp;[ <?php echo $rowdata['jumDatacate'];?> ]</a>
<?php 
} 
?>
  </li>
  
	</ul>
  </div>
</div>

<div class="span3" style="float:right; border:0px solid black;margin-top:11px;">
  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">PRODUK TERLARIS</li>
 <li>
	 <?php
      $best=mysql_query("SELECT * FROM produk ORDER BY dibeli DESC LIMIT 1");
      while($a=mysql_fetch_array($best)){
        $harga = format_rupiah($a[harga]);
		    echo "<div class='product_title' style='text-align:left;'><a href='?hal=detail&id=$a[id_produk]'><h4>$a[nama_produk]</h4></a></div>
         <div class='product_img'>
             <a href='?hal=detail&id=$a[id_produk]'>
                <img src='foto_produk/small_$a[gambar]' border='0' height='110'>
             </a>
         </div>";
      }

        ?>
  </li>
  
	</ul>
  </div>
</div>

		   <div class="span3" style="float:right; border:0px solid black;margin-top:11px;">
<ul class="nav nav nav-pills nav-stacked">
	<li class="active">PENGUNJUNG</li>
  <div class="col-md-8"></div>
  <div class="col-md-4">
  	 <?php
			include "statistik.php";	
	?>
		</ul>
  </div>
</div>
          
        </div>
      </div>
</body>
</html>