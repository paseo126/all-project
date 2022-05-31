<style>
    .ips{
        border-radius : 10px;
        background-color : #bce2faf3;
        overflow : auto;
    }

    .kepala{
        height : 50px;
        text-align : center;
    }

    hr{
        margin-bottom : 20px;
    }
    .data-diri{
        display : flex;
        justify-content:space-between;
        margin-bottom : 20px;
    }
    .data-diri h3{
        font-weight : 700;
        margin-bottom : 15px;
    }
    .nilai{
        margin-bottom : 20px;
    }

    .isi-nilai{
        display : flex;
        justify-content : space-between;
    }
    .nilai h3{
        font-weight : 700;
        margin-bottom : 15px;
    }

    .nilai table{
        width : 100%;
    }
    .gambar img{
        width : 250px;
        margin-right : -33px;
    }

    .n{
        border : 1px solid #151111;
        border-radius : 5px;
        margin-left : -15px;
        width : 50%;
        padding : 5px 5px 5px 5px;
    }

    .w{
        border : 1px solid #151111;
        border-radius : 5px;
        margin-right : -15px;
        width : 50%;
        padding : 5px 5px 5px 5px;
    }

    .hasil{
        display :flex;
        justify-content : space-between;
    }

    .hp{
        text-align : center;
        width : 32%;
        border : 1px solid #151111;
        border-radius : 5px;
        margin-left : -15px;
        padding : 8px 8px 22px 8px;
    }

    .hp h1{
        font-size : 3rem;
    }

    .rekomendasi{
        width : 70%;
        border : 1px solid #151111;
        border-radius : 5px;
        margin-right : -15px;
        padding : 8px 8px 5px 8px;
    }
    
</style>
<?php 
    include "koneksi.php";
    $sqla = mysqli_query($koneksi, "select * from user where username='$_SESSION[userR]' and password='$_SESSION[passR]'");
    $rd = mysqli_fetch_array($sqla);
    $namaLengkap = "$rd[namaLengkap]";
    $email = "$rd[email]";

    $sqli = mysqli_query($koneksi, "select * from penilaian where namaLengkap='$namaLengkap'");
    $ra = mysqli_fetch_array($sqli);
    
    
    $bind = "$ra[bind]";
    $bing = "$ra[bing]";
    $mtk = "$ra[mtk]";
    $v1 = "$ra[v1]";
    $v2 = "$ra[v2]";
    $v3 = "$ra[v3]";
    $v4 = "$ra[v4]";

    $sqlh = mysqli_query($koneksi, "select * from hasil where namaLengkap='$namaLengkap'");
    $rh = mysqli_fetch_array($sqlh);

    $hPenilaian = "$rh[hasilPenilaian]";
    $jurusan = "$rh[jurusan]";
    $j1 = "$rh[rekomendasi1]";
    $j2 = "$rh[rekomendasi2]";
    $j3 = "$rh[rekomendasi3]";

    
    $p = round($hPenilaian,0);
    

?>
<div class="box ips">
    <div class="inner-box">
        <div class="kepala">
            <h2>Hasil Penilaian</h2>
        </div>
        <hr>
        <div class="data-diri">
            <div class="data">
            <h3>Data Diri</h3>
            <h4>
                <li><?php echo "$namaLengkap" ?></li>
                <li><?php echo "$email" ?></li>
                <li><?php echo "$jurusan" ?></li>
            </h4>
            </div>
            <div class="gambar"><img src="img/toga.png" alt=""></div>
        </div>
        <div class="nilai">
            <h3>Nilai</h3>
            <div class="isi-nilai">
                <div class="k-dasar n">
                    <h4>Kemampuan Dasar</h4>
                    <table>
                        <tr>
                            <td><li>Bahasa Indonesia</li></td>
                            <td><h4><?php echo "$bind" ?></h4></td>
                        </tr>
                        <tr>
                            <td><li>Bahasa Inggris</li></td>
                            <td><h4><?php echo "$bing" ?></h4></td>
                        </tr>
                        <tr>
                            <td><li>Matematika</li></td>
                            <td><h4><?php echo "$mtk" ?></h4></td>
                        </tr>
                    </table>
                </div>
                <div class="k-dasar w">
                    <h4>Pelajaran Wajib</h4>
                    <table>
                        <tr>
                            <td><li>Ekonomi</li></td>
                            <td><h4><?php echo "$v2" ?></h4></td>
                        </tr>
                        <tr>
                            <td><li>Sosiologi</li></td>
                            <td><h4><?php echo "$v3" ?></h4></td>
                        </tr>
                        <tr>
                            <td><li>Geografi</li></td>
                            <td><h4><?php echo "$v4" ?></h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="hasil">
            <div class="hp">
                <h3>Hasil Penilaian</h3>
                <hr>
                <h1><?php echo "$hPenilaian"; ?></h1>
            </div>
            <div class="rekomendasi">
                <center><h3>Rekomendasi Jurusan</h3></center>
                <hr>
                <li><?php echo "$j1"; ?></li>
                <li><?php echo "$j2"; ?></li>
                <li><?php echo "$j3"; ?></li>
            </div>
        </div>
    </div>
</div>