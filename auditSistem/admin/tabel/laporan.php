<style>
    .maturity{
        display: flex;
        align-items: center;
        justify-content:center;
        flex-direction: column;
    }
    table, tr, td{
        border:1px solid #000;
        margin : 10px 10px 10px 10px;
        text-align : center;
    }

    .maturity .tanggal{
        width:61%;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .maturity hr{
        color : #151111;
    }

    .tanggal .isi{
        float: right;
        text-align:center;
    }


    .judul{
        width : 90%;
        background : #807f81;
        padding : 10px 0 10px 10px;
        border-radius : 3px;
        margin : 20px 20px 20px 20px;
    }
</style>
<?php 
        include 'koneksi.php';
        $dataH = mysqli_query($koneksi, "select * from hasil");
        $jumlahR = mysqli_num_rows($dataH);
 
        
        // AI21
            $query1 = "select SUM(AI2_1) AS t1 FROM hasil";
            $a1 = mysqli_query($koneksi, $query1);
            $AI2_1 = mysqli_fetch_array($a1);

          //total  jumlah nilai per pertanyaan
            $c1 = "$AI2_1[t1]";

            //current maturity
            $cm1 = $c1/$jumlahR;

        //AI22
            $query2 = "select SUM(AI2_2) AS t2 FROM hasil";
            $a2 = mysqli_query($koneksi, $query2);
            $AI2_2 = mysqli_fetch_array($a2);
            
            $c2 = "$AI2_2[t2]";
            $cm2 = $c2/$jumlahR;

        //index matuity  
            $im1 = ($cm1 + $cm2)/2;
        
        ///////////////////////////////////////

        //AI31
            $query3 = "select SUM(AI3_1) AS t3 FROM hasil";
            $a3 = mysqli_query($koneksi, $query3);
            $AI3_1 = mysqli_fetch_array($a3);
             
            $c3 = "$AI3_1[t3]";
            $cm3 = $c3/$jumlahR;
            
        //AI32
            $query4 = "select SUM(AI3_2) AS t4 FROM hasil";
            $a4 = mysqli_query($koneksi, $query4);
            $AI3_2 = mysqli_fetch_array($a4);
             
            $c4 = "$AI3_2[t4]";
            $cm4 = $c4/$jumlahR;
        //matuity
            $im2 = ($cm3 + $cm4)/2;
        ///////////////////////////////////

        //AI41
            $query5 = "select SUM(AI4_1) AS t5 FROM hasil";
            $a5 = mysqli_query($koneksi, $query5);
            $AI4_1 = mysqli_fetch_array($a5);
            
            $c5 = "$AI4_1[t5]";
            $cm5 = $c5/$jumlahR;
            
        //AI42
            $query6 = "select SUM(AI4_2) AS t6 FROM hasil";
            $a6 = mysqli_query($koneksi, $query6);
            $AI4_2 = mysqli_fetch_array($a6);
             
            $c6 = "$AI4_2[t6]";
            $cm6 = $c6/$jumlahR;
        //matuity
            $im3 = ($cm5 + $cm6)/2;
        ////////////////////////////////////
        
        //AI51
            $query7 = "select SUM(AI5_1) AS t7 FROM hasil";
            $a7 = mysqli_query($koneksi, $query7);
            $AI5_1 = mysqli_fetch_array($a7);
            
            $c7 = "$AI5_1[t7]";
            $cm7 = $c7/$jumlahR;
        
        //AI52
            $query8 = "select SUM(AI5_2) AS t8 FROM hasil";
            $a8 = mysqli_query($koneksi, $query8);
            $AI5_2 = mysqli_fetch_array($a8);
            
            $c8 = "$AI5_2[t8]";
            $cm8 = $c8/$jumlahR;

        
        //matuity
            $im4 = ($cm7 + $cm8)/2;
        ////////////////////////////////////////

        //DS71
            $query9 = "select SUM(DS7_1) AS t9 FROM hasil";
            $a9 = mysqli_query($koneksi, $query9);
            $DS7_1 = mysqli_fetch_array($a9);
            
            $c9 = "$DS7_1[t9]";
            $cm9 = $c9/$jumlahR;
            
        //DS72
            $query10 = "select SUM(DS7_2) AS t10 FROM hasil";
            $a10 = mysqli_query($koneksi, $query10);
            $DS7_2 = mysqli_fetch_array($a10);
            
            $c10 = "$DS7_2[t10]";
            $cm10 = $c10/$jumlahR;
        //matuity
            $im5 = ($cm9 + $cm10)/2;
  
        ///////////////////////////////////////////////

        //DS101
            $query11 = "select SUM(DS10_1) AS t11 FROM hasil";
            $a11 = mysqli_query($koneksi, $query11);
            $DS10_1 = mysqli_fetch_array($a11);
            
            $c11 = "$DS10_1[t11]";
            $cm11 = $c11/$jumlahR;
            
        //DS102
            $query12 = "select SUM(DS10_2) AS t12 FROM hasil";
            $a12 = mysqli_query($koneksi, $query12);
            $DS10_2 = mysqli_fetch_array($a12);
            
            $c12 = "$DS10_2[t12]";
            $cm12 = $c12/$jumlahR;
        //matuity
            $im6 = ($cm11 + $cm12)/2;
        ////////////////////////////////////////////////////

        //DS121
            $query13 = "select SUM(DS12_1) AS t13 FROM hasil";
            $a13 = mysqli_query($koneksi, $query13);
            $DS12_1 = mysqli_fetch_array($a13);

            $c13 = "$DS12_1[t13]";
            $cm13 = $c13/$jumlahR;
           
        //DS122
            $query14 = "select SUM(DS12_2) AS t14 FROM hasil";
            $a14 = mysqli_query($koneksi, $query14);
            $DS12_2 = mysqli_fetch_array($a14);
            
            $c14 = "$DS12_2[t14]";
            $cm14 = $c14/$jumlahR;
        //matuity
            $im7 = ($cm13 + $cm14)/2;
        //////////////////////////////////////////////////////

        //DS131
            $query15 = "select SUM(DS13_1) AS t15 FROM hasil";
            $a15 = mysqli_query($koneksi, $query15);
            $DS13_1 = mysqli_fetch_array($a15);
            
            $c15 = "$DS13_1[t15]";
            $cm15 = $c15/$jumlahR;
        
        //DS132
            $query16 = "select SUM(DS13_2) AS t16 FROM hasil";
            $a16 = mysqli_query($koneksi, $query16);
            $DS13_2 = mysqli_fetch_array($a16);
            
            $c16 = "$DS13_2[t16]";
            $cm16 = $c16/$jumlahR;
        //matuity
            $im8 = ($cm13 + $cm14)/2;
            
    ////////////////GAP///////////////////////////

        $nD = 5;

        $gap1 = $nD-$im1;
        $gap2 = $nD-$im2;
        $gap3 = $nD-$im3;
        $gap4 = $nD-$im4;
        $gap5 = $nD-$im5;
        $gap6 = $nD-$im6;
        $gap7 = $nD-$im7;
        $gap8 = $nD-$im8;
?>
<div class="maturity">
<h2>Laporan Hasil Analisis Sistem
Penilaian Kinerja Anggota PKK <br>
<center>Kenagarian Soak Laweh</center></h2>
<br>
<hr/>
<br>
<div class="judul">
<h3>Index Maturity</h3>
</div>
<table width="90%">
    <thead>
        <tr>
            <td rowspan="2">Index Maturity</td>
            <td colspan="2">AI2</td>
            <td colspan="2">AI3</td>
            <td colspan="2">AI4</td>
            <td colspan="2">AI5</td>
            <td colspan="2">DS7</td>
            <td colspan="2">DS10</td>
            <td colspan="2">DS12</td>
            <td colspan="2">DS13</td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td><?php  $m1= round($cm1,1);  echo "$m1"; ?></td>
            <td><?php  $m2= round($cm2,1);  echo "$m2"; ?></td>
            <td><?php  $m3= round($cm3,1);  echo "$m3"; ?></td>
            <td><?php  $m4= round($cm4,1);  echo "$m4"; ?></td>
            <td><?php  $m5= round($cm5,1);  echo "$m5"; ?></td>
            <td><?php  $m6= round($cm6,1);  echo "$m6"; ?></td>
            <td><?php  $m7= round($cm7,1);  echo "$m7"; ?></td>
            <td><?php  $m8= round($cm8,1);  echo "$m8"; ?></td>
            <td><?php  $m9= round($cm9,1);  echo "$m9"; ?></td>
            <td><?php  $m10= round($cm10,1);  echo "$m10"; ?></td>
            <td><?php  $m11= round($cm11,1);  echo "$m11"; ?></td>
            <td><?php  $m12= round($cm12,1);  echo "$m12"; ?></td>
            <td><?php  $m13= round($cm13,1);  echo "$m3"; ?></td>
            <td><?php  $m14= round($cm14,1);  echo "$m14"; ?></td>
            <td><?php  $m15= round($cm15,1);  echo "$m15"; ?></td>
            <td><?php  $m16= round($cm16,1);  echo "$m16"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">Index Maturity</td>
            <td colspan="2"><?php $ma1 = round($im1,1); echo "$ma1" ?></td>
            <td colspan="2"><?php $ma2 = round($im2,1); echo "$ma2" ?></td>
            <td colspan="2"><?php $ma3 = round($im3,1); echo "$ma3" ?></td>
            <td colspan="2"><?php $ma4 = round($im4,1); echo "$ma4" ?></td>
            <td colspan="2"><?php $ma5 = round($im5,1); echo "$ma5" ?></td>
            <td colspan="2"><?php $ma6 = round($im6,1); echo "$ma6" ?></td>
            <td colspan="2"><?php $ma7 = round($im7,1); echo "$ma7" ?></td>
            <td colspan="2"><?php $ma8 = round($im8,1); echo "$ma8" ?></td>
        </tr>
        </tbody>    
    
</table>

<div class="judul">
<h3>Hasil Penilaian GAP</h3>
</div>

<table width="90%" cellspacing="1">
        <thead>
        <tr>
            <td>No</td>
            <td>Kode Domain</td>
            <td>Index Maturity</td>
            <td>Nilai Diharapkan</td>
            <td>GAP</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>AI2</td>
            <td><?php echo "$im1"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap1"; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>AI3</td>
            <td><?php echo "$im2"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap2"; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>AI4</td>
            <td><?php echo "$im3"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap3"; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>AI5</td>
            <td><?php echo "$im4"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap4"; ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>DS7</td>
            <td><?php echo "$im5"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap5"; ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>DS10</td>
            <td><?php echo "$im6"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap6"; ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>DS12</td>
            <td><?php echo "$im7"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap7"; ?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>DS13</td>
            <td><?php echo "$im8"; ?></td>
            <td><?php echo "$nD"; ?></td>
            <td><?php echo "$gap8"; ?></td>
        </tr>
        </tbody>
        <tr>
            <?php
                $totalGAP = $gap1 +$gap2 + $gap3 + $gap4 + $gap5 + $gap6 + $gap7 +$gap8;
                $rataGAP = $totalGAP/8;
            ?>
            <td colspan="4" style="font-weight:700"><center>Total </center></td>
            <td style="font-weight:700"><?php echo"$totalGAP"; ?> </td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight:700"><center>Rata-Rata </center></td>
            <td style="font-weight:700"><?php echo"$rataGAP"; ?></td>
        </tr>
    </table>
<div class="judul">
<h3>Hasil Pengisian Kuesioner</h3>
</div>
<table width="90%">
    <thead>
        <tr>
            <td rowspan="2"  width="5%">No</td>
            <td rowspan="2">Nama</td>
            <td rowspan="2"  width="10%">Jabatan</td>
            <td colspan="2">AI2</td>
            <td colspan="2">AI3</td>
            <td colspan="2">AI4</td>
            <td colspan="2">AI5</td>
            <td colspan="2">DS7</td>
            <td colspan="2">DS10</td>
            <td colspan="2">DS12</td>
            <td colspan="2">DS13</td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
            <td>1</td>
            <td>2</td>
        </tr>
        </thead>
        <tbody>    <?php
        $laporan = "select * from hasil";
        $laporan_hasil = mysqli_query($koneksi, $laporan);
        $no=1;
        while ($la = mysqli_fetch_array($laporan_hasil)) {
    ?>
        <tr>
            
            <td><?php echo "$no" ?></td>
            <td><?php echo "$la[namaReponden]" ?></td>
            <td><?php echo "$la[jabatan]" ?></td>
            <td><?php echo "$la[AI2_1]" ?></td>
            <td><?php echo "$la[AI2_2]" ?></td>
            <td><?php echo "$la[AI3_1]" ?></td>
            <td><?php echo "$la[AI3_2]" ?></td>
            <td><?php echo "$la[AI4_1]" ?></td>
            <td><?php echo "$la[AI4_2]" ?></td>
            <td><?php echo "$la[AI5_1]" ?></td>
            <td><?php echo "$la[AI5_2]" ?></td>
            <td><?php echo "$la[DS7_1]" ?></td>
            <td><?php echo "$la[DS7_2]" ?></td>
            <td><?php echo "$la[DS10_1]" ?></td>
            <td><?php echo "$la[DS10_2]" ?></td>
            <td><?php echo "$la[DS12_1]" ?></td>
            <td><?php echo "$la[DS12_2]" ?></td>
            <td><?php echo "$la[DS13_1]" ?></td>
            <td><?php echo "$la[DS13_2]" ?></td>
        </tr>
    <?php
    $no++;
        }
    ?>
    </tbody>

</table>
</div>
