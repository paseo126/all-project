<?php
$sqlag = mysqli_query($kon, "delete from hasil_kelayakan where id='$_GET[idn]'");

if($sqlag){
  echo "Anggota Berhasil Dihapus";
}else{
  echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=tab2l'>";
?>