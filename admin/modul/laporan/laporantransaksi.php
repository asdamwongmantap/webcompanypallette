<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/produk/aksi_produk.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='modul/laporan/lapdatatransaksi.php' role='button' class='btn'>Cetak Laporan</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Penjualan</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='10%'>No Order</th>
                                    <th width='15%'>Tgl Order</th>
                                    <th width='15%'>Jam Order</th>
                                    <th width='10%'>ID Kustomer</th> 
									<th width='25%'>Nama Kustomer</th>
                                    <th width='25%'>Alamat</th>
                                    <th width='25%'>Aktif</th>           									
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT o.id_orders, o.tgl_order, o.jam_order, o.id_kustomer, k.nama_lengkap, k.alamat, k.aktif FROM orders o, kustomer k  where o.id_kustomer=k.id_kustomer ORDER BY o.id_orders ASC');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[id_orders]</td>
                                    <td>$r[tgl_order]</td>
                                    <td>$r[jam_order]</td>
                                    <td>$r[id_kustomer]</td>
									<td>$r[nama_lengkap]</td>
									<td>$r[alamat]</td>
									<td>$r[aktif]</td>								
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>