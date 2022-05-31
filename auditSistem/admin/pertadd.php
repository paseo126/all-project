<?php

include 'koneksi.php';

$query = "select * from domain";
$domain = mysqli_query($koneksi, $query);

if (!$domain) {
    echo("Error description: " . $mysqli -> error);
}
?>

<div id="container">
<form action="?p=pertAksi" method="post">
            <label for="">Code Domain :</label>
            <select name="codeDomain" id="codeDomain">
                <option value="">Code Domain</option>
                <?php
                    while ($h =  mysqli_fetch_array($domain)) {
                ?>
                <option value="<?php echo"$h[codeDomain]" ?>"><?php echo"$h[codeDomain]" ?></option>
                <?php
                    }
                ?>
            </select>
            <label for="">Code Pertanyaan :</label>
			<input type="text" name="codeP" id="codeP" autocomplete="off" >
            <label for="">Pertanyaan :</label>
            <textarea name="isiP" id="isiP"></textarea>
            <input type="submit" class="tombol add" value="save" >
	</form>
</div>