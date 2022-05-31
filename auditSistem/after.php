
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
                    }
            }else{
                include "judul.php";
            }
        ?>
    </div>

<div class="right">
        <img src="img/gambar1.png" alt="gambar1" class="gambar1">
</div>

</div>
</div>