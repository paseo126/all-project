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

    $queryKD_1 = "select * from himpunan_ipa where cdKriteria='K001' AND cdHimp='K001-1'";
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
    $queryKD_2 = "select * from himpunan_ipa where cdKriteria='K001' AND cdHimp='K001-2'";
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

    $queryKD_3 = "select * from himpunan_ipa where cdKriteria='K001' AND cdHimp='K001-3'";
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

    //BIOLOGI

    //rendah

    $queryBIO_1 = "select * from himpunan_ipa where cdKriteria='K002' AND cdHimp='K002-1'";
    $BIO_1 = mysqli_query($koneksi, $queryBIO_1);
    $BIO1 = mysqli_fetch_array($BIO_1);
    $BIObatasR2 = "$BIO1[batas2]";
    $BIObatasR3 = "$BIO1[batas3]";

    if ($v2 < $BIObatasR2) {
        $BIOrendah = 1;
    }else if($v2 <= $BIObatasR3 && $v2 >= $BIObatasR2){
        $BIOrendah = ($BIObatasR3 - $v2)/($BIObatasR3 - $BIObatasR2);
    }else if ($v2 > $BIObatasR3) {
        $BIOrendah = 0;
    }

    //sedang
    $queryBIO_2 = "select * from himpunan_ipa where cdKriteria='K002' AND cdHimp='K002-2'";
    $BIO_2 = mysqli_query($koneksi, $queryBIO_2);
    $BIO2 = mysqli_fetch_array($BIO_2);
    $BIObatasS1 = "$BIO2[batas1]";
    $BIObatasS2 = "$BIO2[batas2]";
    $BIObatasS3 = "$BIO2[batas3]";

    if ($v2 == $BIObatasS2) {
        $BIOsedang = 1;
    }else if($v2 <= $BIObatasS2 && $v2 >= $BIObatasS1){
        $BIOsedang = ($v2 - $BIObatasS1)/($BIObatasS2 - $BIObatasS1);
    }else if($v2 <= $BIObatasS3 && $v2 >= $BIObatasS2){
        $BIOsedang = ($BIObatasS3 - $v2)/($BIObatasS3 - $BIObatasS2);
    }else if ($v2 < $BIObatasS1 || $v2 > $BIObatasS3) {
        $BIOsedang = 0;
    }

    //tinggi

    $queryBIO_3 = "select * from himpunan_ipa where cdKriteria='K002' AND cdHimp='K002-3'";
    $BIO_3 = mysqli_query($koneksi, $queryBIO_3);
    $BIO3 = mysqli_fetch_array($BIO_3);
    $BIObatasT1 = "$BIO3[batas1]";
    $BIObatasT2 = "$BIO3[batas2]";

    if ($v2 < $BIObatasT1) {
        $BIOtinggi = 0;
    }else if($v2 <= $BIObatasT2 && $v2 >= $BIObatasT1){
        $BIOtinggi = ($v2 - $BIObatasT1)/($BIObatasT2 - $BIObatasT1);
    }else if ($v2 > $BIObatasT2) {
        $BIOtinggi = 1;
    }


    ////////////////////////////////////////////////////////////

    //FISIKA

    //rendah

    $queryFIS_1 = "select * from himpunan_ipa where cdKriteria='K003' AND cdHimp='K003-1'";
    $FIS_1 = mysqli_query($koneksi, $queryFIS_1);
    $FIS1 = mysqli_fetch_array($FIS_1);
    $FISbatasR2 = "$FIS1[batas2]";
    $FISbatasR3 = "$FIS1[batas3]";

    if ($v3 < $FISbatasR2) {
        $FISrendah = 1;
    }else if($v3 <= $FISbatasR3 && $v3 >= $FISbatasR2){
        $FISrendah = ($FISbatasR3 - $v3)/($FISbatasR3 - $FISbatasR2);
    }else if ($v3 > $FISbatasR3) {
        $FISrendah = 0;
    }

    //sedang
    $queryFIS_2 = "select * from himpunan_ipa where cdKriteria='K003' AND cdHimp='K003-2'";
    $FIS_2 = mysqli_query($koneksi, $queryFIS_2);
    $FIS2 = mysqli_fetch_array($FIS_2);
    $FISbatasS1 = "$FIS2[batas1]";
    $FISbatasS2 = "$FIS2[batas2]";
    $FISbatasS3 = "$FIS2[batas3]";

    if ($v3 == $FISbatasS2) {
        $FISsedang = 1;
    }else if($v3 <= $FISbatasS2 && $v3 >= $FISbatasS1){
        $FISsedang = ($v3 - $FISbatasS1)/($FISbatasS2 - $FISbatasS1);
    }else if($v3 <= $FISbatasS3 && $v3 >= $FISbatasS2){
        $FISsedang = ($FISbatasS3 - $v3)/($FISbatasS3 - $FISbatasS2);
    }else if ($v3 > $FISbatasS3 || $v3 < $FISbatasS1) {
        $FISsedang = 0;
    }

    //tinggi

    $queryFIS_3 = "select * from himpunan_ipa where cdKriteria='K003' AND cdHimp='K003-3'";
    $FIS_3 = mysqli_query($koneksi, $queryFIS_3);
    $FIS3 = mysqli_fetch_array($FIS_3);
    $FISbatasT1 = "$FIS3[batas1]";
    $FISbatasT2 = "$FIS3[batas2]";

    if ($v3 < $FISbatasT1) {
        $FIStinggi = 0;
    }else if($v3 <= $FISbatasT2 && $v3 >= $FISbatasT1){
        $FIStinggi = ($v3 - $FISbatasT1)/($FISbatasT2 - $FISbatasT1);
    }else if ($v3 > $FISbatasT2) {
        $FIStinggi = 1;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////

    //KIMIA

    //rendah

    $queryKIM_1 = "select * from himpunan_ipa where cdKriteria='K004' AND cdHimp='K004-1'";
    $KIM_1 = mysqli_query($koneksi, $queryKIM_1);
    $KIM1 = mysqli_fetch_array($KIM_1);
    $KIMbatasR2 = "$KIM1[batas2]";
    $KIMbatasR3 = "$KIM1[batas3]";

    if ($v4 < $KIMbatasR2) {
        $KIMrendah = 1;
    }else if($v4 <= $KIMbatasR3 && $v4 >= $KIMbatasR2){
        $KIMrendah = ($KIMbatasR3 - $v4)/($KIMbatasR3 - $KIMbatasR2);
    }else if ($v4 > $KIMbatasR3) {
        $KIMrendah = 0;
    }

    //sedang
    $queryKIM_2 = "select * from himpunan_ipa where cdKriteria='K004' AND cdHimp='K004-2'";
    $KIM_2 = mysqli_query($koneksi, $queryKIM_2);
    $KIM2 = mysqli_fetch_array($KIM_2);
    $KIMbatasS1 = "$KIM2[batas1]";
    $KIMbatasS2 = "$KIM2[batas2]";
    $KIMbatasS3 = "$KIM2[batas3]";

    if ($v4 == $KIMbatasS2) {
        $KIMsedang = 1;
    }else if($v4 <= $KIMbatasS2 && $v4 >= $KIMbatasS1){
        $KIMsedang = ($v4 - $KIMbatasS1)/($KIMbatasS2 - $KIMbatasS1);
    }else if($v4 <= $KIMbatasS3 && $v4 >= $KIMbatasS2){
        $KIMsedang = ($KIMbatasS3 - $v4)/($KIMbatasS3 - $KIMbatasS2);
    }else if ($v4 > $KIMbatasS3 || $v4 < $KIMbatasS1) {
        $KIMsedang = 0;
    }

    //tinggi

    $queryKIM_3 = "select * from himpunan_ipa where cdKriteria='K004' AND cdHimp='K004-3'";
    $KIM_3 = mysqli_query($koneksi, $queryKIM_3);
    $KIM3 = mysqli_fetch_array($KIM_3);
    $KIMbatasT1 = "$KIM3[batas1]";
    $KIMbatasT2 = "$KIM3[batas2]";

    if ($v4 < $KIMbatasT1) {
        $KIMtinggi = 0;
    }else if($v4 <= $KIMbatasT2 && $v4 >= $KIMbatasT1){
        $KIMtinggi = ($v4 - $KIMbatasT1)/($KIMbatasT2 - $KIMbatasT1);
    }else if ($v4 > $KIMbatasT2) {
        $KIMtinggi = 1;
    }



    /////////////////////////RULE//////////////////////////////////////


    $R1 = min($KDrendah, $BIOrendah, $KIMrendah, $FISrendah);
    $R2 = min($KDrendah, $BIOrendah, $KIMrendah, $FISsedang);
    $R3 = min($KDrendah, $BIOrendah, $KIMrendah, $FIStinggi);
    $R4 = min($KDrendah, $BIOrendah, $KIMsedang, $FISrendah);
    $R5 = min($KDrendah, $BIOrendah, $KIMsedang, $FISsedang);
    $R6 = min($KDrendah, $BIOrendah, $KIMsedang, $FIStinggi);
    $R7 = min($KDrendah, $BIOrendah, $KIMtinggi, $FISrendah);
    $R8 = min($KDrendah, $BIOrendah, $KIMtinggi, $FISsedang);
    $R9 = min($KDrendah, $BIOrendah, $KIMtinggi, $FIStinggi);

    $R10 = min($KDrendah, $BIOsedang, $KIMrendah, $FISrendah);
    $R11 = min($KDrendah, $BIOsedang, $KIMrendah, $FISsedang);
    $R12 = min($KDrendah, $BIOsedang, $KIMrendah, $FIStinggi);
    $R13 = min($KDrendah, $BIOsedang, $KIMsedang, $FISrendah);
    $R14 = min($KDrendah, $BIOsedang, $KIMsedang, $FISsedang);
    $R15 = min($KDrendah, $BIOsedang, $KIMsedang, $FIStinggi);
    $R16 = min($KDrendah, $BIOsedang, $KIMtinggi, $FISrendah);
    $R17 = min($KDrendah, $BIOsedang, $KIMtinggi, $FISsedang);
    $R18 = min($KDrendah, $BIOsedang, $KIMtinggi, $FIStinggi);

    $R19 = min($KDrendah, $BIOtinggi, $KIMrendah, $FISrendah);
    $R20 = min($KDrendah, $BIOtinggi, $KIMrendah, $FISsedang);
    $R21 = min($KDrendah, $BIOtinggi, $KIMrendah, $FIStinggi);
    $R22 = min($KDrendah, $BIOtinggi, $KIMsedang, $FISrendah);
    $R23 = min($KDrendah, $BIOtinggi, $KIMsedang, $FISsedang);
    $R24 = min($KDrendah, $BIOtinggi, $KIMsedang, $FIStinggi);
    $R25 = min($KDrendah, $BIOtinggi, $KIMtinggi, $FISrendah);
    $R26 = min($KDrendah, $BIOtinggi, $KIMtinggi, $FISsedang);
    $R27 = min($KDrendah, $BIOtinggi, $KIMtinggi, $FIStinggi);

    $R28 = min($KDsedang, $BIOrendah, $KIMrendah, $FISrendah);
    $R29 = min($KDsedang, $BIOrendah, $KIMrendah, $FISsedang);
    $R30 = min($KDsedang, $BIOrendah, $KIMrendah, $FIStinggi);
    $R31 = min($KDsedang, $BIOrendah, $KIMsedang, $FISrendah);
    $R32 = min($KDsedang, $BIOrendah, $KIMsedang, $FISsedang);
    $R33 = min($KDsedang, $BIOrendah, $KIMsedang, $FIStinggi);
    $R34 = min($KDsedang, $BIOrendah, $KIMtinggi, $FISrendah);
    $R35 = min($KDsedang, $BIOrendah, $KIMtinggi, $FISsedang);
    $R36 = min($KDsedang, $BIOrendah, $KIMtinggi, $FIStinggi);

    $R37 = min($KDsedang, $BIOsedang, $KIMrendah, $FISrendah);
    $R38 = min($KDsedang, $BIOsedang, $KIMrendah, $FISsedang);
    $R39 = min($KDsedang, $BIOsedang, $KIMrendah, $FIStinggi);
    $R40 = min($KDsedang, $BIOsedang, $KIMsedang, $FISrendah);
    $R41 = min($KDsedang, $BIOsedang, $KIMsedang, $FISsedang);
    $R42 = min($KDsedang, $BIOsedang, $KIMsedang, $FIStinggi);
    $R43 = min($KDsedang, $BIOsedang, $KIMtinggi, $FISrendah);
    $R44 = min($KDsedang, $BIOsedang, $KIMtinggi, $FISsedang);
    $R45 = min($KDsedang, $BIOsedang, $KIMtinggi, $FIStinggi);

    $R46 = min($KDsedang, $BIOtinggi, $KIMrendah, $FISrendah);
    $R47 = min($KDsedang, $BIOtinggi, $KIMrendah, $FISsedang);
    $R48 = min($KDsedang, $BIOtinggi, $KIMrendah, $FIStinggi);
    $R49 = min($KDsedang, $BIOtinggi, $KIMsedang, $FISrendah);
    $R50 = min($KDsedang, $BIOtinggi, $KIMsedang, $FISsedang);
    $R51 = min($KDsedang, $BIOtinggi, $KIMsedang, $FIStinggi);
    $R52 = min($KDsedang, $BIOtinggi, $KIMtinggi, $FISrendah);
    $R53 = min($KDsedang, $BIOtinggi, $KIMtinggi, $FISsedang);
    $R54 = min($KDsedang, $BIOtinggi, $KIMtinggi, $FIStinggi);

    $R55 = min($KDtinggi, $BIOrendah, $KIMrendah, $FISrendah);
    $R56 = min($KDtinggi, $BIOrendah, $KIMrendah, $FISsedang);
    $R57 = min($KDtinggi, $BIOrendah, $KIMrendah, $FIStinggi);
    $R58 = min($KDtinggi, $BIOrendah, $KIMsedang, $FISrendah);
    $R59 = min($KDtinggi, $BIOrendah, $KIMsedang, $FISsedang);
    $R60 = min($KDtinggi, $BIOrendah, $KIMsedang, $FIStinggi);
    $R61 = min($KDtinggi, $BIOrendah, $KIMtinggi, $FISrendah);
    $R62 = min($KDtinggi, $BIOrendah, $KIMtinggi, $FISsedang);
    $R63 = min($KDtinggi, $BIOrendah, $KIMtinggi, $FIStinggi);

    $R64 = min($KDtinggi, $BIOsedang, $KIMrendah, $FISrendah);
    $R65 = min($KDtinggi, $BIOsedang, $KIMrendah, $FISsedang);
    $R66 = min($KDtinggi, $BIOsedang, $KIMrendah, $FIStinggi);
    $R67 = min($KDtinggi, $BIOsedang, $KIMsedang, $FISrendah);
    $R68 = min($KDtinggi, $BIOsedang, $KIMsedang, $FISsedang);
    $R69 = min($KDtinggi, $BIOsedang, $KIMsedang, $FIStinggi);
    $R70 = min($KDtinggi, $BIOsedang, $KIMtinggi, $FISrendah);
    $R71 = min($KDtinggi, $BIOsedang, $KIMtinggi, $FISsedang);
    $R72 = min($KDtinggi, $BIOsedang, $KIMtinggi, $FIStinggi);

    $R73 = min($KDtinggi, $BIOtinggi, $KIMrendah, $FISrendah);
    $R74 = min($KDtinggi, $BIOtinggi, $KIMrendah, $FISsedang);
    $R75 = min($KDtinggi, $BIOtinggi, $KIMrendah, $FIStinggi);
    $R76 = min($KDtinggi, $BIOtinggi, $KIMsedang, $FISrendah);
    $R77 = min($KDtinggi, $BIOtinggi, $KIMsedang, $FISsedang);
    $R78 = min($KDtinggi, $BIOtinggi, $KIMsedang, $FIStinggi);
    $R79 = min($KDtinggi, $BIOtinggi, $KIMtinggi, $FISrendah);
    $R80 = min($KDtinggi, $BIOtinggi, $KIMtinggi, $FISsedang);
    $R81 = min($KDtinggi, $BIOtinggi, $KIMtinggi, $FIStinggi);


    ///////////////////////////////////////////////////////////////////
    //impilkasi fungsi MAX
    $arrayR = array($R1,$R2,$R3,$R4,$R5,$R6,$R7,$R8,$R9,$R10,$R11,$R12,$R13,$R14,$R15,$R16,$R17,$R18,$R19,$R20,$R21,$R22,$R23,$R24,$R25,$R26,$R27,$R28,$R29,$R30,$R31,$R32,$R33,$R34,$R35,$R36,$R37,$R38,$R39,$R40,$R41,$R42,$R43,$R44,$R45,$R46,$R47,$R48,$R49,$R50,$R51,$R52,$R53,$R54,$R55,$R56,$R57,$R58,$R59,$R60,$R61,$R62,$R63,$R64,$R65,$R66,$R67,$R68,$R69,$R70,$R71,$R72,$R73,$R74,$R75,$R76,$R77,$R78,$R79,$R80,$R81);


    $queryKS_2 = "select * from himpunan_ipa where cdKriteria='K005' AND cdHimp='K005-2'";
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

            // echo "<br>A = $batasAtas  B = $batasBawah  jumlah M = $jumlahM";
            $jumlahM = $jumlahM + (((($arrayR[$i]/2)*($batasAtas*$batasAtas))) - (($arrayR[$i]/2)*($batasBawah*$batasBawah)));
                
            $nilaiPertama = $nilaiPertama +1;
        }elseif ($nilaiPertama >= 1 && $i <= 80) {
                
                if ($batasAtas > $batasBawah) {

                    $p = (1/($KSbatasS3-$KDbatasS1))/3;
                    $d = ($KSbatasS1/($KSbatasS3-$KDbatasS1))/2;
                    $totAtas1 = ($batasAtas * $batasAtas) * $batasAtas;
                    $totAtas2 = $batasAtas * $batasAtas;
                    $bawah1 = $batasBawah * $batasBawah * $batasBawah;
                    $bawah2 = $batasBawah * $batasBawah;
                    $tot1 = ($p * $totAtas1) - ($d * $totAtas2);
                    $tot2 = ($p * $bawah1) - ($d * $bawah2);
                    $jumlahM = $jumlahM + ( $tot1 - $tot2 );

                    $nilaiPertama = $nilaiPertama +1;
            
            }if ( $i == 80){
                $jumlahM = $jumlahM + (((($arrayR[$i]/2)*($KSbatasS3 * $KSbatasS3))) - (($arrayR[$i]/2)*($batasAtas*$batasAtas)));
            }

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
            $jumlahA = (($arrayR[$i]*$batasAtas1) - ($arrayR[$i]*$batasBawah1));
            $nilaiPertama1 = $nilaiPertama1 +1;
        }elseif ($nilaiPertama1 >= 1 && $i <= 80) {
                
                if ($batasAtas1 > $batasBawah1) {
                    $p = (1/($KSbatasS3-$KSbatasS1))/2;
                    $d = ($KSbatasS1/($KSbatasS3-$KSbatasS1));
                    $totAtas11 = $batasAtas1 * $batasAtas1;
                    $totAtas22 = $batasAtas1;
                    $bawah11 = $batasBawah1  * $batasBawah1;
                    $bawah22 = $batasBawah1;
                    $tot11 = ($p * $totAtas11) - ($d * $totAtas22);
                    $tot22 = ($p * $bawah11) - ($d * $bawah22);
                    $jumlahA =  $jumlahA + ( $tot11 - $tot22 ); 
                    $nilaiPertama1 = $nilaiPertama1 +1;
            
            }
            
        }
        
        if ( $i == 80){
            $jumlahA =  $jumlahA + (($arrayR[$i]*$KSbatasS3) - ($arrayR[$i]*$batasAtas1));
        $nilaiPertama1 = $nilaiPertama1 +1;
        }

        $batasBawah1 = $batasAtas1;
        }

    }


    $Z = $jumlahM / $jumlahA;
    $hPenilaian = number_format($Z,1);

    // echo "
    // <br>KD || $KDrendah, $KDsedang, $KDtinggi
    // <br>BIO || $BIOrendah, $BIOsedang, $BIOtinggi
    // <br>FIS || $FISrendah, $FISsedang, $FIStinggi
    // <br>KIM || $KIMrendah, $KIMsedang, $KIMtinggi
    // <br>jumlah A = $jumlahA
    // <br>jumlah M = $jumlahM
    // <br>Z = $Z
    // ";

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
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=hasilIPA'>";
    }
?>