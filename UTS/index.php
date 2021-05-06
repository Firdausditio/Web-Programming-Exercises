<?php
    echo("<style>
        body{
            background: url('https://image.freepik.com/free-photo/3d-illustration-404-webpage-error_58466-9949.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            font-size:30px;
            color: white;
            margin-top:9%;
        }
    </style>");
    session_start();
    if(isset($_COOKIE['name'])){
        echo "Hallo {$_COOKIE['name']} , selamat datang kembali di permainan ini!!!";
        echo"<a href='game.php' style='color:red';>Start Game</a>
        Bukan Anda? <a href='login.php' style='color:red';>Klik Disini</a>";
    }else{
        header("Location:login.php");
    }

?>
