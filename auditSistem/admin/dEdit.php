<?php

include 'koneksi.php';


$id = $_GET["idd"];
$codeDomain = $_POST["codeDomain"];
$namaDomain = $_POST["namaDomain"];

$query = "update domain set codeDomain='$codeDomain',namaDomain='$namaDomain' where id='$id'";

$domain = mysqli_query($koneksi, $query);

if (!$domain) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil di edit');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=domain'>";
}


?>