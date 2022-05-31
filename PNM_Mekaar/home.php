<!-- untuk Jam -->
<div class="grid" style="margin: 10px">
  <div class="dh8" style="float: right; margin-top: 0px">
    <?php 

    include "gambar.php";
    ?>
  </div>
  <div class="dh4">
    <div class="isicard0" style="align-content: center;">
      <?php
        include 'jam.php';

        echo "<br><br><br><br><br><h3 style='color:#ffffff; margin:5%;'>
          <hr style='width:75%; float:left;'><br><br><br>
          ";

        echo date('l, d-M-Y');
        echo "</h3>";
      ?>
    </div>
  </div>  
</div>
<div class="grid">

  <!-- Untuk Kategori -->
  <?php
  $sqlk = mysqli_query($kon, "select * from nasabah");
  $rowk = mysqli_num_rows($sqlk);
  $sqln = mysqli_query($kon, "select * from nasabah order by tgl_daftar desc limit 5");
  ?>
  <div class="dh3">

    <div class='card'>
      <div class="kepalacard">
        <table width="100%">
          <tr>
            <td>Data Nasabah </td>
            <td><?php echo "$rowk"; ?></td>
          </tr>
        </table>
      </div>
      <div class="isicard">
      <?php
      if($rowk == 0){
	    echo "Belum ada Nasabah ditambahkan";
	  }else{
	    echo "<hr>";
		while($rn = mysqli_fetch_array($sqln)){
		  echo "<big>$rn[nama]</big>
		  <br>Kelompok : $rn[kelompok]
		  <hr>";
		}
	  }
	  ?>
      </div>
      <div class="kakicard">
      <a href="<?php echo "?p=nasabah"; ?>"><button type="button" class="btn2 btn2-add">
      <table>
        <tr>
          <td>
            <img src="foto/pnm3.png" style="width: 30px; ">
          </td>
          <td align="center">
            Detail
          </td>
        </tr>
      </table>
      </button></a>
      </div>
    </div>
    <br>
  </div>
  
  <!-- Untuk Anggota -->
  <?php
  $sqla = mysqli_query($kon, "select * from anggota");
  $rowa = mysqli_num_rows($sqla);
  $sqla = mysqli_query($kon, "select * from anggota order by kd_anggota desc limit 5");
  ?>
  <div class="dh3">
    <div class='card'>
      <div class="kepalacard">
      <table width="100%">
          <tr>
            <td>Anggota </td>
            <td><?php echo "$rowa"; ?></td>
          </tr>
        </table>
      </div>
      <div class="isicard">
      <?php
      if($rowa == 0){
      echo "Belum ada Anggota ditambahkan";
    }else{
      echo "<hr>";
    while($ra = mysqli_fetch_array($sqla)){
      echo "<big>$ra[nama_anggota]</big>
      <br>jabatan : $ra[jabatan_kerja]
      <hr>";
    }
    }
    ?>
      </div>
      <div class="kakicard">
      <a href="<?php echo "?p=anggota"; ?>"><button type="button" class="btn2 btn2-add">
      <table>
        <tr>
          <td>
            <img src="foto/pnm3.png" style="width: 30px; ">
          </td>
          <td align="center">
            Detail
          </td>
        </tr>
      </table>
      </button></a>
      </div>
    </div>
    <br>
  </div>
  <!-- Untuk Kriteria -->
  <?php
  $sqlk = mysqli_query($kon, "select * from kriteria");
  $rowk = mysqli_num_rows($sqlk);
  $sqlkr = mysqli_query($kon, "select * from kriteria order by kd_kriteria asc limit 5");
  ?>
  <div class="dh3">
    <div class='card'>
      <div class="kepalacard">
        <table width="100%">
          <tr>
            <td>Kriteria </td>
            <td><?php echo "$rowk"; ?></td>
          </tr>
        </table>
      </div>
      <div class="isicard">
      <?php
      if($rowk == 0){
      echo "Belum ada kategori ditambahkan";
    }else{
      echo "<hr>";
    while($rkr = mysqli_fetch_array($sqlkr)){
      echo "<big>$rkr[nm_kriteria]</big>
      <br>$rkr[batas_atas],$rkr[batas_bawah]
      <hr>";
    }
    }
    ?>
      </div>
      <div class="kakicard">
      <a href="<?php echo "?p=kriteria"; ?>"><button type="button" class="btn2 btn2-add">
      <table>
        <tr>
          <td>
            <img src="foto/pnm3.png" style="width: 30px; ">
          </td>
          <td align="center">
            Detail
          </td>
        </tr>
      </table>
      </button></a>
      </div>
    </div>
    <br>
  </div>


  <?php
  $sqlhk = mysqli_query($kon, "select * from hasil_kelayakan");
  $rowhk = mysqli_num_rows($sqlhk);
  $sqlha = mysqli_query($kon, "select * from hasil_kelayakan order by waktu asc limit 5");
  ?>
  <div class="dh3">
    <div class='card'>
      <div class="kepalacard">
        <table width="100%">
          <tr>
            <td>Hasil Kelayakan </td>
            <td><?php echo "$rowhk"; ?></td>
          </tr>
        </table>
      </div>
      <div class="isicard">
      <?php
      if($rowk == 0){
      echo "Belum ada hasil_kelayakan ditambahkan";
    }else{
      echo "<hr>";
    while($rkha = mysqli_fetch_array($sqlha)){
      echo "<big>$rkha[nama]</big>
      <br>$rkha[keterangan]
      <hr>";
    }
    }
    ?>
    
      </div>
      <div class="kakicard">
     <a href="<?php echo "?p=tabel"; ?>"><button type="button" class="btn2 btn2-add">
      <table>
        <tr>
          <td>
            <img src="foto/pnm3.png" style="width: 30px; ">
          </td>
          <td align="center">
            Detail
          </td>
        </tr>
      </table>
      </button></a>
      </div>
    </div>
    <br>

</div>