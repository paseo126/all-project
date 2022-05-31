<?php

include 'koneksi/koneksi.php';
$kode = $_POST["kode"];
$codeKriteria = $_POST["codeKriteria"];
$namaKriteria = $_POST["kriteria"];
$batasAtas = $_POST["B_atas"];
$batasBawah = $_POST["B_bawah"];

$query = "insert into $kode values('','$codeKriteria','$namaKriteria','$batasAtas','$batasBawah')";

$kIpa = mysqli_query($koneksi, $query);

if (!$kIpa) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil masuk');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=$kode'>";
}


?>