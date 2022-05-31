<?php
  session_start();
  include 'koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <link rel="stylesheet" href="style/style.css">

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
            <img src="img/logo.png" alt="">
            <h4>SMA Negri 1 Siberut Utara</h4>
        </div>

        <div class="items">
            <li><i class="fad fa-chart-pie-alt"></i><a href="?p=home">Dasbord</a></li>
            <li><i class="fad fa-users"></i><a href="?p=user">Users</a></li>
            <li><i class="fal fa-table"></i><a href="?p=kriteria_ipa">Kriteria</a></li>
            <li><i class="fal fa-table"></i><a href="?p=himpunan">Himpunan</a></li>
            <li><i class="fal fa-table"></i><a href="?p=jurusan">Jurusan</a></li>
            <li><i class="fal fa-table"></i><a href="?p=hasil">Hasil Penilaian</a></li>
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
                    <img style="border:1px solid #000;" src="img/admin.png" alt="">
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
                        
                         case 'user':
                            echo"
                            <h3 class='i-name'>
                                Users
                            </h3>";
                            break;
                        case 'kriteria_ipa':
                            echo"
                            <h3 class='i-name'>
                                Kriteria IPA
                            </h3>";
                            break;
                        case 'KIPAadd':
                            echo"
                            <h3 class='i-name'>
                                Tambah Data Kriteria IPA
                            </h3>";
                            break;
                        case 'KIPAedit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Kriteria IPA
                            </h3>";
                            break;
                        case 'kriteria_ips':
                            echo"
                            <h3 class='i-name'>
                                Kriteria IPS
                            </h3>";
                            break;
                        case 'IPSadd':
                            echo"
                            <h3 class='i-name'>
                                Tambah Data Kriteria IPS
                            </h3>";
                            break;
                        case 'IPSedit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Kriteria IPS
                            </h3>";
                            break;
                        case 'himpunan':
                            echo"
                            <h3 class='i-name'>
                                Data Himpunan
                            </h3>";
                            break;
                        case 'himpunan_ipa':
                            echo"
                            <h3 class='i-name'>
                                Data Himpunan IPA
                            </h3>";
                            break;
                        case 'HIPAadd':
                            echo"
                            <h3 class='i-name'>
                                Tambah Data Himpunan IPA
                            </h3>";
                            break;
                        case 'HIPAedit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Himpunan IPA
                            </h3>";
                            break;
                        case 'himpunan_ips':
                            echo"
                            <h3 class='i-name'>
                                Data Himpunan IPS
                            </h3>";
                            break;
                        case 'HIPSadd':
                            echo"
                            <h3 class='i-name'>
                                Tambah Data Himpunan IPS
                            </h3>";
                            break;
                        case 'HIPSedit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Himpunan IPS
                            </h3>";
                            break;
                        case 'jurusan':
                            echo"
                            <h3 class='i-name'>
                                Data Jurusan
                            </h3>";
                            break;
                        case 'jurusanAdd':
                            echo"
                            <h3 class='i-name'>
                               Tambah Data Jurusan
                            </h3>";
                            break;
                        case 'jurusanEdit':
                            echo"
                            <h3 class='i-name'>
                                Edit Data Jurusan
                            </h3>";
                            break;
                        case 'hasil':
                            echo"
                            <h3 class='i-name'>
                                Data Hasil Penilaian Siswa
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
                    $data1 = mysqli_query($koneksi, "select * from user");
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
                    $data2 = mysqli_query($koneksi, "select * from kriteria_ipa");
                    $jumlah2 = mysqli_num_rows($data2);
                    $data6 = mysqli_query($koneksi, "select * from kriteria_ips");
                    $jumlah6 = mysqli_num_rows($data6);
                    $kriteria = $jumlah2 + $jumlah6;
                    ?>
                    <h3><?php echo "$kriteria"; ?></h3>
                    <span>Kriteria</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fas fa-cogs"></i>
                <div>
                    <?php
                    //   Domain
                    $data3 = mysqli_query($koneksi, "select * from himpunan_ipa");
                    $jumlah3 = mysqli_num_rows($data3);

                    $data31 = mysqli_query($koneksi, "select * from himpunan_ips");
                    $jumlah31 = mysqli_num_rows($data31);

                    $himp = $jumlah3 + $jumlah31;

                    ?>
                    <h3><?php echo "$himp"; ?></h3>
                    <span>Himpunan</span>
                </div>
            </div>

            <div class="val-box">
                <i class="fal fa-table"></i>
                    <?php
                    //   hasil
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
                        case 'user':
                            include "user.php";
                            break;
                        case 'kriteria_ipa':
                            include "kriteria_ipa.php";
                            break;
                        case 'kriteria_ips':
                            include "kriteria_ips.php";
                            break;
                        case 'IPSadd':
                            include "kriteriaIPSadd.php";
                            break;
                        case 'IPSedit':
                            include "kriteriaIPSedit.php";
                            break;
                        case 'IPSdel':
                            include "KIPSdel.php";
                            break;
                        case 'KIPAadd':
                            include "kriteriaIPAadd.php";
                            break;
                        case 'KIPAedit':
                            include "kriteriaIPAedit.php";
                            break;
                        case 'Kedit':
                            include "KIPAedit.php";
                            break;
                        case 'KIPAaksi':
                            include "KIPAaksi.php";
                            break;
                        case 'KIPAdel':
                            include "KIPAdel.php";
                            break;
                        case 'himpunan':
                            include "himpunan.php";
                            break;
                        case 'himpunan_ipa':
                            include "himpunan_ipa.php";
                            break;
                        case 'HIPAadd':
                            include "HIPAadd.php";
                            break;
                        case 'HIPAaksi':
                            include "HIPAaksi.php";
                            break;
                        case 'HIPAedit':
                            include "HIPAedit.php";
                            break;
                        case 'HIPAeditA':
                            include "HIPAeditA.php";
                            break;
                        case 'HIPAdel':
                            include "HIPAdel.php";
                            break;
                        case 'himpunan_ips':
                            include "himpunan_ips.php";
                            break;
                        case 'HIPSadd':
                            include "HIPSadd.php";
                            break;
                        case 'HIPSedit':
                            include "HIPSedit.php";
                            break;
                        case 'HIPSeditA':
                            include "HIPSeditA.php";
                            break;
                        case 'HIPSdel':
                            include "HIPSdel.php";
                            break;
                        case 'jurusan':
                            include "jurusan.php";
                            break;
                        case 'jurusanAdd':
                            include "jurusanAdd.php";
                            break;
                        case 'jAdd':
                            include "jAdd.php";
                            break;
                        case 'jurusanEdit':
                            include "jurusanEdit.php";
                            break;
                        case 'jEdit':
                            include "jEdit.php";
                            break;
                        case 'jDel':
                            include "jDel.php";
                            break;
                        case 'hasil':
                            include "hasil.php";
                            break;
                        default:
                            echo "<h3>Maaf Halaman Tidak Ada</h3>";
                            break;
                    }
                }else{
                    include "home.php";
                }
            ?>
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