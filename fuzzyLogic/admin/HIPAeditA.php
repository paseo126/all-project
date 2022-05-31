<?php

include 'koneksi/koneksi.php';

$id = $_GET["idh"];
$kode = $_POST["kode"];
$codeKriteria = $_POST["codeKriteria"];
$codeHimp = $_POST["codeHimp"];
$Himp = $_POST["Himp"];
$batasI = $_POST["B1"];
$batasII = $_POST["B2"];
$batasIII = $_POST["B3"];


$query = "update $kode set cdKriteria='$codeKriteria', cdHimp='$codeHimp', namaHimp='$Himp', batas1='$batasI', batas2='$batasII', batas3='$batasIII' where id='$id'";

$himp = mysqli_query($koneksi, $query);

if (!$himp) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil di edit');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=$kode'>";
}


?>