<?php
    echo"
        <style>
            body{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                background: url('https://image.freepik.com/free-vector/dark-wall-with-spot-lights-background_52683-42962.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                text-align:center;
                font-size: 20px;
                margin-top: 18%;
            }    
            h1{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            h2{
                color: white;
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
    session_start();
    include('./db.php');
    if(isset($_COOKIE['name'])){
        if($_SESSION['nyawa'] == 0){
            echo"
            <h2>Hello, {$_COOKIE['name']} Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</h2>
            <h2>Score Anda : {$_SESSION['skor']}</h2>
            <a href='game.php'>Main Lagi</a>
            <a href='fame.php'>Top Global</a>";
            $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $port);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "INSERT INTO topglobal (name, score) VALUES ('{$_COOKIE['name']}', {$_SESSION['skor']})";
            if($conn->query($sql) === TRUE){
                echo "<br/>Berhasil Menyimpan Skor";
            }else {
                die ("Error: " . $sql . "<br>" . $conn->error);
            }
            $conn->close();
            $_SESSION['skor'] = 0;
            $_SESSION['nyawa'] = 5;
            $_SESSION['angka1'] = random_int(0, 20);   
            $_SESSION['angka2'] = random_int(0, 20);
            

        }else{
            $jumlah = $_SESSION['angka1'] + $_SESSION['angka2'];
                echo("<h2>Hello {$_COOKIE['name']}, tetap semangat ya… you can do the best!!</h2>
                <br/>
                Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['skor']}
                ");
                echo("<br/>Berapakah {$_SESSION['angka1']} + {$_SESSION['angka2']} = ");
                echo'<form method="post">
                    <input type="text" name="jawaban">
                    <button type="submit" name="submit">Submit</button>
                </form>';
            if(isset($_POST['submit'])){
                $hasil = $_POST['jawaban'];
                if(intval($hasil) == $jumlah){
                    $_SESSION['skor'] += 10;
                    echo("<h2>Hello {$_COOKIE['name']}, Selamat jawaban Anda benar…</h2>
                    Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['skor']}
                    ");
                }else{
                    $_SESSION['nyawa'] -= 1;
                    $_SESSION['skor'] -= 2;
                    echo("<h2>Hello {$_COOKIE['name']}, sayang jawaban Anda salah… tetap semangat ya !!!</h2>
                    Lives: {$_SESSION['nyawa']} | Score: {$_SESSION['skor']}
                    ");
                }
                $_SESSION['angka1'] = random_int(0, 20);
                $_SESSION['angka2'] = random_int(0, 20);
                echo("<a href='game.php' style='color:red';>Soal Selanjutnya</a>");
            }
        }
        
    }else{
        header("Location:login.php");
    }



?>
