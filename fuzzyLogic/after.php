
<div class="area"> 
    <div class="container">
    <div class="left">
        <?php 
            if (isset($_GET["page"])) {
                $page = $_GET["page"];

                switch ($page) {
                    case 'login':
                        include "login.php";
                        break;
                    case 'loginAksi':
                        include "loginAksi.php";
                        break;
                    case 'register':
                        include "registrasi.php";
                        break;
                    case 'registerAksi':
                        include "registrasiAksi.php";
                        break;
                    case 'home':
                        include "judul.php";
                        break;
                    case 'penilaianIPA':
                        include "penilaianIPA.php";
                        break;
                    case 'ipaAksi':
                        include "ipaAksi.php";
                        break;
                    case 'penilaianIPS':
                        include "penilaianIPS.php";
                        break;
                    case 'ipsAksi':
                        include "ipsAksi.php";
                        break;
                    case 'hasilIPS':
                        include "hasilIPS.php";
                        break;
                    case 'hasilIPA':
                        include "hasilIPA.php";
                        break;
                    case 'jurusan':
                        include "jurusan.php";
                        break;
                    case 'hasil':
                        include "hasil.php";
                        break;
                    }
            }else{
                include "judul.php";
            }
        ?>
    </div>

<div class="right">
        <img src="img/kuliah.png" alt="gambar1" class="gambar1">
</div>

</div>
</div>