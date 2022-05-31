<?php
$sqlna = mysqli_query($kon, "delete from nasabah where nik='$_GET[idna]'");
$sqltab = mysqli_query($kon, "delete from hasil_kelayakan where nik='$_GET[idna]'");

if($sqlna){
  echo "data berhasil di hapus";
}else{
  echo "Gagal Menghapus";
}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=tabel'>";
?>