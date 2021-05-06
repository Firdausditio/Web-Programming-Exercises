<?php
    echo "
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 28px;
            color:white;
            text-align: center;
            background: url('https://image.freepik.com/free-vector/floral-ornamental-abstract-background_52683-30016.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    
    </style>
    ";
    include('./db.php');
    $no = 1;
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "SELECT * FROM topglobal ORDER BY score DESC LIMIT 10";
    $res = $conn->query($sql);
    echo("<center>");
    echo("<table border=1 style='margin-top:8%; width:45%;'>
        <tr>
            <th style='width:5%';>No</th>
            <th>Nama</th>
            <th>Skor</th>
        </tr>
        </center>");
    if ($res->num_rows >0){
        while($row = $res->fetch_assoc()){
            echo("<center>
            <tr>
                <td>{$no}</td>
                <td>{$row['name']}</td>
                <td>{$row['score']}</td>
            </tr>
            </center>");
            $no++;
        }
    }
    echo("</table>");
    echo("</center>");
    echo("<br>");
    echo("<a href='game.php' style='color:white';>Main Lagi Yuk!</a>");
?>