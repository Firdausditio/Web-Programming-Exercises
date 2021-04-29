<?php
echo "
<style>
    h1{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    h2{
        color: red;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    h3{
        color: blue;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin-top: 3%;
    }
    p{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
";
echo "<center><h3>Hallo, ".$_COOKIE['namauser'].", nama saya Mr. PHP. Saya telah memilih secara random sebuah bilangan bulat. Silakan Anda menebak ya!</h3></center>";
?>
<center>
<form method="get">
<h2>Masukan Bilangan Tebakan Anda : <input type="text" name="tebakan"></h2>
<input type="submit" name="submit" value="Submit">
</form>
</center>

<?php
$angka = $_COOKIE['random'];
if(isset($_GET['tebakan'])){
    $tebakan = $_GET['tebakan'];
    if ($tebakan == $angka){
        echo "<center>";
        echo "<p><h2>Selamat ya… Jawaban anda benar!</h2></p>";
        setcookie("random", "", time()+1*24*3600,"/");
        setcookie("random", rand(0,100), time()+1*24*3600,"/");
        echo "</center>";
        echo ("<center><h1 style=color:red><a href='tebakangka.php'>Ayo Mulai Lagi!</a></h1></center>");
    }else if ($tebakan > $angka){
        echo "<center><p>Waaah… masih salah ya, bilangan tebakan Anda terlalu tinggi.(</p></center>";
    }else if ($tebakan < $angka){
        echo "<center><p>Waaah… masih salah ya, bilangan tebakan Anda terlalu rendah.(</p></center>";
    }
}
echo ("<p><center><h1><a href=logout.php>Log Out</a></h1></center></p>");
?>