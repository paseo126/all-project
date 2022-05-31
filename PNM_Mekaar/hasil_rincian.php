<div class="grid">
	<div class="dh12">
		<div class="card">
			<div class="kepalacard">Data Nasabah PNM Mekaar Cabang Bungus</div>
				<div class="isicard2">
					
					 <?php
					 	include "koneksi.php";
					 	$nik = "$_GET[idha]";
					 	$sqlnas =  mysqli_query($kon, "select * from nasabah where nik='$nik'");
						$rnas = mysqli_fetch_array($sqlnas);
					 	 echo"<a href='?p=anggota'><button type='button' class='btn btn-add'>&lArr;kembali</button></a><hr><br>";
						
						echo " <table'>
									<tr>
										<td>
											<table font-size='20px' border='0px'  width='100%' height='100%'>
												<tr>
													<td>NIK</td>
													<td> : </td>
													<td></td>
													<td>$rnas[nik]</td>
												</tr>
												<tr>
													<td>NAMA LENGKAP</td>
													<td> : </td>
													<td></td>
													<td>$rnas[nama]</td>
												</tr>
												<tr>
													<td>NAMA AYAH</td>
													<td> : </td>
													<td></td>
													<td>$rnas[nama_ayah]</td>
												</tr>
												<tr>
													<td>TEMPAT & TANGGAL LAHIR</td>
													<td> : </td>
													<td></td>
													<td>$rnas[tempat] , $rnas[tgl_lahir]</td>
												</tr>
												<tr>
													<td>NO. HANDPHONE</td>
													<td> : </td>
													<td></td>
													<td>$rnas[nohp]</td>
												</tr>
												<tr>
													<td>STATUS PERKAWINAN</td>
													<td> : </td>
													<td></td>
													<td>$rnas[stts_perkawinan]</td>
												</tr>
												<tr>
													<td>NAMA SUAMI</td>
													<td> : </td>
													<td></td>
													<td>$rnas[nama_suami]</td>
												</tr>
												<tr>
													<td>JUMLAH ANAK</td>
													<td> : </td>
													<td></td>
													<td>$rnas[jml_anak]</td>
												</tr>
												<tr>
													<td>NAMA USAHA</td>
													<td> : </td>
													<td></td>
													<td>$rnas[usaha]</td>
												</tr>
												<tr>
													<td>ALAMAT</td>
													<td> : </td>
													<td></td>
													<td>$rnas[alamat]</td>
												</tr>
											</table>
										</td>
									</tr>
								</table><br><hr>
								";	
								$sqlha =  mysqli_query($kon, "select * from hasil_kelayakan where nik='$nik'");
						$rha = mysqli_fetch_array($sqlha);
								echo "

									<table>
									  <tr>
									    <td align='left'>Umur</td>
									    <td>:</td>
									    <td align='left'>$rha[k1]</td>
									  </tr>
									  <tr>
									    <td align='left'>Pendapatan Bulanan perkapita</td>
									    <td>:</td>
									    <td align='left'>$rha[k2]</td>
									  </tr>
									  <tr>
									    <td align='left'>Waktu tempuh</td>
									    <td>:</td>
									    <td align='left'>$rha[k3]</td>
									  </tr>
									  <tr>
									    <td align='left'>Kelengkapan Adminnistrasi</td>
									    <td>:</td>
									    <td align='left'>$rha[k4]</td>
									  </tr>
									  <tr>
									    <td align='left'>Reputasi Rwayat Peminjaman</td>
									    <td>:</td>
									    <td align='left'>$rha[k5]</td>
									  </tr>
									  <tr>
									    <td align='left'>Sikap</td>
									    <td>:</td>
									    <td align='left'>$rha[k6]</td>
									  </tr>
									  <tr>
									    <td align='left'>Hasil Mamdani</td>
									    <td>:</td>
									    <td align='left'>$rha[mamdani]</td>
									  </tr>
									  <tr>
									    <td align='left'>Hasil Tsukamoto</td>
									    <td>:</td>
									    <td align='left'>$rha[tsukamoto]</td>
									  </tr>
									  <tr>
									    <td align='left'>Keterangan</td>
									    <td>:</td>
									    <td align='left'>$rha[keterangan]</td>
									  </tr>
									  </table>
  ";

					 ?>
					 <br>
					 <br>
				</div>
				<div class="kakicard" style="padding-top: 0px;"></div>
		</div>
	</div>
</div>