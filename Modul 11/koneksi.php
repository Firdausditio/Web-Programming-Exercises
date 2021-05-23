<?php
class univdatabase{
    function getA(){
        $host = "localhost";
        $username = "root";
        $pass = "";
        $db = "collage";
        $cnntion = mysqli_connect ($host, $username, $pass, $db) or die ("cnntion gagal ". mysqli_connect_error());

        if (mysqli_connect_errno()){
            exit();
        }
        return $cnntion;
    }

    function getmahasiswa($nim=""){
        global $cnntion;
        $query = "SELECT * FROM mahasiswa";
        if(!empty($nim)){
            $query .= " WHERE NIM='$nim'";
        }
        $resp = array();
        $result = mysqli_query ($cnntion, $query);
        $i = 0;
        if ($result){
            $resp ['kode'] = 1;
            $resp ['status']="sukses";
            while($row=mysqli_fetch_array($result)){
                $resp ['data'][$i]['NIM'] = $row['NIM'];
                $resp ['data'][$i]['nama'] = $row['nama'];
                $resp ['data'][$i]['angkatan'] = $row['angkatan'];
                $resp ['data'][$i]['semester'] = $row['semester'];
                $resp ['data'][$i]['IPK'] = $row['IPK'];
                $i++;
            }
        } else {
            $resp['kode'] = 0;
            $resp ['status']='gagal';
        }
        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    function insert_mahasiswa(){
        global $cnntion;
        $data = json_decode(file_get_contents('php://input'), true);
        $nim = $data['NIM'];
        $nama = $data['nama'];
        $angkatan = $data['angkatan'];
        $semester = $data['semester'];
        $ipk = $data['IPK'];

        $query ="INSERT INTO mahasiswa(NIM,nama,angkatan,semester,IPK) VALUES('{$nim}','{$nama}','{$angkatan}','{$semester}','{$ipk}')";
        
        if (mysqli_query($cnntion, $query)){
            $resp= [
                'kode'=>1,
                'status' =>'Data mahasiswa Berhasil Ditambahkan'
            ];
        } else {
            $resp = [
                'kode'=>0,
                'status' =>'Data mahasiswa Gagal Ditambahkan'
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    function update_mahasiswa($niim){
        global $cnntion;
        $data = json_decode(file_get_contents('php://input'), true);
        $nim = $data['NIM'];
        $nama = $data['nama'];
        $angkatan = $data['angkatan'];
        $semester = $data['semester'];
        $ipk = $data['IPK'];

        $query = "UPDATE mahasiswa SET NIM='$nim', nama='$nama', angkatan='$angkatan', semester='$semester', IPK='$ipk' WHERE NIM = '$niim'";

        if (mysqli_query($cnntion, $query)){
            $resp= [
                'kode'=>1,
                'status' =>'Data mahasiswa Berhasil Diupdate'
            ];
        } else {
            $resp = [
                'kode'=>0,
                'status' =>'Data mahasiswa Gagal Diupdate'
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($resp);
    }

    function delete_mahasiswa($nim){
        global $cnntion;
        $query = "DELETE FROM mahasiswa WHERE NIM='$nim'";

        if (mysqli_query($cnntion, $query)){
            $resp= [
                'kode'=>1,
                'status' =>'Data mahasiswa Berhasil Dihapus'
            ];
        } else {
            $resp = [
                'kode'=>0,
                'status' =>'Data mahasiswa Gagal Dihapus'
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($resp);
    }
}
?>