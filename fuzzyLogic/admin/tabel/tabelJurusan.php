<?php

    include 'koneksi/koneksi.php';

    $query = "select * from jurusan order by nilaiStandar=80 ASC";
    $jurusan = mysqli_query($koneksi, $query);

    if (!$jurusan) {
        echo("Error description: " . $mysqli -> error);
    }
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Nama Kampus</td>
        <td>Jurusan Kuliah</td>
        <td>Jurusan Sekolah</td>
        <td>Nilai Standard</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($jr =  mysqli_fetch_array($jurusan)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$jr[namaKampus]"; ?></td>
        <td><?php echo"$jr[namaJurusan]"; ?></td>
        <td><?php echo"$jr[jurusanSekolah]"; ?></td>
        <td><?php echo"$jr[nilaiStandar]"; ?></td>
        <td>
            <a href="?p=jurusanEdit&idd=<?php echo "$jr[id]" ?>"><button class="tombol f"><i class="far fa-file-edit"></i></i></button></a>    
            <a href="?p=jDel&idd=<?php echo "$jr[id]"; ?>"><button class="tombol"><i class="far fa-trash-alt"></i></button></a></td>
</tbody>
<?php
        $no++;
    }
?>
</table>

