<?php

include 'koneksi.php';

$query = "select * from domain";
$domain = mysqli_query($koneksi, $query);

if (!$domain) {
    echo("Error description: " . $mysqli -> error);
}
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Code Domain</td>
        <td>Domain</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($h =  mysqli_fetch_array($domain)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$h[codeDomain]"; ?></td>
        <td><?php echo"$h[namaDomain]"; ?></td>
        <td>
            <a href="?p=domainedit&idd=<?php echo "$h[id]" ?>"><button class="tombol f"><i class="far fa-file-edit"></i></i></button></a>
            <a href="?p=domaindel&idd=<?php echo "$h[id]" ?>"><button class="tombol f"><i class="far fa-trash-alt"></i></button></a>
            
        </td>
</tbody>
<?php
        $no++;
    }
?>
</table>

