<?php

    include 'koneksi/koneksi.php';

    $query = "select * from himpunan_ips order by cdHimp ASC";
    $variabelA = mysqli_query($koneksi, $query);

    if (!$variabelA) {
        echo("Error description: " . $mysqli -> error);
    }
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Kode Variabel</td>
        <td>Kode Himpunan</td>
        <td>Himpunan</td>
        <td>Batas I</td>
        <td>Batas II</td>
        <td>Batas III</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($hA =  mysqli_fetch_array($variabelA)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$hA[cdKriteria]"; ?></td>
        <td><?php echo"$hA[cdHimp]"; ?></td>
        <td><?php echo"$hA[namaHimp]"; ?></td>
        <td><?php echo"$hA[batas1]"; ?></td>
        <td><?php echo"$hA[batas2]"; ?></td>
        <td><?php echo"$hA[batas3]"; ?></td>
        <td>
            <a href="?p=HIPSedit&idd=<?php echo "$hA[id]" ?>"><button class="tombol f"><i class="far fa-file-edit"></i></i></button></a>    
            <a href="?p=HIPSdel&idd=<?php echo "$hA[id]"; ?>"><button class="tombol"><i class="far fa-trash-alt"></i></button></a></td>
</tbody>
<?php
        $no++;
    }
?>
</table>

