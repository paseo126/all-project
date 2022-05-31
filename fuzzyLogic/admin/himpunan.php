<style>

    .judul{
        width : 100%;
        height : 50px;
        text-align : center;
        background:#64bcf4;
        padding-top : 10px;
    }
    .himpunan{
        width : 100%;
        display : flex;
        justify-content:space-between;
        border-radius : 5px;
        overflow : auto;
        margin : 20px 0 20px 0;
    }

    .card{
        width : 240px;
        height : 230px;
        border-radius : 5px;
        overflow : auto;
        border : 1px solid #000;
    }

    .kepala-card{
        background:#64bcf4;
        height : 40px;
        text-align : center;
        padding-top: 10px;
    }

    .isi-card{
        width : 100%;
        background-color : #fff;
        padding : 3px 3px 3px 3px;
    }

    .isi-card h4{
        font-size : 0.98rem;
        margin-bottom : 5px;
        margin-top : 5px;
    }

    .isi-card h5{
        font-size : 0.8rem;
        color : #828997;
        margin-bottom : 5px
    }
</style>

<a href="?p=himpunan_ipa"><button class="tombol add">IPA</button></a>
<a href="?p=himpunan_ips"><button class="tombol add">IPS</button></a>

<div class="judul"><h3>Himpunan Variabel IPA</h3></div>
<div class="himpunan">
    <div class="card">
        <div class="kepala-card">
            <h4>Kemampuan Dasar</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ipa where cdKriteria='K001'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Biologi</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ipa where cdKriteria='K002'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Fisika</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ipa where cdKriteria='K003'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Kimia</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ipa where cdKriteria='K004'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>
</div>

<div class="judul"><h3>Himpunan Variabel IPS</h3></div>
<div class="himpunan">
    <div class="card">
        <div class="kepala-card">
            <h4>Kemampuan Dasar</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ips where cdKriteria='K001'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Ekonomi</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ips where cdKriteria='K002'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Sosiologi</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ips where cdKriteria='K003'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>

    <div class="card">
        <div class="kepala-card">
            <h4>Geografi</h4>
        </div>
        <div class="isi-card">

        <?php
            $query1 = "select * from himpunan_ips where cdKriteria='K004'";
            $KeDar = mysqli_query($koneksi, $query1);
            while (
                $kd = mysqli_fetch_array($KeDar)) {
        ?>
            <h4><?php echo "$kd[namaHimp]"; ?></h4>
            <h5><?php echo "$kd[batas1] , $kd[batas2] , $kd[batas3]"; ?></h5>
            <hr>
        <?php 
            }
        ?>
        </div>
    </div>
</div>