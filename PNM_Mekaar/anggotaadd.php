<?php
  include "koneksi.php";
?>

<div class="card">
<div class="kepalacard">Input Data Anggota</div>
<div class="isicard">
<a href='?p=anggota'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr>
<center>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
          <input type="text" name="nama_anggota" id="nama_anggota" placeholder="nama anggota" />
          <input type="text" name="jabatan_kerja" id="jabatan_kerja" placeholder="jabatan" />
          <table border="0px" width="93%" >
            <tr>
              <td><input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat lahir" /></td>
              <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" /></td>
            </tr>
          </table>
          <input type="text" name="nomor_hp" id="nomor_hp" placeholder="No. Handphone" />
          <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Alamat Lengkap"></textarea>
          <input type="file" name="foto" />
          <br><input type="submit" name="simpan" id="simpan" value="SIMPAN" />
          <br>
          <br>
    </form>
</center>
<?php
if($_POST["simpan"]){
  $nmfoto  = $_FILES["foto"]["name"];
  $lokfoto = $_FILES["foto"]["tmp_name"];
  if(!empty($lokfoto)){
    move_uploaded_file($lokfoto, "foto/$nmfoto");
	$foto = ", '$nmfoto'";
  }else{
    $foto = "";
  }
  
  $sqlag = mysqli_query($kon, "insert into anggota (nama_anggota,jabatan_kerja,tempat_lahir,tanggal_lahir,nomor_hp,alamat,foto) values ('$_POST[nama_anggota]', '$_POST[jabatan_kerja]', '$_POST[tempat_lahir]', '$_POST[tanggal_lahir]', '$_POST[nomor_hp]', '$_POST[alamat]'  $foto)");
  
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
