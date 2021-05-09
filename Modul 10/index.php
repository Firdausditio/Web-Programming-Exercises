<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM `karyawan`");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
        <title>PT UNS</title>
        <style>
            html {
                scroll-behavior: smooth;
                font-family: 'Krona One', sans-serif;
            }
            #box1 {
                width:100%;
                height:570px;
                background:url('https://image.freepik.com/free-photo/stock-market-business-technology-communication-concept-background_29865-1462.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            }
            ul{
                padding: 2px 10px;
            }
            .navi{
                background: #222; 
                overflow: hidden;
                box-shadow: 0px 2px 10px black;
                background:#02475e;
            }
            button{
                padding: 14px 40px;
                margin: 0 40px;
            }
            button:hover {
                box-shadow: 0 12px 16px 0 rgba(0,0,255,0.3), 0 17px 50px 0 rgba(0,0,255,0.3);
            }
            button a{
                padding: 0 20px;
                text-decoration:none;
                font-size:20px;
            }
            h1{
                font-size: 60px;
                color: white;
            }
            footer {
                text-align:center;
                padding: 23px;
                background-color: #02475e;
                color: white;
            }
        </style>
    </head>
    <body>
        <nav class="navi">
        <ul>
            <a href="#" class="navbar-brand"><img src="https://clipground.com/images/web-logo-png-white-7.png" style="width: 4%;"></a>
        </ul>
        </nav>
        <div id="box1">
            <center>
            <br><br>
            <h1>Welcome Winner</h1>
            <br>
            <br>
            <button><a href="#table" class="table"> Tabel Karyawan </a></button>
            <button><a href="add.php">Tambah Karyawan</a></button>
            </center>
            <br/>
            <br/>
        </div>
        <section id="table">
            <center>
            <h1 style="color:black; font-size:40px;">TABEL KARYAWAN</h1>
            <table width='80%' style="margin-top:30px; text-align:center;" border=1>
                <tr>
                    <th>ID karyawan</th> <th>Nama</th> <th>Email</th> <th>Telepon</th> <th>Alamat</th> <th>Jenis Kelamin</th> <th>Tempat Lahir</th> <th>Tanggal Lahir</th>
                </tr>
                <?php
                while($user_data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$user_data['idkaryawan']."</td>";
                echo "<td>".$user_data['nama']."</td>";
                echo "<td>".$user_data['email']."</td>";
                echo "<td>".$user_data['mobile']."</td>";
                echo "<td>".$user_data['alamat']."</td>";
                echo "<td>".$user_data['jeniskelamin']."</td>";
                echo "<td>".$user_data['tempatlahir']."</td>";
                echo "<td>".$user_data['tanggallahir']."</td>";
                echo "<td><a href='edit.php?id=$user_data[idkaryawan]'>Edit</a> | <a href='delete.php?id=$user_data[idkaryawan]'>Delete</a></td></tr>";
                }
                ?>
            </table>
            <br/>
            <br/>
            </center>
        </section>
        <footer>
            <p>Author: Firdaus Ditio Ramadhan<br>
        </footer>
    </body>
</html>