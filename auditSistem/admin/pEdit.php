<?php

include 'koneksi.php';


$id = $_GET["idp"];
$codeDomain = $_POST["codeDomain"];
$codeP = $_POST["codeP"];
$isiP = $_POST["isiP"];

$query = "update pertanyaan set codeDomain='$codeDomain',codeP='$codeP', isiP='$isiP' where id='$id'";

$pert = mysqli_query($koneksi, $query);

if (!$pert) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil di edit');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pertanyaan'>";
}


?>