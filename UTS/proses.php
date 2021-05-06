<?php
    session_start();
    if(isset($_POST['submit'])){
        setcookie("name", $_POST['nama'], time() + 30*24*3600);
        $_SESSION['skor'] = 0;
        $_SESSION['nyawa'] = 5;
        $_SESSION['angka1'] = random_int(0, 20);   
        $_SESSION['angka2'] = random_int(0, 20);
        header("Location:game.php");   
    }