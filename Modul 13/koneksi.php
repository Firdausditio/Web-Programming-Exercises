<?php
$host       ="localhost";
$username   ="root";
$password   ="";
$database   ="pertemuan13";
$koneksi    = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_error()){
    echo "Koneksi database gagal : " . mysqli_connect_error();   
}

?>