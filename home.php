<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOKO PALETTE</title>
</head>
<body>
 <!-- Carousel
        ================================================== -->
        <center><div id="myCarousel" class="carousel slide">
          <div class="carousel-inner">
            <div class="item active" style="height:250px;">
              <img src="foto_header/palet1.jpg" alt="">
             <div class="container">
                
              </div>
			 
            </div>
            <div class="item" style="height:250px;">
              <img src="foto_header/palet2.jpg" alt="">
              <div class="container">
                
              </div>
              
            </div>
            <div class="item" style="height:250px;">
              <img src="foto_header/palet3.png" alt="">
              <div class="container">
                
              </div>
            </div>
			<div class="item" style="height:250px;">
              <img src="foto_header/palet4.jpg" alt="">
              <div class="container">
                
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
        </div><!-- /.carousel -->
 <center>
      <div role="main" class="container products grid">     
        <div class="row">    
         
		
          <div class="span9" style="height:auto;">
		  
            <ul class="row-fluid clearfix rr grid-display">
			
            <?php
			$p1     = new PagingProdukGrid;
			$batas  = 12;
			$posisi = $p1->cariPosisi($batas);
			$q=mysql_query("SELECT * FROM produk ORDER BY id_produk ASC LIMIT $posisi, $batas");
			$no = $posisi+1;
			
            while ($r=mysql_fetch_array($q))
            {
					  $harga = format_rupiah($r[harga]);
					  $disc     = ($r[diskon]/100)*$r[harga];
					  $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
					  $d=$r['diskon'];
					  $htetap="<span>$r[harga]</span>";
					  $hdiskon="<span style='text-decoration:line-through;font-size:0.9em'>$r[harga]</span>&nbsp;&nbsp;<span>$hargadisc</span>";
					  
					   if ($d!= "0"){
					  $divharga=$hdiskon;
					  }else{
					  $divharga=$htetap;
					  } 	
					  
					 
						
						
					  
         echo"<li class='span3 alpha33'>
                <div class='prod-wrapper'>";
				
				
             if ($r[diskon]!="0")
					{
                   //echo"<span class='badge corner-badges-grid'>$r[diskon]%</span>";
					echo "<span class='badge corner-badge off-35'>$r[diskon] %</span>";
					}
					else
					{
					  echo "<span class='badge corner-badge off-35 hidden'></span>";	
					}
                 echo" 
                  
					<span class='produk'>
					<span>
                  <a href='?hal=detail&id=$r[id_produk]'>
                     <img src='foto_produk/medium_$r[gambar]'alt='' width='238' height='288' style='border:0px solid #F03;margin-bottom:3px;'>
                  </a>
				  </span>
				  </span>
				  <span class='nama'>
                      <span><font style='text-transform:uppercase;text-align:left;padding-left:5px;'>$r[nama_produk]</font></span>
                    </span></br>
					";
					
				
				 $stok=$r['stok'];
			         $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
						$tombolhabis="<span class='prod_cart_habis'><img src='img/cart_hbs.png' style='height:100%;'></span>";
					  if ($stok!= "0"){
					  echo "<span class='value'>
					  <span><table width=100% style=margin-top:4px;height:35px;><tr><td style='width:70%;padding-left:5px;'>Rp. $divharga</td><td>&nbsp;</td>
					  <td>&nbsp;</td><td>&nbsp;</td>
					  <td><a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a></td></tr></table></span>
                  
				   </span>";
					  }else{
					  echo "<span class='value'>
					  <span><table width=100% style=margin-top:4px;height:35px;><tr><td style='width:70%;padding-left:5px;'>Rp. $divharga</td><td>&nbsp;</td>
					  <td>&nbsp;</td><td>&nbsp;</td>
					  <td style='background-color:white;'><span class='prod_cart_habis'><img src='img/cart_hbs.png' style='height:100%;'></span></td></tr>
					  </table></span>
                  
				   </span>";
					  } 
			
                  
                    
                  echo "<span class='value'>
					  <span><table width=100% style=margin-top:4px;height:35px;><tr>
					  <td><a class='prod_cart' href=\"QR_Code.php?id=$r[id_produk]\">SHOW QR CODE</a></td></tr></table></span>
                </div>
              </li>";
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
				  
				  echo "<li><a href='#'>$linkHalaman</a></li>";
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
			
		  
		  <div class="span3" style="float:right; border:0px solid black;margin-top:1px;">
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