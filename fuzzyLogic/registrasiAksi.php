<?php

include 'koneksi.php';

$namaResponden = $_POST["nama"];
$email = $_POST["email"];
$usernameR = $_POST["username"];
$passwordR = $_POST["pass"];

$cek_username = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$usernameR'"));

if ($cek_username > 0){
echo "<script>window.alert('Username sudah terdaftar, silahkan ganti baru !!')</script>";
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=register'>";

}else {

        $query = "insert into user values('','$usernameR','$passwordR','$namaResponden','$email')";

        $responden = mysqli_query($koneksi, $query);

        if (!$responden) {
            echo("Error description: " . $responden -> error);
        }else{
            echo"<script>alert('Registrasi berhasil, silahkan Login !!');</script>";
            echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=login'>";
        }
}

?>