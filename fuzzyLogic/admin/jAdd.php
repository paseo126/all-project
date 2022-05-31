<?php

include 'koneksi/koneksi.php';
$namaKampus = $_POST["namaKampus"];
$namaJurusan = $_POST["namaJurusan"];
$jurusanSekolah = $_POST["jurusanSekolah"];
$nilai = $_POST["nilaiStandar"];

$query = "insert into jurusan values('','$namaKampus','$namaJurusan','$jurusanSekolah','$nilai')";

$jurusan = mysqli_query($koneksi, $query);

if (!$jurusan) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil masuk');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jurusan'>";
}
?>