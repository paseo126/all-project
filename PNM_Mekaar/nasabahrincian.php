<div class="grid">
	<div class="dh12">
		<div class="card">
			<div class="kepalacard">Data Nasabah PNM Mekaar Cabang Bungus</div>
				<div class="isicard2">
					
					 <?php
					 	include "koneksi.php";
					 	$sqlna =  mysqli_query($kon, "select * from nasabah where nik='$_GET[idna]'");
						$rna = mysqli_fetch_array($sqlna);
					 	 echo"<a href='?p=nasabah'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr><br>";
						
						echo " <table'>
									<tr>
										<td>
											<table font-size='20px' border='0px'  width='100%' height='100%'>
												<tr>
													<td>NIK</td>
													<td> : </td>
													<td></td>
													<td>$rna[nik]</td>
												</tr>
												<tr>
													<td>NAMA LENGKAP</td>
													<td> : </td>
													<td></td>
													<td>$rna[nama]</td>
												</tr>
												<tr>
													<td>NAMA AYAH</td>
													<td> : </td>
													<td></td>
													<td>$rna[nama_ayah]</td>
												</tr>
												<tr>
													<td>TEMPAT & TANGGAL LAHIR</td>
													<td> : </td>
													<td></td>
													<td>$rna[tempat] , $rna[tgl_lahir]</td>
												</tr>
												<tr>
													<td>NO. HANDPHONE</td>
													<td> : </td>
													<td></td>
													<td>$rna[nohp]</td>
												</tr>
												<tr>
													<td>STATUS PERKAWINAN</td>
													<td> : </td>
													<td></td>
													<td>$rna[stts_perkawinan]</td>
												</tr>
												<tr>
													<td>NAMA SUAMI</td>
													<td> : </td>
													<td></td>
													<td>$rna[nama_suami]</td>
												</tr>
												<tr>
													<td>JUMLAH ANAK</td>
													<td> : </td>
													<td></td>
													<td>$rna[jml_anak]</td>
												</tr>
												<tr>
													<td>NAMA USAHA</td>
													<td> : </td>
													<td></td>
													<td>$rna[usaha]</td>
												</tr>
												<tr>
													<td>ALAMAT</td>
													<td> : </td>
													<td></td>
													<td>$rna[alamat]</td>
												</tr>
											</table>
										</td>
									</tr>
								</table><br><hr>
								";	
					 ?>
					 <br>
					 <br>
				</div>
				<div class="kakicard" style="padding-top: 0px;"></div>
		</div>
	</div>
</div>