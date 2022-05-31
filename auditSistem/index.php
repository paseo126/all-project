<?php
    session_start();
    include 'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="./tampilan/style.css">
    <title>Document</title>
</head>
<body>
<div class="big-wrapper light ">
<?php
    if(!empty($_SESSION["userR"]) and !empty($_SESSION["passR"])){
    $sqla = mysqli_query($koneksi, "select * from responden where usernameR='$_SESSION[userR]' and passwordR='$_SESSION[passR]'");
    $ra = mysqli_fetch_array($sqla);
?>
        <header>
            <div class="container">

                <div class="logo">
                    <img src="admin/icon/logo.png" alt="logo">
                    <h3>uditSistem</h3>
                </div>

                <div class="links">

                    <ul>
                        <li><a href="?page=home">Hello</a></li>
                        <li><a href="?page=home"><?php echo "$ra[namaResponden]" ?></a></li>
                        <li><a href="?page=about">about</a></li>
                        <li><a href="?p=logout" class="btn">Logout</a></li>
                    </ul>

                </div>
                <div class="overlay"></div>
                <div class="berger">
                    <div class="bar"></div>
                </div>
                
            </div>
        </header>
            <?php 

                if (isset($_GET["p"])) {
                    $page = $_GET["p"];

                    switch ($page) {
                                
                        case 'logout':
                            include "logout.php";
                            break;
                        case 'beranda':
                            include "judul.php";
                            break;
                        case 'isiKuesioner':
                            include "isiKuesioner.php";
                            break;
                        case 'kuesioner':
                            include "kuesionerAksi.php";
                            break;
                        }
                }else{
                    include "after.php";
                }
            ?>
    <?php
    }else{
        include "before.php";
    }
    ?>
</div>

    <script src="./tampilan/main.js"></script>
</body>
</html>