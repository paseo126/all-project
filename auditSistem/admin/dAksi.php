<?php

include 'koneksi.php';

$codeDomain = $_POST["codeDomain"];
$namaDomain = $_POST["namaDomain"];

$query = "insert into domain values('','$codeDomain','$namaDomain')";

$domain = mysqli_query($koneksi, $query);

if (!$domain) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil masuk');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=domain'>";
}


?>