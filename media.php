  <?php 
  error_reporting(0);
	  session_start();
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/pagingproduk.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
  include "hapus_orderfiktif.php";
  
  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  $user="Pengunjung";
  }
  else
  {
	$user="$_SESSION[namalengkap]";  
  }
  ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gte IE 9]>         <html class="no-js gte-ie9"> <![endif]-->
<!--[if gt IE 99]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  
      <title>TOKO PALETTE</title>
	  <link rel="icon" type="image/png" id="favicon"
          href="img/paleticon.png"/>
     
      

      <link rel="stylesheet" href="css/normalize.min.css">
      <link rel="stylesheet" href="css/main.css">		
     
	  <link rel="stylesheet" href="css/media-queries.css">		
		<link rel="stylesheet" href="css/bootstrap.css">
		
	  
		<link rel="stylesheet" href="css/navbar.css">
		<link rel="stylesheet" href="asset/css/bootstrap.css">	
		<link rel="stylesheet" href="asset/css/bootstrap-responsive.css">	
		 <!-- Le styles -->
        
	

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="asset/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  

      <script src="js/vendor/modernizr-2.6.1.min.js"></script>
      
    
    <link rel="stylesheet" href="css_ticker/style.css">  

    <script type="text/javascript" src="js_ticker/jquery.min.js"></script>
	<script type="text/javascript" src="js_ticker/jquery.totemticker.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
			});
		});
	</script>


    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
		
		
		 <div class="header">
		  <table  style='width:98%;height:95%;'><tr><td style="width:80%;" rowspan="3"><img src="img/header.jpg"></td><td colspan="2" height="90%"><div class="atasmenu" style="margin-bottom:10%;border:0px solid black;width:100%;"><font style="text-transform:uppercase;"><SCRIPT language="JavaScript">var d = new Date();
            var h = d.getHours();
            if (h <= 11) { document.write('Selamat pagi <?php echo $user ?>'); }
            else { if (h <= 15) { document.write('Selamat siang <?php echo $user ?>'); }
            else { if (h <= 19) { document.write('Selamat sore <?php echo $user ?>'); }
            else { if (h <= 23) { document.write('Selamat malam <?php echo $user ?>'); }
            }}}</SCRIPT></font>&nbsp;|&nbsp;<font style="text-transform:uppercase;text-decoration:none;"><?php
               if (!empty($_SESSION['namauser']) AND !empty($_SESSION['passuser'])){
				?>
                
                  <a href="logout.php">
                    Logout
                  </a>
               
                <?php
			    }
			    
                if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
				?>  
               
                  <a href="?hal=login">
                    Log in
                  </a>
                
                <?php
				}
				?></font>
					</td></tr>
			<tr>
		  <?php
				$sid = session_id();
				$sql = mysql_query("SELECT SUM(jumlah*harga) as total,SUM(jumlah) as totaljumlah FROM orders_temp, produk 
								WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
					$r=mysql_fetch_array($sql);
					if ($r['totaljumlah'] != ""){
					$total_rp    = format_rupiah($r[total]);	
				    echo "<td style='width:18%;'><div class='asalkanan' style='background-color:red;height:100%;'><a href='?hal=cart'><span class='title'> Shopping Cart</a> >> $r[totaljumlah] items >> </span></a></div><div class='harga' style='background-color:red'>Rp.$r[total]</div></td>";
					}
					else
					{
					echo "<td style='width:18%;'><div class='asalkanan' style='background-color:#474ed8;height:100%;'><a href='?hal=cart'><span class='title'> Shopping Cart</a> >> 0 items  </span></a></div><div class='harga' style='background-color:#474ed8;'>Rp.0</p></div></td>";	
					}
			  ?>
			 </tr></table>
	 </div>
	<div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="?hal=home">Beranda</a></li>
				<!--<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jam Tangan <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Seiko</a></li>
					<li class="divider"></li>
                    <li><a href="#">Alexandre Christie</a></li>
					<li class="divider"></li>
                    <li><a href="#">Casio</a></li>                    
                  </ul>
                </li>-->
				
                <li><a href="?hal=produk-lists">Semua Produk</a></li>
				<li><a href="?hal=carabeli">Cara Pembelian</a></li>
                <li><a href="?hal=contact">Hubungi Kami</a></li>
				
					
					
                <!-- Read about Bootstrap dropdowns at http://twitter.github.com/bootstrap/javascript.html#dropdowns -->
                
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->
		</div>      
      <?php
	   include "konten.php";
	  ?>  
      <footer>
	  <div class="container" style="width:100%;">
        <div class="row">
		<div class="bottom">
          Copyright &copy;&nbsp;<?php echo date('Y'); ?> - Wong Mantap
        </div>
		</div>
	  </div>
      </footer>
      
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
		
		 <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap-transition.js"></script>
    <script src="asset/js/bootstrap-alert.js"></script>
    <script src="asset/js/bootstrap-modal.js"></script>
    <script src="asset/js/bootstrap-dropdown.js"></script>
    <script src="asset/js/bootstrap-scrollspy.js"></script>
    <script src="asset/js/bootstrap-tab.js"></script>
    <script src="asset/js/bootstrap-tooltip.js"></script>
    <script src="asset/js/bootstrap-popover.js"></script>
    <script src="asset/js/bootstrap-button.js"></script>
    <script src="asset/js/bootstrap-collapse.js"></script>
    <script src="asset/js/bootstrap-carousel.js"></script>
    <script src="asset/js/bootstrap-typeahead.js"></script>
    </body>
</html>