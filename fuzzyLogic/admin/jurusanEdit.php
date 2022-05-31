<style>
    input[type="radio"]{
        margin : 10px 10px 10px 10px;
        width : 18px;
        height : 18px;
    }
</style>

<?php
    $id = $_GET["idd"];
    
    $query = "select * from jurusan where id='$id'";
    $jurusan = mysqli_query($koneksi, $query);
    $jr = mysqli_fetch_array($jurusan);
?>
<div id="container">
<form action="?p=jEdit&idj=<?php echo "$id"; ?>" method="post">
            <label for="">Nama Kampus :</label>
			<input type="text" name="namaKampus" id="namaKampus" autocomplete="off" value="<?php echo "$jr[namaKampus]"; ?>">
            <label for="">Nama Jurusan :</label>
            <input type="text" name="namaJurusan" id="namaJurusan" autocomplete="off" value="<?php echo "$jr[namaJurusan]"; ?>">
            <label for="">Jurusan Sekolah :</label><br>
            <input type="radio" name="jurusanSekolah" id="jurusanSekolah" value="IPA"><label for="IPA">IPA</label>
            <input type="radio" name="jurusanSekolah" id="jurusanSekolah" value="IPS"><label for="IPS">IPS</label>
            <br>
            <label for="">Nilai Standar:</label>
            <input type="text" name="nilaiStandar" id="nilaiStandar" autocomplete="off" value="<?php echo "$jr[nilaiStandar]"; ?>">
            <input type="submit" class="tombol add" value="save">
	</form>
</div>