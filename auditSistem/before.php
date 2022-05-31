<header>
    <div class="container">

        <div class="logo">
            <img src="admin/icon/logo.png" alt="logo">
            <h3>uditSistem</h3>
        </div>

        <div class="links">

            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=register">Registrasi</a></li>
                <li><a href="?page=about">about</a></li>
                <li><a href="?page=login" class="btn">sign in</a></li>
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
                        case 'home':
                            include "after.php";
                            break;
                        }
                }else{
                    include "after.php";
                }
            ?>
        >
