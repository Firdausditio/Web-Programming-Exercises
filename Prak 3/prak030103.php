<?php
function buatBintang($n){
  	echo "<pre>";
 	for($i=$n; $i<= $n; $i--){
 		for($j=1; $j<= $i; $j++){
  			echo ("* ");
 		}
  		echo ("\n");
 	}
  	echo "</pre>";
}
buatBintang(4);
?> 
