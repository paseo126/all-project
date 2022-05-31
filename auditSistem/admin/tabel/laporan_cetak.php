

<div class="maturity">
    <style>
        .judul{
            width : 90%;
            background : #807f81;
            padding : 10px 0 10px 10px;
            border-radius : 3px;
            margin : 20px 20px 20px 20px;
        }   
        .maturity{
            display: flex;
            align-items: center;
            justify-content:center;
            flex-direction: column;
            width: 100%;
        }
        table, tr, td{
            border:1px solid #000;
            margin : 10px 10px 10px 10px;
            text-align:center;
        }

        thead{
            font-weight:700;
        }

        thead td{
            padding: 10px;
        }

        tbody td{
            padding: 8px;
        }

        .maturity .tanggal{
            width:61%;
            margin-top: 20px;
            margin-bottom: 20px
        }

        .tanggal .isi{
            float: right;
            text-align:center;
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
    <h2>Laporan Hasil Analisis Sistem
    Penilaian Kinerja Anggota PKK <br>
    <center>Kenagarian Soak Laweh</center></h2>
    <br>
    <hr width="100%" style="size:20px; color:#1511111">
    <br>

    <table width="90%">
        <thead>
            <tr>
                <td width="5%">No</td>
                <td >Nama</td>
                <td  >Jabatan</td>
                <td >AI2</td>
                <td >AI3</td>
                <td >AI4</td>
                <td >AI5</td>
                <td >DS7</td>
                <td >DS10</td>
                <td>DS12</td>
                <td >DS13</td>
                <td >Hasil Metode <br>cobit 4.0</td>
            </tr>
            </thead>
            <tbody>    <?php
            $laporan = "select * from hasil";
            $laporan_hasil = mysqli_query($koneksi, $laporan);
            $no=1;
            while ($la = mysqli_fetch_array($laporan_hasil)) {
                $AI2 = "$la[AI2_1]" + "$la[AI2_2]";
                $AI3 = "$la[AI3_1]" + "$la[AI3_2]";
                $AI4 = "$la[AI4_1]" + "$la[AI4_2]";
                $AI5 = "$la[AI5_1]" + "$la[AI5_2]";
                $DS7 = "$la[DS7_1]" + "$la[DS7_2]";
                $DS10 = "$la[DS10_1]" + "$la[DS10_2]";
                $DS12 = "$la[DS12_1]" + "$la[DS12_2]";
                $DS13 = "$la[DS13_1]" + "$la[DS13_2]";

                $t = ($AI2 + $AI3 + $AI4 + $AI5 + $DS7 + $DS10 + $DS12 + $DS13)/16;

                if ($t >= 1 && $t < 2) {
                    
                }

        ?>
            <tr>
                
                <td><?php echo "$no" ?></td>
                <td><?php echo "$la[namaReponden]" ?></td>
                <td><?php echo "$la[jabatan]" ?></td>
                <td><?php echo "$AI2" ?></td>
                <td><?php echo "$AI3" ?></td>
                <td><?php echo "$AI4" ?></td>
                <td><?php echo "$AI5" ?></td>
                <td><?php echo "$DS7" ?></td>
                <td><?php echo "$DS10" ?></td>
                <td><?php echo "$DS12" ?></td>
                <td><?php echo "$DS13" ?></td>
                <td><?php 
                    if ($t >= 1 && $t < 2) {
                        echo "Sangat Tidak Baik";
                    }else if ($t >= 2 && $t < 3) {
                        echo "Sangat Tidak Baik";
                    }else if ($t >= 3 && $t < 4) {
                        echo "Cukup Baik";
                    }else if ($t >= 4 && $t < 5) {
                        echo "Baik";
                    }else if ($t == 5) {
                        echo "Sangat Baik";
                    }
                ?></td>
            </tr>
        <?php
        $no++;
            }
        ?>
        <b>
            <tr>
                <td style="font-weight:700"colspan="3" >Index Maturity</td>
                <td style="font-weight:700"><?php $ma1 = round($im1,1); echo "$ma1" ?></td>
                <td style="font-weight:700"><?php $ma2 = round($im2,1); echo "$ma2" ?></td>
                <td style="font-weight:700"><?php $ma3 = round($im3,1); echo "$ma3" ?></td>
                <td style="font-weight:700"><?php $ma4 = round($im4,1); echo "$ma4" ?></td>
                <td style="font-weight:700"><?php $ma5 = round($im5,1); echo "$ma5" ?></td>
                <td style="font-weight:700"><?php $ma6 = round($im6,1); echo "$ma6" ?></td>
                <td style="font-weight:700"><?php $ma7 = round($im7,1); echo "$ma7" ?></td>
                <td style="font-weight:700"><?php $ma8 = round($im8,1); echo "$ma8" ?></td>
                <td>
                    <?php
                         $total = $cm1 +$cm2 + $cm3 + $cm4 + $cm5 + $cm6 + $cm7 +$cm8;
                         $rata = $total/8;

                         if ($rata >= 0 && $rata <= 0.49) {
                            echo "Non-Existent";
                         }else if ($rata >= 0.50 && $rata <= 1.49) {
                            echo "Initial/Ad Hoc";
                         }else if ($rata >= 1.50 && $rata <= 2.49) {
                            echo "Repeatable but Intuitive";
                         }else if ($rata >= 2.50 && $rata <= 3.49) {
                            echo "Defined process";
                         }else if ($rata >= 3.50 && $rata <= 4.49) {
                            echo "Managed and Masurable";
                         }else if ($rata >= 4.50 && $rata <= 5) {
                            echo "Optimised";
                         }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:700">Total Index Maturity</td>
                <td colspan="8" style="font-weight:700"><?php
                    $total = $cm1 +$cm2 + $cm3 + $cm4 + $cm5 + $cm6 + $cm7 +$cm8;

                    echo "$total";
                ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:700">Rata-Rata Index Maturity</td>
                <td colspan="8" style="font-weight:700"><?php
                    $rata = $total/8;

                    echo "$rata";                    
                ?></td>
                <td><?php
                    if ($rata >= 0 && $rata <= 0.49) {
                        echo "Non-Existent";
                     }else if ($rata >= 0.50 && $rata <= 1.49) {
                        echo "Initial/Ad Hoc";
                     }else if ($rata >= 1.50 && $rata <= 2.49) {
                        echo "Repeatable but Intuitive";
                     }else if ($rata >= 2.50 && $rata <= 3.49) {
                        echo "Defined process";
                     }else if ($rata >= 3.50 && $rata <= 4.49) {
                        echo "Managed and Masurable";
                     }else if ($rata >= 4.50 && $rata <= 5) {
                        echo "Optimised";
                     }
                ?></td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:700" >Nilai Diharapkan</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td style="font-weight:700">5</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:700" >Nilai GAP</td>
                <td style="font-weight:700"><?php $gap1 = round($gap1,3); echo "$gap1" ?></td>
                <td style="font-weight:700"><?php $gap2 = round($gap2,3); echo "$gap2" ?></td>
                <td style="font-weight:700"><?php $gap3 = round($gap3,3); echo "$gap3" ?></td>
                <td style="font-weight:700"><?php $gap4 = round($gap4,3); echo "$gap4" ?></td>
                <td style="font-weight:700"><?php $gap5 = round($gap5,3); echo "$gap5" ?></td>
                <td style="font-weight:700"><?php $gap6 = round($gap6,3); echo "$gap6" ?></td>
                <td style="font-weight:700"><?php $gap7 = round($gap7,3); echo "$gap7" ?></td>
                <td style="font-weight:700"><?php $gap8 = round($gap8,3); echo "$gap8" ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:700" >Total GAP</td>
                <td colspan="8" style="font-weight:700"><?php
                    
                    $totalGAP = $gap1 +$gap2 + $gap3 + $gap4 + $gap5 + $gap6 + $gap7 +$gap8;
                    
                    echo "$totalGAP"
                ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:700">Rata-Rata GAP</td>
                <td colspan="8" style="font-weight:700">
            <?php
                
                    $rataGAP = $totalGAP/8;
                    echo "$rataGAP";
                ?></td>
                <td></td>
            </tr>
        </b>
        </tbody>

    </table>

    <div class="tanggal">
        <div class="isi">
           <h4>
        <?php 
            echo "Soak Laweh, ";
            echo date(' d  M  Y');
        ?>
        <br>
        <br>
        <br>
        <br>
        Wali Nagari
        </h4>
        </div>
    </div>
    <script>window.print();</script>
</div>

<?php
$nh = 5;

$input = "insert into laporan values('','$ma1', '$ma2', '$ma3', '$ma4', '$ma5', '$ma6', '$ma7', '$ma8', '$rata', '$nh', '$rataGAP', NOW())";
$berhasil = mysqli_query($koneksi, $input);

    if (!$berhasil) {
        echo("Error description: " . $koneksi -> error);
    }
?>