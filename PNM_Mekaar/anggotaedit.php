<?php
  include "koneksi.php";
?>
<?php
$sqlag = mysqli_query($kon, "select * from anggota where kd_anggota='$_GET[idag]'");
$rag = mysqli_fetch_array($sqlag);
?>
<div class="card">
<div class="kepalacard">Input Data Anggota</div>
<div class="isicard">
<a href='?p=anggota'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr>
<center>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
          <input name="kd_anggota" type="hidden" id="kd_anggota" value="<?php echo "$rag[kd_anggota]"; ?>">
          <input type="text" name="nama_anggota" id="nama_anggota" value="<?php echo "$rag[nama_anggota]"; ?>" />
          <input type="text" name="jabatan_kerja" id="jabatan_kerja" value="<?php echo "$rag[jabatan_kerja]"; ?>" />
          <table border="0px" width="93%" >
            <tr>
              <td><input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo "$rag[tempat_lahir]"; ?>" /></td>
              <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo"$rag[tanggal_lahir]"; ?>" /></td>
            </tr>
          </table>
          <input type="text" name="nomor_hp" id="nomor_hp" value="<?php echo "$rag[nomor_hp]"; ?>" />
          <textarea name="alamat" id="alamat" cols="45" rows="5" value=""><?php echo "$rag[alamat]"; ?></textarea>
          <input type="file" name="<?php echo "../foto/$rag[foto]"; ?>" />
          <br><input type="submit" name="simpan" id="simpan" value="SIMPAN" />
          <br>
          <br>
    </form>
</center>
<?php
if($_POST["simpan"]){

  $sqlag = mysqli_query($kon, "update anggota set nama_anggota='$_POST[nama_anggota]',jabatan_kerja='$_POST[jabatan_kerja]',tempat_lahir='$_POST[tempat_lahir]',tanggal_lahir='$_POST[tanggal_lahir]',nomor_hp='$_POST[nomor_hp]',alamat='$_POST[alamat]' $foto where kd_anggota='$_POST[kd_anggota]'");

  if($sqlag){
  	echo "simpan Berhasil";
  }else{
    echo "simpan Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=anggota'>";
}
?>
</div>
</div>
