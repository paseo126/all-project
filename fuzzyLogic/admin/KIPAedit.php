<?php



$id = $_GET["idk"];
$kode = $_POST["kode"];
$codeKriteria = $_POST["codeKriteria"];
$namaKriteria = $_POST["kriteria"];
$batasAtas = $_POST["B_atas"];
$batasBawah = $_POST["B_bawah"];

$query = "update $kode set cdKriteria='$codeKriteria',nmKriteria='$namaKriteria', batasAtas='$batasAtas', batasBawah='$batasBawah' where id='$id'";

$kriteria = mysqli_query($koneksi, $query);

if (!$kriteria) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil di edit');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=$kode'>";
}


?>