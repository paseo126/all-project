<?php

include 'koneksi/koneksi.php';
$kode = $_POST["kode"];
$codeKriteria = $_POST["codeKriteria"];
$codeHimp = $_POST["codeHimp"];
$Himp = $_POST["Himp"];
$batasI = $_POST["B1"];
$batasII = $_POST["B2"];
$batasIII = $_POST["B3"];

$query = "insert into $kode values('','$codeKriteria','$codeHimp','$Himp','$batasI','$batasII','$batasIII')";

$himp = mysqli_query($koneksi, $query);

if (!$himp) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil masuk');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=$kode'>";
}


?>