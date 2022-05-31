<div class="dh12">
		<div class="card">
			<div class="kepalacard">Kriteria</div>
				<div class="isicard2" style="padding-left: 40px">
<br>
<a href='?p=kriteria'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><br>
<h3>Input Himpunan Kriteria</h3>
<hr><br>
	<?php
include "koneksi.php";
$sqlkr =  mysqli_query($kon, "select * from kriteria where kd_kriteria='$_GET[idk]'");
$rkr = mysqli_fetch_array($sqlkr);
	echo "Kriteria";
	echo "<table><tr><td><hr>kode : $rkr[kd_kriteria]<hr>";
	echo "nama : $rkr[nm_kriteria]<hr>";
	echo "semesta pembicaraan : $rkr[batas_atas]-$rkr[batas_bawah]<hr></td></tr></table>";
?>
<div id="dh10">
<div class='card'>
<div class="kepalacard"><h5>Tambah Himpunan Fuzzy</h5></div>
<div class='isicard'>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
	<table>
		<tr>
			<td><input type="text" name="kd_himp" id="kd_himp" value="<?php echo"$rkr[kd_kriteria]-" ?>" placeholder="" /></td>
			<td><input type="text" name="himpunan" id="himpunan" placeholder="himpunan" /></td>
			<td><input type="text" name="batas1" id="batas1" placeholder="batas 1" /></td>
			<td><input type="text" name="batas2" id="batas2" placeholder="batas 2" /></td>
			<td><input type="text" name="batas3" id="batas3" placeholder="batas 3" /></td>
			<td><input type="submit" name="simpan" id="simpan" value="Tambah" /></form></td>
		</tr>
	</table>
            <br>
            <hr>
            <br>  
        
<?php
if($_POST["simpan"]){
		include "koneksi.php";
		$sqlkr =  mysqli_query($kon, "select * from kriteria where kd_kriteria='$_GET[idk]'");
		$rkr = mysqli_fetch_array($sqlkr);
		$sqlhm = mysqli_query($kon, "insert into $rkr[nm_kriteria] (kd_himp,kd_kriteria,himpunan,batas1,batas2,batas3) values ('$_POST[kd_himp]','$rkr[kd_kriteria]', '$_POST[himpunan]','$_POST[batas1]','$_POST[batas2]','$_POST[batas3]')");
		if($sqlhm){
		echo"<META HTTP-EQUIV='Refresh'>";
		}else{
		echo"Data Gagal Disimpan";
		}

	}


echo"<table width='100%' border='1' rules='all'>
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>Batas 1</th>
			<th>Batas 2</th>
			<th>Batas 3</th>
			<th>Aksi</th>
		</tr>";
$sqlh = mysqli_query($kon, "select * from $rkr[nm_kriteria] where kd_kriteria='$_GET[idk]'");
$no = 1;
while($rh = mysqli_fetch_array($sqlh)){
echo "	<tr>
			<td><center>$rh[kd_himp]</center></td>
			<td><center>$rh[himpunan]</center></td>
			<td><center>$rh[batas1]</center></td>
			<td><center>$rh[batas2]</center></td>
			<td><center>$rh[batas3]</center></td>
			<td><center>
			<a href='?p=kriteriahimpdel&idh=$rh[kd_himp]&idk=$rkr[kd_kriteria]'><button type='button' class='btn-x'>X</button></a>
			</td>
		</tr>";
		$no++;
	}
echo "</table><br><hr>";

?>
<br>
<br>
			</div>
		</div>
	  </div>
	</div>
 