<div class="maturity">
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

<h2>LAPORAN INDEX MATURITY</h2>
<center><h4>Analisi Sistem Penilaian Kinerja Anggota PKK <br>
Kenagarian Soak Laweh</h4></center>
<br>

<?php 
        include 'koneksi.php';
        $dataH = mysqli_query($koneksi, "select * from hasil");
        $jumlahR = mysqli_num_rows($dataH);
 
        
        // AI21
            $query1 = "select SUM(AI2_1) AS t1 FROM hasil";
            $a1 = mysqli_query($koneksi, $query1);
            $AI2_1 = mysqli_fetch_array($a1);

            
            $c1 = "$AI2_1[t1]";
            $cm1 = $c1/$jumlahR;

        //AI22
            $query2 = "select SUM(AI2_2) AS t2 FROM hasil";
            $a2 = mysqli_query($koneksi, $query2);
            $AI2_2 = mysqli_fetch_array($a2);
            
            $c2 = "$AI2_2[t2]";
            $cm2 = $c2/$jumlahR;
            
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
            
?>

    <table border="1" cellspacing="1">
        <thead>
        <tr>
            <td>No</td>
            <td>Kode Domain</td>
            <td>Sub Domain</td>
            <td>Jumlah Skor</td>
            <td>Current Maturity</td>
            <td>index maturity</td>
        </tr>
        </thead>
        <tr>
            <td rowspan="2">1</td>
            <td rowspan="2">AI2</td>
            <td>1</td>
            <td><?php echo"$AI2_1[t1]"; ?></td>
            <td><?php echo"$cm1"; ?></td>
            <td rowspan="2">
            <?php 
                $im1 = ($cm1 + $cm2)/2;
                echo "$im1"    
            ?>
            </td>
            
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$AI2_2[t2]"; ?></td>
            <td><?php echo"$cm2"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">2</td>
            <td rowspan="2">AI3</td>
            <td>1</td>
            <td><?php echo"$AI3_1[t3]"; ?></td>
            <td><?php echo"$cm3"; ?></td>
            <td rowspan="2">
            <?php 
                $im2 = ($cm3 + $cm4)/2;
                echo "$im2"    
            ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$AI3_2[t4]"; ?></td>
            <td><?php echo"$cm4"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">AI4</td>
            <td>1</td>
            <td><?php echo"$AI4_1[t5]"; ?></td>
            <td><?php echo"$cm5"; ?></td>
            <td rowspan="2">
            <?php 
                $im3 = ($cm5 + $cm6)/2;
                echo "$im3"    
            ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$AI4_2[t6]"; ?></td>
            <td><?php echo"$cm6"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">4</td>
            <td rowspan="2">AI5</td>
            <td>1</td>
            <td><?php echo"$AI5_1[t7]"; ?></td>
            <td><?php echo"$cm7"; ?></td>
            <td rowspan="2">
            <?php 
                $im4 = ($cm7 + $cm8)/2;
                echo "$im4"    
            ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$AI5_2[t8]"; ?></td>
            <td><?php echo"$cm8"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">5</td>
            <td rowspan="2">DS7</td>
            <td>1</td>
            <td><?php echo"$DS7_1[t9]"; ?></td>
            <td><?php echo"$cm9"; ?></td>
            <td rowspan="2">
            <?php 
                $im5 = ($cm9 + $cm10)/2;
                echo "$im5"    
            ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$DS7_2[t10]"; ?></td>
            <td><?php  echo"$cm10"; ?></td>
                
            </td>
        </tr>
        <tr>
            <td rowspan="2">6</td>
            <td rowspan="2">DS10</td>
            <td>1</td>
            <td><?php echo"$DS10_1[t11]"; ?></td>
            <td><?php echo"$cm11"; ?></td>
            <td rowspan="2">
            <?php 
                $im6 = ($cm11 + $cm12)/2;
                echo "$im6"    
            ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$DS10_2[t12]"; ?></td>
            <td><?php echo"$cm12"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">7</td>
            <td rowspan="2">DS12</td>
            <td>1</td>
            <td><?php echo"$DS12_1[t13]"; ?></td>
            <td><?php  echo"$cm13"; ?></td>
            <td rowspan="2">
            <?php 
                $im7 = ($cm13 + $cm14)/2;
                echo "$im7"    
            ?>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><?php echo"$DS12_2[t14]"; ?></td>
            <td><?php echo"$cm14"; ?></td>
        </tr>
        <tr>
            <td rowspan="2">8</td>
            <td rowspan="2">DS13</td>
            <td>1</td>
            <td><?php echo"$DS13_1[t15]"; ?></td>
            <td><?php echo"$cm15"; ?></td>
            <td rowspan="2">
            <?php 
                $im8 = ($cm15 + $cm16)/2;
                echo "$im8"    
            ?>
            </td>
        </tr>
        <tr>
            <?php

            ?>  
            <td>2</td>
            <td><?php echo"$DS13_2[t16]"; ?></td>
            <td><?php echo"$cm16"; ?></td>
        </tr>
        <tr>
            <?php
                $total = $cm1 +$cm2 + $cm3 + $cm4 + $cm5 + $cm6 + $cm7 +$cm8;
                $rata = $total/8;
            ?>
            <td colspan="5" style="font-weight:700"><center>Total </center></td>
            <td><?php echo"$total"; ?> </td>
        </tr>
        <tr>
            <td colspan="5" style="font-weight:700"><center>Rata-Rata </center></td>
            <td><?php echo"$rata"; ?></td>
        </tr>
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
</div>
