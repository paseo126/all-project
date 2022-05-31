


<div class="dh12">
    <div class="card">
      <div class="kepalacard">Kriteria</div>
        <div class="isicard2" style="padding-left: 40px">
<br>
<h3>Input Kriteria</h3>
          
<br><a href='?p=nasabah'><button type='button' class='btn btn-add'>&lArr;kembali</button></a>
<hr><br>


<?php
            include "koneksi.php";

            $sqlna = mysqli_query($kon, "select * from nasabah where nik='$_GET[idna]'");
            $rkn = mysqli_fetch_array($sqlna);

            echo "<h3 style ='font-size:40px;'><table>
                    <tr>
                      <td align='left'>Nik</td>
                      <td align='left'>:</td>
                      <td align='left'>$rkn[nik]</td>
                    <tr>
                    <tr>
                      <td align='left'>nama</td>
                      <td align='left'>:</td>
                      <td align='left'>$rkn[nama]</td>
                    <tr>
                    <tr>
                      <td align='left'>kelompok</td>
                      <td align='left'>:</td>
                      <td align='left'>$rkn[kelompok]</td>
                    <tr>
                  </table></h3>";
                  
                //tanggal
                  
                   



          ?>

<br>
<hr>
<br>

<form id="form1" name="form1" method="post" action="<?php echo "?p=hasil_kelayakan"; ?>" enctype="multipart/form-data">

<input name="nik" type="hidden" id="nik" value="<?php echo "$rkn[nik]"; ?>">
<input name="nama" type="hidden" id="nama" value="<?php echo "$rkn[nama]"; ?>">
<input name="kelompok" type="hidden" id="kelompok" value="<?php echo "$rkn[kelompok]"; ?>">

  <table>
    <tr>
      <td style="padding-right: 0px;">
         <?php
            $sqlpr = mysqli_query($kon, "select * from anggota where jabatan_kerja = 'Account Officer'  ");
            echo "<select name='nm_anggota' id='nm_anggota' style='width:100%;'>";
            echo "<option value=''>pili AO</option>";
            while($rpr = mysqli_fetch_array($sqlpr)){
              echo "<option value='$rpr[nama_anggota]'>$rpr[nama_anggota]</option>";
            }
            echo "</select>";
         ?>

      </td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">silahkan pilih AO yang bertanggung jawab</td>
    </tr>
    <tr>
      <td><input type="text" name="k1" id="k1" value="" placeholder="umur" /></td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">batas ketentuan umur = 18-63 tahun</td>
    </tr>
    <tr>
      <td><input type="text" name="k2" id="k2" value="" placeholder="pendapatan" /></td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">batas pendapatan perkapita =  Rp.0- Rp. 800.0000</td>
    </tr>
    <tr>
      <td><input type="text" name="k3" id="k3" value="" placeholder="waktu tempuh" /></td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">Batas waktu Tempuh = 0 - 20 menit</td>
    </tr>
    <tr>
      <td><input type="text" name="k4" id="k4" value="" placeholder="administrasi" /></td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">batas penilaian kelengkapan adm = 0 - 100</td>
    </tr>
    <tr>
      <td><input type="text" name="k5" id="k5" value="" placeholder="reputasi riwayat pinjaman" /></td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">batas penilaian reputasi riwayat pinjaman = 0 - 100</td>
    </tr>
    <tr>
      <td><input type="text" name="k6" id="k6" value="" placeholder="sikap" /></td>
      <td></td>
      <td></td>
      <td align="left" style="padding-left: 20px;">batas penilaian Sikap = 0 - 100</td>
    </tr>
    <tr>
      <td><center><input type="submit" name="hitung" id="hitung" value="Hitung" /></form></center></td>
    </tr>
  </table>
    <br>
        <hr><br>
        <hr><br>
        

<br>
<br>
      </div>
    </div>
    </div>
  </div>
  