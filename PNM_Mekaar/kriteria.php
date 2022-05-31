<div class="dh12">
		<div class="card">
			<div class="kepalacard">Kriteria</div>
				<div class="isicard2">
<br>
<h3>Input Kriteria</h3>
<a href='?p=home'><button type='button' class='btn btn-add'>&lArr;kembali</button></a>
<hr><br>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
	<table>
		<tr>
			<td><input type="text" name="kd_kriteria" id="kd_kriteria" value="" placeholder="kd kriteria" /></td>
			<td><input type="text" name="nm_kriteria" id="nm_kriteria" placeholder="kriteria" /></td>
			<td><input type="text" name="batas_atas" id="batas_atas" placeholder="batas 1" /></td>
			<td><input type="text" name="batas_bawah" id="batas_bawah" placeholder="batas 2" /></td>
			<td><input type="submit" name="simpan" id="simpan" value="Tambah" /></form></td>
		</tr>
	</table>
		<br>
        <hr><br>
        <hr><br>
        
<?php
if($_POST["simpan"]){
		include "koneksi.php";
		$sqlkr = mysqli_query($kon, "insert into kriteria (kd_kriteria,nm_kriteria,batas_atas,batas_bawah) values ('$_POST[kd_kriteria]', '$_POST[nm_kriteria]','$_POST[batas_atas]','$_POST[batas_bawah]')");
		if($sqlkr){
		echo"berhasil di simpan";
		}else{
		echo"Data Gagal Disimpan";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kriteria'>";
	}

include "koneksi.php";
echo"
				<table width='100%' border='1' rules='all'>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Kriteria</th>
						<th>Batas bawah</th>
						<th>Batas atas</th>
						<th>Aksi</th>
					</tr>";
$sqlkr = mysqli_query($kon, "select * from kriteria");
$no = 1;
while($rkr = mysqli_fetch_array($sqlkr)){

echo "	<tr>
			<td><center>$no</center></td>
			<td><center>$rkr[kd_kriteria]</center></td>
			<td><center>$rkr[nm_kriteria]</center></td>
			<td><center>$rkr[batas_atas]</center></td>
			<td><center>$rkr[batas_bawah]</center></td>
			<td><center>
			<a href='?p=kriteriahimp&idk=$rkr[kd_kriteria]'><button type='button' class='btn btn-add'>himpunan</button></a> 
			<a href='?p=kriteriaedit&idk=$rkr[kd_kriteria]'><button type='button' class='btn btn-add'>edit</button></a>
			<a href='?p=kriteriadel&idk=$rkr[kd_kriteria]'><button type='button' class='btn btn-add'>X</button></a>
			</td>
		</tr>";
$no++;
}
echo "</table>";

?>
<br>
<br>
			</div>
		</div>
	  </div>
	</div>
 