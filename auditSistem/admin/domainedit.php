<div id="container">

<?php
    include 'koneksi.php';
    $id = $_GET["idd"];

    $query = "select * from domain where id='$id'";
    $domain = mysqli_query($koneksi, $query);

    if (!$domain) {
        echo("Error description: " . $mysqli -> error);
    }

    $d = mysqli_fetch_array($domain);
?>
<form action="?p=editaksi&idd=<?php echo"$id"; ?>" method="post">
            <label for="">Code Domain :</label>
			<input type="text" name="codeDomain" id="codeDomain" autocomplete="off" value="<?php echo "$d[codeDomain]"; ?>" >
            <label for="">Domain :</label>
            <textarea name="namaDomain" id="namaDomain"><?php echo "$d[namaDomain]"; ?></textarea>
            <input type="submit" class="tombol add" value="save">
	</form>
</div>