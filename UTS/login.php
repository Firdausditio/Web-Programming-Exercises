<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: url('https://image.freepik.com/free-vector/floral-ornamental-abstract-background_52683-30016.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }
        h1{
            color: blue;
        }
        h3{
            color: red;
        }
        box1{
			width:150px;
			height:150px;
			background:green;
		}
        button {
            transition-duration: 0.4s;
            padding: 10px 26px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-radius: 8px;
        }
        button:hover{
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <form action="proses.php" method="post">
    <center>
        <h1>FORM LOGIN GAME</h1>
        <h2>Nama    : <input type="text" name="nama"></h2>
        <h2>Email   : <input type="email" name="email"></h2>
        <button type="submit" name="submit">Submit</button>
        <br>
        <h2>NOTE:</h2>
        <h3>**Setelah menjawab harap klik soal selanjutnya agar soal baru muncul**</h3>
        <br>
        <a href="fame.php" style='color:white; font-size:30px;';>Top Global</a>
    </center>
    </form>
    
</body>
</html>