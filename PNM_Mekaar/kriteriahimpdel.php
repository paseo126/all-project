<?php
include "koneksi.php";
$sqlkr =  mysqli_query($kon, "select * from kriteria  where kd_kriteria='$_GET[idk]'");
$rkr = mysqli_fetch_array($sqlkr);

$sqlp = mysqli_query($kon, "delete from $rkr[nm_kriteria] where kd_himp='$_GET[idh]'");
if($sqlp){
  echo "Berhasil Dihapus";
}else{
  echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kriteriahimp&idk=$_GET[idk]'>";
?>