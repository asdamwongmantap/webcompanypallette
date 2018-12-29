<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/komentar/aksi_pesan.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Pesan</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
                                    <th width='25%'>Nama</th>
                                    <th width='25%'>Pesan</th>
									<th width='25%'>Tanggal</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM hubungi ORDER BY id_hubungi ASC');
							while($r=mysql_fetch_array($tp)){
							$tgl=tgl_indo($r[tgl]);
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
                                    <td>$r[nama]</td>
                                    <td>$r[pesan]</td>
									<td>$r[tanggal]</td>
                                    <td><a href='?p=komentar&aksi=detail&id=$r[id_komentar]'>Detail | <a>
										<a href='$aksi?act=hapus&id=$r[id_komentar]'>Hapus<a></td>
                                    
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
case "detail":
	$edit = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	$tgl=tgl_indo($r[tgl]);
echo "<form method='post' action='modul/komentar/aksi_pesan.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                        <div class='isw-favorite'></div>
                        <h1>PESAN</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_hubungi]>
                      
					  <div class='row-form clearfix'>
                            <div class='span3'>Nama</div>
                            <div class='span9'><input type='text' name='nama' value='$r[nama]' readonly/></div>
                      </div>
					
					  <div class='row-form clearfix'>
                            <div class='span3'>Email</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]' readonly/></div>
                      </div>
					  
					  <div class='row-form clearfix'>
                            <div class='span3'>Subjek</div>
                            <div class='span9'><input type='text' name='subjek' value='$r[subjek]' readonly/></div>
                      </div>

					   <div class='row-form clearfix'>
                            <div class='span3'>Pesan</div>
                            <div class='span9'><textarea name='pesan' readonly>$r[pesan]</textarea></div>
                        </div>
                      
					   <div class='row-form clearfix'>
                            <div class='span3'>Tanggal</div>
                            <div class='span9'><input type='text' name='nama_komentar' value='$tgl' readonly/></div>
                        </div>";
						
						
						
						 
                echo"</div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
break;
		}//penutup switch
}//penutup session
?>    
</body>
</html>