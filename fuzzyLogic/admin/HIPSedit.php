<?php
    $id= $_GET["idd"];
    $query = "select * from himpunan_ips where id='$id'";
    $himpunane = mysqli_query($koneksi,$query);
    $hipae = mysqli_fetch_array($himpunane)
?>
<div id="container">
<form action="?p=HIPAeditA&idh=<?php echo "$id" ?>" method="post">
            <input type="hidden" name="kode" id="kode" value="himpunan_ips" >
            <label for="">Code Variabel :</label>
            <select name="codeKriteria" id="codeKriteria">
                <option value="<?php echo "$hipae[cdKriteria]"; ?>"><?php echo "$hipae[cdKriteria]"; ?></option>
                <?php
                    $query = "select * from kriteria_ips order by cdKriteria asc";
                    $himpunan = mysqli_query($koneksi,$query);
                    while ($hipa = mysqli_fetch_array($himpunan)) {
                ?>
                <option value="<?php echo "$hipa[cdKriteria]"; ?>"><?php echo "$hipa[cdKriteria]"; ?></option>
                <?php
                    }
                ?>

            </select>
            <label for="">Code Himpunan :</label>
			<input type="text" name="codeHimp" id="codeHimp" autocomplete="off" value="<?php echo "$hipae[cdHimp]"; ?>">
            <label for="">Himpunan Variabel :</label>
            <input type="text" name="Himp" id="Himp" autocomplete="off" value="<?php echo "$hipae[namaHimp]"; ?>">
            <label for="">Batas I :</label>
            <input type="text" name="B1" id="B1" autocomplete="off" value="<?php echo "$hipae[batas1]"; ?>" >
            <label for="">Batas II :</label>
            <input type="text" name="B2" id="B2" autocomplete="off" value="<?php echo "$hipae[batas2]"; ?>" >
            <label for="">Batas III :</label>
            <input type="text" name="B3" id="B3" autocomplete="off" value="<?php echo "$hipae[batas3]"; ?>">
            <input type="submit" class="tombol add" value="save">
	</form>
</div>