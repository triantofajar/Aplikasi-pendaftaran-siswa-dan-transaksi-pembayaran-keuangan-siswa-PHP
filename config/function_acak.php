<?php function acak($panjang)
 {     
 $karakter= 'zxcvbnmlkjhgfdsqwrtyp123456789';    
  
 
 $string = '';    
 for ($i = 0;
 $i < $panjang; $i++) { 
 $pos = rand(3, strlen($karakter)-1);

 $string .= $karakter {$pos}; 

 }    
 return $string; 
 } 

 ?>
 
 