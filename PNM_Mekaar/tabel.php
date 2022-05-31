
	<div class="dh12">
		<div class="card">
			<div class="kepalacard">Data Nasabah PNM Mekaar Cabang Bungus Yang Sudah Dinilai</div>
				<div class="isicard2">
					
					 <?php
					 	include "koneksi.php";
					 	 echo"<a href='?p=nasabahadd'><button type='button' class='btn btn-add'>tambah nasabah  &raquo;</button></a><hr><br>
							<table width='100%' border='1' rules='all'>
								<tr>
									<th>No</th>
									<th>Nik</th>
									<th>Nama</th>
									<th>Kelompok</th>
									<th>Penanggung jawab</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>";
$sqlna = mysqli_query($kon, "select * from hasil_kelayakan order by waktu desc");
$no = 1;
while($rna = mysqli_fetch_array($sqlna)){
						echo 	"<tr>
									<td>$no</td>
									<td>$rna[nik]</td>
									<td>$rna[nama]</td>
									<td>$rna[kelompok]</td>
									<td>$rna[pj]</td>
									<td>$rna[keterangan]</td>
									<td><a href='?p=tabeldel&idn=$rna[id]'><button type='button' class='btn-x'>X</button></a></td>
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