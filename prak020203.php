<?php
$baris = 4;
$kolom = 5;
$num = 1;
echo "<table border='1'>";
for($i = 0; $i < $baris ; $i++){
	echo ("<tr>");
 	for ($j = 0; $j < $kolom ; $j++){
			if ($num % 2 == 0){
				echo ("<td style=color:black;background-color:red;>${num}</td>");
			}else {
				echo ("<td style=color:red;background-color:white;>${num}</td>");
			}
			$num++;
 	}
  	echo ("</tr>");
}
echo "</table>";
?>