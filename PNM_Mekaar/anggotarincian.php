<div class="grid">
	<div class="dh12">
		<div class="card">
			<div class="kepalacard">Data Anggota PNM Mekaar Cabang Bungus</div>
				<div class="isicard2">
					
					 <?php
					 	include "koneksi.php";
					 	$sqlag =  mysqli_query($kon, "select * from anggota where kd_anggota='$_GET[idag]'");
						$rag = mysqli_fetch_array($sqlag);
						$nm_anggota = $rag["nama_anggota"];
					 	 echo"<a href='?p=anggota'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr><br>";
						echo " <table>
									<tr>
										<td><img src='foto/$rag[foto]' width='200px'></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td font-size:30px;>
											<table font-size='20px' border='0px'  width='100%' height='100%'>
												<tr>
													<td>nama</td>
													<td> : </td>
													<td></td>
													<td>$rag[nama_anggota]</td>
												</tr>
												<tr>
													<td>jabatan kerja</td>
													<td> : </td>
													<td></td>
													<td>$rag[jabatan_kerja]</td>
												</tr>
												<tr>
													<td>tempat/tanggal lahir</td>
													<td> : </td>
													<td></td>
													<td>$rag[tempat_lahir],$rag[tanggal_lahir]</td>
												</tr>
												<tr>
													<td>nomor handphone</td>
													<td> : </td>
													<td></td>
													<td>$rag[nomor_hp]</td>
												</tr>
												<tr>
													<td>alamat</td>
													<td> : </td>
													<td></td>
													<td>$rag[alamat]</td>
												</tr>
											</table>
										</td>
									</tr>
								</table><br><hr>
								
								";	
					 ?>

					<?php
					$msqla = mysqli_query($kon, "select * from anggota where kd_anggota = '$_GET[idag]'");
					$la = mysqli_fetch_array($msqla);
					$jbtn = $la['jabatan_kerja'];
					$kerja = "Account Officer";
if ($jbtn == $kerja ) {
						echo "
								<h3>Penanggung Jawab atas Kelompok Nasabah </h3><hr><br>
							<table width='100%' border='1' rules='all'>
								<tr>
									<th>No</th>
									<th>Nik</th>
									<th>Nama</th>
									<th>Kelompok</th>
									<th>Aksi</th>
								</tr>";
$sqlha = mysqli_query($kon, "select * from hasil_kelayakan where pj = '$nm_anggota'");
$no = 1;
while($rha = mysqli_fetch_array($sqlha)){
						echo 	"<tr>
									<td align = center>$no</td>
									<td align = center>$rha[nik]</td>
									<td align = center>$rha[nama]</td>
									<td align = center>$rha[kelompok]</td>
									<td align = center><a href='?p=hasil_rincian&idha=$rha[nik]'><button type='button' class='btn btn-add'><img src='foto/rincian.png' style='width:23px; padding:0px;'></button></a></td>
								</tr>";
$no++;
}
						echo "</table>";
}else{
	echo "<h2>TIdak Ada Nasabah Yang di Pertanggung Jawabkan</h2>";
}
					?>
					 <br>
					 <br>
				</div>
				<div class="kakicard" style="padding-top: 0px;"></div>
		</div>
	</div>
</div>