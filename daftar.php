      
<hr/>
      
      
      <div role="main" class="container checkout">
        <div class="row">
        <div class="row">
        
        
          <div class="span9 checkout-list">
        
          
            <ol class="rr">
              <li class="current">
                <h6>Daftar Member Baru</h6>
                <div class="row">
                  <div class="span9 content-wrapper clearfix" style='border:0px solid black;'>
                    <div class="right-col">
                      <table  style="border: 0pt dashed #0000CC;float:left;width:100%;" border="0" >
               <form action="simpanuser.php" method="post">
			    <ul class="rr">
                <tr><td><input type="text" name="nama" placeholder=" Masukkan Nama Lengkap Anda..." size="50" class="tbox" border="1px solid black" require autofocus/></td></tr>
                <tr><td><input type="text" name="username" placeholder="Masukkan Username Anda ..." size="50" class="tbox"/></td></tr>
                <tr><td><input type="password" name="password" placeholder="Masukkan Password Anda..." size="50" class="tbox"/></td></tr>
				<tr><td><textarea name="alamat" class="tarea" rows="20" cols="60" placeholder="Masukkan Alamat Lengkap Anda..."></textarea>
				<br>*) Alamat pengiriman harus di isi lengkap, termasuk kota/kabupaten dan kode posnya.</td></tr>
				<tr><td><input type="text" name="telpon" placeholder="Masukkan No Telepon Anda..." size="50" class="tbox"/></td></tr>
				<tr><td><input type="text" name="email" placeholder="Masukkan e-mail anda..." size="50" class="tbox"/></td></tr>
				<tr><td>  
                              <select name='kota'>
                              <option value=0 selected>- Pilih Kota -</option>
                              <?php
                              $tampil=mysql_query("SELECT * FROM kota ORDER BY nama_kota");
                              while($r=mysql_fetch_array($tampil)){
                                 echo "<option value=$r[id_kota]>$r[nama_kota]</option>";
                              }
							  ?>
                          </select> <br /><br />*)  Apabila tidak terdapat nama kota tujuan Anda, pilih <b>Lainnya</b>
                                          <br />**) Ongkos kirim dihitung berdasarkan kota tujuan</td></tr>
                <tr><td><img src='captcha.php'></td></tr>
                <tr><td>(Masukkan 6 kode diatas)<br /><input type="text" name="kode" size="6" maxlength="6" class="tbox" style="width:90px"><br /></td></tr>
                <tr><td><input type="submit" class="btn secondary" value="Daftar"></td></tr>
				</ul>
                </form></table>
                    
                    </div>  
                  </div>                      
                </div>
              </li>
            </ol>
          </div>
		  </div>
        
        </div>
      </div>    
      
      