<?php

include 'koneksi.php';

$codeDomain = $_POST["codeDomain"];
$codeP = $_POST["codeP"];
$isiP = $_POST["isiP"];

$query = "insert into pertanyaan values('','$codeDomain','$codeP','$isiP')";

$pert = mysqli_query($koneksi, $query);

if (!$pert) {
    echo("Error description: " . $mysqli -> error);
}else{
    echo"<script>alert('data berhasil masuk');</script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=pertanyaan'>";
}


?>