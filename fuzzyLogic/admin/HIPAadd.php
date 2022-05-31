<div id="container">
<form action="?p=HIPAaksi" method="post">
            <input type="hidden" name="kode" id="kode" value="himpunan_ipa" >
            <label for="">Code Variabel :</label>
            <select name="codeKriteria" id="codeKriteria">
                <option value="">------------</option>
                <?php
                    $query = "select * from kriteria_ipa order by cdKriteria asc";
                    $himpunan = mysqli_query($koneksi,$query);
                    while ($hipa = mysqli_fetch_array($himpunan)) {
                ?>
                <option value="<?php echo "$hipa[cdKriteria]"; ?>"><?php echo "$hipa[cdKriteria]"; ?></option>
                <?php
                    }
                ?>

            </select>
            <label for="">Code Himpunan :</label>
			<input type="text" name="codeHimp" id="codeHimp" autocomplete="off" >
            <label for="">Himpunan Variabel :</label>
            <input type="text" name="Himp" id="Himp" autocomplete="off" >
            <label for="">Batas I :</label>
            <input type="text" name="B1" id="B1" autocomplete="off" >
            <label for="">Batas II :</label>
            <input type="text" name="B2" id="B2" autocomplete="off" >
            <label for="">Batas III :</label>
            <input type="text" name="B3" id="B3" autocomplete="off" >
            <input type="submit" class="tombol add" value="save">
	</form>
</div>