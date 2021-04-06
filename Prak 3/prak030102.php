<?php
function buatBintang($n){
  	echo "<pre>";
 	for($i=0; $i<= $n; $i++){
 		for($j=1; $j<= $i; $j++){
  			echo ("* ");
 		}
  		echo ("\n");
 	}
  	echo "</pre>";
}
buatBintang(4);
buatBintang(5);

?> 
