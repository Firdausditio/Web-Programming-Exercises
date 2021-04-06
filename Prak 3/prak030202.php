<?php
function hitungDenda($tglA,$tglB){

    $pecah1 = explode("-", $tglA);
    $date1 = $pecah1[2];
    $month1 = $pecah1[1];
    $year1 = $pecah1[0];

    $pecah2 = explode("-", $tglB);
    $date2 = $pecah2[2];
    $month2 = $pecah2[1];
    $year2 = $pecah2[0];

    $jd1 = GregorianToJD($month1,$date1,$year1);
    $jd2 = GregorianToJD($month2,$date2,$year2);
    if ($jd2-$jd1 >= 0){
        return "Rp. ".($jd2-$jd1)*3000;
    }else return "Rp. 0";
}
$tglA = "2021-01-03";
$tglB = "2021-01-05";
echo ("Besaran denda yang harus dibayar adalah ".hitungDenda($tglA,$tglB));
?>