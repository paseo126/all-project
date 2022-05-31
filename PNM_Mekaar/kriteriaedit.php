<div class="dh12">
		<div class="card">
			<div class="kepalacard">Kriteria</div>
				<div class="isicard2">

<?php
$sqlkr = mysqli_query($kon, "select * from kriteria where kd_kriteria='$_GET[idk]'");
$rkr = mysqli_fetch_array($sqlkr);
?>
<br>
<h3>Input Kriteria</h3>
<hr><br>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
	<table>
		<tr>
			<td><input type="text" name="kd_kriteria" id="kd_kriteria" value="<?php echo $rkr[kd_kriteria] ?>" /></td>
			<td><input type="text" name="nm_kriteria" id="nm_kriteria" value="<?php echo $rkr[nm_kriteria] ?> " /></td>
			<td><input type="text" name="batas_atas" id="batas_atas" value=" <?php echo $rkr[batas_atas]  ?>" /></td>
			<td><input type="text" name="batas_bawah" id="batasbawah" value="<?php echo $rkr[batas_bawah]  ?>" /></td>
			<td><input type="submit" name="simpan" id="simpan" value="simpan" /></form></td>
		</tr>
	</table>
		<br>
        <hr><br>
        <hr><br>
        
<?php
if($_POST["simpan"]){
		include "koneksi.php";
		$sql = mysqli_query($kon, "update kriteria set nm_kriteria='$_POST[nm_kriteria]',batas_atas='$_POST[batas_atas]',batas_bawah='$_POST[batas_bawah]' where kd_kriteria='$_POST[kd_kriteria]' ");
		if($sqlkr){
		echo"data berhasil simpan";
		}else{
		echo"Data Gagal Disimpan";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kriteria'>";
	}


echo"
				<table width='100%' border='1' rules='all'>
					<tr>
						<th>no</th>
						<th>kode</th>
						<th>kriteria</th>
						<th>batas bawah</th>
						<th>batas atas</th>
						<th>aksi</th>
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
 