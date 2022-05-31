<?php
    $id = $_GET["idd"];

    $query = "delete from jurusan where id='$id'";

    $jurusan = mysqli_query($koneksi,$query);

    if (!$jurusan) {
        echo("Error description: " . $mysqli -> error);
    }else{
        echo"<script>alert('data berhasil di hapus');</script>";
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=jurusan'>";
    }
    

?>