<?php
  include "koneksi.php";
?>

<div class="card">
<div class="kepalacard">Input Data Nasabah</div>
<div class="isicard">
<a href='?p=nasabah'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr>
<center>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
          <input type="text" name="nik" id="nik" placeholder="nik" />
          <input type="text" name="nama" id="nama" placeholder="nama" />
          <input type="text" name="nama_ayah" id="nama_ayah" placeholder="nama_ayah" />
          <table border="0px" width="93%" >
            <tr>
              <td><input type="text" name="tempat" id="tempat" placeholder="Tempat lahir" /></td>
              <td><input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" /></td>
            </tr>
          </table>
          <input type="text" name="nohp" id="nohp" placeholder="No. Handphone" />
          <input type="text" name="stts_perkawinan" id="stts_perkawinan" placeholder="stts_perkawinan" />
          <input type="text" name="nama_suami" id="nama_suami" placeholder="nama suami" />
          <input type="text" name="jml_anak" id="jml_anak" placeholder="jumlah anak" />
          <textarea name="usaha" id="usaha" cols="45" rows="5" placeholder="nama usaha"></textarea>
          <textarea name="alamat" id="alamat" cols="45" rows="5" placeholder="Alamat Lengkap"></textarea>
          <input type="text" name="kelompok" id="kelompok" placeholder="kelompok" />
          <br><input type="submit" name="simpan" id="simpan" value="SIMPAN" />
          <br>
          <br>
    </form>
</center>
</div>
</div>

<?php
if(isset($_POST["simpan"])){
   $nIK=$_POST['nik'];

 $cek_nik = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM nasabah WHERE nik='$nIK'"));
    if ($cek_nik > 0){
    echo "<script>window.alert('NIK (Nomor Induk Kependudukan) yang anda masukan sudah digunakan!!! silahkan ganti atau Periksa Lagi!!!')</script>";
    }else {

  $sqlna = mysqli_query($kon, "insert into nasabah (nik,nama,nama_ayah,tempat,tgl_lahir,nohp,stts_perkawinan,nama_suami,jml_anak,usaha,alamat,kelompok,tgl_daftar) values ('$_POST[nik]', '$_POST[nama]', '$_POST[nama_ayah]', '$_POST[tempat]', '$_POST[tgl_lahir]', '$_POST[nohp]','$_POST[stts_perkawinan]', '$_POST[nama_suami]', '$_POST[jml_anak]', '$_POST[usaha]', '$_POST[alamat]', '$_POST[kelompok]',NOW())");
  
  if($sqlag){
    echo "<script>alert('Simpan Data Nasabah Berhasil!')</script>";
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=nasabah'>";
  }else{
    echo "Register Gagal";
     echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=nasabahadd'>";
  }
 }
}
?>