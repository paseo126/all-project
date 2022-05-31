<?php
include "koneksi.php";
$sqlp = mysqli_query($kon, "delete from kriteria where kd_kriteria='$_GET[idk]'");

if($sqlp){
  echo "Data Berhasil Dihapus";
}else{
  echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kriteria'>";
?>