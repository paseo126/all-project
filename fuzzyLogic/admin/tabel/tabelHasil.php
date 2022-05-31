<?php

    include 'koneksi/koneksi.php';

    $query = "select * from hasil";
    $jurusan = mysqli_query($koneksi, $query);

    if (!$jurusan) {
        echo("Error description: " . $mysqli -> error);
    }
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Nama Lengkap</td>
        <td>Jurusan</td>
        <td>Hasil Penilaian</td>
        <td>Rekomendasi</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($jr =  mysqli_fetch_array($jurusan)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$jr[namaLengkap]"; ?></td>
        <td><?php echo"$jr[jurusan]"; ?></td>
        <td><?php echo"$jr[hasilPenilaian]"; ?></td>
        <td><?php echo"$jr[rekomendasi1]<br>$jr[rekomendasi2]<br>$jr[rekomendasi3]<br>"; ?></td>
<?php
        $no++;
    }
?>
</table>

