<?php
    $id = $_GET["idd"];

    $query = "delete from himpunan_ips where id='$id'";

    $kIPA = mysqli_query($koneksi,$query);

    if (!$kIPA) {
        echo("Error description: " . $mysqli -> error);
    }else{
        echo"<script>alert('data berhasil di hapus');</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=himpunan_ips'>";
    }
    

?>