<?php

            $usernameR = $_POST["username"];
            $passwordR = $_POST["pass"];


        include 'koneksi.php';
        $sqla = mysqli_query($koneksi, "select * from user where username='$usernameR' and password='$passwordR'");
        $ra = mysqli_fetch_array($sqla);
        $row = mysqli_num_rows($sqla);


        if($row > 0){
            $_SESSION["userR"] = $ra["username"];
            $_SESSION["passR"] = $ra["password"];

        echo "login berhasil";
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=home'>";
        }else{
            echo "login gagal";
        }
?>