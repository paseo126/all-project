
	<div class="dh12">
		<div class="card">
			<div class="kepalacard">Data Nasabah PNM Mekaar Cabang Bungus</div>
				<div class="isicard2">
					
					 <?php
					 	include "koneksi.php";
					 	 echo"<a href='?p=nasabahadd'><button type='button' class='btn btn-add'>tambah nasabah  &raquo;</button></a><hr><br>
							<table width='100%' border='1' rules='all'>
								<tr>
									<th>No</th>
									<th>Nik</th>
									<th>Nama</th>
									<th>Nomor hp</th>
									<th>Alamat</th>
									<th>Kelompok</th>
									<th>Tanggal</th>
									<th>Aksi</th>
								</tr>";
$sqlna = mysqli_query($kon, "select * from nasabah order by tgl_daftar desc");
$no = 1;
while($rna = mysqli_fetch_array($sqlna)){
						echo 	"<tr>
									<td>$no</td>
									<td>$rna[nik]</td>
									<td>$rna[nama]</td>
									<td>$rna[nohp]</td>
									<td>$rna[alamat]</td>
									<td><center>$rna[kelompok]</center></td>
									<td>$rna[tgl_daftar]</td>
									<td><center>
										<table border:0px;>
											<tr>
												<td><a href='?p=penilaian&idna=$rna[nik]'><button style='width:45px; height:43px' type='button' class='btn btn-add'>nilai</button></a></td>
												<td><a href='?p=nasabahrincian&idna=$rna[nik]'><button type='button' class='btn btn-add'><img src='foto/rincian.png' style='width:23px; padding:0px;'></button></a></td>
												<td><a href='?p=nasabahedit&idna=$rna[nik]'><button type='button' class='btn btn-add'><img src='foto/edit.png' style='width:23px; padding:0px;'></button></a></td>
												<td><a href='?p=nasabahdel&idna=$rna[nik]'><button type='button' class='btn btn-add'><img src='foto/delete.png' style='width:25px; padding:0px;'></button></a></td>
											</tr>
										</table>
									</center></td>
								</tr>";
$no++;
}
						echo "</table>
						<br>
						<br>";
					 ?>
				</div>
				<div class="kakicard" style="padding-top: 0px;"></div>
		</div>
	</div>
</div>