<?php
  include "koneksi.php";

$sqlna = mysqli_query($kon, "select * from nasabah where nik='$_GET[idna]'");
$rna = mysqli_fetch_array($sqlna);
?>


<div class="card">
<div class="kepalacard">Input Data Nasabah</div>
<div class="isicard">
<a href='?p=nasabah'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr>
<center>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
          <input type="text" name="nik" id="nik" value="<?php echo "$rna[nik]"; ?>" />
          <input type="text" name="nama" id="nama" value="<?php echo "$rna[nama]"; ?>" />
          <input type="text" name="nama_ayah" id="nama_ayah" value="<?php echo "$rna[nama_ayah]"; ?>" />
          <table border="0px" width="93%" >
            <tr>
              <td><input type="text" name="tempat" id="tempat" value="<?php echo "$rna[tempat]"; ?>" /></td>
              <td><input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo "$rna[tgl_lahir]"; ?>" /></td>
            </tr>
          </table>
          <input type="text" name="nohp" id="nohp" value="<?php echo "$rna[nohp]"; ?>" />
          <input type="text" name="stts_perkawinan" id="stts_perkawinan" value="<?php echo "$rna[stts_perkawinan]"; ?>" />
          <input type="text" name="nama_suami" id="nama_suami" value="<?php echo "$rna[nama_suami]"; ?>" />
          <input type="text" name="jml_anak" id="jml_anak" value="<?php echo "$rna[jml_anak]"; ?>" />
          <textarea name="usaha" id="usaha" cols="45" rows="5" placeholder=""><?php echo "$rna[usaha]"; ?></textarea>
          <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder=""><?php echo "$rna[alamat]"; ?></textarea>
          <input type="text" name="kelompok" id="kelompok" value="<?php echo "$rna[kelompok]"; ?>" />
          <?php
           /* include "koneksi.php";
            $sqlpr = mysqli_query($kon, "select * from anggota order by nama_anggota desc");
            echo "<select name='nm_anggota' id='nm_anggota'>";
            echo "<option value=''>-----</option>";
            while($rpr = mysqli_fetch_array($sqlpr)){
              echo "<option value='$rpr[nama_anggota]'>$rpr[nama_anggota]</option>";
            }
            echo "</select>";*/
          ?>
          <br><input type="submit" name="simpan" id="simpan" value="SIMPAN" />
          <br>
          <br>
    </form>
</center>
<?php
if($_POST["simpan"]){
  include "koneksi.php";
  $sqlna = mysqli_query($kon, "update nasabah set nama='$_POST[nama]',nama_ayah='$_POST[nama_ayah]',tempat='$_POST[tempat]',tgl_lahir='$_POST[tgl_lahir]',nohp='$_POST[nohp]',stts_perkawinan='$_POST[stts_perkawinan]',nama_suami='$_POST[nama_suami]',jml_anak='$_POST[jml_anak]',usaha='$_POST[usaha]',alamat='$_POST[alamat]',kelompok='$_POST[kelompok]' where nik='$_POST[nik]'");

  if($sqlna){
  	echo "update Berhasil";
  }else{
    echo "simpan Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=nasabah'>";
}
?>
</div>
</div>
