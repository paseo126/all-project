<?php

    include 'koneksi/koneksi.php';

    $query = "select * from kriteria_ips";
    $variabelS = mysqli_query($koneksi, $query);

    if (!$variabelS) {
        echo("Error description: " . $mysqli -> error);
    }
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Kode Variabel</td>
        <td>Variabel</td>
        <td>Batas Atas</td>
        <td>Batas Bawah</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($s =  mysqli_fetch_array($variabelS)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$s[cdKriteria]"; ?></td>
        <td><?php echo"$s[nmKriteria]"; ?></td>
        <td><?php echo"$s[batasAtas]"; ?></td>
        <td><?php echo"$s[batasBawah]"; ?></td>
        <td>
        <a href="?p=IPSedit&idd=<?php echo "$s[id]" ?>"><button class="tombol f"><i class="far fa-file-edit"></i></i></button></a>
        <a href="?p=IPSdel&idd=<?php echo "$s[id]"; ?>"><button class="tombol"><i class="far fa-trash-alt"></i></button></a></td>
</tbody>
<?php
        $no++;
    }
?>
</table>

