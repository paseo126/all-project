<div class="dh12">
    <div class="card">
      <div class="kepalacard">Hasil Kelayakan</div>
        <div class="isicard2" style="padding-left: 40px">
<br>
<h3>Input Kriteria</h3>

<?php
  include "koneksi.php";

  $nik = "$_POST[nik]";
  $nama = "$_POST[nama]";
  $kelompok = "$_POST[kelompok]";
  $ao = "$_POST[nm_anggota]";
  $umur = "$_POST[k1]";
  $pdptn = "$_POST[k2]";
  $jarak = "$_POST[k3]";
  $adm = "$_POST[k4]";
  $rrp = "$_POST[k5]";
  $sikap = "$_POST[k6]";

  /*mendefenisikan variable fuzzy*/

  //UMUR
  //UMUR MUDA

  $sqlm = mysqli_query($kon, "select * from umur where himpunan='muda'");
  $rmuda = mysqli_fetch_array($sqlm);
  $muda_batas1_k1 = $rmuda["batas1"];
  $muda_batas2_k1 = $rmuda["batas2"];
  $muda_batas3_k1 = $rmuda["batas3"];

  if ($umur <= $muda_batas2_k1) {
    $u_muda = 1;
  } elseif ($umur >= $muda_batas2_k1 && $umur <= $muda_batas3_k1) {
    $u_muda = ($muda_batas3_k1 - $umur)/($muda_batas3_k1-$muda_batas2_k1);
  } elseif ($umur >= $muda_batas3_k1) {
    $u_muda = 0;
  }
  
  //echo "$u_muda";

  //UMUR dewasa

  $sqld = mysqli_query($kon, "select * from umur where himpunan='dewasa'");
  $rdewasa = mysqli_fetch_array($sqld);
  $dewasa_batas1_k1 = $rdewasa["batas1"];
  $dewasa_batas2_k1 = $rdewasa["batas2"];
  $dewasa_batas3_k1 = $rdewasa["batas3"];

  if ($umur == $dewasa_batas2_k1) {
    $u_dewasa = 1;
  }elseif ($umur >= $dewasa_batas1_k1 && $umur <= $dewasa_batas2_k1) {
    $u_dewasa = ($umur-$dewasa_batas1_k1)/($dewasa_batas2_k1-$dewasa_batas1_k1);
  }elseif ($umur >= $dewasa_batas2_k1 && $umur <= $dewasa_batas3_k1) {
    $u_dewasa = ($dewasa_batas3_k1-$umur)/($dewasa_batas3_k1-$dewasa_batas2_k1);
  }elseif ($umur>= $dewasa_batas3_k1 && $umur <= $dewasa_batas1_k1) {
    $u_dewasa = 0;
  }

  //echo ",, $u_dewasa ,";

  //UMUR TUA

  $sqlt = mysqli_query($kon, "select * from umur where himpunan='tua'");
  $rtua = mysqli_fetch_array($sqlt);
  $tua_batas1_k1 = $rtua["batas1"];
  $tua_batas2_k1 = $rtua["batas2"];
  $tua_batas3_k1 = $rtua["batas3"];

  if ($umur <= $tua_batas1_k1) {
    $u_tua = 0;
  }elseif ($umur >= $tua_batas1_k1 && $umur <= $tua_batas2_k1) {
    $u_tua = ($umur - $tua_batas1_k1)/($tua_batas2_k1 - $tua_batas1_k1);
  }elseif ($umur >= $tua_batas2_k1) {
    $u_tua = 1;
  }

  //echo ",$u_tua,";

  //Pendapatan perkapita
  //kecil
  $sqlk = mysqli_query($kon, "select * from pendapatan where himpunan ='sedikit'");
  $kcl = mysqli_fetch_array($sqlk);
  $kcl_batas1_k2 = $kcl["batas1"];
  $kcl_batas2_k2 = $kcl["batas2"];
  $kcl_batas3_k2 = $kcl["batas3"];
  


  if ($pdptn <= $kcl_batas2_k2) {
    $p_kecil = 1;
  }elseif ($pdptn >= $kcl_batas2_k2 && $pdptn <= $kcl_batas3_k2) {
    $p_kecil = ($kcl_batas3_k2 - $pdptn)/($kcl_batas3_k2 - $kcl_batas2_k2);
  }elseif ($pdptn >= $kcl_batas3_k2) {
    $p_kecil = 0;
  }

  //echo "pendapatan = $p_kecil";

  $sqls = mysqli_query($kon, "select * from pendapatan where himpunan ='sedang'");
  $sdg = mysqli_fetch_array($sqls);
  $sdg_batas1_k2 = $sdg["batas1"];
  $sdg_batas2_k2 = $sdg["batas2"];
  $sdg_batas3_k2 = $sdg["batas3"];

  if ($pdptn == $sdg_batas2_k2) {
    $p_sedang = 1;
  }elseif ($pdptn >= $sdg_batas1_k2 && $pdptn <= $sdg_batas2_k2) {
    $p_sedang = ($pdptn - $sdg_batas1_k2)/($sdg_batas2_k2-$sdg_batas1_k2);
  }elseif ($pdptn >= $sdg_batas2_k2 && $pdptn <= $sdg_batas3_k2) {
    $p_sedang = ($sdg_batas3_k2-$pdptn)/($sdg_batas3_k2-$sdg_batas2_k2);
  }elseif ($pdptn >= $sdg_batas3_k2 && $pdptn <= $sdg_batas1_k2) {
    $p_sedang = 0;
  }

  //echo "sedang = $p_sedang";
  //besar
  $sqlbsr = mysqli_query($kon, "select * from pendapatan where himpunan ='besar'");
  $bsr = mysqli_fetch_array($sqlbsr);
  $bsr_batas1_k2 = $bsr["batas1"];
  $bsr_batas2_k2 = $bsr["batas2"];
  $bsr_batas3_k2 = $bsr["batas3"];

  if ($pdptn <= $bsr_batas1_k2) {
    $p_besar = 0;
  }elseif ($pdptn >= $bsr_batas1_k2 && $pdptn <= $bsr_batas3_k2) {
    $p_besar = ($pdptn - $bsr_batas1_k2)/($bsr_batas2_k2-$bsr_batas1_k2);
  }elseif ($pdptn >= $bsr_batas2_k2) {
    $p_besar = 1;
  }

  //echo "besar = $p_besar";

  //WAKTU TEPUH
  //dekat

  $sqld = mysqli_query($kon, "select * from jarak where himpunan ='dekat'");
  $dkt = mysqli_fetch_array($sqld);
  $dkt_batas1_k3 = $dkt["batas1"];
  $dkt_batas2_k3 = $dkt["batas2"];
  $dkt_batas3_k3 = $dkt["batas3"];

  if ($jarak <= $dkt_batas2_k3) {
    $j_dekat = 1;
  }elseif ($jarak >= $dkt_batas2_k3 && $jarak <= $dkt_batas3_k3) {
    $j_dekat = ($dkt_batas3_k3 -$jarak)/($dkt_batas3_k3-$dkt_batas2_k3);
  }elseif ($jarak >= $dkt_batas3_k3) {
    $j_dekat = 0;
  }

  //echo "jarak $j_dekat";

  //sedang

  $sqlk = mysqli_query($kon, "select * from jarak where himpunan ='sedang'");
  $jsdg = mysqli_fetch_array($sqlk);
  $jsdg_batas1_k3 = $jsdg["batas1"];
  $jsdg_batas2_k3 = $jsdg["batas2"];
  $jsdg_batas3_k3 = $jsdg["batas3"];

  if ($jarak == $jsdg_batas2_k3 ) {
    $j_sedang = 1;
  }elseif ($jarak >= $jsdg_batas1_k3 && $jarak <= $jsdg_batas2_k3) {
    $j_sedang = ($jarak-$jsdg_batas1_k3)/($jsdg_batas2_k3 - $jsdg_batas1_k3);
  }elseif ($jarak >= $jsdg_batas2_k3 && $jarak <= $jsdg_batas3_k3) {
    $j_sedang = ($jsdg_batas3_k3 - $jarak)/($jsdg_batas3_k3-$jsdg_batas2_k3);
  }elseif ($jarak >= $jsdg_batas3_k3) {
    $j_sedang = 0;
  }

  //echo "sedang = $j_sedang";

  //JARAK SEDANG

  $sqlj = mysqli_query($kon, "select * from jarak where himpunan ='jauh'");
  $jauh = mysqli_fetch_array($sqlj);
  $jauh_batas1_k3 = $jauh["batas1"];
  $jauh_batas2_k3 = $jauh["batas2"];
  $jauh_batas3_k3 = $jauh["batas3"];

  if ($jarak <= $jauh_batas1_k3) {
    $j_jauh = 0;
  }elseif ($jarak >= $jauh_batas1_k3 && $jarak <= $jauh_batas2_k3) {
    $j_jauh = ($jarak - $jauh_batas1_k3)/($jauh_batas2_k3-$jauh_batas1_k3);
  }elseif ($jarak >= $jauh_batas2_k3) {
    $j_jauh = 1;
  }

  //echo "jauh = $j_jauh";

    //ADMINISTRASI
    //tidak baik

  $sqlk = mysqli_query($kon, "select * from administrasi where himpunan ='tidak baik'");
  $admt = mysqli_fetch_array($sqlk);
  $admtdk_batas1_k4 = $admt["batas1"];
  $admtdk_batas2_k4 = $admt["batas2"];
  $admtdk_batas3_k4 = $admt["batas3"];

  if ($adm <= $admtdk_batas2_k4) {
    $adm_tdk = 1;
  }elseif ($adm >= $admtdk_batas2_k4 && $adm <= $admtdk_batas3_k4) {
    $adm_tdk = ($admtdk_batas3_k4 - $adm)/($admtdk_batas3_k4-$admtdk_batas2_k4);
  }elseif ($adm >= $admtdk_batas3_k4) {
    $adm_tdk = 0;
  }

  //echo ", tidak baik $adm_tdk,";


  // baik

  $sqlb = mysqli_query($kon, "select * from administrasi where himpunan ='baik'");
  $admb = mysqli_fetch_array($sqlb);
  $admb_batas1_k4 = $admb["batas1"];
  $admb_batas2_k4 = $admb["batas2"];
  $admb_batas3_k4 = $admb["batas3"];

  if ($adm == $admb_batas2_k4) {
    $adm_baik = 1;
  }elseif ($adm >= $admb_batas1_k4 && $adm <= $admb_batas2_k4) {
    $adm_baik = ($adm - $admb_batas1_k4)/($admb_batas2_k4-$admb_batas1_k4);
  }elseif ($adm >= $admb_batas2_k4 && $adm <= $admb_batas3_k4) {
    $adm_baik = ($admb_batas3_k4 - $adm)/($admb_batas3_k4-$admb_batas2_k4);
  }elseif ($adm >= $admb_batas3_k4 && $adm <= $admb_batas1_k4) {
    $adm_baik = 0;
  }

  //echo "$adm_baik";

  //sangat baik

  $sqlk = mysqli_query($kon, "select * from administrasi where himpunan ='sangat baik'");
  $adms = mysqli_fetch_array($sqlk);
  $adms_batas1_k4 = $adms["batas1"];
  $adms_batas2_k4 = $adms["batas2"];
  $adms_batas3_k4 = $adms["batas3"];

  if ($adm <= $adms_batas1_k4) {
    $adm_sgt = 0;
  }elseif ($adm >= $adms_batas1_k4 && $adm <= $adms_batas2_k4) {
    $adm_sgt = ($adm - $adms_batas1_k4)/($adms_batas2_k4-$adms_batas1_k4);
  }elseif ($adm >= $adms_batas2_k4) {
    $adm_sgt = 1;
  }

  //echo "$adm_sgt";


  //Reputasi riwayat pinjaman
  //tidak baik

  $sqlk = mysqli_query($kon, "select * from administrasi where himpunan ='tidak baik'");
  $rrpt = mysqli_fetch_array($sqlk);
  $rrptdk_batas1_k5 = $rrpt["batas1"];
  $rrptdk_batas2_k5 = $rrpt["batas2"];
  $rrptdk_batas3_k5 = $rrpt["batas3"];

  if ($rrp <= $rrptdk_batas2_k5) {
    $rrp_tdk = 1;
  }elseif ($rrp >= $rrptdk_batas2_k5 && $rrp <= $rrptdk_batas3_k5) {
    $rrp_tdk = ($rrptdk_batas3_k5 - $rrp)/($rrptdk_batas3_k5-$rrptdk_batas2_k5);
  }elseif ($rrp >= $rrptdk_batas3_k5) {
    $rrp_tdk = 0;
  }

  //echo ", tidak baik $rrp_tdk,";


  // baik

  $sqlb = mysqli_query($kon, "select * from riwayat_pinjaman where himpunan ='baik'");
  $rrpb = mysqli_fetch_array($sqlb);
  $rrpb_batas1_k5 = $rrpb["batas1"];
  $rrpb_batas2_k5 = $rrpb["batas2"];
  $rrpb_batas3_k5 = $rrpb["batas3"];

  if ($rrp == $rrpb_batas2_k5) {
    $rrp_baik = 1;
  }elseif ($rrp >= $rrpb_batas1_k5 && $rrp <= $rrpb_batas2_k5) {
    $rrp_baik = ($rrp - $rrpb_batas1_k5)/($rrpb_batas2_k5-$rrpb_batas1_k5);
  }elseif ($rrp >= $rrpb_batas2_k5 && $rrp <= $rrpb_batas3_k5) {
    $rrp_baik = ($rrpb_batas3_k5 - $rrp)/($rrpb_batas3_k5-$rrpb_batas2_k5);
  }elseif ($rrp >= $rrpb_batas3_k5 && $rrp <= $rrpb_batas1_k5) {
    $rrp_baik = 0;
  }

  //echo "$rrp_baik";

  //sangat baik

  $sqlk = mysqli_query($kon, "select * from riwayat_pinjaman where himpunan ='sangat baik'");
  $rrps = mysqli_fetch_array($sqlk);
  $rrps_batas1_k5 = $rrps["batas1"];
  $rrps_batas2_k5 = $rrps["batas2"];
  $rrps_batas3_k5 = $rrps["batas3"];

  if ($rrp <= $rrps_batas1_k5) {
    $rrp_sgt = 0;
  }elseif ($rrp >= $rrps_batas1_k5 && $rrp <= $rrps_batas2_k5) {
    $rrp_sgt = ($rrp - $rrps_batas1_k5)/($rrps_batas2_k5-$rrps_batas1_k5);
  }elseif ($rrp >= $rrps_batas2_k5) {
    $rrp_sgt = 1;
  }

  //echo "$rrp_sgt";

  //SIKAP
  //tidak baik

  $sqlk = mysqli_query($kon, "select * from sikap where himpunan ='tidak baik'");
  $sikapt = mysqli_fetch_array($sqlk);
  $sikaptdk_batas1_k6 = $sikapt["batas1"];
  $sikaptdk_batas2_k6 = $sikapt["batas2"];
  $sikaptdk_batas3_k6 = $sikapt["batas3"];

  if ($sikap <= $sikaptdk_batas2_k6) {
    $sikap_tdk = 1;
  }elseif ($sikap >= $sikaptdk_batas2_k6 && $sikap <= $sikaptdk_batas3_k6) {
    $sikap_tdk = ($sikaptdk_batas3_k6 - $sikap)/($sikaptdk_batas3_k6-$sikaptdk_batas2_k6);
  }elseif ($sikap >= $sikaptdk_batas3_k6) {
    $sikap_tdk = 0;
  }

  //echo ", tidak baik $sikap_tdk,";


  // baik

  $sqlb = mysqli_query($kon, "select * from sikap where himpunan ='baik'");
  $sikapb = mysqli_fetch_array($sqlb);
  $sikapb_batas1_k6 = $sikapb["batas1"];
  $sikapb_batas2_k6 = $sikapb["batas2"];
  $sikapb_batas3_k6 = $sikapb["batas3"];

  if ($sikap == $sikapb_batas2_k6) {
    $sikap_baik = 1;
  }elseif ($sikap >= $sikapb_batas1_k6 && $sikap <= $sikapb_batas2_k6) {
    $sikap_baik = ($sikap - $sikapb_batas1_k6)/($sikapb_batas2_k6-$sikapb_batas1_k6);
  }elseif ($sikap >= $sikapb_batas2_k6 && $sikap <= $sikapb_batas3_k6) {
    $sikap_baik = ($sikapb_batas3_k6 - $sikap)/($sikapb_batas3_k6-$sikapb_batas2_k6);
  }elseif ($sikap >= $sikapb_batas3_k6 && $sikap <= $sikapb_batas1_k6) {
    $sikap_baik = 0;
  }

  //echo "$sikap_baik";

  //sangat baik

  $sqlk = mysqli_query($kon, "select * from sikap where himpunan ='sangat baik'");
  $sikaps = mysqli_fetch_array($sqlk);
  $sikaps_batas1_k6 = $sikaps["batas1"];
  $sikaps_batas2_k6 = $sikaps["batas2"];
  $sikaps_batas3_k6 = $sikaps["batas3"];

  if ($sikap <= $sikaps_batas1_k6) {
    $sikap_sgt = 0;
  }elseif ($sikap >= $sikaps_batas1_k6 && $sikap <= $sikaps_batas2_k6) {
    $sikap_sgt = ($sikap - $sikaps_batas1_k6)/($sikaps_batas2_k6-$sikaps_batas1_k6);
  }elseif ($sikap >= $sikaps_batas2_k6) {
    $sikap_sgt = 1;
  }

  //echo "$sikap_sgt";



//Rule rule
  $sqlhl = mysqli_query($kon, "select * from hasil where himpunan ='layak'");
  $h = mysqli_fetch_array($sqlhl);
  $sdg1 = $h["batas1"];
  $sdg2 = $h["batas2"];
  $sdg3 = $h["batas3"];

  $sqltl = mysqli_query($kon, "select * from hasil where himpunan ='tidak layak'");
  $tl = mysqli_fetch_array($sqltl);
  $tl1 = $tl["batas1"];
  $tl2 = $tl["batas2"];
  $tl3 = $tl["batas3"];

    $sqlsl = mysqli_query($kon, "select * from hasil where himpunan ='sangat layak'");
  $sl = mysqli_fetch_array($sqlsl);
  $sl1 = $sl["batas1"];
  $sl2 = $sl["batas2"];


    //sikap //am tdk
  $a1 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z1 = $tl3 - ($a1 * ($tl3-$tl2));

  $a2 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z2 = $tl3 - ($a2 * ($tl3-$tl2));

  $a3 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z3 = $tl3 - ($a3 * ($tl3-$tl2));

  $a4 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z4 = $tl3 - ($a4 * ($tl3-$tl2));

  $a5 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
  $z5 = $sl1 + ($a5 * ($sl2-$sl1));

  $a6 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z6 = $sl1 + ($a6 * ($sl2-$sl1));
  
  $a7 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z7 = $tl3 - ($a7 * ($tl3-$tl2));

  $a8 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z8 = $tl3 - ($a8 * ($tl3-$tl2));

  $a9 = min($u_muda,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z9 = $tl3 - ($a9 * ($tl3-$tl2));

  //adm baik
  $a10 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z10 = $tl3 - ($a10 * ($tl3-$tl2));

  $a11 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z11 = $tl3 - ($a11 * ($tl3-$tl2));

  $a12 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z12 = $tl3 - ($a12 * ($tl3-$tl2));

  $a13 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z13_1 = $sdg3 - ($a13 * ($sdg3-$sdg1));
  $z13_2 = $sdg1 + ($a13 * ($sdg3-$sdg1));
  $z13 = ($z13_1+$z13_2)/2;

  
  $a14 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
  $z14 = $tl3 - ($a15 * ($tl3-$tl2));

  $a15 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
  $z15 = $tl3 - ($a15 * ($tl3-$tl2));

  $a16 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z16_1 = $sdg3 - ($a16 * ($sdg3-$sdg1));
  $z16_2 = $sdg3 + ($a16 * ($sdg3-$sdg1));
  $z16 = ($z16_1+$z16_2)/2;

  $a17 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z17 = $sl1 + ($a17 * ($sl2-$sl1));

  $a18 = min($u_muda,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z18 = $sl1 + ($a18 * ($sl2-$sl1));
  //adm sgt
  $a19 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z19 = $tl3 - ($a19 * ($tl3-$tl2));

  $a20 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z20_1 = $sdg3 - ($a20 * ($sdg3-$sdg1));
  $z20_2 = $sdg1 + ($a20 * ($sdg3-$sdg1));
  $z20 = ($z20_1+$z20_2)/2;

  $a21 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z21 = $tl3 - ($a21 * ($tl3-$tl2));

  $a22 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z22 = $tl3 - ($a22 * ($tl3-$tl2));

  $a23 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
  $z23 = $sl1 + ($a23 * ($sl2-$sl1));

  $a24 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z24 = $sl1 + ($a24 * ($sl2-$sl1));

  $a25 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z25_1 = $sdg3 - ($a25 * ($sdg3-$sdg1));
  $z25_2 = $sdg1 + ($a25 * ($sdg3-$sdg1));
  $z25 = ($z25_1+$z25_2)/2;

  $a26 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z26 = $sl1 + ($a26 * ($sl2-$sl1));

  $a27 = min($u_muda,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z27 = $sl1 + ($a27 * ($sl2-$sl1));

  //jarak sedang

  $a28 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z28 = $tl3 - ($a28 * ($tl3-$tl2));

  $a29 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z29 = $tl3 - ($a29 * ($tl3-$tl2));

  $a30 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z30 = $tl3 - ($a30 * ($tl3-$tl2));

  $a31 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z31 = $tl3 - ($a31 * ($tl3-$tl2));

  $a32 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
  $z32_1 = $sdg3 - ($a32 * ($sdg3-$sdg1));
  $z32_2 = $sdg1 + ($a32 * ($sdg3-$sdg1));
  $z32 = ($z32_1+$z32_2)/2;

  $a33 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z33_1 = $sdg3 - ($a33 * ($sdg3-$sdg1));
  $z33_2 = $sdg1 + ($a33 * ($sdg3-$sdg1));
  $z33 = ($z33_1+$z33_2)/2;

  $a34 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z34 = $tl3 - ($a34 * ($tl3-$tl2));

  $a35 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z35_1 = $sdg3 - ($a35 * ($sdg3-$sdg1));
  $z35_2 = $sdg1 + ($a35 * ($sdg3-$sdg1));
  $z35 = ($z35_1+$z35_2)/2;

  $a36 = min($u_muda,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z36_1 = $sdg3 - ($a36 * ($sdg3-$sdg1));
  $z36_2 = $sdg1 + ($a36 * ($sdg3-$sdg1));
  $z36 = ($z36_1+$z36_2)/2;
  

  $a37 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z37 = $tl3 - ($a37 * ($tl3-$tl2));

  $a38 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z38 = $tl3 - ($a38 * ($tl3-$tl2));

  $a39 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z39 = $tl3 - ($a39 * ($tl3-$tl2));

  $a40 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z40_1 = $sdg3 - ($a40 * ($sdg3-$sdg1));
  $z40_2 = $sdg1 + ($a40 * ($sdg3-$sdg1));
  $z40 = ($z40_1+$z40_2)/2;

  $a41 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
  $z41 = $sl1 + ($a41 * ($sl2-$sl1));

  $a42 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
  $z42 = $sl1 + ($a42 * ($sl2-$sl1));

  $a43 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z43 = $tl3 - ($a43 * ($tl3-$tl2));

  $a44 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
  $z44 = $sl1 + ($a44 * ($sl2-$sl1));

  $a45 = min($u_muda,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z45 = $sl1 + ($a45 * ($sl2-$sl1));


  $a46 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z46 = $tl3 - ($a46 * ($tl3-$tl2));

  $a47 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z47 = $tl3 - ($a47 * ($tl3-$tl2));

  $a48 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z48 = $tl3 - ($a48 * ($tl3-$tl2));

  $a49 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z49_1 = $sdg3 - ($a49 * ($sdg3-$sdg1));
  $z49_2 = $sdg1 + ($a49 * ($sdg3-$sdg1));
  $z49 = ($z49_1+$z49_2)/2;

  $a50 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
  $z50 = $sl1 + ($a50 * ($sl2-$sl1));

  $a51 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z51 = $sl1 + ($a51 * ($sl2-$sl1));

  $a52 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z52 = $tl3 - ($a52 * ($tl3-$tl2));

  $a53 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z53 = $sl1 + ($a53 * ($sl2-$sl1));

  $a54 = min($u_muda,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z54 = $sl1 + ($a54 * ($sl2-$sl1));
  //jarak jauh

  $a55 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z55 = $tl3 - ($a55 * ($tl3-$tl2));
  
  $a56 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z56 = $tl3 - ($a56 * ($tl3-$tl2));

  $a57 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z57 = $tl3 - ($a57 * ($tl3-$tl2));

  $a58 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z58 = $tl3 - ($a58 * ($tl3-$tl2));

  $a59 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z59_1 = $sdg3 - ($a59 * ($sdg3-$sdg1));
  $z59_2 = $sdg1 + ($a59 * ($sdg3-$sdg1));
  $z59 = ($z59_1+$z59_2)/2;

  $a60 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z60_1 = $sdg3 - ($a60 * ($sdg3-$sdg1));
  $z60_2 = $sdg1 + ($a60 * ($sdg3-$sdg1));
  $z60 = ($z60_1+$z60_2)/2;

  $a61 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z61 = $tl3 - ($a61 * ($tl3-$tl2));

  $a62 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z62_1 = $sdg3 - ($a62 * ($sdg3-$sdg1));
  $z62_2 = $sdg1 + ($a62 * ($sdg3-$sdg1));
  $z62 = ($z62_1+$z62_2)/2;

  $a63 = min($u_muda,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z63_1 = $sdg3 - ($a63 * ($sdg3-$sdg1));
  $z63_2 = $sdg1 + ($a63 * ($sdg3-$sdg1));
  $z63 = ($z63_1+$z63_2)/2;

  $a64 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z64 = $tl3 - ($a64 * ($tl3-$tl2));

  $a65 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z65 = $tl3 - ($a65 * ($tl3-$tl2));

  $a66 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z66 = $tl3 - ($a66 * ($tl3-$tl2));

  $a67 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z67 = $tl3 - ($a67 * ($tl3-$tl2));

  $a68 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
  $z68 = $sl1 + ($a68 * ($sl2-$sl1));

  $a69 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
  $z69 = $sl1 + ($a69 * ($sl2-$sl1));

  $a70 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z70_1 = $sdg3 - ($a70 * ($sdg3-$sdg1));
  $z70_2 = $sdg1 + ($a70 * ($sdg3-$sdg1));
  $z70 = ($z70_1+$z70_2)/2;

  $a71 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
  $z71 = $sl1 + ($a71 * ($sl2-$sl1));

  $a72 = min($u_muda,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z72 = $sl1 + ($a72 * ($sl2-$sl1));


  $a73 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z73 = $tl3 - ($a73 * ($tl3-$tl2));

  $a74 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z74 = $tl3 - ($a74 * ($tl3-$tl2));

  $a75 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z75 = $tl3 - ($a75 * ($tl3-$tl2));

  $a76 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z76 = $tl3 - ($a76 * ($tl3-$tl2));

  $a77 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
  $z77_1 = $sdg3 - ($a77 * ($sdg3-$sdg1));
  $z77_2 = $sdg1 + ($a77 * ($sdg3-$sdg1));
  $z77 = ($z77_1+$z77_2)/2;


  $a78 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z78_1 = $sdg3 - ($a78 * ($sdg3-$sdg1));
  $z78_2 = $sdg1 + ($a78 * ($sdg3-$sdg1));
  $z78 = ($z78_1+$z78_2)/2;

  $a79 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z79 = $tl3 - ($a79 * ($tl3-$tl2));

  $a80 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z80_1 = $sdg3 - ($a80 * ($sdg3-$sdg1));
  $z80_2 = $sdg1 + ($a80 * ($sdg3-$sdg1));
  $z80 = ($z80_1+$z80_2)/2;

  $a81 = min($u_muda,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z81_1 = $sdg3 - ($a81 * ($sdg3-$sdg1));
  $z81_2 = $sdg1 + ($a81 * ($sdg3-$sdg1));
  $z81 = ($z81_1+$z81_2)/2;
  

  //pendapatan sedang
  //coyyy

  $a82 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z82 = $tl3 - ($a82 * ($tl3-$tl2));

  $a83 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z83 = $tl3 - ($a83 * ($tl3-$tl2));

  $a84 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z84 = $tl3 - ($a84 * ($tl3-$tl2));

  $a85 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z85 = $tl3 - ($a85 * ($tl3-$tl2));

  $a86 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
  $z86_1 = $sdg3 - ($a86 * ($sdg3-$sdg1));
  $z86_2 = $sdg1 + ($a86 * ($sdg3-$sdg1));
  $z86 = ($z86_1+$z86_2)/2;

  $a87 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z87_1 = $sdg3 - ($a87 * ($sdg3-$sdg1));
  $z87_2 = $sdg1 + ($a87 * ($sdg3-$sdg1));
  $z87 = ($z87_1+$z87_2)/2;

  $a88 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z88 = $tl3 - ($a88 * ($tl3-$tl2));

  $a89 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z89_1 = $sdg3 - ($a89 * ($sdg3-$sdg1));
  $z89_2 = $sdg1 + ($a89 * ($sdg3-$sdg1));
  $z89 = ($z89_1+$z89_2)/2;

  $a90 = min($u_muda,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z90_1 = $sdg3 - ($a90 * ($sdg3-$sdg1));
  $z90_2 = $sdg1 + ($a90 * ($sdg3-$sdg1));
  $z90 = ($z90_1+$z90_2)/2;


  $a91 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z91 = $tl3 + ($a91 * ($tl3-$tl2));

  $a92 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
    $z92_1 = $sdg3 - ($a92 * ($sdg3-$sdg1));
  $z92_2 = $sdg1 + ($a92 * ($sdg3-$sdg1));
  $z92 = ($z92_1+$z92_2)/2;

  $a93 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z94 = $tl3 - ($a94 * ($tl3-$tl2));

  $a94 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z94 = $tl3 - ($a94 * ($tl3-$tl2));

  $a95 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
  $z95 = $sl1 + ($a95 * ($sl2-$sl1));

  $a96 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
  $z96 = $sl1 + ($a96 * ($sl2-$sl1));

  $a97 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z97 = $tl3 - ($a97 * ($tl3-$tl2));

  $a98 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z98 = $sl1 + ($a98 * ($sl2-$sl1));

  $a99 = min($u_muda,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z99 = $sl1 + ($a99 * ($sl2-$sl1));


  $a100 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z100 = $tl3 -  ($a100 * ($tl3-$tl2));

  $a101 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z101 = $tl3 -  ($a101 * ($tl3-$tl2));

  $a102 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z102 = $tl3 -  ($a102 * ($tl3-$tl2));

  $a103 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z103 = $tl3 -  ($a103 * ($tl3-$tl2));

  $a104 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
  $z104 = $sl1 + ($a104 * ($sl2-$sl1));

  $a105 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z105 = $sl1 + ($a105 * ($sl2-$sl1));

  $a106 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z106 = $tl3 - ($a106 * ($tl3-$tl2));

  $a107 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z107 = $sl1 + ($a107 * ($sl2-$sl1));

  $a108 = min($u_muda,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z108 = $sl1 + ($a108 * ($sl2-$sl1));

  //jarak sedang

  $a109 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z109 = $tl3 - ($a109 * ($tl3-$tl2));

  $a110 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z110 = $tl3 - ($a110 * ($tl3-$tl2));

  $a111 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z111 = $tl3 - ($a111 * ($tl3-$tl2));

  $a112 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z112 = $tl3 - ($a112 * ($tl3-$tl2));

  $a113 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
  $z113 = $tl3 - ($a113 * ($tl3-$tl2));

  $a114 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z114_1 = $sdg3 - ($a114 * ($sdg3-$sdg1));
  $z114_2 = $sdg1 + ($a114 * ($sdg3-$sdg1));
  $z114 = ($z114_1+$z114_2)/2;

  $a115 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z115 = $tl3 - ($a115 * ($tl3-$tl2));

  $a116 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z116 = $tl3 - ($a116 * ($tl3-$tl2));

  $a117 = min($u_muda,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z117_1 = $sdg3 - ($a117 * ($sdg3-$sdg1));
  $z117_2 = $sdg1 + ($a117 * ($sdg3-$sdg1));
  $z117 = ($z117_1+$z117_2)/2;


  $a118 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z118 = $tl3 - ($a118 * ($tl3-$tl2));

  $a119 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z119 = $tl3 - ($a119 * ($tl3-$tl2));

  $a120 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z120 = $tl3 - ($a120 * ($tl3-$tl2));

  $a121 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
    $z121_1 = $sdg3 - ($a121 * ($sdg3-$sdg1));
  $z121_2 = $sdg1 + ($a121 * ($sdg3-$sdg1));
  $z121 = ($z121_1+$z121_2)/2;

  $a122 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
  $z122 = $sl1 + ($a122 * ($sl2-$sl1));

  $a123 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
  $z123 = $sl1 + ($a123 * ($sl2-$sl1));

  $a124 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z124 = $tl3 - ($a124 * ($tl3-$tl2));

  $a125 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
  $z125 = $sl1 + ($a126 * ($sl2-$sl1));

  $a126 = min($u_muda,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z126 = $sl1 + ($a126 * ($sl2-$sl1));


  $a127 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z127 = $tl3 - ($a127 * ($tl3-$tl2));

  $a128 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z128 = $tl3 - ($a128 * ($tl3-$tl2));

  $a129 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z129 = $tl3 - ($a129 * ($tl3-$tl2));

  $a130 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z130 = $tl3 - ($a130 * ($tl3-$tl2));

  $a131 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
    $z131_1 = $sdg3 - ($a131 * ($sdg3-$sdg1));
  $z131_2 = $sdg1 + ($a131 * ($sdg3-$sdg1));
  $z131 = ($z131_1+$z131_2)/2;

  $a132 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z132 = $sl1 + ($a132 * ($sl2-$sl1));

  $a133 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z133 = $tl3 - ($a133 * ($tl3-$tl2));

  $a134 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z134 = $sl1 + ($a134 * ($sl2-$sl1));

  $a135 = min($u_muda,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z135 = $sl1 + ($a135 * ($sl2-$sl1));

  //jarak jauh

  $a136 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z136 = $tl3 - ($a136 * ($tl3-$tl2));

  $a137 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z137 = $tl3 - ($a137 * ($tl3-$tl2));

  $a138 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z138 = $tl3 - ($a138 * ($tl3-$tl2));

  $a139 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z139 = $tl3 - ($a139 * ($tl3-$tl2));

  $a140 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
    $z140_1 = $sdg3 - ($a140 * ($sdg3-$sdg1));
  $z140_2 = $sdg1 + ($a140 * ($sdg3-$sdg1));
  $z140 = ($z140_1+$z140_2)/2;

  $a141 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z141_1 = $sdg3 - ($a141 * ($sdg3-$sdg1));
  $z141_2 = $sdg1 + ($a141 * ($sdg3-$sdg1));
  $z141 = ($z141_1+$z141_2)/2;

  $a142 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z142 = $tl3 - ($a142 * ($tl3-$tl2));

  $a143 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z143_1 = $sdg3 - ($a143 * ($sdg3-$sdg1));
  $z143_2 = $sdg1 + ($a143 * ($sdg3-$sdg1));
  $z143 = ($z143_1+$z143_2)/2;

  $a144 = min($u_muda,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z144_1 = $sdg3 - ($a144 * ($sdg3-$sdg1));
  $z144_2 = $sdg1 + ($a144 * ($sdg3-$sdg1));
  $z144 = ($z144_1+$z144_2)/2;


  $a145 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z145 = $tl3 - ($a145 * ($tl3-$tl2));

  $a146 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z146 = $tl3 - ($a146 * ($tl3-$tl2));

  $a147 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z147 = $tl3 - ($a147 * ($tl3-$tl2));

  $a148 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z148 = $tl3 - ($a148 * ($tl3-$tl2));

  $a149 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
    $z149_1 = $sdg3 - ($a149 * ($sdg3-$sdg1));
  $z149_2 = $sdg1 + ($a149 * ($sdg3-$sdg1));
  $z149 = ($z149_1+$z149_2)/2;

  $a150 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
  $z150 = $sl1 + ($a150 * ($sl2-$sl1));

  $a151 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z151 = $tl3 - ($a151 * ($tl3-$tl2));

  $a152 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
    $z152_1 = $sdg3 - ($a152 * ($sdg3-$sdg1));
  $z152_2 = $sdg1 + ($a152 * ($sdg3-$sdg1));
  $z152 = ($z152_1+$z152_2)/2;

  $a153 = min($u_muda,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z153 = $sl1 + ($a153 * ($sl2-$sl1));


  $a154 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z154 = $tl3 - ($a154 * ($tl3-$tl2));

  $a155 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z155 = $tl3 - ($a155 * ($tl3-$tl2));

  $a156 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z156 = $tl3 - ($a156 * ($tl3-$tl2));

  $a157 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z157 = $tl3 - ($a157 * ($tl3-$tl2));

  $a158 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
    $z158_1 = $sdg3 - ($a158 * ($sdg3-$sdg1));
  $z158_2 = $sdg1 + ($a158 * ($sdg3-$sdg1));
  $z158 = ($z158_1+$z158_2)/2;

  $a159 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z159_1 = $sdg3 - ($a159 * ($sdg3-$sdg1));
  $z159_2 = $sdg1 + ($a159 * ($sdg3-$sdg1));
  $z159 = ($z159_1+$z159_2)/2;

  $a160 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z160 = $tl3 - ($a160 * ($tl3-$tl2));

  $a161 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z161 = $sl1 + ($a161 * ($sl2-$sl1));

  $a162 = min($u_muda,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z162 = $sl1 + ($a162 * ($sl2-$sl1));

  //pendapatan besar

  $a163 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z163 = $tl3 - ($a163 * ($tl3-$tl2));

  $a164 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z164 = $tl3 - ($a164 * ($tl3-$tl2));
  
  $a165 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z165 = $tl3 - ($a165 * ($tl3-$tl2));

  $a166 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z166 = $tl3 - ($a166 * ($tl3-$tl2));

  $a167 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
    $z167_1 = $sdg3 - ($a167 * ($sdg3-$sdg1));
  $z167_2 = $sdg1 + ($a167 * ($sdg3-$sdg1));
  $z167 = ($z167_1+$z167_2)/2;

  $a168 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z168_1 = $sdg3 - ($a168 * ($sdg3-$sdg1));
  $z168_2 = $sdg1 + ($a168 * ($sdg3-$sdg1));
  $z168 = ($z168_1+$z168_2)/2;

  $a169 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z169 = $tl3 - ($a169 * ($tl3-$tl2));

  $a170 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z170_1 = $sdg3 - ($a170 * ($sdg3-$sdg1));
  $z170_2 = $sdg1 + ($a170 * ($sdg3-$sdg1));
  $z170 = ($z170_1+$z170_2)/2;

  $a171 = min($u_muda,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z171_1 = $sdg3 - ($a171 * ($sdg3-$sdg1));
  $z171_2 = $sdg1 + ($a171 * ($sdg3-$sdg1));
  $z171 = ($z171_1+$z171_2)/2;


  $a172 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z172 = $tl3 - ($a172 * ($tl3-$tl2));

  $a173 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z173 = $tl3 - ($a173 * ($tl3-$tl2));

  $a174 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z174 = $tl3 - ($a174 * ($tl3-$tl2));

  $a175 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z175 = $tl3 - ($a175 * ($tl3-$tl2));

  $a176 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
  $z176_1 = $sdg3 - ($a176 * ($sdg3-$sdg1));
  $z176_2 = $sdg1 + ($a176 * ($sdg3-$sdg1));
  $z176 = ($z176_1+$z176_2)/2;

  $a177 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
  $z177_1 = $sdg3 - ($a177 * ($sdg3-$sdg1));
  $z177_2 = $sdg1 + ($a177 * ($sdg3-$sdg1));
  $z177 = ($z177_1+$z177_2)/2;

  $a178 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z178 = $tl3 - ($a178 * ($tl3-$tl2));

  $a179 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z179_1 = $sdg3 - ($a179 * ($sdg3-$sdg1));
  $z179_2 = $sdg1 + ($a179 * ($sdg3-$sdg1));
  $z179 = ($z179_1+$z179_2)/2;

  $a180 = min($u_muda,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z180 = $sl1 + ($a180 * ($sl2-$sl1));


  $a181 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z181 = $tl3 - ($a181 * ($tl3-$tl2));

  $a182 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z182 = $tl3 - ($a182 * ($tl3-$tl2));

  $a183 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z183 = $tl3 - ($a183 * ($tl3-$tl2));

  $a184 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z184 = $tl3 - ($a184 * ($tl3-$tl2));

  $a185 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
    $z185_1 = $sdg3 - ($a185 * ($sdg3-$sdg1));
  $z185_2 = $sdg1 + ($a185 * ($sdg3-$sdg1));
  $z185 = ($z185_1+$z185_2)/2;

  $a186 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z186 = $sl1 + ($a186 * ($sl2-$sl1));

  $a187 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z187 = $tl3 - ($a187 * ($tl3-$tl2));

  $a188 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z188 = $sl1 + ($a188 * ($sl2-$sl1));

  $a189 = min($u_muda,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z189 = $sl1 + ($a189 * ($sl2-$sl1));
  //jarak sedang

  $a190 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z190 = $tl3 - ($a190 * ($tl3-$tl2));

  $a191 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z191 = $tl3 - ($a190 * ($tl3-$tl2));

  $a192 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z192 = $tl3 - ($a192 * ($tl3-$tl2));

  $a193 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z193 = $tl3 - ($a193 * ($tl3-$tl2));

  $a194 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
    $z194_1 = $sdg3 - ($a194 * ($sdg3-$sdg1));
  $z194_2 = $sdg1 + ($a194 * ($sdg3-$sdg1));
  $z194 = ($z194_1+$z194_2)/2;

  $a195 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z195_1 = $sdg3 - ($a195 * ($sdg3-$sdg1));
  $z195_2 = $sdg1 + ($a195 * ($sdg3-$sdg1));
  $z195 = ($z195_1+$z195_2)/2;

  $a196 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z196 = $tl3 - ($a196 * ($tl3-$tl2));

  $a197 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z197_1 = $sdg3 - ($a197 * ($sdg3-$sdg1));
  $z197_2 = $sdg1 + ($a197 * ($sdg3-$sdg1));
  $z197 = ($z197_1+$z197_2)/2;

  $a198 = min($u_muda,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z198_1 = $sdg3 - ($a198 * ($sdg3-$sdg1));
  $z198_2 = $sdg1 + ($a198 * ($sdg3-$sdg1));
  $z198 = ($z198_1+$z198_2)/2;


  $a199 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z199 = $tl3 - ($a199 * ($tl3-$tl2));

  $a200 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z200 = $tl3 - ($a200 * ($tl3-$tl2));

  $a201 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z201 = $tl3 - ($a201 * ($tl3-$tl2));

  $a202 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z202 = $tl3 - ($a202 * ($tl3-$tl2));

  $a203 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
    $z203_1 = $sdg3 - ($a203 * ($sdg3-$sdg1));
  $z203_2 = $sdg1 + ($a203 * ($sdg3-$sdg1));
  $z203 = ($z203_1+$z203_2)/2;
  
  $a204 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
    $z204_1 = $sdg3 - ($a204 * ($sdg3-$sdg1));
  $z204_2 = $sdg1 + ($a204 * ($sdg3-$sdg1));
  $z204 = ($z204_1+$z204_2)/2;

  $a205 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z205 = $tl3 - ($a205 * ($tl3-$tl2));

  $a206 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
    $z206_1 = $sdg3 - ($a206 * ($sdg3-$sdg1));
  $z206_2 = $sdg1 + ($a206 * ($sdg3-$sdg1));
  $z206 = ($z206_1+$z206_2)/2;
  
  $a207 = min($u_muda,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z207 = $sl1 + ($a207 * ($sl2-$sl1));


  $a208 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z208 = $tl3 - ($a208 * ($tl3-$tl2));

  $a209 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z209 = $tl3 - ($a209 * ($tl3-$tl2));

  $a210 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z210 = $tl3 - ($a210 * ($tl3-$tl2));

  $a211 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z211 = $tl3 - ($a211 * ($tl3-$tl2));

  $a212 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
    $z213_1 = $sdg3 - ($a213 * ($sdg3-$sdg1));
  $z213_2 = $sdg1 + ($a213 * ($sdg3-$sdg1));
  $z213 = ($z213_1+$z213_2)/2;

  $a213 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z213 = $sl1 + ($a213 * ($sl2-$sl1));

  $a214 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z214 = $tl3 - ($a214 * ($tl3-$tl2));

  $a215 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z215 = $sl1 + ($a216 * ($sl2-$sl1));

  $a216 = min($u_muda,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z216 = $sl1 + ($a216 * ($sl2-$sl1));

  //jarak jauh

  $a217 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z217 = $sl1 + ($a217 * ($sl2-$sl1));

  $a218 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z218 = $sl1 + ($a218 * ($sl2-$sl1));

  $a219 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z219 = $tl3 - ($a219 * ($tl3-$tl2));

  $a220 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z220 = $tl3 - ($a220 * ($tl3-$tl2));

  $a221 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z221 = $tl3 - ($a221 * ($tl3-$tl2));

  $a222 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z222 = $tl3 - ($a222 * ($tl3-$tl2));

  $a223 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z223 = $tl3 - ($a223 * ($tl3-$tl2));

  $a224 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z224 = $tl3 - ($a224 * ($tl3-$tl2));

  $a225 = min($u_muda,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z225 = $tl3 - ($a225 * ($tl3-$tl2));


  $a226 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z226 = $tl3 - ($a226 * ($tl3-$tl2));

  $a227 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z227 = $tl3 - ($a227 * ($tl3-$tl2));

  $a228 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z228 = $tl3 - ($a228 * ($tl3-$tl2));

  $a229 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z229 = $tl3 - ($a229 * ($tl3-$tl2));

  $a230 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
    $z230_1 = $sdg3 - ($a230 * ($sdg3-$sdg1));
  $z230_2 = $sdg1 + ($a230 * ($sdg3-$sdg1));
  $z230 = ($z230_1+$z230_2)/2;

  $a231 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
  $z231 = $sl1 + ($a231 * ($sl2-$sl1));

  $a232 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z232 = $tl3 - ($a232 * ($tl3-$tl2));

  $a233 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
    $z233_1 = $sdg3 - ($a233 * ($sdg3-$sdg1));
  $z233_2 = $sdg1 + ($a233 * ($sdg3-$sdg1));
  $z233 = ($z233_1+$z233_2)/2;

  $a234 = min($u_muda,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z234 = $sl1 + ($a234 * ($sl2-$sl1));


  $a235 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z235 = $tl3 - ($a235 * ($tl3-$tl2));

  $a236 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z236 = $tl3 - ($a236 * ($tl3-$tl2));

  $a237 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z237 = $tl3 - ($a237 * ($tl3-$tl2));

  $a238 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z238 = $tl3 - ($a238 * ($tl3-$tl2));

  $a239 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
    $z239_1 = $sdg3 - ($a239 * ($sdg3-$sdg1));
  $z239_2 = $sdg1 + ($a239 * ($sdg3-$sdg1));
  $z239 = ($z239_1+$z239_2)/2;

  $a240 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z240 = $sl1 + ($a240 * ($sl2-$sl1));;

  $a241 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z241 = $tl3 - ($a241 * ($tl3-$tl2));

  $a242 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z242 = $sl1 + ($a242 * ($sl2-$sl1));;
  
  $a243 = min($u_muda,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z243 = $sl1 + ($a243 * ($sl2-$sl1));;
  //umur dewasa
////////////////////////////////////////////////////////////////////////////////////////


  $a244 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z244 = $tl3 - ($a244 * ($tl3-$tl2));

  $a245 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z245 = $tl3 - ($a245 * ($tl3-$tl2));

  $a246 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z246 = $tl3 - ($a246 * ($tl3-$tl2));

  $a247 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z247 = $tl3 - ($a247 * ($tl3-$tl2));

  $a248 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
  $z248 = $tl3 - ($a248 * ($tl3-$tl2));

  $a249 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z249 = $tl3 - ($a249 * ($tl3-$tl2));

  $a250 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z250 = $tl3 - ($a250 * ($tl3-$tl2));

  $a251 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z251 = $tl3 - ($a251 * ($tl3-$tl2));

  $a252 = min($u_dewasa,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z252_1 = $sdg3 - ($a252 * ($sdg3-$sdg1));
  $z252_2 = $sdg1 + ($a252 * ($sdg3-$sdg1));
  $z252 = ($z252_1+$z252_2)/2;


  $a253 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z253 = $tl3 - ($a253 * ($tl3-$tl2));

  $a254 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z254 = $tl3 - ($a254 * ($tl3-$tl2));

  $a255 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z255 = $tl3 - ($a255 * ($tl3-$tl2));

  $a256 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z256 = $tl3 - ($a256 * ($tl3-$tl2));

  $a257 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
  $z257 = $sl1 + ($a257 * ($sl2-$sl1));

  $a258 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
  $z258 = $sl1 + ($a258 * ($sl2-$sl1));

  $a259 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z259 = $tl3 - ($a259 * ($tl3-$tl2));

  $a260 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z260 = $sl1 + ($a260 * ($sl2-$sl1));

  $a261 = min($u_dewasa,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z261 = $sl1 + ($a261 * ($sl2-$sl1));


  $a262 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z262 = $tl3 - ($a262 * ($tl3-$tl2));

  $a263 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z263 = $tl3 - ($a263 * ($tl3-$tl2));

  $a264 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z264 = $tl3 - ($a264 * ($tl3-$tl2));

  $a265 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z265 = $tl3 - ($a265 * ($tl3-$tl2));

  $a266 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
  $z266 = $sl1 + ($a266 * ($sl2-$sl1));

  $a267 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z267 = $sl1 + ($a267 * ($sl2-$sl1));

  $a268 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z268 = $tl3 - ($a268 * ($tl3-$tl2));

  $a269 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z269 = $sl1 + ($a269 * ($sl2-$sl1));

  $a270 = min($u_dewasa,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z270 = $sl1 + ($a270 * ($sl2-$sl1));

  //jarak sedang

  $a271 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z271 = $tl3 - ($a271 * ($tl3-$tl2));

  $a272 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z272 = $tl3 - ($a272 * ($tl3-$tl2));

  $a273 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z273 = $tl3 - ($a273 * ($tl3-$tl2));

  $a274 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z274 = $tl3 - ($a274 * ($tl3-$tl2));

  $a275 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
    $z275_1 = $sdg3 - ($a275 * ($sdg3-$sdg1));
  $z275_2 = $sdg1 + ($a275 * ($sdg3-$sdg1));
  $z275 = ($z275_1+$z275_2)/2;

  $a276 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z276_1 = $sdg3 - ($a276 * ($sdg3-$sdg1));
  $z276_2 = $sdg1 + ($a276 * ($sdg3-$sdg1));
  $z276 = ($z276_1+$z276_2)/2;

  $a277 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z277 = $tl3 - ($a277 * ($tl3-$tl2));

  $a278 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z278_1 = $sdg3 - ($a278 * ($sdg3-$sdg1));
  $z278_2 = $sdg1 + ($a278 * ($sdg3-$sdg1));
  $z278 = ($z278_1+$z278_2)/2;

  $a279 = min($u_dewasa,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z279_1 = $sdg3 - ($a279 * ($sdg3-$sdg1));
  $z279_2 = $sdg1 + ($a279 * ($sdg3-$sdg1));
  $z279 = ($z279_1+$z279_2)/2;


  $a280 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z280 = $tl3 - ($a280 * ($tl3-$tl2));

  $a281 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z281 = $tl3 - ($a281 * ($tl3-$tl2));

  $a282 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z282 = $tl3 - ($a282 * ($tl3-$tl2));

  $a283 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z283 = $tl3 - ($a283 * ($tl3-$tl2));

  $a284 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
    $z284_1 = $sdg3 - ($a284 * ($sdg3-$sdg1));
  $z284_2 = $sdg1 + ($a284 * ($sdg3-$sdg1));
  $z284 = ($z284_1+$z284_2)/2;

  $a285 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
    $z285_1 = $sdg3 - ($a285 * ($sdg3-$sdg1));
  $z285_2 = $sdg1 + ($a285 * ($sdg3-$sdg1));
  $z285 = ($z285_1+$z285_2)/2;

  $a286 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z286 = $tl3 - ($a274 * ($tl3-$tl2));

  $a287 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
    $z287_1 = $sdg3 - ($a287 * ($sdg3-$sdg1));
  $z287_2 = $sdg1 + ($a287 * ($sdg3-$sdg1));
  $z287 = ($z287_1+$z287_2)/2;

  $a288 = min($u_dewasa,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z288 = $sl1 + ($a288 * ($sl2-$sl1));


  $a289 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z289 = $tl3 - ($a289 * ($tl3-$tl2));

  $a290 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z290 = $tl3 - ($a290 * ($tl3-$tl2));

  $a291 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z291 = $tl3 - ($a291 * ($tl3-$tl2));

  $a292 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z292 = $tl3 - ($a292 * ($tl3-$tl2));

  $a293 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
    $z293_1 = $sdg3 - ($a293 * ($sdg3-$sdg1));
  $z293_2 = $sdg1 + ($a293 * ($sdg3-$sdg1));
  $z293 = ($z293_1+$z293_2)/2;

  $a294 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z294 = $sl1 + ($a294 * ($sl2-$sl1));

  $a295 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z295 = $tl3 - ($a295 * ($tl3-$tl2));

  $a296 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z296 = $sl1 + ($a296 * ($sl2-$sl1));

  $a297 = min($u_dewasa,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z297 = $sl1 + ($a297 * ($sl2-$sl1));

  //jarak jauh

  $a298 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z298= $tl3 - ($a298 * ($tl3-$tl2));

  $a299 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z299 = $tl3 - ($a299 * ($tl3-$tl2));

  $a300 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z300 = $tl3 - ($a300 * ($tl3-$tl2));

  $a301 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z301 = $tl3 - ($a301 * ($tl3-$tl2));

  $a302 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z302 = $tl3 - ($a302 * ($tl3-$tl2));

  $a303 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z303 = $tl3 - ($a303 * ($tl3-$tl2));

  $a304 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z304 = $tl3 - ($a304 * ($tl3-$tl2));

  $a305 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z305 = $tl3 - ($a305 * ($tl3-$tl2));

  $a306 = min($u_dewasa,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z306 = $tl3 - ($a306 * ($tl3-$tl2));


  $a307 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z307 = $tl3 - ($a307 * ($tl3-$tl2));

  $a308 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z308 = $tl3 - ($a308 * ($tl3-$tl2));

  $a309 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z309 = $tl3 - ($a309 * ($tl3-$tl2));

  $a310 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z310 = $tl3 - ($a310 * ($tl3-$tl2));



  $a311 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
   $z311_1 = $sdg3 - ($a311 * ($sdg3-$sdg1));
  $z311_2 = $sdg1 + ($a311 * ($sdg3-$sdg1));
  $z311 = ($z311_1+$z311_2)/2;

  $a312 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
     $z312_1 = $sdg3 - ($a312 * ($sdg3-$sdg1));
  $z312_2 = $sdg1 + ($a312 * ($sdg3-$sdg1));
  $z312 = ($z312_1+$z312_2)/2;



  $a313 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
    $z312 = $tl3 - ($a312 * ($tl3-$tl2));

  

  $a314 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
    $z314_1 = $sdg3 - ($a314 * ($sdg3-$sdg1));
  $z314_2 = $sdg1 + ($a314 * ($sdg3-$sdg1));
  $z314 = ($z314_1+$z314_2)/2;



  $a315 = min($u_dewasa,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
    $z315 = $sl1 + ($a315 * ($sl2-$sl1));

  $a316 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z316 = $tl3 - ($a316 * ($tl3-$tl2));

  $a317 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z317 = $tl3 - ($a317 * ($tl3-$tl2));

  $a318 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z318 = $tl3 - ($a318 * ($tl3-$tl2));

  $a319 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
    $z319 = $tl3 - ($a319 * ($tl3-$tl2));


  $a320 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
    $z320_1 = $sdg3 - ($a320 * ($sdg3-$sdg1));
  $z320_2 = $sdg1 + ($a320 * ($sdg3-$sdg1));
  $z320 = ($z320_1+$z320_2)/2;

  $a321 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
      $z321_1 = $sdg3 - ($a321 * ($sdg3-$sdg1));
  $z321_2 = $sdg1 + ($a321 * ($sdg3-$sdg1));
  $z321 = ($z321_1+$z321_2)/2;

 

  $a322 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
   $z322 = $tl3 - ($a322 * ($tl3-$tl2));

  $a323 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
    $z323_1 = $sdg3 - ($a323 * ($sdg3-$sdg1));
  $z323_2 = $sdg1 + ($a323 * ($sdg3-$sdg1));
  $z323 = ($z323_1+$z323_2)/2;

  $a324 = min($u_dewasa,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
    $z324_1 = $sdg3 - ($a324 * ($sdg3-$sdg1));
  $z324_2 = $sdg1 + ($a324 * ($sdg3-$sdg1));
  $z324 = ($z324_1+$z324_2)/2;

 

  //pendapatan sedang
  //coyyy

  $a325 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z325 = $tl3 - ($a325 * ($tl3-$tl2));

  $a326 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z326 = $tl3 - ($a326 * ($tl3-$tl2));

  $a327 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z327 = $tl3 - ($a327 * ($tl3-$tl2));

  $a328 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
   $z328 = $tl3 - ($a328 * ($tl3-$tl2));

  $a329= min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
    $z329_1 = $sdg3 - ($a329 * ($sdg3-$sdg1));
  $z329_2 = $sdg1 + ($a329 * ($sdg3-$sdg1));
  $z329 = ($z329_1+$z329_2)/2;

  $a330 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
      $z330_1 = $sdg3 - ($a330 * ($sdg3-$sdg1));
  $z330_2 = $sdg1 + ($a330 * ($sdg3-$sdg1));
  $z330 = ($z330_1+$z330_2)/2;


  $a331 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z331 = $tl3 - ($a331 * ($tl3-$tl2));



  $a332 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z332_1 = $sdg3 - ($a332 * ($sdg3-$sdg1));
  $z332_2 = $sdg1 + ($a332 * ($sdg3-$sdg1));
  $z332 = ($z332_1+$z332_2)/2;

  $a333 = min($u_dewasa,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
      $z333_1 = $sdg3 - ($a333 * ($sdg3-$sdg1));
  $z333_2 = $sdg1 + ($a333 * ($sdg3-$sdg1));
  $z333 = ($z333_1+$z333_2)/2;

  $a334 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z334 = $tl3 - ($a334 * ($tl3-$tl2));

  $a335 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z335 = $tl3 - ($a335 * ($tl3-$tl2));

  $a336 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z336 = $tl3 - ($a336 * ($tl3-$tl2));

  $a337 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z337 = $tl3 - ($a337 * ($tl3-$tl2));

  $a338 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
    $z338_1 = $sdg3 - ($a338 * ($sdg3-$sdg1));
  $z338_2 = $sdg1 + ($a338 * ($sdg3-$sdg1));
  $z338 = ($z338_1+$z338_2)/2;

  $a339 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);

    $z339_1 = $sdg3 - ($a339 * ($sdg3-$sdg1));
  $z339_2 = $sdg1 + ($a339 * ($sdg3-$sdg1));
  $z339 = ($z339_1+$z339_2)/2;

  $a340 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
   $z340 = $tl3 - ($a340 * ($tl3-$tl2));

  $a341 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
      $z341_1 = $sdg3 - ($a341 * ($sdg3-$sdg1));
  $z341_2 = $sdg1 + ($a341 * ($sdg3-$sdg1));
  $z341 = ($z341_1+$z341_2)/2;

  $a342 = min($u_dewasa,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z342 = $sl1 + ($a342 * ($sl2-$sl1));



  $a343 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z343 = $tl3 - ($a343 * ($tl3-$tl2));

  $a344 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z344 = $tl3 - ($a344 * ($tl3-$tl2));

  $a345 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z345 = $tl3 - ($a345 * ($tl3-$tl2));

  $a346 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z346 = $tl3 - ($a346 * ($tl3-$tl2));

  $a347 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
      $z347_1 = $sdg3 - ($a347 * ($sdg3-$sdg1));
  $z347_2 = $sdg1 + ($a347 * ($sdg3-$sdg1));
  $z347 = ($z347_1+$z347_2)/2;

  $a348 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
   $z348 = $sl1 + ($a348 * ($sl2-$sl1));
  
  $a349 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z349 = $tl3 - ($a349 * ($tl3-$tl2));

  $a350 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z350 = $sl1 + ($a350 * ($sl2-$sl1));

  $a351 = min($u_dewasa,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z351 = $sl1 + ($a351 * ($sl2-$sl1));

  //jarak sedang

  $a352 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z352 = $tl3 - ($a352 * ($tl3-$tl2));

  $a353 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z353 = $tl3 - ($a353 * ($tl3-$tl2));

  $a354 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z354 = $tl3 - ($a354 * ($tl3-$tl2));

  $a355 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z355 = $tl3 - ($a355 * ($tl3-$tl2));

  $a356 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
    $z356 = $tl3 - ($a356 * ($tl3-$tl2));

  $a357 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);  
    $z357_1 = $sdg3 - ($a357 * ($sdg3-$sdg1));
  $z357_2 = $sdg1 + ($a357 * ($sdg3-$sdg1));
  $z357 = ($z357_1+$z357_2)/2;
  
  $a358 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z358 = $tl3 - ($a358 * ($tl3-$tl2));
  
  $a359 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z359_1 = $sdg3 - ($a359 * ($sdg3-$sdg1));
  $z359_2 = $sdg1 + ($a359 * ($sdg3-$sdg1));
  $z359 = ($z359_1+$z359_2)/2;

  $a360 = min($u_dewasa,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z360_1 = $sdg3 - ($a360 * ($sdg3-$sdg1));
  $z360_2 = $sdg1 + ($a360 * ($sdg3-$sdg1));
  $z360 = ($z360_1+$z360_2)/2;

  $a361 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z361 = $tl3 - ($a361 * ($tl3-$tl2));

  $a362 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z362 = $tl3 - ($a362 * ($tl3-$tl2));

  $a363 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z363 = $tl3 - ($a363 * ($tl3-$tl2));

  $a364 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z364 = $tl3 - ($a364 * ($tl3-$tl2));


///////////////////////////////////////////////////////////////////////////////////////////////////////////
  $a365 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
      $z365_1 = $sdg3 - ($a365 * ($sdg3-$sdg1));
  $z365_2 = $sdg1 + ($a365 * ($sdg3-$sdg1));
  $z365 = ($z365_1+$z365_2)/2;
  
  $a366 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
    $z366 = $sl1 + ($a365 * ($sl2-$sl1));
  
  $a367 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z367 = $tl3 - ($a367 * ($tl3-$tl2));

  $a368 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
  $z368 = $sl1 + ($a368 * ($sl2-$sl1));

  $a369 = min($u_dewasa,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z369 = $sl1 + ($a369 * ($sl2-$sl1));

  $a370 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z370 = $tl3 - ($a370 * ($tl3-$tl2));

  $a371 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z371 = $tl3 - ($a371 * ($tl3-$tl2));

  $a372 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z372 = $tl3 - ($a372 * ($tl3-$tl2));

  $a373 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z373 = $tl3 - ($a373 * ($tl3-$tl2));

  $a374 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);

    $z374_1 = $sdg3 - ($a374 * ($sdg3-$sdg1));
  $z374_2 = $sdg1 + ($a374 * ($sdg3-$sdg1));
  $z374 = ($z374_1+$z374_2)/2;

  $a375 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
   

  $a376 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z376 = $tl3 - ($a376 * ($tl3-$tl2));


  $a377 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
      $z376_1 = $sdg3 - ($a376 * ($sdg3-$sdg1));
  $z376_2 = $sdg1 + ($a376 * ($sdg3-$sdg1));
  $z376 = ($z376_1+$z376_2)/2;

  $a378 = min($u_dewasa,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z378 = $sl1 + ($a378 * ($sl2-$sl1));
  //jarak jauh

  $a379 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z379 = $tl3 - ($a379 * ($tl3-$tl2));

  $a380 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z380 = $tl3 - ($a380 * ($tl3-$tl2));

  $a381 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z381 = $tl3 - ($a381 * ($tl3-$tl2));

  $a382 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z382 = $tl3 - ($a382 * ($tl3-$tl2));

  $a383 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z383 = $tl3 - ($a383 * ($tl3-$tl2));

  $a384 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z384 = $tl3 - ($a384 * ($tl3-$tl2));

  $a385 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z385 = $tl3 - ($a385 * ($tl3-$tl2));

  $a386 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z386 = $tl3 - ($a386 * ($tl3-$tl2));

  $a387 = min($u_dewasa,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
        $z387_1 = $sdg3 - ($a387 * ($sdg3-$sdg1));
  $z387_2 = $sdg1 + ($a387 * ($sdg3-$sdg1));
  $z387 = ($z387_1+$z387_2)/2;

  $a388 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z388 = $tl3 - ($a388 * ($tl3-$tl2));

  $a389 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z389 = $tl3 - ($a389 * ($tl3-$tl2));

  $a390 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z390 = $tl3 - ($a390 * ($tl3-$tl2));

  $a391 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z391 = $tl3 - ($a391 * ($tl3-$tl2));


  $a392 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
    $z392_1 = $sdg3 - ($a392 * ($sdg3-$sdg1));
  $z392_2 = $sdg1 + ($a392 * ($sdg3-$sdg1));
  $z392 = ($z392_1+$z392_2)/2;

  $a393 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);

    $z393_1 = $sdg3 - ($a393 * ($sdg3-$sdg1));
  $z393_2 = $sdg1 + ($a393 * ($sdg3-$sdg1));
  $z393 = ($z393_1+$z393_2)/2;

  $a394 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z394 = $tl3 - ($a394 * ($tl3-$tl2));

  $a395 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
    $z395_1 = $sdg3 - ($a395 * ($sdg3-$sdg1));
  $z395_2 = $sdg1 + ($a395 * ($sdg3-$sdg1));
  $z395 = ($z395_1+$z395_2)/2;

  $a396 = min($u_dewasa,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
      $z396_1 = $sdg3 - ($a396 * ($sdg3-$sdg1));
  $z396_2 = $sdg1 + ($a396 * ($sdg3-$sdg1));
  $z396 = ($z396_1+$z396_2)/2;

  $a397 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z397 = $tl3 - ($a397 * ($tl3-$tl2));

  $a398 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z398 = $tl3 - ($a398 * ($tl3-$tl2));

  $a399 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z399 = $tl3 - ($a399 * ($tl3-$tl2));

  $a400 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
    $z400 = $tl3 - ($a400 * ($tl3-$tl2));


  $a401 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
    $z401_1 = $sdg3 - ($a401 * ($sdg3-$sdg1));
  $z401_2 = $sdg1 + ($a401 * ($sdg3-$sdg1));
  $z401 = ($z401_1+$z401_2)/2;

  $a402 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);

    $z402_1 = $sdg3 - ($a402 * ($sdg3-$sdg1));
  $z402_2 = $sdg1 + ($a402 * ($sdg3-$sdg1));
  $z402 = ($z402_1+$z402_2)/2;


  $a403 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z403 = $tl3 - ($a403 * ($tl3-$tl2));

  $a404 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
      $z404_1 = $sdg3 - ($a404 * ($sdg3-$sdg1));
  $z404_2 = $sdg1 + ($a404 * ($sdg3-$sdg1));
  $z404 = ($z404_1+$z404_2)/2;

  $a405 = min($u_dewasa,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z405 = $sl1 + ($a405 * ($sl2-$sl1));



  //pendapatan besar

  $a406 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z406 = $tl3 - ($a406 * ($tl3-$tl2));

  $a407 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z407 = $tl3 - ($a407 * ($tl3-$tl2));

  $a408 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z408 = $tl3 - ($a408 * ($tl3-$tl2));

  $a409 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z409 = $tl3 - ($a409 * ($tl3-$tl2));

  $a410 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
    $z410_1 = $sdg3 - ($a410 * ($sdg3-$sdg1));
  $z410_2 = $sdg1 + ($a410 * ($sdg3-$sdg1));
  $z410 = ($z410_1+$z410_2)/2;

  $a411 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
      $z411_1 = $sdg3 - ($a411 * ($sdg3-$sdg1));
  $z411_2 = $sdg1 + ($a411 * ($sdg3-$sdg1));
  $z411 = ($z411_1+$z411_2)/2;

  $a412 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z412 = $tl3 - ($a412 * ($tl3-$tl2));

  $a413 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z413_1 = $sdg3 - ($a413 * ($sdg3-$sdg1));
  $z413_2 = $sdg1 + ($a413 * ($sdg3-$sdg1));
  $z413 = ($z413_1+$z413_2)/2;

  $a414 = min($u_dewasa,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z414_1 = $sdg3 - ($a414 * ($sdg3-$sdg1));
  $z414_2 = $sdg1 + ($a414 * ($sdg3-$sdg1));
  $z414 = ($z414_1+$z414_2)/2;


  $a415 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z415 = $tl3 - ($a415 * ($tl3-$tl2));

  $a416 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z416 = $tl3 - ($a416 * ($tl3-$tl2));

  $a417 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z417 = $tl3 - ($a417 * ($tl3-$tl2));

  $a418 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z418 = $tl3 - ($a418 * ($tl3-$tl2));

  $a419 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
      $z419_1 = $sdg3 - ($a419 * ($sdg3-$sdg1));
  $z419_2 = $sdg1 + ($a419 * ($sdg3-$sdg1));
  $z419 = ($z419_1+$z419_2)/2;

  $a420 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
  $z420 = $sl1 + ($a420 * ($sl2-$sl1));

  $a421 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
    $z421 = $tl3 - ($a421 * ($tl3-$tl2));

  $a422 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z422 = $sl1 + ($a422 * ($sl2-$sl1));

  $a423 = min($u_dewasa,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z423 = $sl1 + ($a423 * ($sl2-$sl1));


  $a424 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z424 = $tl3 - ($a424 * ($tl3-$tl2));

  $a425 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z425 = $tl3 - ($a425 * ($tl3-$tl2));

  $a426 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z426 = $tl3 - ($a426 * ($tl3-$tl2));

  $a427 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z427 = $tl3 - ($a427 * ($tl3-$tl2));

  $a428 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
  $z428 = $sl1 + ($a428 * ($sl2-$sl1));

  $a429 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z429 = $sl1 + ($a429 * ($sl2-$sl1));

  $a430 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z430 = $tl3 - ($a431 * ($tl3-$tl2));

 

  $a431 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z431 = $sl1 + ($a431 * ($sl2-$sl1));
  
  $a432 = min($u_dewasa,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
   $z432 = $sl1 + ($a432 * ($sl2-$sl1));

  //jarak sedang

  $a433 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z433 = $tl3 - ($a433 * ($tl3-$tl2));

  $a434 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z434 = $tl3 - ($a434 * ($tl3-$tl2));

  $a435 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z435 = $tl3 - ($a435 * ($tl3-$tl2));

  $a436 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z436 = $tl3 - ($a436 * ($tl3-$tl2));

  $a437 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
    $z437_1 = $sdg3 - ($a437 * ($sdg3-$sdg1));
  $z437_2 = $sdg1 + ($a437 * ($sdg3-$sdg1));
  $z437 = ($z437_1+$z437_2)/2;

  $a438 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
      $z438_1 = $sdg3 - ($a438 * ($sdg3-$sdg1));
  $z438_2 = $sdg1 + ($a438 * ($sdg3-$sdg1));
  $z438 = ($z438_1+$z438_2)/2;

  $a439 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z439 = $tl3 - ($a439 * ($tl3-$tl2));

  $a440 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z440_1 = $sdg3 - ($a440 * ($sdg3-$sdg1));
  $z440_2 = $sdg1 + ($a440 * ($sdg3-$sdg1));
  $z440 = ($z440_1+$z440_2)/2;

  $a441 = min($u_dewasa,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
      $z441_1 = $sdg3 - ($a441 * ($sdg3-$sdg1));
  $z441_2 = $sdg1 + ($a441 * ($sdg3-$sdg1));
  $z441 = ($z441_1+$z441_2)/2;


  $a442 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z442 = $tl3 - ($a442 * ($tl3-$tl2));

  $a443 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z443 = $tl3 - ($a443 * ($tl3-$tl2));

  $a444 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z444 = $tl3 - ($a444 * ($tl3-$tl2));

  $a445 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z445 = $tl3 - ($a445 * ($tl3-$tl2));


  $a446 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
    $z446_1 = $sdg3 - ($a446 * ($sdg3-$sdg1));
  $z446_2 = $sdg1 + ($a446 * ($sdg3-$sdg1));
  $z446 = ($z446_1+$z446_2)/2;

  $a447 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
      $z447_1 = $sdg3 - ($a447 * ($sdg3-$sdg1));
  $z447_2 = $sdg1 + ($a447 * ($sdg3-$sdg1));
  $z447 = ($z447_1+$z447_2)/2;

  $a448 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z448 = $tl3 - ($a448 * ($tl3-$tl2));

  $a449 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
      $z449_1 = $sdg3 - ($a449 * ($sdg3-$sdg1));
  $z449_2 = $sdg1 + ($a449 * ($sdg3-$sdg1));
  $z449 = ($z449_1+$z449_2)/2;

  $a450 = min($u_dewasa,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z450 = $sl1 + ($a450 * ($sl2-$sl1));


  $a451 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z451 = $tl3 - ($a451 * ($tl3-$tl2));

  $a452 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z452 = $tl3 - ($a452 * ($tl3-$tl2));

  $a453 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z453 = $tl3 - ($a453 * ($tl3-$tl2));

  $a454 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
   $z454 = $tl3 - ($a454 * ($tl3-$tl2));

  $a455 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
    $z455_1 = $sdg3 - ($a455 * ($sdg3-$sdg1));
  $z455_2 = $sdg1 + ($a455 * ($sdg3-$sdg1));
  $z455 = ($z455_1+$z455_2)/2;

  $a456 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z456 = $sl1 + ($a456 * ($sl2-$sl1));

  $a457 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z457 = $tl3 - ($a457 * ($tl3-$tl2));

  $a458 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z458 = $sl1 + ($a458 * ($sl2-$sl1));

  $a459 = min($u_dewasa,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z459 = $sl1 + ($a459 * ($sl2-$sl1));

  //jarak jauh

  $a460 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z460 = $tl3 - ($a460 * ($tl3-$tl2));

  $a461 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z461 = $tl3 - ($a461 * ($tl3-$tl2));

  $a462 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z462 = $tl3 - ($a462 * ($tl3-$tl2));

  $a463 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z463 = $tl3 - ($a463 * ($tl3-$tl2));

  $a464 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z464 = $tl3 - ($a464 * ($tl3-$tl2));
  
  $a465 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z465 = $tl3 - ($a465 * ($tl3-$tl2));
  
  $a466 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z466 = $tl3 - ($a466 * ($tl3-$tl2));
  
  $a467 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z467 = $tl3 - ($a467 * ($tl3-$tl2));
  
  $a468 = min($u_dewasa,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z468 = $tl3 - ($a468 * ($tl3-$tl2));


  $a469 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z469 = $tl3 - ($a469 * ($tl3-$tl2));
  
  $a470 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z470 = $tl3 - ($a470 * ($tl3-$tl2));
  
  $a471 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z471 = $tl3 - ($a471 * ($tl3-$tl2));
  
  $a472 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z472 = $tl3 - ($a472 * ($tl3-$tl2));
  
  $a473 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
    $z473_1 = $sdg3 - ($a473 * ($sdg3-$sdg1));
  $z473_2 = $sdg1 + ($a473 * ($sdg3-$sdg1));
  $z473 = ($z473_1+$z473_2)/2;

  $a474 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
    $z474_1 = $sdg3 - ($a474 * ($sdg3-$sdg1));
  $z474_2 = $sdg1 + ($a474 * ($sdg3-$sdg1));
  $z474 = ($z474_1+$z474_2)/2;

  $a475 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z475 = $tl3 - ($a475 * ($tl3-$tl2));

  $a476 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
    $z476_1 = $sdg3 - ($a476 * ($sdg3-$sdg1));
  $z476_2 = $sdg1 + ($a476 * ($sdg3-$sdg1));
  $z476 = ($z476_1+$z476_2)/2;

  $a477 = min($u_dewasa,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
    $z477_1 = $sdg3 - ($a477 * ($sdg3-$sdg1));
  $z477_2 = $sdg1 + ($a477 * ($sdg3-$sdg1));
  $z477 = ($z477_1+$z477_2)/2;


  $a478 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z478 = $tl3 - ($a478 * ($tl3-$tl2));

  $a479 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z479 = $tl3 - ($a479 * ($tl3-$tl2));

  $a480 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z480 = $tl3 - ($a480 * ($tl3-$tl2));

  $a481 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z481 = $tl3 - ($a481 * ($tl3-$tl2));

  $a482 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
    $z482_1 = $sdg3 - ($a482 * ($sdg3-$sdg1));
  $z482_2 = $sdg1 + ($a482 * ($sdg3-$sdg1));
  $z482 = ($z482_1+$z482_2)/2;

  $a483 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
    $z483_1 = $sdg3 - ($a483 * ($sdg3-$sdg1));
  $z483_2 = $sdg1 + ($a483 * ($sdg3-$sdg1));
  $z483 = ($z483_1+$z483_2)/2;

  $a484 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z484 = $tl3 - ($a484 * ($tl3-$tl2));

  $a485 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
    $z485_1 = $sdg3 - ($a485 * ($sdg3-$sdg1));
  $z485_2 = $sdg1 + ($a485 * ($sdg3-$sdg1));
  $z485 = ($z485_1+$z485_2)/2;

  $a486 = min($u_dewasa,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z486 = $sl1 + ($a486 * ($sl2-$sl1));

  ///////////////////////////////////////////////////////////////////////////////
  //umur tua

  $a487 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z487 = $tl3 - ($a487 * ($tl3-$tl2));

  $a488 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z488 = $tl3 - ($a488 * ($tl3-$tl2));

  $a489 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z489 = $tl3 - ($a489 * ($tl3-$tl2));

  $a490 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z490 = $tl3 - ($a490 * ($tl3-$tl2));

  $a491 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
  $z491 = $tl3 - ($a491 * ($tl3-$tl2));

  $a492 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z492 = $tl3 - ($a492 * ($tl3-$tl2));

  $a493 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z493 = $tl3 - ($a493 * ($tl3-$tl2));

  $a494 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z493 = $tl3 - ($a494 * ($tl3-$tl2));

  $a495 = min($u_tua,$p_kecil,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z495 = $tl3 - ($a495 * ($tl3-$tl2));


  $a496 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z496 = $tl3 - ($a496 * ($tl3-$tl2));

  $a497 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z497 = $tl3 - ($a497 * ($tl3-$tl2));

  $a498 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z498 = $tl3 - ($a498 * ($tl3-$tl2));

  $a499 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z499 = $tl3 - ($a499 * ($tl3-$tl2));

  $a500 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
    $z500_1 = $sdg3 - ($a500 * ($sdg3-$sdg1));
  $z500_2 = $sdg1 + ($a500 * ($sdg3-$sdg1));
  $z500 = ($z500_1+$z500_2)/2;

  $a501 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
    $z501_1 = $sdg3 - ($a501 * ($sdg3-$sdg1));
  $z501_2 = $sdg1 + ($a501 * ($sdg3-$sdg1));
  $z501 = ($z501_1+$z501_2)/2;

  $a502 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z502 = $tl3 - ($a502 * ($tl3-$tl2));

  $a503 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
    $z503_1 = $sdg3 - ($a503 * ($sdg3-$sdg1));
  $z503_2 = $sdg1 + ($a503 * ($sdg3-$sdg1));
  $z503 = ($z503_1+$z503_2)/2;

  $a504 = min($u_tua,$p_kecil,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z504 = $sl1 + ($a504 * ($sl2-$sl1));

  $a505 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z505 = $tl3 - ($a505 * ($tl3-$tl2));

  $a506 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z506 = $tl3 - ($a506 * ($tl3-$tl2));

  $a507 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z507 = $tl3 - ($a507 * ($tl3-$tl2));

  $a508 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z508 = $tl3 - ($a508 * ($tl3-$tl2));

  $a509 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
    $z509_1 = $sdg3 - ($a509 * ($sdg3-$sdg1));
  $z509_2 = $sdg1 + ($a509 * ($sdg3-$sdg1));
  $z509 = ($z509_1+$z509_2)/2;

  $a510 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
    $z510_1 = $sdg3 - ($a510 * ($sdg3-$sdg1));
  $z510_2 = $sdg1 + ($a510 * ($sdg3-$sdg1));
  $z510 = ($z510_1+$z510_2)/2;

  $a511 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z511 = $tl3 - ($a511 * ($tl3-$tl2));

  $a512 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
    $z512_1 = $sdg3 - ($a512 * ($sdg3-$sdg1));
  $z512_2 = $sdg1 + ($a512 * ($sdg3-$sdg1));
  $z512 = ($z512_1+$z512_2)/2;

  $a513 = min($u_tua,$p_kecil,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z513 = $sl1 + ($a513 * ($sl2-$sl1));

  //jarak sedang

  $a514 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z514 = $tl3 - ($a514 * ($tl3-$tl2));

  $a515 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z515 = $tl3 - ($a515 * ($tl3-$tl2));

  $a516 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z516 = $tl3 - ($a517 * ($tl3-$tl2));

  $a517 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z517 = $tl3 - ($a517 * ($tl3-$tl2));

  $a518 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
    $z518_1 = $sdg3 - ($a518 * ($sdg3-$sdg1));
  $z518_2 = $sdg1 + ($a518 * ($sdg3-$sdg1));
  $z518 = ($z518_1+$z518_2)/2;

  $a519 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z519_1 = $sdg3 - ($a519 * ($sdg3-$sdg1));
  $z519_2 = $sdg1 + ($a519 * ($sdg3-$sdg1));
  $z519 = ($z519_1+$z519_2)/2;

  $a520 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z520 = $tl3 - ($a520 * ($tl3-$tl2));

  $a521 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
    $z521_1 = $sdg3 - ($a521 * ($sdg3-$sdg1));
  $z521_2 = $sdg1 + ($a521 * ($sdg3-$sdg1));
  $z521 = ($z521_1+$z521_2)/2;

  $a522 = min($u_tua,$p_kecil,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z522_1 = $sdg3 - ($a522 * ($sdg3-$sdg1));
  $z522_2 = $sdg1 + ($a522 * ($sdg3-$sdg1));
  $z522 = ($z522_1+$z522_2)/2;


  $a523 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z523 = $tl3 - ($a523 * ($tl3-$tl2));

  $a524 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z524 = $tl3 - ($a524 * ($tl3-$tl2));

  $a525 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z525 = $tl3 - ($a525 * ($tl3-$tl2));

  $a526 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z526 = $tl3 - ($a526 * ($tl3-$tl2));

  $a527 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
    $z527_1 = $sdg3 - ($a527 * ($sdg3-$sdg1));
  $z527_2 = $sdg1 + ($a527 * ($sdg3-$sdg1));
  $z527 = ($z527_1+$z527_2)/2;

  $a528 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
    $z528_1 = $sdg3 - ($a528 * ($sdg3-$sdg1));
  $z528_2 = $sdg1 + ($a528 * ($sdg3-$sdg1));
  $z528 = ($z528_1+$z528_2)/2;

  $a529 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z529 = $tl3 - ($a529 * ($tl3-$tl2));

  $a530 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
    $z530_1 = $sdg3 - ($a530 * ($sdg3-$sdg1));
  $z530_2 = $sdg1 + ($a530 * ($sdg3-$sdg1));
  $z530 = ($z530_1+$z530_2)/2;

  $a531 = min($u_tua,$p_kecil,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z531 = $sl1 + ($a531 * ($sl2-$sl1));


  $a532 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z532 = $tl3 - ($a532 * ($tl3-$tl2));

  $a533 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z533 = $tl3 - ($a533 * ($tl3-$tl2));

  $a534 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z534 = $tl3 - ($a354 * ($tl3-$tl2));

  $a535 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z535 = $tl3 - ($a535 * ($tl3-$tl2));

  $a536 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
    $z536_1 = $sdg3 - ($a536 * ($sdg3-$sdg1));
  $z536_2 = $sdg1 + ($a536 * ($sdg3-$sdg1));
  $z536 = ($z536_1+$z536_2)/2;

  $a537 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
    $z537_1 = $sdg3 - ($a537 * ($sdg3-$sdg1));
  $z537_2 = $sdg1 + ($a537 * ($sdg3-$sdg1));
  $z537 = ($z537_1+$z537_2)/2;

  $a538 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z538 = $tl3 - ($a538 * ($tl3-$tl2));

  $a539 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
    $z539_1 = $sdg3 - ($a539 * ($sdg3-$sdg1));
  $z539_2 = $sdg1 + ($a539 * ($sdg3-$sdg1));
  $z539 = ($z539_1+$z539_2)/2;

  $a540 = min($u_tua,$p_kecil,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z540 = $sl1 + ($a540 * ($sl2-$sl1));
  //jarak jauh

  $a541 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z541 = $tl3 - ($a541 * ($tl3-$tl2));

  $a542 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z542 = $tl3 - ($a542 * ($tl3-$tl2));

  $a543 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z543 = $tl3 - ($a543 * ($tl3-$tl2));

  $a544 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z544 = $tl3 - ($a544 * ($tl3-$tl2));

  $a545 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z545 = $tl3 - ($a545 * ($tl3-$tl2));

  $a546 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z546 = $tl3 - ($a546 * ($tl3-$tl2));

  $a547 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z547 = $tl3 - ($a547 * ($tl3-$tl2));

  $a548 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z548 = $tl3 - ($a548 * ($tl3-$tl2));

  $a549 = min($u_tua,$p_kecil,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
   $z549_1 = $sdg3 - ($a549 * ($sdg3-$sdg1));
  $z549_2 = $sdg1 + ($a549 * ($sdg3-$sdg1));
  $z549 = ($z549_1+$z549_2)/2;


  $a550 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
   $z550 = $tl3 - ($a550 * ($tl3-$tl2));

  $a551 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z551 = $tl3 - ($a551 * ($tl3-$tl2));

  $a552 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z552 = $tl3 - ($a552 * ($tl3-$tl2));

  $a553 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z553 = $tl3 - ($a553 * ($tl3-$tl2));

  $a554 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
      $z554_1 = $sdg3 - ($a554 * ($sdg3-$sdg1));
  $z554_2 = $sdg1 + ($a554 * ($sdg3-$sdg1));
  $z554 = ($z554_1+$z554_2)/2;

  $a555 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
        $z555_1 = $sdg3 - ($a555 * ($sdg3-$sdg1));
  $z555_2 = $sdg1 + ($a555 * ($sdg3-$sdg1));
  $z555 = ($z555_1+$z555_2)/2;

  $a556 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z556 = $tl3 - ($a556 * ($tl3-$tl2));

  $a557 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
          $z557_1 = $sdg3 - ($a557 * ($sdg3-$sdg1));
  $z557_2 = $sdg1 + ($a557 * ($sdg3-$sdg1));
  $z557 = ($z557_1+$z557_2)/2;


  $a558 = min($u_tua,$p_kecil,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
          $z558_1 = $sdg3 - ($a558 * ($sdg3-$sdg1));
  $z558_2 = $sdg1 + ($a558 * ($sdg3-$sdg1));
  $z558 = ($z558_1+$z558_2)/2;


  $a559 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z559 = $tl3 - ($a559 * ($tl3-$tl2));

  $a560 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z560 = $tl3 - ($a560 * ($tl3-$tl2));

  $a561 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z561 = $tl3 - ($a561 * ($tl3-$tl2));

  $a562 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z562 = $tl3 - ($a562 * ($tl3-$tl2));

  $a563 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
      $z563_1 = $sdg3 - ($a563 * ($sdg3-$sdg1));
  $z563_2 = $sdg1 + ($a563 * ($sdg3-$sdg1));
  $z563 = ($z563_1+$z563_2)/2;

  $a564 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
    $z564_1 = $sdg3 - ($a564 * ($sdg3-$sdg1));
  $z564_2 = $sdg1 + ($a564 * ($sdg3-$sdg1));
  $z564 = ($z564_1+$z564_2)/2;

  $a565 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z566 = $tl3 - ($a566 * ($tl3-$tl2));

  $a566 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
      $z566_1 = $sdg3 - ($a566 * ($sdg3-$sdg1));
  $z566_2 = $sdg1 + ($a566 * ($sdg3-$sdg1));
  $z566 = ($z566_1+$z566_2)/2;

  $a567 = min($u_tua,$p_kecil,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z567 = $sl1 + ($a567 * ($sl2-$sl1));



  //pendapatan sedang
  //coyyy

  $a568 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z568 = $tl3 - ($a568 * ($tl3-$tl2));

  $a569 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z569 = $tl3 - ($a569 * ($tl3-$tl2));

  $a570 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z570 = $tl3 - ($a570 * ($tl3-$tl2));

  $a571 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z571 = $tl3 - ($a571 * ($tl3-$tl2));

  $a572 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
      $z572_1 = $sdg3 - ($a572 * ($sdg3-$sdg1));
  $z572_2 = $sdg1 + ($a572 * ($sdg3-$sdg1));
  $z572 = ($z572_1+$z572_2)/2;

  $a573 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z573_1 = $sdg3 - ($a573 * ($sdg3-$sdg1));
  $z573_2 = $sdg1 + ($a573 * ($sdg3-$sdg1));
  $z573 = ($z573_1+$z573_2)/2;

  $a574 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z574 = $tl3 - ($a574 * ($tl3-$tl2));

  $a575 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
   $z575_1 = $sdg3 - ($a575 * ($sdg3-$sdg1));
  $z575_2 = $sdg1 + ($a575 * ($sdg3-$sdg1));
  $z575 = ($z575_1+$z575_2)/2; 

  $a576 = min($u_tua,$p_sedang,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z576_1 = $sdg3 - ($a576 * ($sdg3-$sdg1));
  $z576_2 = $sdg1 + ($a576 * ($sdg3-$sdg1));
  $z576 = ($z576_1+$z576_2)/2;


  $a577 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z577 = $tl3 - ($a577 * ($tl3-$tl2));

  $a578 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z578 = $tl3 - ($a578 * ($tl3-$tl2));

  $a579 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z579 = $tl3 - ($a579 * ($tl3-$tl2));

  $a580 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z580 = $tl3 - ($a580 * ($tl3-$tl2));

  $a581 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
   $z581_1 = $sdg3 - ($a581 * ($sdg3-$sdg1));
  $z581_2 = $sdg1 + ($a581 * ($sdg3-$sdg1));
  $z581 = ($z581_1+$z581_2)/2;

  $a582 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
   $z582 = $sl1 + ($a582 * ($sl2-$sl1));

  $a583 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z583 = $tl3 - ($a583 * ($tl3-$tl2));

  $a584 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z584 = $sl1 + ($a584 * ($sl2-$sl1));


  $a585 = min($u_tua,$p_sedang,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z585 = $sl1 + ($a585 * ($sl2-$sl1));

  $a586 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z586 = $tl3 - ($a586 * ($tl3-$tl2));


  $a587 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z587 = $tl3 - ($a587 * ($tl3-$tl2));

  $a588 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z588 = $tl3 - ($a588 * ($tl3-$tl2));

  $a589 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z589 = $tl3 - ($a589 * ($tl3-$tl2));

  $a590 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
  $z590 = $sl1 + ($a590 * ($sl2-$sl1));

  $a591 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z591 = $sl1 + ($a591 * ($sl2-$sl1));

  $a592 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z592 = $tl3 - ($a592 * ($tl3-$tl2));

  $a593 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z593 = $sl1 + ($a593 * ($sl2-$sl1));

  $a594 = min($u_tua,$p_sedang,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z594 = $sl1 + ($a594 * ($sl2-$sl1));

  //jarak sedang

  $a595 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z595 = $tl3 - ($a595 * ($tl3-$tl2));

  $a596 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z596 = $tl3 - ($a596 * ($tl3-$tl2));

  $a597 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z597 = $tl3 - ($a597 * ($tl3-$tl2));

  $a598 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
    $z600_1 = $sdg3 - ($a600 * ($sdg3-$sdg1));
  $z600_2 = $sdg1 + ($a600 * ($sdg3-$sdg1));
  $z600 = ($z600_1+$z600_2)/2;

  $a599 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
    $z599_1 = $sdg3 - ($a599 * ($sdg3-$sdg1));
  $z599_2 = $sdg1 + ($a599 * ($sdg3-$sdg1));
  $z599 = ($z599_1+$z599_2)/2;

  $a600 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
    $z500_1 = $sdg3 - ($a500 * ($sdg3-$sdg1));
  $z500_2 = $sdg1 + ($a500 * ($sdg3-$sdg1));
  $z500 = ($z500_1+$z500_2)/2;

  $a601 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z601 = $tl3 - ($a601 * ($tl3-$tl2));

  $a602 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
      $z602_1 = $sdg3 - ($a602 * ($sdg3-$sdg1));
  $z602_2 = $sdg1 + ($a602 * ($sdg3-$sdg1));
  $z602 = ($z602_1+$z602_2)/2;

  $a603 = min($u_tua,$p_sedang,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
    $z603_1 = $sdg3 - ($a603 * ($sdg3-$sdg1));
  $z603_2 = $sdg1 + ($a603 * ($sdg3-$sdg1));
  $z603 = ($z603_1+$z603_2)/2;


  $a604 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z604 = $tl3 - ($a604 * ($tl3-$tl2));


  $a605 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z605 = $tl3 - ($a605 * ($tl3-$tl2));

  $a606 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z606 = $tl3 - ($a606 * ($tl3-$tl2));

  $a607 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z607 = $tl3 - ($a607 * ($tl3-$tl2));

  $a608 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
  $z608 = $sl1 + ($a608 * ($sl2-$sl1));

  $a609 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
  $z609 = $sl1 + ($a609 * ($sl2-$sl1));

  $a610 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z610 = $tl3 - ($a610 * ($tl3-$tl2));

  $a611 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
  $z611 = $sl1 + ($a611 * ($sl2-$sl1));

  $a612 = min($u_tua,$p_sedang,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z612 = $sl1 + ($a612 * ($sl2-$sl1));


  $a613 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z613 = $tl3 - ($a613 * ($tl3-$tl2));

  $a614 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z614 = $tl3 - ($a614 * ($tl3-$tl2));

  $a615 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z615 = $tl3 - ($a615 * ($tl3-$tl2));

  $a616 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z616 = $tl3 - ($a616 * ($tl3-$tl2));

  $a617 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
  $z617 = $sl1 + ($a617 * ($sl2-$sl1));

  $a618 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z618 = $sl1 + ($a618 * ($sl2-$sl1));

  $a619 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z619 = $tl3 - ($a619 * ($tl3-$tl2));

  $a620 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z620 = $sl1 + ($a620 * ($sl2-$sl1));

  $a621 = min($u_tua,$p_sedang,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z621 = $sl1 + ($a621 * ($sl2-$sl1));

  //jarak jauh

  $a622 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z622 = $tl3 - ($a622 * ($tl3-$tl2));

  $a623 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z623 = $tl3 - ($a623 * ($tl3-$tl2));

  $a624 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z624 = $tl3 - ($a624 * ($tl3-$tl2));

  $a625 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z625 = $tl3 - ($a625 * ($tl3-$tl2));

  $a626 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z626 = $sl1 + ($a626 * ($sl2-$sl1));

  $a627 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z627 = $sl1 + ($a627 * ($sl2-$sl1));

  $a628 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z628 = $tl3 - ($a628 * ($tl3-$tl2));

  $a629 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
      $z629_1 = $sdg3 - ($a629 * ($sdg3-$sdg1));
  $z629_2 = $sdg1 + ($a629 * ($sdg3-$sdg1));
  $z629 = ($z603_1+$z629_2)/2;

  $a630 = min($u_tua,$p_sedang,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
      $z630_1 = $sdg3 - ($a630 * ($sdg3-$sdg1));
  $z630_2 = $sdg1 + ($a630 * ($sdg3-$sdg1));
  $z630 = ($z603_1+$z630_2)/2;


  $a631 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z631 = $tl3 - ($a631 * ($tl3-$tl2));

  $a632 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
  $z632 = $tl3 - ($a632 * ($tl3-$tl2));

  $a633 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z633 = $tl3 - ($a633 * ($tl3-$tl2));

  $a634 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z634 = $tl3 - ($a634 * ($tl3-$tl2));

  $a635 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
  $z635 = $sl1 + ($a635 * ($sl2-$sl1));

  $a636 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
  $z636 = $sl1 + ($a636 * ($sl2-$sl1));

  $a637 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z637 = $tl3 - ($a637 * ($tl3-$tl2));

  $a638 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
      $z638_1 = $sdg3 - ($a638 * ($sdg3-$sdg1));
  $z638_2 = $sdg1 + ($a638 * ($sdg3-$sdg1));
  $z638 = ($z603_1+$z638_2)/2;

  $a639 = min($u_tua,$p_sedang,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z639 = $sl1 + ($a639 * ($sl2-$sl1));

  $a640 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z640 = $tl3 - ($a640 * ($tl3-$tl2));

  $a641 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z641 = $tl3 - ($a641 * ($tl3-$tl2));

  $a642 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z642 = $tl3 - ($a642 * ($tl3-$tl2));

  $a643 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z643 = $tl3 - ($a643 * ($tl3-$tl2));

  $a644 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
  $z644 = $sl1 + ($a644 * ($sl2-$sl1));

  $a645 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z645 = $sl1 + ($a645 * ($sl2-$sl1));

  $a646 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z646 = $tl3 - ($a646 * ($tl3-$tl2));

  $a647 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z647 = $sl1 + ($a647 * ($sl2-$sl1));

  $a648 = min($u_tua,$p_sedang,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z648 = $sl1 + ($a648 * ($sl2-$sl1));


  //pendapatan besar

  $a649 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z649 = $tl3 - ($a649 * ($tl3-$tl2));

  $a650 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z650 = $tl3 - ($a650 * ($tl3-$tl2));

  $a651 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z651 = $tl3 - ($a651 * ($tl3-$tl2));

  $a652 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z652 = $sl1 + ($a652 * ($sl2-$sl1));

  $a653 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_baik);
      $z653_1 = $sdg3 - ($a653 * ($sdg3-$sdg1));
  $z653_2 = $sdg1 + ($a653 * ($sdg3-$sdg1));
  $z653 = ($z603_1+$z653_2)/2;

  $a654 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_baik,$sikap_sgt);
      $z654_1 = $sdg3 - ($a654 * ($sdg3-$sdg1));
  $z654_2 = $sdg1 + ($a654 * ($sdg3-$sdg1));
  $z654 = ($z603_1+$z654_2)/2;

  $a655 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z655 = $tl3 - ($a655 * ($tl3-$tl2));

  $a656 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_baik);
      $z656_1 = $sdg3 - ($a656 * ($sdg3-$sdg1));
  $z656_2 = $sdg1 + ($a656 * ($sdg3-$sdg1));
  $z656 = ($z603_1+$z656_2)/2;

  $a657 = min($u_tua,$p_besar,$j_dekat,$adm_tdk,$rrp_sgt,$sikap_sgt);
      $z657_1 = $sdg3 - ($a657 * ($sdg3-$sdg1));
  $z657_2 = $sdg1 + ($a657 * ($sdg3-$sdg1));
  $z657 = ($z603_1+$z657_2)/2;


  $a658 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z658 = $tl3 - ($a658 * ($tl3-$tl2));

  $a659 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_baik);
  $z659 = $tl3 - ($a659 * ($tl3-$tl2));

  $a660 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z660 = $tl3 - ($a660 * ($tl3-$tl2));

  $a661 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_tdk);
  $z661 = $tl3 - ($a661 * ($tl3-$tl2));

  $a662 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_baik);
  $z662 = $sl1 + ($a662 * ($sl2-$sl1));

  $a663 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_baik,$sikap_sgt);
  $z663 = $sl1 + ($a663 * ($sl2-$sl1));

  $a664 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z664 = $tl3 - ($a664 * ($tl3-$tl2));

  $a665 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_baik);
  $z665 = $sl1 + ($a665 * ($sl2-$sl1));

  $a666 = min($u_tua,$p_besar,$j_dekat, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z666 = $sl1 + ($a666 * ($sl2-$sl1));

  $a667 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z667 = $tl3 - ($a667 * ($tl3-$tl2));

  $a668 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z668 = $tl3 - ($a668 * ($tl3-$tl2));

  $a669 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z669 = $tl3 - ($a669 * ($tl3-$tl2));

  $a670 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z670 = $tl3 - ($a670 * ($tl3-$tl2));

  $a671 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_baik);
  $z671 = $sl1 + ($a671 * ($sl2-$sl1));

  $a672 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z672 = $sl1 + ($a672 * ($sl2-$sl1));

  $a673 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z673 = $tl3 - ($a673 * ($tl3-$tl2));

  $a674 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z674 = $sl1 + ($a674 * ($sl2-$sl1));

  $a675 = min($u_tua,$p_besar,$j_dekat, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z675 = $sl1 + ($a475 * ($sl2-$sl1));

  //jarak sedang

  $a676 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z676 = $tl3 - ($a676 * ($tl3-$tl2));

  $a677 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z678 = $tl3 - ($a678 * ($tl3-$tl2));

  $a678 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z678 = $tl3 - ($a678 * ($tl3-$tl2));

  $a679 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z679 = $tl3 - ($a679 * ($tl3-$tl2));

  $a680 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_baik);
  $z680 = $sl1 + ($a680 * ($sl2-$sl1));

  $a681 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z681 = $sl1 + ($a681 * ($sl2-$sl1));

  $a682 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z682 = $tl3 - ($a682 * ($tl3-$tl2));

  $a683 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_baik);
      $z683_1 = $sdg3 - ($a683 * ($sdg3-$sdg1));
  $z683_2 = $sdg1 + ($a683 * ($sdg3-$sdg1));
  $z683 = ($z603_1+$z683_2)/2;

  $a684 = min($u_tua,$p_besar,$j_sedang,$adm_tdk,$rrp_sgt,$sikap_sgt);
      $z684_1 = $sdg3 - ($a684 * ($sdg3-$sdg1));
  $z684_2 = $sdg1 + ($a684 * ($sdg3-$sdg1));
  $z684 = ($z603_1+$z684_2)/2;



  $a685 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z685 = $tl3 - ($a685 * ($tl3-$tl2));

  $a686 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_baik);
  $z686 = $tl3 - ($a686 * ($tl3-$tl2));

  $a687 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z687 = $tl3 - ($a687 * ($tl3-$tl2));

  $a688 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_tdk);
  $z688 = $tl3 - ($a688 * ($tl3-$tl2));

  $a689 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_baik);
  $z689 = $sl1 + ($a689 * ($sl2-$sl1));

  $a690 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_baik,$sikap_sgt);
  $z690 = $sl1 + ($a690 * ($sl2-$sl1));

  $a691 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z691 = $tl3 - ($a691 * ($tl3-$tl2));

  $a692 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_baik);
  $z692 = $sl1 + ($a692 * ($sl2-$sl1));

  $a693 = min($u_tua,$p_besar,$j_sedang, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z693 = $sl1 + ($a693 * ($sl2-$sl1));


  $a694 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z694 = $tl3 - ($a694 * ($tl3-$tl2));

  $a695 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_baik);
  $z695 = $tl3 - ($a695 * ($tl3-$tl2));

  $a696 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_tdk,$sikap_sgt);
  $z696 = $tl3 - ($a696 * ($tl3-$tl2));

  $a697 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z697 = $tl3 - ($a697 * ($tl3-$tl2));

  $a698 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_baik);
  $z698 = $sl1 + ($a698 * ($sl2-$sl1));

  $a699 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z699 = $sl1 + ($a699 * ($sl2-$sl1));

  $a700 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z700 = $tl3 - ($a700 * ($tl3-$tl2));
  
  $a701 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z701 = $sl1 + ($a701 * ($sl2-$sl1));

  $a702 = min($u_tua,$p_besar,$j_sedang, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z702 = $sl1 + ($a702 * ($sl2-$sl1));

  //jarak jauh

  $a703 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_tdk);
  $z703 = $tl3 - ($a703 * ($tl3-$tl2));

  $a704 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_baik);
  $z704 = $tl3 - ($a704 * ($tl3-$tl2));

  $a705 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_tdk,$sikap_sgt);
  $z705 = $tl3 - ($a705 * ($tl3-$tl2));

  $a706 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_tdk);
  $z706 = $tl3 - ($a706 * ($tl3-$tl2));

  $a707 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_baik);
  $z707 = $tl3 - ($a707 * ($tl3-$tl2));

  $a708 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_baik,$sikap_sgt);
  $z708 = $tl3 - ($a708 * ($tl3-$tl2));

  $a709 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_tdk);
  $z709 = $tl3 - ($a709 * ($tl3-$tl2));

  $a710 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_baik);
  $z710 = $tl3 - ($a710 * ($tl3-$tl2));

  $a711 = min($u_tua,$p_besar,$j_jauh,$adm_tdk,$rrp_sgt,$sikap_sgt);
  $z711 = $tl3 - ($a711 * ($tl3-$tl2));


  $a712 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_tdk);
  $z712 = $tl3 - ($a712 * ($tl3-$tl2));

  $a713 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_baik);
      $z713_1 = $sdg3 - ($a713 * ($sdg3-$sdg1));
  $z713_2 = $sdg1 + ($a713 * ($sdg3-$sdg1));
  $z713 = ($z603_1+$z713_2)/2;

  $a714 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_tdk,$sikap_sgt);
  $z714 = $tl3 - ($a714 * ($tl3-$tl2));

  $a715 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_tdk);
  $z715 = $tl3 - ($a715 * ($tl3-$tl2));

  $a716 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_baik);
  $z716 = $sl1 + ($a716 * ($sl2-$sl1));

  $a717 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_baik,$sikap_sgt);
  $z717 = $sl1 + ($a717 * ($sl2-$sl1));

  $a718 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_tdk);
  $z718 = $tl3 - ($a718 * ($tl3-$tl2));
  
  $a719 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_baik);
  $z719 = $sl1 + ($a719 * ($sl2-$sl1));

  $a720 = min($u_tua,$p_besar,$j_jauh, $adm_baik,$rrp_sgt,$sikap_sgt);
  $z720 = $sl1 + ($a720 * ($sl2-$sl1));


  $a721 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_tdk);
  $z721 = $tl3 - ($a721 * ($tl3-$tl2));

  $a722 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_baik);
      $z722_1 = $sdg3 - ($a722 * ($sdg3-$sdg1));
  $z722_2 = $sdg1 + ($a722 * ($sdg3-$sdg1));
  $z722 = ($z603_1+$z722_2)/2;

  $a723 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_tdk,$sikap_sgt);
      $z723_1 = $sdg3 - ($a723 * ($sdg3-$sdg1));
  $z723_2 = $sdg1 + ($a723 * ($sdg3-$sdg1));
  $z723 = ($z603_1+$z723_2)/2;

  
  $a724 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_tdk);
  $z724 = $tl3 - ($a724 * ($tl3-$tl2));

  $a725 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_baik);
  $z725 = $sl1 + ($a725 * ($sl2-$sl1));

  $a726 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_baik,$sikap_sgt);
  $z726 = $sl1 + ($a726 * ($sl2-$sl1));

  $a727 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_tdk);
  $z727 = $tl3 - ($a727 * ($tl3-$tl2));

  $a728 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_baik);
  $z728 = $sl1 + ($a728 * ($sl2-$sl1));

  $a729 = min($u_tua,$p_besar,$j_jauh, $adm_sgt,$rrp_sgt,$sikap_sgt);
  $z728 = $sl1 + ($a729 * ($sl2-$sl1));


//Untuk Mencari Fungsi Max

  $lyk = mysqli_query($kon, "select * from hasil where himpunan = 'layak'");
  $ly = mysqli_fetch_array($lyk);
  $layake = $ly["batas1"];
  $layak2 = $ly["batas3"];




$arrayA = array($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16,$a17,$a18,$a19,$a20,$a21,$a22,$a23,$a24,$a25,$a26,$a27,$a28,$a29,$a30,$a31,$a32,$a33,$a34,$a35,$a36,$a37,$a38,$a39,$a40,$a41,$a42,$a43,$a44,$a45,$a46,$a47,$a48,$a49,$a50,$a51,$a52,$a53,$a54,$a55,$a56,$a57,$a58,$a59,$a60,$a61,$a62,$a63,$a64,$a65,$a66,$a67,$a68,$a69,$a70,$a71,$a72,$a73,$a74,$a75,$a76,$a77,$a78,$a79,$a80,$a81,$a82,$a83,$a84,$a85,$a86,$a87,$a88,$a89,$a90,$a91,$a92,$a93,$a94,$a95,$a96,$a97,$a98,$a99,$a100,$a101,$a102,$a103,$a104,$a105,$a106,$a107,$a108,$a109,$a110,$a111,$a112,$a113,$a114,$a115,$a116,$a117,$a118,$a119,$a120,$a121,$a122,$a123,$a124,$a125,$a126,$a127,$a128,$a129,$a130,$a131,$a132,$a133,$a134,$a135,$a136,$a137,$a138,$a139,$a140,$a141,$a142,$a143,$a144,$a145,$a146,$a147,$a148,$a149,$a150,$a151,$a152,$a153,$a154,$a155,$a156,$a157,$a158,$a159,$a160,$a161,$a162,$a163,$a164,$a165,$a166,$a167,$a168,$a169,$a170,$a171,$a172,$a173,$a174,$a175,$a176,$a177,$a178,$a179,$a180,$a181,$a182,$a183,$a184,$a185,$a186,$a187,$a188,$a189,$a190,$a191,$a192,$a193,$a194,$a195,$a196,$a197,$a198,$a199,$a200,$a201,$a202,$a203,$a204,$a205,$a206,$a207,$a208,$a209,$a210,$a211,$a212,$a213,$a214,$a215,$a216,$a217,$a218,$a219,$a220,$a221,$a222,$a223,$a224,$a225,$a226,$a227,$a228,$a229,$a230,$a231,$a232,$a233,$a234,$a235,$a236,$a237,$a238,$a239,$a240,$a241,$a242,$a243,$a244,$a245,$a246,$a247,$a248,$a249,$a250,$a251,$a252,$a253,$a254,$a255,$a256,$a257,$a258,$a259,$a260,$a261,$a262,$a263,$a264,$a265,$a266,$a267,$a268,$a269,$a270,$a271,$a272,$a273,$a274,$a275,$a276,$a277,$a278,$a279,$a280,$a281,$a282,$a283,$a284,$a285,$a286,$a287,$a288,$a289,$a290,$a291,$a292,$a293,$a294,$a295,$a296,$a297,$a298,$a299,$a300,$a301,$a302,$a303,$a304,$a305,$a306,$a307,$a308,$a309,$a310,$a311,$a312,$a313,$a314,$a315,$a316,$a317,$a318,$a319,$a320,$a321,$a322,$a323,$a324,$a325,$a326,$a327,$a328,$a329,$a330,$a331,$a332,$a333,$a334,$a335,$a336,$a337,$a338,$a339,$a340,$a341,$a342,$a343,$a344,$a345,$a346,$a347,$a348,$a349,$a350,$a351,$a352,$a353,$a354,$a355,$a356,$a357,$a358,$a359,$a360,$a361,$a362,$a363,$a364,$a365,$a366,$a367,$a368,$a369,$a370,$a371,$a372,$a373,$a374,$a375,$a376,$a377,$a378,$a379,$a380,$a381,$a382,$a383,$a384,$a385,$a386,$a387,$a388,$a389,$a390,$a391,$a392,$a393,$a394,$a395,$a396,$a397,$a398,$a399,$a400,$a401,$a402,$a403,$a404,$a405,$a406,$a407,$a408,$a409,$a410,$a411,$a412,$a413,$a414,$a415,$a416,$a417,$a418,$a419,$a420,$a421,$a422,$a423,$a424,$a425,$a426,$a427,$a428,$a429,$a430,$a431,$a432,$a433,$a434,$a435,$a436,$a437,$a438,$a439,$a440,$a441,$a442,$a443,$a444,$a445,$a446,$a447,$a448,$a449,$a450,$a451,$a452,$a453,$a454,$a455,$a456,$a457,$a458,$a459,$a460,$a461,$a462,$a463,$a464,$a465,$a466,$a467,$a468,$a469,$a470,$a471,$a472,$a473,$a474,$a475,$a476,$a477,$a478,$a479,$a480,$a481,$a482,$a483,$a484,$a485,$a486,$a487,$a488,$a489,$a490,$a491,$a492,$a493,$a494,$a495,$a496,$a497,$a498,$a499,$a500,$a501,$a502,$a503,$a504,$a505,$a506,$a507,$a508,$a509,$a510,$a511,$a512,$a513,$a514,$a515,$a516,$a517,$a518,$a519,$a520,$a521,$a522,$a523,$a524,$a525,$a526,$a527,$a528,$a529,$a530,$a531,$a532,$a533,$a534,$a535,$a536,$a537,$a538,$a539,$a540,$a541,$a542,$a543,$a544,$a545,$a546,$a547,$a548,$a549,$a550,$a551,$a552,$a553,$a554,$a555,$a556,$a557,$a558,$a559,$a560,$a561,$a562,$a563,$a564,$a565,$a566,$a567,$a568,$a569,$a570,$a571,$a572,$a573,$a574,$a575,$a576,$a577,$a578,$a579,$a580,$a581,$a582,$a583,$a584,$a585,$a586,$a587,$a588,$a589,$a590,$a591,$a592,$a593,$a594,$a595,$a596,$a597,$a598,$a599,$a600,$a601,$a602,$a603,$a604,$a605,$a606,$a607,$a608,$a609,$a610,$a611,$a612,$a613,$a614,$a615,$a616,$a617,$a618,$a619,$a620,$a621,$a622,$a623,$a624,$a625,$a626,$a627,$a628,$a629,$a630,$a631,$a632,$a633,$a634,$a635,$a636,$a637,$a638,$a639,$a640,$a641,$a642,$a643,$a644,$a645,$a646,$a647,$a648,$a649,$a650,$a651,$a652,$a653,$a654,$a655,$a656,$a657,$a658,$a659,$a660,$a661,$a662,$a663,$a664,$a665,$a666,$a667,$a668,$a669,$a670,$a671,$a672,$a673,$a674,$a675,$a676,$a677,$a678,$a679,$a680,$a681,$a682,$a683,$a684,$a685,$a686,$a687,$a688,$a689,$a690,$a691,$a692,$a693,$a694,$a695,$a696,$a697,$a698,$a699,$a700,$a701,$a702,$a703,$a704,$a705,$a706,$a707,$a708,$a709,$a710,$a711,$a712,$a713,$a714,$a715,$a716,$a717,$a718,$a719,$a720,$a721,$a722,$a723,$a724,$a725,$a726,$a727,$a728,$a729);

$arrayZ = array($z1,$z2,$z3,$z4,$z5,$z6,$z7,$z8,$z9,$z10,$z11,$z12,$z13,$z14,$z15,$z16,$z17,$z18,$z19,$z20,$z21,$z22,$z23,$z24,$z25,$z26,$z27,$z28,$z29,$z30,$z31,$z32,$z33,$z34,$z35,$z36,$z37,$z38,$z39,$z40,$z41,$z42,$z43,$z44,$z45,$z46,$z47,$z48,$z49,$z50,$z51,$z52,$z53,$z54,$z55,$z56,$z57,$z58,$z59,$z60,$z61,$z62,$z63,$z64,$z65,$z66,$z67,$z68,$z69,$z70,$z71,$z72,$z73,$z74,$z75,$z76,$z77,$z78,$z79,$z80,$z81,$z82,$z83,$z84,$z85,$z86,$z87,$z88,$z89,$z90,$z91,$z92,$z93,$z94,$z95,$z96,$z97,$z98,$z99,$z100,$z101,$z102,$z103,$z104,$z105,$z106,$z107,$z108,$z109,$z110,$z111,$z112,$z113,$z114,$z115,$z116,$z117,$z118,$z119,$z120,$z121,$z122,$z123,$z124,$z125,$z126,$z127,$z128,$z129,$z130,$z131,$z132,$z133,$z134,$z135,$z136,$z137,$z138,$z139,$z140,$z141,$z142,$z143,$z144,$z145,$z146,$z147,$z148,$z149,$z150,$z151,$z152,$z153,$z154,$z155,$z156,$z157,$z158,$z159,$z160,$z161,$z162,$z163,$z164,$z165,$z166,$z167,$z168,$z169,$z170,$z171,$z172,$z173,$z174,$z175,$z176,$z177,$z178,$z179,$z180,$z181,$z182,$z183,$z184,$z185,$z186,$z187,$z188,$z189,$z190,$z191,$z192,$z193,$z194,$z195,$z196,$z197,$z198,$z199,$z200,$z201,$z202,$z203,$z204,$z205,$z206,$z207,$z208,$z209,$z210,$z211,$z212,$z213,$z214,$z215,$z216,$z217,$z218,$z219,$z220,$z221,$z222,$z223,$z224,$z225,$z226,$z227,$z228,$z229,$z230,$z231,$z232,$z233,$z234,$z235,$z236,$z237,$z238,$z239,$z240,$z241,$z242,$z243,$z244,$z245,$z246,$z247,$z248,$z249,$z250,$z251,$z252,$z253,$z254,$z255,$z256,$z257,$z258,$z259,$z260,$z261,$z262,$z263,$z264,$z265,$z266,$z267,$z268,$z269,$z270,$z271,$z272,$z273,$z274,$z275,$z276,$z277,$z278,$z279,$z280,$z281,$z282,$z283,$z284,$z285,$z286,$z287,$z288,$z289,$z290,$z291,$z292,$z293,$z294,$z295,$z296,$z297,$z298,$z299,$z300,$z301,$z302,$z303,$z304,$z305,$z306,$z307,$z308,$z309,$z310,$z311,$z312,$z313,$z314,$z315,$z316,$z317,$z318,$z319,$z320,$z321,$z322,$z323,$z324,$z325,$z326,$z327,$z328,$z329,$z330,$z331,$z332,$z333,$z334,$z335,$z336,$z337,$z338,$z339,$z340,$z341,$z342,$z343,$z344,$z345,$z346,$z347,$z348,$z349,$z350,$z351,$z352,$z353,$z354,$z355,$z356,$z357,$z358,$z359,$z360,$z361,$z362,$z363,$z364,$z365,$z366,$z367,$z368,$z369,$z370,$z371,$z372,$z373,$z374,$z375,$z376,$z377,$z378,$z379,$z380,$z381,$z382,$z383,$z384,$z385,$z386,$z387,$z388,$z389,$z390,$z391,$z392,$z393,$z394,$z395,$z396,$z397,$z398,$z399,$z400,$z401,$z402,$z403,$z404,$z405,$z406,$z407,$z408,$z409,$z410,$z411,$z412,$z413,$z414,$z415,$z416,$z417,$z418,$z419,$z420,$z421,$z422,$z423,$z424,$z425,$z426,$z427,$z428,$z429,$z430,$z431,$z432,$z433,$z434,$z435,$z436,$z437,$z438,$z439,$z440,$z441,$z442,$z443,$z444,$z445,$z446,$z447,$z448,$z449,$z450,$z451,$z452,$z453,$z454,$z455,$z456,$z457,$z458,$z459,$z460,$z461,$z462,$z463,$z464,$z465,$z466,$z467,$z468,$z469,$z470,$z471,$z472,$z473,$z474,$z475,$z476,$z477,$z478,$z479,$z480,$z481,$z482,$z483,$z484,$z485,$z486,$z487,$z488,$z489,$z490,$z491,$z492,$z493,$z494,$z495,$z496,$z497,$z498,$z499,$z500,$z501,$z502,$z503,$z504,$z505,$z506,$z507,$z508,$z509,$z510,$z511,$z512,$z513,$z514,$z515,$z516,$z517,$z518,$z519,$z520,$z521,$z522,$z523,$z524,$z525,$z526,$z527,$z528,$z529,$z530,$z531,$z532,$z533,$z534,$z535,$z536,$z537,$z538,$z539,$z540,$z541,$z542,$z543,$z544,$z545,$z546,$z547,$z548,$z549,$z550,$z551,$z552,$z553,$z554,$z555,$z556,$z557,$z558,$z559,$z560,$z561,$z562,$z563,$z564,$z565,$z566,$z567,$z568,$z569,$z570,$z571,$z572,$z573,$z574,$z575,$z576,$z577,$z578,$z579,$z580,$z581,$z582,$z583,$z584,$z585,$z586,$z587,$z588,$z589,$z590,$z591,$z592,$z593,$z594,$z595,$z596,$z597,$z598,$z599,$z600,$z601,$z602,$z603,$z604,$z605,$z606,$z607,$z608,$z609,$z610,$z611,$z612,$z613,$z614,$z615,$z616,$z617,$z618,$z619,$z620,$z621,$z622,$z623,$z624,$z625,$z626,$z627,$z628,$z629,$z630,$z631,$z632,$z633,$z634,$z635,$z636,$z637,$z638,$z639,$z640,$z641,$z642,$z643,$z644,$z645,$z646,$z647,$z648,$z649,$z650,$z651,$z652,$z653,$z654,$z655,$z656,$z657,$z658,$z659,$z660,$z661,$z662,$z663,$z664,$z665,$z666,$z667,$z668,$z669,$z670,$z671,$z672,$z673,$z674,$z675,$z676,$z677,$z678,$z679,$z680,$z681,$z682,$z683,$z684,$z685,$z686,$z687,$z688,$z689,$z690,$z691,$z692,$z693,$z694,$z695,$z696,$z697,$z698,$z699,$z700,$z701,$z702,$z703,$z704,$z705,$z706,$z707,$z708,$z709,$z710,$z711,$z712,$z713,$z714,$z715,$z716,$z717,$z718,$z719,$z720,$z721,$z722,$z723,$z724,$z725,$z726,$z727,$z728,$z729);

  
  $arrrayMAX = array();
  for ($i=0; $i <= 728 ; $i++) { 
       $max = (($arrayA[$i] * ($layak2 - $layake ))+$layake); 
       $arrayMAX[$i] = $max;
  }

  sort($arrayMAX);
  $nilaiPertama = 1;
  $jumlahM = 0;
  $batasAtas = 0;
  $batasBawah = 50;
  for ($i=0; $i <= 728 ; $i++) { 

    if ($arrayMAX[$i] != 50) {
     $batasAtas = $arrayMAX[$i];
      if ($i == 0 ) {
          $jumlahM = $jumlahM + (((($arrayMAX[$i]/2)*($batasAtas*$batasAtas))) - (($arrayMAX[$i]/2)*($batasBawah*$batasBawah)));

          $nilaiPertama = $nilaiPertama +1;
      }elseif ($i == 728) {
         $jumlahM = $jumlahM + (((($arrayMAX[$i]/2)*($batasAtas*$batasAtas))) - (($arrayMAX[$i]/2)*($batasBawah*$batasBawah)));
         $nilaiPertama = $nilaiPertama +1;
      }else {

        if ($nilaiPertama == 1) {
        $jumlahM = $jumlahM + (((($arrayMAX[$i]/2)*($batasAtas*$batasAtas))) - (($arrayMAX[$i]/2)*($batasBawah*$batasBawah)));
        }else{
           $jumlahM = $jumlahM + (
            (((1/($layak2-$layake))/3)*($batasAtas * $batasAtas * $batasAtas)) - ((($layake/($layak2-$layake))/2)*($batasAtas * $batasAtas))); 
        }

        $nilaiPertama = $nilaiPertama +1;
        
      }
      $batasBawah = $batasAtas;
    }


  }


sort($arrayMAX);
  $nilaiPertama1 = 1;
  $jumlahA = 0;
  $batasAtas1 = 0;
  $batasBawah1 = 50;
  for ($i=0; $i <= 728 ; $i++) { 

    if ($arrayMAX[$i] != 50) {
     $batasAtas1 = $arrayMAX[$i];
      if ($i == 0 ) {
          $jumlahA = $jumlahA + (($arrayMAX[$i]*$batasAtas1) - ($arrayMAX[$i]*$batasBawah1));

          $nilaiPertama1 = $nilaiPertama1 +1;
      }elseif ($i == 728) {
         $jumlahA = $jumlahA + (($arrayMAX[$i]*$batasAtas1) - ($arrayMAX[$i]*$batasBawah1));
         $nilaiPertama1 = $nilaiPertama1 +1;
      }else {

        if ($nilaiPertama1 == 1) {
        $jumlahA = $jumlahA + (($arrayMAX[$i]*$batasAtas1) - ($arrayMAX[$i]*$batasBawah1));
        }else{
           $jumlahA = $jumlahA + (
            (((1/($layak2-$layake))/3)*($batasAtas1 * $batasAtas1)) - ((($layake/($layak2-$layake))/2)*($batasAtas1))); 
        }

        $nilaiPertama1 = $nilaiPertama1 +1;
        
      }
      $batasBawah1 = $batasAtas1;
    }


  }


$mamdani = $jumlahM/$jumlahA;


  ////defuzzyfikasi tsukamoto

$totalAZ = 0;
for ($i=0; $i <= 728 ; $i++) { 
  $totalAZ = $totalAZ + ($arrayA[$i] * $arrayZ[$i]);
}

$totalA = 0;
for ($x=0; $x <= 728 ; $x++) { 
  $totalA = $totalA + $arrayA[$x];
}


$tSUKAMOTO = $totalAZ/$totalA;






  $nsbh = mysqli_query($kon, "select * from nasabah where nik ='$nik'");
  $nas = mysqli_fetch_array($nsbh);
  $nm_nasabah = $nas["nama"];
  $nm_ayah = $nas["nama_ayah"];
  $tmp_lahir = $nas["tempat"];
  $tgl_lahir = $nas["tgl_lahir"];
  $hp = $nas["nohp"];
  $stts_nikah = $nas["stts_perkawinan"];
  $nama_suami = $nas["nama_suami"];
  $jml_anak = $nas["jml_anak"];
  $nmusaha = $nas["usaha"];
  $kelompok = $nas["kelompok"];
  $alamat = $nas["alamat"];


  echo "
  
<table>
  <tr>
    <td align='left'>Penanggung Jawab</td>
    <td>:</td>
    <td align='left'><h3>$ao</h3></td>
  </tr>
</table>
<br>
<hr>
<h3>Data Nasabah </h3>
<hr>";
?><div style="width: 100%; height: 300px;">
  <div style = 'width : 45%; height: 100%;  float: left;'>
<?php
echo"    <table>
  <tr>
    <td align='left'>No Induk Keluarga (NIK)</td>
    <td>:</td>
    <td align='left'>$nik</td>
  </tr>
  <tr>
    <td align='left'>Nama Lengkap</td>
    <td>:</td>
    <td align='left'>$nm_nasabah</td>
  </tr>
  <tr>
    <td align='left'>Tempat, Tanggal lahir</td>
    <td>:</td>
    <td align='left'>$tmp_lahir. $tgl_lahir</td>
  </tr>
  <tr>
    <td align='left'>Nama Orang Tua</td>
    <td>:</td>
    <td align='left'>$nm_ayah</td>
  </tr>
  <tr>
    <td align='left'>Status Perkawinan</td>
    <td>:</td>
    <td align='left'>$stts_nikah</td>
  </tr>
  <tr>
    <td align='left'>Nama Suami</td>
    <td>:</td>
    <td align='left'>$nama_suami</td>
  </tr>
  <tr>
    <td align='left'>Jumlah Anak</td>
    <td>:</td>
    <td align='left'>$jml_anak</td>
  </tr>
  <tr>
    <td align='left'>No. Handphone</td>
    <td>:</td>
    <td align='left'>$hp</td>
  </tr>
  <tr>
    <td align='left'>Nama Usaha</td>
    <td>:</td>
    <td align='left'>$nmusaha</td>
  </tr>
  <tr>
    <td align='left'>Alamat</td>
    <td>:</td>
    <td align='left'>$alamat</td>
  </tr>
  <tr>
    <td align='left'>kelompok</td>
    <td>:</td>
    <td align='left'>$kelompok</td>
  </tr>
</table>

";
?>
</div>
<div style = 'width : 45%; height: 100%; float: right;'>
<?php
echo "
 <table>
  <tr>
    <td align='left'>Umur</td>
    <td>:</td>
    <td align='left'>$umur</td>
  </tr>
  <tr>
    <td align='left'>Pendapatan Bulanan perkapita</td>
    <td>:</td>
    <td align='left'>$pdptn</td>
  </tr>
  <tr>
    <td align='left'>Waktu tempuh</td>
    <td>:</td>
    <td align='left'>$jarak</td>
  </tr>
  <tr>
    <td align='left'>Kelengkapan Adminnistrasi</td>
    <td>:</td>
    <td align='left'>$adm</td>
  </tr>
  <tr>
    <td align='left'>Reputasi Rwayat Peminjaman</td>
    <td>:</td>
    <td align='left'>$rrp</td>
  </tr>
  <tr>
    <td align='left'>Sikap</td>
    <td>:</td>
    <td align='left'>$sikap</td>
  </tr>
  <tr>
    <td align='left'>Hasil Mamdani</td>
    <td>:</td>
    <td align='left'>$mamdani</td>
  </tr>
  <tr>
    <td align='left'>Hasil Tsukamoto</td>
    <td>:</td>
    <td align='left'>$tSUKAMOTO</td>
  </tr>;"
  ?>
  <tr>
    <td align='left'>keterangan</td>
    <td>:</td>
    <td align='left'>
      <?php
      $sgt_layak = "SANGAT LAYAK";
      $tidak_layak = "TIDAK LAYAK";
      $layak0 = "LAYAK";
      if ($mamdani <= 50 && $tSUKAMOTO <=50) {
        $keterangan = $tidak_layak;
      }elseif ($mamdani > 50 && $mamdani <90 ) {
        $keterangan = $layak0;
      }elseif ($tSUKAMOTO > 50 && $tSUKAMOTO <90 ) {
        $keterangan = $layak0;
      }elseif ($mamdani >= 90 && $tSUKAMOTO >=90) {
        $keterangan = $sgt_layak;
      }
      echo "<h3> $keterangan <h3>";
      ?>
    </td>
  </tr>
  </table>


    </div>
    </div>
    <center></center>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
          <input name="nik" type="hidden" id="nik" value="<?php echo "$nik"; ?>">
          <input name="nama" type="hidden" id="nama" value="<?php echo "$nm_nasabah"; ?>">
          <input name="kelompok" type="hidden" id="kelompok" value="<?php echo "$kelompok"; ?>">
          <input name="pj" type="hidden" id="pj" value="<?php echo "$ao"; ?>">
          <input name="k1" type="hidden" id="k1" value="<?php echo "$umur"; ?>">
          <input name="k2" type="hidden" id="k2" value="<?php echo "$pdptn"; ?>">
          <input name="k3" type="hidden" id="k3" value="<?php echo "$jarak"; ?>">
          <input name="k4" type="hidden" id="k4" value="<?php echo "$adm"; ?>">
          <input name="k5" type="hidden" id="k5" value="<?php echo "$rrp"; ?>">
          <input name="k6" type="hidden" id="k6" value="<?php echo "$sikap"; ?>">
          <input name="k7" type="hidden" id="n7" value="<?php echo "$mamdani"; ?>">
          <input name="k8" type="hidden" id="k8" value="<?php echo "$tSUKAMOTO"; ?>">
          <input name="keterangan" type="hidden" id="keterangan" value="<?php echo "$keterangan"; ?>">
    </form>
</center>
<?

?>
<?php 

if($mamdani > 0){
  include "koneksi.php";
  $sqlna = mysqli_query($kon, "insert into hasil_kelayakan (nik,nama,kelompok,pj,k1,k2,k3,k4,k5,k6,mamdani,tsukamoto,keterangan,waktu) values ('$_POST[nik]', '$_POST[nama]', '$_POST[kelompok]', '$ao', '$_POST[k1]', '$_POST[k2]','$_POST[k3]', '$_POST[k4]', '$_POST[k5]', '$_POST[k6]', '$mamdani', '$tSUKAMOTO','$keterangan',NOW())");

}
?>
<a href="<?php echo "?p=tabel"; ?>"><button type="button" class="btn btn-add">lihat detail &raquo;</button></a>
      </div >
          <div class="kakicard">   
  </div>
    </div>
    </div>
  </div>
