<center>

<div class="maturity">
<style>
    .maturity{
        display: flex;
        align-items: center;
        justify-content:center;
        flex-direction: column;
        width: 80%;
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
<center>
<h4>Laporan Hasil Penilaian Responden<br>
Analisi Sistem Penilaian Kinerja Anggota PKK <br>
Kenagarian Soak Laweh</h4></center>
<hr style="width : 100%;">
<br>

<?php

include 'koneksi.php';

$query = "select * from hasil";
$hasil = mysqli_query($koneksi, $query);
$jmlR = mysqli_num_rows($hasil);

if (!$hasil) {
    echo("Error description: " . $mysqli -> error);
}
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Jabatan</td>
        <td>Tanggal</td>
        <td>Hasil Kuesioner</td>
        <td>rata-rata</td>
        <td>Hasil Metode <br>cobit 4.0</td>
    </tr>
</thead>

<?php
    $no = 1;
    $jumlah = 0;
    $jumlahR = 0;
    while ($h =  mysqli_fetch_array($hasil)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$h[namaReponden]"; ?></td>
        <td><?php echo"$h[jabatan]"; ?></td>
        <td><?php echo"$h[tanggal]"; ?></td>
        <td><?php 
        
        $n1 = $h["AI2_1"];
        $n2 = $h["AI2_2"];
        $n3 = $h["AI3_1"];
        $n4 = $h["AI3_2"];
        $n5 = $h["AI4_1"];
        $n6 = $h["AI4_2"];
        $n7 = $h["AI5_1"];
        $n8 = $h["AI5_1"];
        $n9 = $h["DS7_1"];
        $n10 = $h["DS7_2"];
        $n11 = $h["DS10_1"];
        $n12 = $h["DS10_2"];
        $n13 = $h["DS12_1"];
        $n14 = $h["DS12_2"];
        $n15 = $h["DS13_1"];
        $n16 = $h["DS13_2"];

        $hasilAkhir = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 +$n7 + $n8 + $n9 + $n10 + $n11 + $n12 + $n13 + $n14 + $n15 + $n16;
        $t = $hasilAkhir/16;
        echo" $hasilAkhir"; ?></td>
        <td><?php echo "$t" ?></td>
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
<?php
        $jumlah = $jumlah + $hasilAkhir;
        $jumlahR = $jumlahR + $t;
        $no++;
    }

    $rj = $jumlah / $jmlR;
    $rata = $jumlahR / $jmlR;
?>
<tr>
    <td colspan="4">Total</td>
    <td><?php echo "$jumlah"; ?></td>
    <td><?php echo "$jumlahR"; ?></td>
    <td></td>
</tr>
<tr>
    <td colspan="4">Rata-Rata</td>
    <td><?php echo "$rj"; ?></td>
    <td><?php echo "$rata"; ?></td>
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