<?php
    include 'koneksi.php';
    $id = $_GET["idr"];

    $query = "delete from responden where id='$id'";

    $domain = mysqli_query($koneksi,$query);

    if (!$domain) {
        echo("Error description: " . $mysqli -> error);
    }else{
        echo"<script>alert('data berhasil di hapus');</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=responden'>";
    }
    

?>