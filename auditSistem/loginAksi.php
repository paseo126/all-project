<?php

            $usernameR = $_POST["username"];
            $passwordR = $_POST["pass"];


        include 'koneksi.php';
        $sqla = mysqli_query($koneksi, "select * from responden where usernameR='$usernameR' and passwordR='$passwordR'");
        $ra = mysqli_fetch_array($sqla);
        $row = mysqli_num_rows($sqla);


        if($row > 0){
            $_SESSION["userR"] = $ra["usernameR"];
            $_SESSION["passR"] = $ra["passwordR"];

        echo "login berhasil";
        echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=home'>";
        }else{
            echo "login gagal";
        }
?>