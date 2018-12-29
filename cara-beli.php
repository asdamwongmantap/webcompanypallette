  
       <div role="main" class="container checkout">
        <div class="row">
        
        
          <div class="span5 checkout-list" style="border:0px solid black;">
            <ol class="rr">
              <li class="current" >
               <h6>Cara Pembelian</h6>
                <div class="row">
                  <div class="span9 content-wrapper clearfix">
                    <div class="right-col">
                       <ul class="rr" style="text-align:justify;">
                        <?php
			 $q=mysql_query("select * from modul where id_modul='45'");
			 $carabeli=mysql_fetch_array($q);
            echo "<p align='justify'>$carabeli[static_content] </p>";
          ?>
                        </ul>
                        
                        
                      
                      
                    
                    </div>  
                  </div>                      
                </div>
             </li>
			 </ol>
          </div>
   
          
          <div class="span4 offset1">
           
			<h3>Contact details</h3>
            
             <?php
			 $q=mysql_query("select * from modul where id_modul='66'");
			 $carabeli=mysql_fetch_array($q);
            echo "<p align='justify'>$carabeli[static_content] </p>";
          ?>
            
            <ul class="rr info clearfix">
              <li>
                Phone: <span class="val">&nbsp;</span>
              </li>
               <li>
                Email: <span class="val">&nbsp;</span>
              </li>
              <li>
                Pin BB: <span class="val">&nbsp;</span>
              </li> 
            </ul>
          </div>
        
        </div> 
        
          
        </div>
      </div>