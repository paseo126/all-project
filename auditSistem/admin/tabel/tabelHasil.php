<?php

include 'koneksi.php';

$query = "select * from hasil";
$hasil = mysqli_query($koneksi, $query);

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
        <td>Email</td>
        <td>Hasil Kuesioner</td>
        <td>tanggal</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($h =  mysqli_fetch_array($hasil)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$h[namaReponden]"; ?></td>
        <td><?php echo"$h[jabatan]"; ?></td>
        <td><?php echo"$h[email]"; ?></td>
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
        echo" $hasilAkhir"; ?></td>
        <td><?php echo"$h[tanggal]"; ?></td>
</tbody>
<?php
        $no++;
    }
?>
</table>

