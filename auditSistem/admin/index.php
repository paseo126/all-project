<?php
  session_start();
  include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuditSistem</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
  $sqla = mysqli_query($koneksi, "select * from admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
  $ra = mysqli_fetch_array($sqla);
?>

    <section id="menu">

        <div class="logo">
            <img src="icon/logo.png" alt="">
            <h2>uditSistem</h2>
        </div>

        <div class="items">
            <li><i class="fad fa-chart-pie-alt"></i><a href="?p=home">Dasbord</a></li>
            <li><i class="fad fa-users"></i><a href="?p=responden">Responden</a></li>
            <li><i class="fal fa-table"></i><a href="?p=domain">Domain</a></li>
            <li><i class="fal fa-table"></i><a href="?p=pertanyaan">Pertanyaan</a></li>
            <li><i class="fal fa-table"></i><a href="?p=hasil">Hasil</a></li>
            <li><i class="fal fa-table"></i><a href="?p=maturity">Index Maturity</a></li>
            <li><i class="fal fa-table"></i><a href="?p=GAP">GAP</a></li>
            <li><i class="fal fa-table"></i><a href="?p=laporan">Laporan</a></li>
            <li><i class="far fa-sign-out-alt"></i><a href="?p=logout">Logout</a></li>
        </div>
    </section>

    <section id="interface">

        <div class="navigation">
            <div class="menu">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
            </div>
        
            <div class="profile">
                    <img src="icon/avatar.png" alt="">
                    <h2><?php echo "$ra[namaAdmin]"; ?></h2>
            </div>

        </div>

        <?php
                if (isset($_GET["p"])) {
                    $page = $_GET["p"];

                    switch ($page) {
                        case 'home':
                            echo"
                            <h3 class='i-name'>
                                Dasboard
                            </h3>";
                            break;
                        
                         case 'responden':
                            echo"
                            <h3 class='i-name'>
                                Responden
                            </h3>";
                            break;
                        case 'domain':
                            echo"
                            <h3 class='i-name'>
                                Domain
                            </h3>";
                            break;
                        case 'domainadd':
                            echo"
                            <h3 class='i-name'>
                                Tambah Data Domain
                            </h3>";
                            break;
                        case 'domainedit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Domain
                            </h3>";
                            break;
                        case 'pertanyaan':
                            echo"
                            <h3 class='i-name'>
                                Peratanyaan
                            </h3>";
                            break;
                        case 'pertadd':
                            echo"
                            <h3 class='i-name'>
                                Tambah Peratanyaan
                            </h3>";
                            break;
                        case 'pertedit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Peratanyaan
                            </h3>";
                            break;
                        case 'maturity':
                            echo"
                            <h3 class='i-name'>
                                Hasil Index Maturity
                            </h3>";
                            break;
                        case 'GAP':
                            echo"
                            <h3 class='i-name'>
                                Hasil GAP
                            </h3>";
                            break;
                        case 'hasil':
                            echo"
                            <h3 class='i-name'>
                                Tabel Hasil
                            </h3>";
                            break;
                        case 'Laporan':
                            echo"
                            <h3 class='i-name'>
                                Laporan Hasil Analisis Sistem
                            </h3>";
                            break;
                    }
                }else{
                    echo "<h3 class='i-name'>
                    Dasboard
                    </h3>";
                }
            ?>
        
        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <?php
                    //   users
                    include 'koneksi.php';
                    $data1 = mysqli_query($koneksi, "select * from responden");
                    $jumlah1 = mysqli_num_rows($data1);

                    ?>
                    <h3><?php echo "$jumlah1"; ?></h3>
                    <span>New users</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fal fa-table"></i>
                <div>
                    <?php
                    //   Domain
                    include 'koneksi.php';
                    $data2 = mysqli_query($koneksi, "select * from domain");
                    $jumlah2 = mysqli_num_rows($data2);

                    ?>
                    <h3><?php echo "$jumlah2"; ?></h3>
                    <span>Domain</span>
                </div>
            </div>

            <div class="val-box">
                <i class="far fa-question"></i>
                <div>
                    <?php
                    //   Domain
                    include 'koneksi.php';
                    $data3 = mysqli_query($koneksi, "select * from pertanyaan");
                    $jumlah3 = mysqli_num_rows($data3);

                    ?>
                    <h3><?php echo "$jumlah3"; ?></h3>
                    <span>Pertanyaan</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fal fa-table"></i>
                    <?php
                    //   hasil
                    include 'koneksi.php';
                    $data4 = mysqli_query($koneksi, "select * from hasil");
                    $jumlah4 = mysqli_num_rows($data4);

                    ?>
                <div>
                    <h3><?php echo "$jumlah4"; ?></h3>
                    <span>Hasil</span>
                </div>
            </div>

        </div>

        <dir class="board">
            <?php
                if (isset($_GET["p"])) {
                    $page = $_GET["p"];

                    switch ($page) {
                        case 'logout':
                            include "logout.php";
                            break;
                        case 'home':
                            include "home.php";
                            break;
                        case 'responden':
                            include "responden.php";
                            break;
                        case 'respdel':
                            include "respondendel.php";
                            break;
                        case 'domain':
                            include "domain.php";
                            break;
                        case 'domainadd':
                            include "domainadd.php";
                            break;
                        case 'domainAksi':
                            include "dAksi.php";
                            break;
                        case 'domaindel':
                            include "domaindel.php";
                            break;
                        case 'domainedit':
                            include "domainedit.php";
                            break;
                        case 'editaksi':
                            include "dEdit.php";
                            break;
                        case 'pertanyaan':
                            include "pertanyaan.php";
                            break;
                        case 'pertadd':
                            include "pertadd.php";
                            break;
                        case 'pertAksi':
                            include "pAksi.php";
                            break;
                        case 'pertedit':
                            include "pertedit.php";
                            break;
                        case 'pEdit':
                            include "pEdit.php";
                            break;
                        case 'pertdel':
                            include "pertdel.php";
                            break;
                        case 'maturity':
                            include "maturity.php";
                            break;
                        case 'GAP':
                            include "gap.php";
                            break;
                        case 'hasil':
                            include "home.php";
                            break;
                        case 'laporan':
                            include "laporan.php";
                            break;
                        default:
                            echo "<h3>Maaf Halaman Tidak Ada</h3>";
                            break;
                    }
                }else{
                    include "home.php";
                }
            ?>
        </dir>
    </section>

    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    </script>

<?php
}else{
  include "login.php";
}
?>
</body>
</html>