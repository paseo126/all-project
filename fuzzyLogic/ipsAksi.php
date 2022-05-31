<?php

    $sqla = mysqli_query($koneksi, "select * from user where username='$_SESSION[userR]' and password='$_SESSION[passR]'");
    $ra = mysqli_fetch_array($sqla);

    $namaLengkap = "$ra[namaLengkap]";
    $jurusan = $_POST["jurusan"];
    $bind = $_POST["bind"];
    $bing = $_POST["bing"];
    $mtk = $_POST["mtk"];
    $v1 = ($bind + $bing + $mtk)/3;
    $v2 = $_POST["v2"];
    $v3 = $_POST["v3"];
    $v4 = $_POST["v4"];



    //fuzzyfikasi

    //kemampuan dasar

    //rendah

    $queryKD_1 = "select * from himpunan_ips where cdKriteria='K001' AND cdHimp='K001-1'";
    $KD_1 = mysqli_query($koneksi, $queryKD_1);
    $kd1 = mysqli_fetch_array($KD_1);
    $KDbatasR2 = "$kd1[batas2]";
    $KDbatasR3 = "$kd1[batas3]";

    if ($v1 < $KDbatasR2) {
        $KDrendah = 1;
    }else if($v1 <= $KDbatasR3 && $v1 >= $KDbatasR2){
        $KDrendah = ($KDbatasR3 - $v1)/($KDbatasR3 - $KDbatasR2);
    }else if ($v1 > $KDbatasR3) {
        $KDrendah = 0;
    }

    //sedang
    $queryKD_2 = "select * from himpunan_ips where cdKriteria='K001' AND cdHimp='K001-2'";
    $KD_2 = mysqli_query($koneksi, $queryKD_2);
    $kd2 = mysqli_fetch_array($KD_2);
    $KDbatasS1 = "$kd2[batas1]";
    $KDbatasS2 = "$kd2[batas2]";
    $KDbatasS3 = "$kd2[batas3]";

    if ($v1 == $KDbatasS2) {
        $KDsedang = 1;
    }else if($v1 <= $KDbatasS2 && $v1 >= $KDbatasS1){
        $KDsedang = ($v1 - $KDbatasS1)/($KDbatasS2 - $KDbatasS1);
    }else if($v1 <= $KDbatasS3 && $v1 >= $KDbatasS2){
        $KDsedang = ($KDbatasS3 - $v1)/($KDbatasS3 - $KDbatasS2);
    }else if ($v1 > $KDbatasS3 || $v1 < $KDbatasS1) {
        $KDsedang = 0;
    }

    //tinggi

    $queryKD_3 = "select * from himpunan_ips where cdKriteria='K001' AND cdHimp='K001-3'";
    $KD_3 = mysqli_query($koneksi, $queryKD_3);
    $kd3 = mysqli_fetch_array($KD_3);
    $KDbatasT1 = "$kd3[batas1]";
    $KDbatasT2 = "$kd3[batas2]";

    if ($v1 < $KDbatasT1) {
        $KDtinggi = 0;
    }else if($v1 <= $KDbatasT2 && $v1 >= $KDbatasT1){
        $KDtinggi = ($v1 - $KDbatasT1)/($KDbatasT2 - $KDbatasT1);
    }else if ($v1 > $KDbatasT2) {
        $KDtinggi = 1;
    }


    //////////////////////////////////////////////////////////////////////////////

    //EKONOMI

    //rendah

    $queryEKO_1 = "select * from himpunan_ips where cdKriteria='K002' AND cdHimp='K002-1'";
    $EKO_1 = mysqli_query($koneksi, $queryEKO_1);
    $EKO1 = mysqli_fetch_array($EKO_1);
    $EKObatasR2 = "$EKO1[batas2]";
    $EKObatasR3 = "$EKO1[batas3]";

    if ($v2 < $EKObatasR2) {
        $EKOrendah = 1;
    }else if($v2 <= $EKObatasR3 && $v2 >= $EKObatasR2){
        $EKOrendah = ($EKObatasR3 - $v2)/($EKObatasR3 - $EKObatasR2);
    }else if ($v2 > $EKObatasR3) {
        $EKOrendah = 0;
    }

    //sedang
    $queryEKO_2 = "select * from himpunan_ips where cdKriteria='K002' AND cdHimp='K002-2'";
    $EKO_2 = mysqli_query($koneksi, $queryEKO_2);
    $EKO2 = mysqli_fetch_array($EKO_2);
    $EKObatasS1 = "$EKO2[batas1]";
    $EKObatasS2 = "$EKO2[batas2]";
    $EKObatasS3 = "$EKO2[batas3]";

    if ($v2 == $EKObatasS2) {
        $EKOsedang = 1;
    }else if($v2 <= $EKObatasS2 && $v2 >= $EKObatasS1){
        $EKOsedang = ($v2 - $EKObatasS1)/($EKObatasS2 - $EKObatasS1);
    }else if($v2 <= $EKObatasS3 && $v2 >= $EKObatasS2){
        $EKOsedang = ($EKObatasS3 - $v2)/($EKObatasS3 - $EKObatasS2);
    }else if ($v2 > $EKObatasS3 || $v2 < $EKObatasS1) {
        $EKOsedang = 0;
    }

    //tinggi

    $queryEKO_3 = "select * from himpunan_ips where cdKriteria='K002' AND cdHimp='K002-3'";
    $EKO_3 = mysqli_query($koneksi, $queryEKO_3);
    $EKO3 = mysqli_fetch_array($EKO_3);
    $EKObatasT1 = "$EKO3[batas1]";
    $EKObatasT2 = "$EKO3[batas2]";

    if ($v2 < $EKObatasT1) {
        $EKOtinggi = 0;
    }else if($v2 <= $EKObatasT2 && $v2 >= $EKObatasT1){
        $EKOtinggi = ($v2 - $EKObatasT1)/($EKObatasT2 - $EKObatasT1);
    }else if ($v2 > $EKObatasT2) {
        $EKOtinggi = 1;
    }


    ////////////////////////////////////////////////////////////

    //SOSIOLOGI

    //rendah

    $querySOS_1 = "select * from himpunan_ips where cdKriteria='K003' AND cdHimp='K003-1'";
    $SOS_1 = mysqli_query($koneksi, $querySOS_1);
    $SOS1 = mysqli_fetch_array($SOS_1);
    $SOSbatasR2 = "$SOS1[batas2]";
    $SOSbatasR3 = "$SOS1[batas3]";

    if ($v3 < $SOSbatasR2) {
        $SOSrendah = 1;
    }else if($v3 <= $SOSbatasR3 && $v3 >= $SOSbatasR2){
        $SOSrendah = ($SOSbatasR3 - $v3)/($SOSbatasR3 - $SOSbatasR2);
    }else if ($v3 > $SOSbatasR3) {
        $SOSrendah = 0;
    }

    //sedang
    $querySOS_2 = "select * from himpunan_ips where cdKriteria='K003' AND cdHimp='K003-2'";
    $SOS_2 = mysqli_query($koneksi, $querySOS_2);
    $SOS2 = mysqli_fetch_array($SOS_2);
    $SOSbatasS1 = "$SOS2[batas1]";
    $SOSbatasS2 = "$SOS2[batas2]";
    $SOSbatasS3 = "$SOS2[batas3]";

    if ($v3 == $SOSbatasS2) {
        $SOSsedang = 1;
    }else if($v3 <= $SOSbatasS2 && $v3 >= $SOSbatasS1){
        $SOSsedang = ($v3 - $SOSbatasS1)/($SOSbatasS2 - $SOSbatasS1);
    }else if($v3 <= $SOSbatasS3 && $v3 >= $SOSbatasS2){
        $SOSsedang = ($SOSbatasS3 - $v3)/($SOSbatasS3 - $SOSbatasS2);
    }else if ($v3 > $SOSbatasS3 || $v3 < $SOSbatasS1) {
        $SOSsedang = 0;
    }

    //tinggi

    $querySOS_3 = "select * from himpunan_ips where cdKriteria='K003' AND cdHimp='K003-3'";
    $SOS_3 = mysqli_query($koneksi, $querySOS_3);
    $SOS3 = mysqli_fetch_array($SOS_3);
    $SOSbatasT1 = "$SOS3[batas1]";
    $SOSbatasT2 = "$SOS3[batas2]";

    if ($v3 < $SOSbatasT1) {
        $SOStinggi = 0;
    }else if($v3 <= $SOSbatasT2 && $v3 >= $SOSbatasT1){
        $SOStinggi = ($v3 - $SOSbatasT1)/($SOSbatasT2 - $SOSbatasT1);
    }else if ($v3 > $SOSbatasT2) {
        $SOStinggi = 1;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////

    //GEOGRAFI

    //rendah

    $queryGEO_1 = "select * from himpunan_ips where cdKriteria='K004' AND cdHimp='K004-1'";
    $GEO_1 = mysqli_query($koneksi, $queryGEO_1);
    $GEO1 = mysqli_fetch_array($GEO_1);
    $GEObatasR2 = "$GEO1[batas2]";
    $GEObatasR3 = "$GEO1[batas3]";

    if ($v4 < $GEObatasR2) {
        $GEOrendah = 1;
    }else if($v4 <= $GEObatasR3 && $v4 >= $GEObatasR2){
        $GEOrendah = ($GEObatasR3 - $v4)/($GEObatasR3 - $GEObatasR2);
    }else if ($v4 > $GEObatasR3) {
        $GEOrendah = 0;
    }

    //sedang
    $queryGEO_2 = "select * from himpunan_ips where cdKriteria='K004' AND cdHimp='K004-2'";
    $GEO_2 = mysqli_query($koneksi, $queryGEO_2);
    $GEO2 = mysqli_fetch_array($GEO_2);
    $GEObatasS1 = "$GEO2[batas1]";
    $GEObatasS2 = "$GEO2[batas2]";
    $GEObatasS3 = "$GEO2[batas3]";

    if ($v4 == $GEObatasS2) {
        $GEOsedang = 1;
    }else if($v4 <= $GEObatasS2 && $v4 >= $GEObatasS1){
        $GEOsedang = ($v4 - $GEObatasS1)/($GEObatasS2 - $GEObatasS1);
    }else if($v4 <= $GEObatasS3 && $v4 >= $GEObatasS2){
        $GEOsedang = ($GEObatasS3 - $v4)/($GEObatasS3 - $GEObatasS2);
    }else if ($v4 > $GEObatasS3 || $v4 < $GEObatasS1) {
        $GEOsedang = 0;
    }

    //tinggi

    $queryGEO_3 = "select * from himpunan_ips where cdKriteria='K004' AND cdHimp='K004-3'";
    $GEO_3 = mysqli_query($koneksi, $queryGEO_3);
    $GEO3 = mysqli_fetch_array($GEO_3);
    $GEObatasT1 = "$GEO3[batas1]";
    $GEObatasT2 = "$GEO3[batas2]";

    if ($v4 < $GEObatasT1) {
        $GEOtinggi = 0;
    }else if($v4 <= $GEObatasT2 && $v4 >= $GEObatasT1){
        $GEOtinggi = ($v4 - $GEObatasT1)/($GEObatasT2 - $GEObatasT1);
    }else if ($v4 > $GEObatasT2) {
        $GEOtinggi = 1;
    }



    /////////////////////////RULE//////////////////////////////////////


    $R1 = min($KDrendah, $EKOrendah, $GEOrendah, $SOSrendah);
    $R2 = min($KDrendah, $EKOrendah, $GEOrendah, $SOSsedang);
    $R3 = min($KDrendah, $EKOrendah, $GEOrendah, $SOStinggi);
    $R4 = min($KDrendah, $EKOrendah, $GEOsedang, $SOSrendah);
    $R5 = min($KDrendah, $EKOrendah, $GEOsedang, $SOSsedang);
    $R6 = min($KDrendah, $EKOrendah, $GEOsedang, $SOStinggi);
    $R7 = min($KDrendah, $EKOrendah, $GEOtinggi, $SOSrendah);
    $R8 = min($KDrendah, $EKOrendah, $GEOtinggi, $SOSsedang);
    $R9 = min($KDrendah, $EKOrendah, $GEOtinggi, $SOStinggi);

    $R10 = min($KDrendah, $EKOsedang, $GEOrendah, $SOSrendah);
    $R11 = min($KDrendah, $EKOsedang, $GEOrendah, $SOSsedang);
    $R12 = min($KDrendah, $EKOsedang, $GEOrendah, $SOStinggi);
    $R13 = min($KDrendah, $EKOsedang, $GEOsedang, $SOSrendah);
    $R14 = min($KDrendah, $EKOsedang, $GEOsedang, $SOSsedang);
    $R15 = min($KDrendah, $EKOsedang, $GEOsedang, $SOStinggi);
    $R16 = min($KDrendah, $EKOsedang, $GEOtinggi, $SOSrendah);
    $R17 = min($KDrendah, $EKOsedang, $GEOtinggi, $SOSsedang);
    $R18 = min($KDrendah, $EKOsedang, $GEOtinggi, $SOStinggi);

    $R19 = min($KDrendah, $EKOtinggi, $GEOrendah, $SOSrendah);
    $R20 = min($KDrendah, $EKOtinggi, $GEOrendah, $SOSsedang);
    $R21 = min($KDrendah, $EKOtinggi, $GEOrendah, $SOStinggi);
    $R22 = min($KDrendah, $EKOtinggi, $GEOsedang, $SOSrendah);
    $R23 = min($KDrendah, $EKOtinggi, $GEOsedang, $SOSsedang);
    $R24 = min($KDrendah, $EKOtinggi, $GEOsedang, $SOStinggi);
    $R25 = min($KDrendah, $EKOtinggi, $GEOtinggi, $SOSrendah);
    $R26 = min($KDrendah, $EKOtinggi, $GEOtinggi, $SOSsedang);
    $R27 = min($KDrendah, $EKOtinggi, $GEOtinggi, $SOStinggi);

    $R28 = min($KDsedang, $EKOrendah, $GEOrendah, $SOSrendah);
    $R29 = min($KDsedang, $EKOrendah, $GEOrendah, $SOSsedang);
    $R30 = min($KDsedang, $EKOrendah, $GEOrendah, $SOStinggi);
    $R31 = min($KDsedang, $EKOrendah, $GEOsedang, $SOSrendah);
    $R32 = min($KDsedang, $EKOrendah, $GEOsedang, $SOSsedang);
    $R33 = min($KDsedang, $EKOrendah, $GEOsedang, $SOStinggi);
    $R34 = min($KDsedang, $EKOrendah, $GEOtinggi, $SOSrendah);
    $R35 = min($KDsedang, $EKOrendah, $GEOtinggi, $SOSsedang);
    $R36 = min($KDsedang, $EKOrendah, $GEOtinggi, $SOStinggi);

    $R37 = min($KDsedang, $EKOsedang, $GEOrendah, $SOSrendah);
    $R38 = min($KDsedang, $EKOsedang, $GEOrendah, $SOSsedang);
    $R39 = min($KDsedang, $EKOsedang, $GEOrendah, $SOStinggi);
    $R40 = min($KDsedang, $EKOsedang, $GEOsedang, $SOSrendah);
    $R41 = min($KDsedang, $EKOsedang, $GEOsedang, $SOSsedang);
    $R42 = min($KDsedang, $EKOsedang, $GEOsedang, $SOStinggi);
    $R43 = min($KDsedang, $EKOsedang, $GEOtinggi, $SOSrendah);
    $R44 = min($KDsedang, $EKOsedang, $GEOtinggi, $SOSsedang);
    $R45 = min($KDsedang, $EKOsedang, $GEOtinggi, $SOStinggi);

    $R46 = min($KDsedang, $EKOtinggi, $GEOrendah, $SOSrendah);
    $R47 = min($KDsedang, $EKOtinggi, $GEOrendah, $SOSsedang);
    $R48 = min($KDsedang, $EKOtinggi, $GEOrendah, $SOStinggi);
    $R49 = min($KDsedang, $EKOtinggi, $GEOsedang, $SOSrendah);
    $R50 = min($KDsedang, $EKOtinggi, $GEOsedang, $SOSsedang);
    $R51 = min($KDsedang, $EKOtinggi, $GEOsedang, $SOStinggi);
    $R52 = min($KDsedang, $EKOtinggi, $GEOtinggi, $SOSrendah);
    $R53 = min($KDsedang, $EKOtinggi, $GEOtinggi, $SOSsedang);
    $R54 = min($KDsedang, $EKOtinggi, $GEOtinggi, $SOStinggi);

    $R55 = min($KDtinggi, $EKOrendah, $GEOrendah, $SOSrendah);
    $R56 = min($KDtinggi, $EKOrendah, $GEOrendah, $SOSsedang);
    $R57 = min($KDtinggi, $EKOrendah, $GEOrendah, $SOStinggi);
    $R58 = min($KDtinggi, $EKOrendah, $GEOsedang, $SOSrendah);
    $R59 = min($KDtinggi, $EKOrendah, $GEOsedang, $SOSsedang);
    $R60 = min($KDtinggi, $EKOrendah, $GEOsedang, $SOStinggi);
    $R61 = min($KDtinggi, $EKOrendah, $GEOtinggi, $SOSrendah);
    $R62 = min($KDtinggi, $EKOrendah, $GEOtinggi, $SOSsedang);
    $R63 = min($KDtinggi, $EKOrendah, $GEOtinggi, $SOStinggi);

    $R64 = min($KDtinggi, $EKOsedang, $GEOrendah, $SOSrendah);
    $R65 = min($KDtinggi, $EKOsedang, $GEOrendah, $SOSsedang);
    $R66 = min($KDtinggi, $EKOsedang, $GEOrendah, $SOStinggi);
    $R67 = min($KDtinggi, $EKOsedang, $GEOsedang, $SOSrendah);
    $R68 = min($KDtinggi, $EKOsedang, $GEOsedang, $SOSsedang);
    $R69 = min($KDtinggi, $EKOsedang, $GEOsedang, $SOStinggi);
    $R70 = min($KDtinggi, $EKOsedang, $GEOtinggi, $SOSrendah);
    $R71 = min($KDtinggi, $EKOsedang, $GEOtinggi, $SOSsedang);
    $R72 = min($KDtinggi, $EKOsedang, $GEOtinggi, $SOStinggi);

    $R73 = min($KDtinggi, $EKOtinggi, $GEOrendah, $SOSrendah);
    $R74 = min($KDtinggi, $EKOtinggi, $GEOrendah, $SOSsedang);
    $R75 = min($KDtinggi, $EKOtinggi, $GEOrendah, $SOStinggi);
    $R76 = min($KDtinggi, $EKOtinggi, $GEOsedang, $SOSrendah);
    $R77 = min($KDtinggi, $EKOtinggi, $GEOsedang, $SOSsedang);
    $R78 = min($KDtinggi, $EKOtinggi, $GEOsedang, $SOStinggi);
    $R79 = min($KDtinggi, $EKOtinggi, $GEOtinggi, $SOSrendah);
    $R80 = min($KDtinggi, $EKOtinggi, $GEOtinggi, $SOSsedang);
    $R81 = min($KDtinggi, $EKOtinggi, $GEOtinggi, $SOStinggi);


    ///////////////////////////////////////////////////////////////////
    //impilkasi fungsi MAX
    $arrayR = array($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$R14,$R15,$R16,$R17,$R18,$R19,$R20,$R21,$R22,$R23,$R24,$R25,$R26,$R27,$R28,$R29,$R30,$R31,$R32,$R33,$R34,$R35,$R36,$R37,$R38,$R39,$R40,$R41,$R42,$R43,$R44,$R45,$R46,$R47,$R48,$R49,$R50,$R51,$R52,$R53,$R54,$R55,$R56,$R57,$R58,$R59,$R60,$R61,$R62,$R63,$R64,$R65,$R66,$R67,$R68,$R69,$R70,$R71,$R72,$R73,$R74,$R75,$R76,$R77,$R78,$R79,$R80,$R81);


    $queryKS_2 = "select * from himpunan_ips where cdKriteria='K005' AND cdHimp='K005-2'";
    $KS_2 = mysqli_query($koneksi, $queryKS_2);
    $KS2 = mysqli_fetch_array($KS_2);
    $KSbatasS1 = "$KS2[batas1]";
    $KSbatasS2 = "$KS2[batas2]";
    $KSbatasS3 = "$KS2[batas3]";


    $arrayA = array();
    for ($i=0; $i <= 80; $i++) { 
            $A = (($arrayR[$i] * ($KSbatasS3 - $KSbatasS1 ))+ $KSbatasS1); 
            $arrayA[$i] = $A;
    }
    ///mencari nilai M

    sort($arrayA);
    sort($arrayR);
    $nilaiPertama = 1;
    $jumlahM = 0;
    $batasAtas = 0;
    $batasBawah = 75;

    for ($i=0; $i <= 80 ; $i++) { 
            
        if ($arrayA[$i] != 75 && $arrayR[$i] > 0) {
        $batasAtas = $arrayA[$i];
        if ($nilaiPertama <= 1) {

            $jumlahM = $jumlahM + (((($arrayR[$i]/2)*($batasAtas*$batasAtas))) - (($arrayR[$i]/2)*($batasBawah*$batasBawah)));
            $nilaiPertama = $nilaiPertama +1;
        }elseif ($nilaiPertama >= 1 && $i <= 80) {
                
                if ($batasAtas > $batasBawah) {

                    $p = (1/($KSbatasS3-$KDbatasS1))/3;
                    $d = ($KSbatasS1/($KSbatasS3-$KDbatasS1))/2;
                    $totAtas1 = ($batasAtas * $batasAtas) * $batasAtas;
                    $totAtas2 = ($batasAtas * $batasAtas);
                    $bawah1 = $batasBawah * $batasBawah * $batasBawah;
                    $bawah2 = $batasBawah * $batasBawah;
                    $tot1 = ($p * $totAtas1) - ($d * $totAtas2);
                    $tot2 = ($p * $bawah1) - ($d * $bawah2);
                    $jumlahM = $jumlahM + ( $tot1 - $tot2 );
                    $nilaiPertama = $nilaiPertama +1;
                    
            }

            
            
        }
        if ( $i == 80){
            $jumlahM = $jumlahM + (((($arrayR[$i]/2)*($KSbatasS3 * $KSbatasS3))) - (($arrayR[$i]/2)*($batasAtas*$batasAtas)));
            $nilaiPertama = $nilaiPertama +1;
        }
        $batasBawah = $batasAtas;
        }

    }

    ///mencari nilai A
    sort($arrayA);
    sort($arrayR);
    $nilaiPertama1 = 1;
    $jumlahA = 0;
    $batasAtas1 = 0;
    $batasBawah1 = 75;

    for ($i=0; $i <= 80 ; $i++) { 
            
        if ($arrayA[$i] != 75 && $arrayR[$i] > 0) {
        $batasAtas1 = $arrayA[$i];
        if ($nilaiPertama1 <= 1) {

            // echo "<br>A = $batasAtas1  B = $batasBawah1  jumlah M = $jumlahM";
            $jumlahA = $jumlahA + (($arrayR[$i]*$batasAtas1) - ($arrayR[$i]*$batasBawah1));

            $nilaiPertama1 = $nilaiPertama1 +1;
        }elseif ($nilaiPertama1 >= 1 && $i <= 80) {
                
                if ($batasAtas1 > $batasBawah1) {
                    $p = (1/($KSbatasS3-$KSbatasS1))/2;
                    $d = $KSbatasS1/($KSbatasS3-$KSbatasS1);
                    $totAtas11 = $batasAtas1 * $batasAtas1;
                    $totAtas22 = $batasAtas1;
                    $bawah11 = $batasBawah1  * $batasBawah1;
                    $bawah22 = $batasBawah1;
                    $tot11 = ($p * $totAtas11) - ($d * $totAtas22);
                    $tot22 = ($p * $bawah11) - ($d * $bawah22);
                    $jumlahA = $jumlahA +  ( $tot11 - $tot22 ); 

                    $nilaiPertama1 = $nilaiPertama1 +1;
            
            }if ( $i == 80){
                $jumlahA = $jumlahA + (($arrayR[$i]*$KSbatasS3) - ($arrayR[$i]*$batasAtas1));
            }

            $nilaiPertama1 = $nilaiPertama1 +1;
            
        }
        $batasBawah1 = $batasAtas1;
        }

    }


    $Z = $jumlahM / $jumlahA;

    $hPenilaian = number_format($Z,1);



    $query1 = "insert into penilaian values('','$namaLengkap','$jurusan', '$bind', '$bing', '$mtk', '$v1', '$v2', '$v3', '$v4')";
    $penilaian = mysqli_query($koneksi, $query1);

    if ($hPenilaian > 0) {
        
  
        for ($i=0; $i < 3; $i++) { 
            $p = round($hPenilaian,0)-$i;
                $rekomendasi1 = "select * from jurusan  where nilaiStandar='$p' AND jurusanSekolah LIKE '$jurusan'";
                $rek1 = mysqli_query($koneksi, $rekomendasi1);
                $rek11 = mysqli_fetch_array($rek1);
        
                if ($i == 0 && $rek1) {
                    $j1 = $rek11["namaJurusan"];
                }elseif ($i == 1 && $rek1) {
                    $j2 = $rek11["namaJurusan"];
                }elseif ($i == 2 && $rek1) {
                    $j3 = $rek11["namaJurusan"];
                }
           
        }
        
        


    }


    $query2 = "insert into hasil values('','$namaLengkap','$jurusan', '$hPenilaian', '$j1', '$j2', '$j3')";
    $hasil = mysqli_query($koneksi, $query2);

    if (!$penilaian) {
        echo("Error description: " . $mysqli -> error);
    }else{
        echo"<script>alert('Penilaian Berhasil');</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=hasilIPS'>";
    }
?>
