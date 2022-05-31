<?php
    $id = $_GET["idd"];

    $query = "select * from kriteria_ipa where id='$id'";
    $kri = mysqli_query($koneksi,$query);
    $k = mysqli_fetch_array($kri);
?>
<div id="container">
<form action="?p=Kedit&idk=<?php echo "$id"; ?>" method="post">
            <input type="hidden" name="kode" id="kode" value="kriteria_ipa" >
            <label for="">Code Kriteria :</label>
			<input type="text" name="codeKriteria" id="codeKriteria" autocomplete="off" value="<?php echo"$k[cdKriteria]"; ?>">
            <label for="">Kriteria :</label>
            <input type="text" name="kriteria" id="kriteria" autocomplete="off" value="<?php echo"$k[nmKriteria]"; ?>" >
            <label for="">Batas Atas :</label>
            <input type="text" name="B_atas" id="B_atas" autocomplete="off" value="<?php echo"$k[batasAtas]"; ?>" >
            <label for="">Batas Atas :</label>
            <input type="text" name="B_bawah" id="B_bawah" autocomplete="off" value="<?php echo"$k[batasBawah]"; ?>" >
            <input type="submit" class="tombol add" value="save">
	</form>
</div>