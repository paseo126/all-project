<?php

    include 'koneksi/koneksi.php';

    $query = "select * from kriteria_ipa order by cdKriteria ASC";
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
        <td>Variabel</td>
        <td>Batas Atas</td>
        <td>Batas Bawah</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($h =  mysqli_fetch_array($variabelA)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$h[cdKriteria]"; ?></td>
        <td><?php echo"$h[nmKriteria]"; ?></td>
        <td><?php echo"$h[batasAtas]"; ?></td>
        <td><?php echo"$h[batasBawah]"; ?></td>
        <td>
            <a href="?p=KIPAedit&idd=<?php echo "$h[id]" ?>"><button class="tombol f"><i class="far fa-file-edit"></i></i></button></a>    
            <a href="?p=KIPAdel&idd=<?php echo "$h[id]"; ?>"><button class="tombol"><i class="far fa-trash-alt"></i></button></a></td>
</tbody>
<?php
        $no++;
    }
?>
</table>

