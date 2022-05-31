<div class="grid">
	<div class="dh3">
		<div id="boxval">
			<a href="<?php echo"?p=perusahaan"; ?>"><h3 style="font-size: 18px">Sejarah Perusahaan &raquo;</h3></a>
		</div>
	</div>
	<div class="dh3">
		<div id="boxval">
			<a href="<?php echo"?p=visi_misi"; ?>"><h3 style="font-size: 18px">Visi & Misi &raquo;</h3></a>
		</div>
	</div>
	<div class="dh3">
		<div id="boxval">
			<a href="<?php echo"?p=anggota"; ?>"><h3 style="font-size: 18px">Anggota &raquo;</h3></a>
		</div>
	</div>
	<div class="dh3">
		<div id="boxval">
			<a href="<?php echo"?p=so"; ?>"><h3 style="font-size: 18px">struktur organisasi &raquo;</h3></a>
		</div>
	</div>

	<div class="dh12">
		<div class="card">
			<div class="kepalacard">Data Anggota PNM Mekaar Cabang Bungus</div>
				<div class="isicard2">
					
					 <?php
					 	include "koneksi.php";
					 	 echo"<a href='?p=anggotaadd'><button type='button' class='btn btn-add'>tambah anggota  &raquo;</button></a><hr><br>
							<table width='100%' border='1' rules='all'>
								<tr>
									<th>No</th>
									<th>Foto</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Nomor Hp</th>
									<th>Alamat</th>
									<th>Aksi</th>
								</tr>";
$sqlag = mysqli_query($kon, "select * from anggota");
$no = 1;
while($rag = mysqli_fetch_array($sqlag)){
						echo 	"<tr>
									<td><center>$no</center></td>
									<td><img src='foto/$rag[foto]' width='100px'></td>
									<td>$rag[nama_anggota]</td>
									<td><center>$rag[jabatan_kerja]</center></td>
									<td><center>$rag[nomor_hp]</center></td>
									<td>$rag[alamat]</td>
									<td><center>
										<table border:0px;>
											<tr>
												<td><a href='?p=anggotarincian&idag=$rag[kd_anggota]'><button type='button' class='btn btn-add'><img src='foto/rincian.png' style='width:23px; padding:0px;'></button></a></td>
												<td><a href='?p=anggotaedit&idag=$rag[kd_anggota]'><button type='button' class='btn btn-add'><img src='foto/edit.png' style='width:23px; padding:0px;'></button></a></td>
												<td><a href='?p=anggotadel&idag=$rag[kd_anggota]'><button type='button' class='btn btn-add'><img src='foto/delete.png' style='width:25px; padding:0px;'></button></a></td>
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