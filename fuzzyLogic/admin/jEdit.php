<?php

$id = $_GET["idj"];
$namaKampus = $_POST["namaKampus"];
$namaJurusan = $_POST["namaJurusan"];
$jurusanSekolah = $_POST["jurusanSekolah"];
$nilai = $_POST["nilaiStandar"];

$query = "update jurusan set namaKampus='$namaKampus', namaJurusan='$namaJurusan', jurusanSekolah='$jurusanSekolah', nilaiStandar='$nilai'  where id='$id'";

$jurusan = mysqli_query($koneksi, $query);

if (!$jurusan) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil edit');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jurusan'>";
}
?>