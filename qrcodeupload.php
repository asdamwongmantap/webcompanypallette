<?php
 include "phpqrcode/qrlib.php";

 
    Qrcode::png('http://cobashop.hol.es/media.php?hal=detail&id='.$_GET[id].'')	
?>