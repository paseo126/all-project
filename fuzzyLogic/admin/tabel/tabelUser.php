<?php

include 'koneksi/koneksi.php';

$query = "select * from user";
$responden = mysqli_query($koneksi, $query);

if (!$responden) {
    echo("Error description: " . $mysqli -> error);
}
?>
<table width="100%">
<thead>
    <tr>
        <td>No</td>
        <td>Nama</td>
        <td>Email</td>
        <td>Username</td>
        <td>##</td>
    </tr>
</thead>

<?php
    $no = 1;
    while ($h =  mysqli_fetch_array($responden)) {
?>
    <tbody>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$h[namaLengkap]"; ?></td>
        <td><?php echo"$h[email]"; ?></td>
        <td><?php echo"$h[username]"; ?></td>
        <td><a href="?p=respdel&idr=<?php echo "$h[id]"; ?>"><button class="tombol"><i class="far fa-trash-alt"></i></button></a></td>
</tbody>
<?php
        $no++;
    }
?>
</table>

