<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi='modul/profil/aksi_profil.php';
switch($_GET[act]){
  // Tampil Profil
  default:
    $sql  = mysql_query("SELECT * FROM modul WHERE id_modul='43'");
    $r    = mysql_fetch_array($sql);
echo "
<div class='content'>
  <div class='workplace'>
    <div class='dr'><span></span></div>
            <div class='row-fluid'>
                <div class='span6'>
                     <div class='head clearfix'>
                        <div class='isw-list'></div>
                        <h1>PROFIL TOKO</h1>
                    </div>
                    <div class='block-fluid'>                        
                    <form method='post' action='$aksi?module=profil&act=update'>
						<input type=hidden name=id value=$r[id_modul]>
                        <div class='row-form clearfix'>
                            <div class='span5'>Nama Toko :</div>
                            <div class='span7'>
                                <input type=text name='nama_toko' value='$r[nama_toko]' size=50>
                            </div>
                        </div>                                            

                        <div class='row-form clearfix'>
                            <div class='span5'>Meta Deskripsi:</div>
                            <div class='span7'>
                                <input type=text name='meta_deskripsi' value='$r[meta_deskripsi]' size=100>
                            </div>
                        </div>                         
                        
                        <div class='row-form clearfix'>
                            <div class='span5'>Meta Keyword:</div>
                            <div class='span7'>
                                <input type=text name='meta_keyword' value='$r[meta_keyword]' size=100>
                            </div>
                        </div> 

						<div class='row-form clearfix'>
                            <div class='span5'>Email Pengelola:</div>
                            <div class='span7'>
                                <input type=text name='email_pengelola' value='$r[email_pengelola]' size=40>
                            </div>
                        </div>

						<div class='row-form clearfix'>
                            <div class='span5'>No.HP Pengelola:</div>
                            <div class='span7'>
                                <input type=text name='nomor_hp' value='$r[nomor_hp]'>
                            </div>
                        </div>
						
						<div class='row-form clearfix'>
                            <div class='span5'>Nomor Rekening:</div>
                            <div class='span7'>
                                <input type=text name='nomor_rekening' value='$r[nomor_rekening]' size=100>
                            </div>
                        </div>
						
											
					<div class='row-form clearfix'>
                            <div class='span5'>Isi Profil Toko:</div>
                            <div class='span7'>
                                <textarea name='isi' style='width: 260px; height: 250px;'>$r[static_content]</textarea>
                            </div>
                        </div>
						
						
						
                    </div>
                    <br />
                          <input type=submit value=Update>
                           <input type=button value=Batal onclick=self.history.back()>
                </div>
            </div>
              </form>
			  
			 
      <div class='dr'><span></span></div>

</div>
</div>  ";
break; 
			  }
			  }?> 
    




