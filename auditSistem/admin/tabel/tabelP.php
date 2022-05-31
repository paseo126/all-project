<?php

include 'koneksi.php';

$query = "select * from pertanyaan";
$pert = mysqli_query($koneksi, $query);

if (!$pert) {
    echo("Error description: " . $mysqli -> error);
}
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Code Domain</td>
        <td>Code Pertanyaan</td>
        <td>Isi Pertanyaan</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($p =  mysqli_fetch_array($pert)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$p[codeDomain]"; ?></td>
        <td><?php echo"$p[codeP]"; ?></td>
        <td><?php echo"$p[isiP]"; ?></td>
        <td width="15%">
            <a href="?p=pertedit&idp=<?php echo "$p[id]" ?>"><button class="tombol f"><i class="far fa-file-edit"></i></i></button></a>
            <a href="?p=pertdel&idp=<?php echo "$p[id]" ?>"><button class="tombol f"><i class="far fa-trash-alt"></i></button></a>
            
        </td>
</tbody>
<?php
        $no++;
    }
?>
</table>

