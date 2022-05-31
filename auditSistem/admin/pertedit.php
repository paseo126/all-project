<?php
$id = $_GET["idp"];
include 'koneksi.php';

$query = "select * from domain";
$domain = mysqli_query($koneksi, $query);

if (!$domain) {
    echo("Error description: " . $mysqli -> error);
}

$query2 = "select * from pertanyaan where id='$id'";
$pert = mysqli_query($koneksi, $query2);

if (!$pert) {
    echo("Error description: " . $mysqli -> error);
}
$p =  mysqli_fetch_array($pert);

?>

<div id="container">
<form action="?p=pEdit&idp=<?php echo"$id" ?>" method="post">
            <label for="">Code Domain :</label>
            <select name="codeDomain" id="codeDomain">
                <option value="<?php echo"$p[codeDomain]" ?>"><?php echo"$p[codeDomain]" ?></option>
                <?php
                    while ($h =  mysqli_fetch_array($domain)) {
                ?>
                <option value="<?php echo"$h[codeDomain]" ?>"><?php echo"$h[codeDomain]" ?></option>
                <?php
                    }
                ?>
            </select>
            <label for="">Code Pertanyaan :</label>
			<input type="text" name="codeP" id="codeP" autocomplete="off" value="<?php echo"$p[codeP]" ?>" >
            <label for="">Pertanyaan :</label>
            <textarea name="isiP" id="isiP"><?php echo"$p[isiP]" ?></textarea>
            <input type="submit" class="tombol add" value="save" >
	</form>
</div>