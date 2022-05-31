<style>
    .grid{
        width : 100%;
        height : 300px;
        display:flex;
        justify-content: space-between;
    }

    .card{
        width : 235px;
        background: #fff;
        border-radius:5px;
        overflow:auto;
    }

    .kepala-card{
        width:100%;
        height:40px;
        padding-top:8px;
        background:#64bcf4;
        display:flex;
        justify-content:center;
        border-bottom:1px solid #000;
    }
</style>

<div class="grid">
    <div class="card">
        <div class="kepala-card">
            <h4>User</h4>
        </div>
        <div style="padding:5px 5px 5px 5px">
            <?php
        
            include 'koneksi/koneksi.php';

            $queryr = "SELECT * FROM user ORDER BY id ASC LIMIT 0,3;";
            $domainr = mysqli_query($koneksi, $queryr);

            if (!$domainr) {
            echo("Error description: " . $mysqli -> error);
            }

                    while ($hr =  mysqli_fetch_array($domainr)) {
                ?>
                    <h3><?php echo "$hr[namaLengkap]"; ?></h3>
                    <span><?php echo "$hr[username]"; ?></span>
                    <hr>
                <?php
                        }
                ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Kriteria</h4>
        </div>
        <div style="padding:5px 5px 5px 5px">
        <?php

            $query = "SELECT * FROM kriteria_ipa ORDER BY cdKriteria ASC LIMIT 0,4;";
            $domain = mysqli_query($koneksi, $query);

            if (!$domain) {
            echo("Error description: " . $mysqli -> error);
            }

            while ($h =  mysqli_fetch_array($domain)) {
        ?>
            <h3><?php echo "$h[cdKriteria]" ?></h3>
            <span><?php echo "$h[nmKriteria]" ?></span>
            <hr>
        <?php
                }
        ?>
        </div>
    </div>
    <div class="card">
        <div class="kepala-card">
            <h4>Himpunan</h4>
        </div>
        <div style="padding:5px 5px 5px 5px">
        <?php
        

        $queryp = "SELECT * FROM himpunan_ipa ORDER BY cdHimp ASC LIMIT 0,2;";
        $domainp = mysqli_query($koneksi, $queryp);

        if (!$domainp) {
        echo("Error description: " . $mysqli -> error);
        }

                while ($hp =  mysqli_fetch_array($domainp)) {
            ?>
                <h3><?php echo "$hp[cdHimp]"; ?></h3>
                <span><?php echo "$hp[namaHimp]"; ?></span>
                <hr>
            <?php
                    }
            ?>
        </div>
    </div>
    <div class="card">
        <div class="kepala-card">
            <h4>Hasil</h4>
        </div>
        <div style="padding:5px 5px 5px 5px">
        <?php

        $queryh = "SELECT * FROM hasil ORDER BY id ASC LIMIT 0,4;";
        $domainh = mysqli_query($koneksi, $queryh);

        if (!$domainh) {
        echo("Error description: " . $mysqli -> error);
        }

                while ($hh =  mysqli_fetch_array($domainh)) {
            ?>
                <h3><?php echo "$hh[namaLengkap]"; ?></h3>
                <span><?php echo "$hh[hasilPenilaian],"; ?></span>
                <hr>
            <?php
                    }
            ?>
        </div>
    </div>
</div>