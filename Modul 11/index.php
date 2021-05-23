<?php
    include_once ("koneksi.php");
    $database = new univdatabase();
    $cnntion = $database->getA();
    $request = $_SERVER ['REQUEST_METHOD'];
    $uripath = parse_url ($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $urisegment = explode('/', $uripath);

    switch($request){
        case 'GET' :
            if(!empty($urisegment[4])){
                $nim = $urisegment[4];
                $database->getmahasiswa(ucfirst($nim));
            } else {
                $database->getmahasiswa();
            }
            break;
        case 'POST' :
            $database->insert_mahasiswa();
            break;

        case 'PUT' :
            $nim = $urisegment[1];
            $database->update_mahasiswa(ucfirst($nim));
            break;
        
        case 'DELETE' :
            $nim = $urisegment[1];
            $database->delete_mahasiswa(ucfirst($nim));
            break;
        default:
            header ("HTTP/1.0 405 Method Tidak Terdaftar");
            break;

    }

?>