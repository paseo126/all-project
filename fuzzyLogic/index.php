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
    $sqla = mysqli_query($koneksi, "select * from user where username='$_SESSION[userR]' and password='$_SESSION[passR]'");
    $ra = mysqli_fetch_array($sqla);
?>
        <header>
            <div class="container">
                <div class="logo">
                    <img src="img/logo.png" alt="logo">
                    <h3>SMA Negri 1 Siberut Utara</h3>
                </div>

                <div class="links">

                    <ul>
                        <li><a href="?page=home"><?php echo "$ra[namaLengkap]" ?></a></li>
                        <li><a href="?page=hasil">Hasil Penilaian</a></li>
                        <li><a href="?page=jurusan">Jurusan</a></li>
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