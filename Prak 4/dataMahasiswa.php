<?php
echo "<style>
    h1 {
        color: red;
        text-align:center;
    }
    th {
        font-size: 25px;
        color: blue;
    }
    td{
        font-size: 20px;
    }   
</style>
";

$namaFile = "datmhs.dat";
$myFile = fopen($namaFile, "r") or die("Crash!");

echo "<h1>Data Mahasiswa</h1>";
echo "Jumlah data : ".count(file($namaFile));

$tglSkrng = explode("-", date("Y-m-d"));
$dateSkrng = $tglSkrng[2];
$monthSkrng = $tglSkrng[1];
$yearSkrng = $tglSkrng[0];
$jd2 = gregoriantojd($monthSkrng, $dateSkrng, $yearSkrng);

function hitungUsia(String $tglLair, $jd2){
    $tglLair = explode("-", $tglLair);
    $dateLair = $tglLair[2];
    $monthLair = $tglLair[1];
    $yearLair = $tglLair[0];
    $jd1 = gregoriantojd($monthLair, $dateLair, $yearLair);
    $umur = intval(($jd2 - $jd1) / 365);
    return $umur;
}

echo "<br>";
echo "<table border='1'>";
echo("<tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mhs</th>
        <th>Tanggal Lahir</th>
        <th>Tempat Lahir</th>
        <th>Usia (Thn)</th>
    <tr>");
$nomor = 1;

while (!feof($myFile)){
    echo("<tr>");
    $datamhs = explode("|", fgets($myFile));

    if ($datamhs[0] != ''){
        $usia = hitungUsia($datamhs[2], $jd2);
        echo("
            <td>$nomor</td>
            <td>$datamhs[0]</td>
            <td>$datamhs[1]</td>
            <td>$datamhs[2]</td>
            <td>$datamhs[3]</td>
            <td>$usia</td>");
        $nomor++;
    }
    echo("</tr>");
}
echo "</table>";

fclose($myFile);

?>